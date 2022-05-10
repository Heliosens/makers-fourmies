<?php


class UserController extends Controller
{
    /**
     * display register form
     */
    public function register_form (){
        // verify if there's not already a connected user
        !isset($_SESSION['user']) ? $this->render('register') : $this->render('profile');
    }

    /**
     * display connection form
     */
    public function connection_form (){
        // verify if there's not already a connected user
        !isset($_SESSION['user']) ? $this->render('connection') : $this->render('profile');
    }

    /**
     * register and connect new user
     */
    public function new_user (){
        $error = "";
        // verify if there's not already a connected user & button is press & check fields
        if(!isset($_SESSION['user']) && isset($_POST['sendBtn'])
            && $this->fieldsState($_POST['email'], $_POST['passwrd'])){
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

                // check if there's no error
                if(empty($error)){
                    // no error message
                    $user = new User();
                    $user->setPseudo($pseudo)
                        ->setEmail($email)
                        ->setPassword(password_hash($password, PASSWORD_DEFAULT))
                        ->setRole(RoleManager::roleByName('user'))
                        ->setAvatar(AvatarManager::defaultAvatar())
                        ;

                    // create token


                    if(UserManager::addUser($user)){
//                        $_SESSION['success'] = "Vous allez recevoir un mail de vérification";
                        $_SESSION['error'] = null;
                        $_SESSION['user'] = [
                            'id' => $user->getId(),
                        ];
                        // todo send validation link by mail
                    }
                    else {
                        $_SESSION['error'] = "Une erreur s'est produite";
                    }
                }
                else {
                    $_SESSION['error'] = $error;
                    $this->render('register');
                }
            }
            $this->render('home');
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
        if(isset($_SESSION['user'])){
            $this->render('profile');
        }
        //  check if button is press & fields not empty
        if(isset($_POST['sendBtn']) && $this->fieldsState($_POST['email'], $_POST['passwrd'])){

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
                if($user === null){
                    $_SESSION['error'] = "Email ou mot de passe incorrect";
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
                $_SESSION['error'] = 'Cet email a déjà été enregistré';
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
        $this->render('home');
    }


}