<?php


class UserController extends Controller
{
    /**
     * display register form
     */
    public function register (){
        $this->render('register');
    }

    /**
     * display connection form
     */
    public function connection (){
        $this->render('connection');
    }


    public function new_user (){
        // check button
        if(isset($_POST['sendBtn'])){
            // clean user entries data
            $pseudo = $this->cleanEntries('pseudo');
            $email = $this->cleanEntries('email');
            $password = $_POST['passwrd'];
            $passwordBis = $_POST['passwrdBis'];

            // create array for error message
            $error = [];

            // check mail validity
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error[] = "L'adresse email n'est pas valide";
            }

            // check pseudo length
            if(strlen($pseudo) < 2 ) {
                $error[] = "Le pseudo n'est pas assez long";
            }

            // check password attempt character
            if(!preg_match('/^(?=.*[!+@#$%^&*-\])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $password)) {
                // Le password ne correspond pas au critère.
                $error[] = "Le password ne correspond pas aux critères";
            }

            // check the password equality
            if($password !== $passwordBis){
                $error[] = "Les mots de passe ne sont pas identiques";
            }

            if(empty($error)){
                // no error message
                $user = new User();
                $user->setPseudo($pseudo)
                    ->setEmail($email)
                    ->setPassword(password_hash($password, PASSWORD_DEFAULT))
                    ->setRole(RoleManager::defaultRole())
                    ;
            }
        }
    }

}