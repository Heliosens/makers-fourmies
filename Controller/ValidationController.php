<?php


class ValidationController extends Controller
{
    /**
     * send token to user by mail
     * @param $user
     */
    public function sendValidationMail($user){
        $to = $user->getEmail();
        $subject = 'Validation de compte';
        // create token
        $token = $this->createRandomName(12);
        $txt = "
        Bonjour, Merci de confirmer la création de votre compte en cliquant sur le lien :
        <a href=\"http://makers-fourmies.heliosens.fr/index.php?c=validation&p=check_account&o=" .
        $user->getId() . "_" . $token . "\">Je confirme mon compte\</a>";
        $headers = [
            'reply-To' => 'makers.fourmies@gmail.com',
            'X-Mailer' => 'PHP/' . phpversion(),
            'Mime-version' => '1.0',
            'content-Type' => 'text/html; charset=utf-8',
            'From' => 'makers.fourmies@gmail.com'
        ];
        mail($to, $subject, $txt, $headers);
    }

    /**
     * @param $option
     */
    public function checkAccount($option){
        // recup data of url
        $value = $this->getOption($option);
        $user = UserManager::getUserById($value[0]);
        // is the token already deleted
        if(self::checkToken($user)){
            $_SESSION['error'] = "Il semble que votre compte a déjà été validé";
        }
        elseif ($user->getToken() === $value[1]) {  // is the id match with link token & user added
            // delete user token
            if(UserManager::updateToken($value[0])){
                $_SESSION['success'] = "Votre compte a été créé avec succès, vous étes connecté";
                $_SESSION['user'] = [
                    'id' => $user->getId(),
                    'pseudo' => $user->getPseudo(),
                    'role' => $user->getRole()->getRoleName()
                ];
            }
            else {
                $_SESSION['error'] = "Une erreur s'est produite";
            }
        }
        else {
            $_SESSION['error'] = "Lien invalide";
        }
        $this->render('home');
    }

    /**
     * return true if token is empty
     * @param $user
     * @return bool
     */
    public static function checkToken($user){
        return (empty($user->getToken()));
    }
}
