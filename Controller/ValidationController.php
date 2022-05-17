<?php


class ValidationController extends Controller
{
    /**
     * send token to user by mail
     * @param $user
     */
    public function send_validation_mail($user){
        $to = $user->getEmail();
        $from = 'makers.fourmies@gmail.com';
        $subject = 'Validation de compte';
        // create token
        $token = $this->createRandomName(12);
        $txt = '
            <html lang="fr">
                <body>
                    <div>
                        <p>
                            Bonjour ' . $user->getPseudo() . ' ,
                            Merci de confirmer la création de votre compte en cliquant sur le lien ci-desous,
                        </p>
                        <a href="http://localhost:8000/index.php?c=validation&p=check_account&o=' .
                            $user->getId() . '_' . $token . '">Je confirme mon compte</a>
                    </div>
                </body>
            </html>
        ';
        $txt = wordwrap($txt, 70, "/r/n");
        $headers = array('X-Mailer' => 'PHP/' . phpversion());
        echo mail($to, $subject, $txt, $headers, $from);
    }

    /**
     * @param $option
     */
    public function check_account($option){
        // recup data of url
        $value = explode("_", $option);
        $user = UserManager::getUserById($value[0]);
        // is id match with link token & user added
        $token = $user->getToken();
        if(null === $token){
            $_SESSION['error'] = "Il semble que votre compte a déjà été validé";
        }
        elseif ($token === $value[1]) {
            // delete user token
            if(UserManager::updateToken($value[0])){
                $_SESSION['error'] = "Votre compte a été créé avec succès, vous étes connecté";
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
}