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
    public function sendMail(){

        if(isset($_POST['sendBtn'], $_POST['user-mail'], $_POST['subject'], $_POST['user-message'])){
            $from = $this->cleanEntries('user-mail');
            $subject = $this->cleanEntries('subject');
            $txt = $this->cleanEntries('user-message');
            $txt = wordwrap($txt, 70, "/r/n");
            $headers = [
                'reply-To' => $from,
                'X-Mailer' => 'PHP/' . phpversion(),
                'Mime-version' => '1.0',
                'content-Type' => 'text/html; charset=utf-8',
                'From' => $from
            ];
            mail('makers.fourmies@gmail.com', $subject, $txt, $headers, $from);
        }
        $this->render('contact');
        $_SESSION['error'] = "Message envoyé";
    }
}