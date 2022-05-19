<?php


class UserController extends Controller
{
    /**
     * display register form
     */
    public function register_form (){
        // verify if there's not already a connected user
        $this->connectedKeepGoing(false);
        $this->render('register');
    }

    /**
     * display connection form
     */
    public function connection_form (){
        // verify if there's not already a connected user
        $this->connectedKeepGoing(false);
        !isset($_SESSION['user']) ? $this->render('connection') : $this->render('home');
    }

    /**
     * register and connect new user
     */
    public function new_user (){
        $this->connectedKeepGoing(false);
        $error = "";
        // verify if there's not already a connected user & button is press & check fields
        if(!isset($_SESSION['user']) && isset($_POST['sendBtn'])){
            // check button
            if(isset($_POST['sendBtn'])){
                // clean user entries data
                $pseudo = $this->cleanEntries('pseudo');
                $email = $this->cleanEntries('email');
                $password = $_POST['passwrd'];
                $passwordBis = $_POST['passwrdBis'];

                // create array for error message
                $_SESSION['error'] = $error;
                // check mail validity
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $error = "L'adresse email n'est pas valide";
                }

                // check pseudo length
                if(strlen($pseudo) < 2 ) {
                    $error = "Le pseudo n'est pas assez long";
                }

                // check password attempt character
                if(!preg_match('/^(?=.*[!+@#$%^&*-\])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $password)) {
                    // Le password ne correspond pas au critère.
                    $error = "Le password ne correspond pas aux critères";
                }

                // check the password equality
                if($password !== $passwordBis){
                    $error = "Les mots de passe ne sont pas identiques";
                }

                // check if mail exist
                if(UserManager::mailEverExist($email)){
                    $error = "Cet email est déja enregistré !";
                }

                // create token
                $token = $this->createRandomName(12);

                // check if there's no error
                if(empty($error)){
                    // create user
                    $user = new User();
                    $user->setPseudo($pseudo)
                        ->setEmail($email)
                        ->setPassword(password_hash($password, PASSWORD_DEFAULT))
                        ->setRole(RoleManager::roleByName('user'))
                        ->setAvatar(AvatarManager::defaultAvatar())
                        ->setToken($token)
                        ;

                    // send validation mail
                    $val = new ValidationController();
                    $val->send_validation_mail($user);

                    // if user added display message
                    if(UserManager::addUser($user)){
                        $_SESSION['error'] = 'Vous allez recevoir un mail de validation, merci de cliquer sur le lien de
                     confirmation contenu dans ce message pour finaliser votre inscription';
                    }
                    else{
                        $_SESSION['error'] = 'Erreur lors de l\'inscription';
                    }
                    $this->render('home');
                }
                else {
                    $_SESSION['error'] = $error;
                    $this->render('register');
                }
            }
            $this->render('home');
            die();
        }
        else {
            $_SESSION['error'] = 'Veuillez remplir tous les champs';
            $this->render('register');
        }
    }

    /**
     * connect user
     */
    public function connection (){
        // verify if there's not already a connected user
        $this->connectedKeepGoing(false);

        //  check if button is pressed
        if(isset($_POST['sendBtn'])){

            // clean email
            $email = $this->cleanEntries('email');
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $password = $_POST['passwrd'];

            // check mail validity
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $_SESSION['error'] = "Email (ou mot de passe incorrect)";
            }
            elseif (!preg_match('/^(?=.*[!+@#$%^&*-\])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $password)){
                // password don't match with attempted characters
                $_SESSION['error'] = "Email ou mot de passe incorrect";
            }
            elseif (UserManager::mailEverExist($email)){        // check if mail not exist
                $user = UserManager::getUserByMail($email);             // get mail owner

                if ($user === null){
                    $_SESSION['error'] = "Email ou mot de passe incorrect";
                }elseif (!ValidationController::checkToken($user)){
                    $_SESSION['error'] = 'Votre compte n\'a pas été validé, veuillez consulter vos mails';
                }
                elseif(password_verify($password, $user->getPassword())){   // check password
                    $user->setPassword('');
                    $_SESSION['user'] = [
                        'id' => $user->getId(),
                        'pseudo' => $user->getPseudo(),
                        'role' => $user->getRole()->getRoleName()
                    ];
                }
                else{
                    $_SESSION['error'] = "Email ou mot de passe incorrect";
                    $this->render('connection');
                }
            }
            else{
                $_SESSION['error'] = 'Email ou mot de passe incorrect';
            }
        }
        else {
            $_SESSION['error'] = 'Veuillez remplir tous les champs';
        }
        // check error
        if(isset($_SESSION['error'])){
            $this->render('connection');
        }
        $this->render('home');
    }

    /**
     * Disconnection
     */
    public function disconnect (){
        if(isset($_SESSION['user'])) {
            $_SESSION['error'] = null;
            $_SESSION['user'] = null;
            session_unset();
            setcookie(session_id(), "", time() - 3600);
            session_destroy();
        }
        header('Location: index.php');
    }

    /**
     * only admin delete user count and only if user is not the last admin
     * @param int $id
     */
    public function del_user (int $id){
        if($_SESSION['user']['role'] === 'admin'){
//          get del user role
            $role = UserManager::getRoleByUser($id)->getRoleName();
            if($this->testAdmin() || $role !== 'admin'){
                UserManager::delById($id);
            }
            else{
                $_SESSION['error'] = "Attention vous ne pouvez pas supprimer le dernier administrateur du site !";
            };
            header('Location: index.php?c=profile&p=admin');
        }
    }

    /**
     * delete count by owner
     */
    public function del_own_count (){
//      get del user role
        $role = $_SESSION['user']['role'];
        if($this->testAdmin() || $role !== 'admin'){
            UserManager::delById($_SESSION['user']['id']);
            $this->disconnect();
        }
        else{
            $_SESSION['error'] = "Attention vous ne pouvez pas supprimer le dernier administrateur du site !";
            header('Location: index.php');
        }
    }
}