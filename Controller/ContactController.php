<?php


class ContactController extends Controller
{
    /**
     * display contact form
     */
    public function page(){
        $this->render('contact');
    }

    /**
     * send mail from user to mkf
     */
    public function send_mail(){
        if(isset($_POST['sendBtn'], $_POST['user-mail'], $_POST['subject'], $_POST['user-message'])){
            $from = $this->cleanEntries($_POST['user-mail']);
            $subject = $this->cleanEntries($_POST['subject']);
            $txt = $this->cleanEntries($_POST['user-message']);
            $txt = wordwrap($txt, 70, "/r/n");
            $headers = array(
                'X-Mailer' => 'PHP/' . phpversion()
            );
            echo mail('makers.fourmies@gmail.com', $subject, $txt, $headers, $from);
        }
    }
}