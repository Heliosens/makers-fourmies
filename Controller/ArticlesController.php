<?php


class ArticlesController extends Controller
{

    /**
     * display every techniques name
     */
    public function all_technic(){
        $this->render('techniques');
    }

    /**
     * @param $option
     */
    public function one_technic($option){
        $data = [
            'projects' => ArticleManager::artByTechnic($option),
            'title' => TechnicManager::techName($option)
            ];
        $this->render('project_by_tech', $data);
    }

    /**
     * @param $option
     */
    public function one_article ($option){
        // get selected projects
        $data = [
            'article' => ArticleManager::oneArticle($option)
        ];

        $this->render('article', $data);
    }

    /**
     * create article form
     */
    public function art_form (){
        $data = [
            'type' => TypeManager::getAllKeyName('type'),
            'category' => CategoryManager::getAllKeyName('category'),
            'technique' => TechnicManager::getAllKeyName('technique'),
        ];
        $this->render('art_form', $data);
    }

    /**
     *
     */
    public function add_art (){
        if(!$this->fieldsState('artTitle', 'artDescription')){
            $_SESSION['error'] = "Les champs obligatoires doivent être remplis !";
            header('Location: index.php?c=projects&p=art_form');
        }

//         get article data
        $title = $this->cleanEntries('artTitle');
        $description = $this->cleanEntries('artDescription');
        $author = UserManager::getUserById($_SESSION['user']['id']);
        $type = $this->fieldsState('type') ? TypeManager::getTypeById($_POST['type']) : null;
        $state = StateManager::stateByName('pr');
        $cat = $this->fieldsState('cat') ? $_POST['cat'] : null;

//         get step
        $steps[] = $this->addStep();   // if step => title is required

        $article = new Article();
        $article
            ->setTitle($title)
            ->setDescription($description)
            ->setStep($steps)
            ->setType($type)
            ->setState($state)
            ->setCategory($cat)
            ->setAuthor($author);

        if(ArticleManager::addArticle($article)){
            header('Location: index.php?c=profile');
        }
//        echo '<pre>';
//            var_dump($_POST);
//        echo '</pre>';

    }

    /**
     * @return Step|null
     */
    private function addStep ()
    {
        if($this->fieldsState('stepTitle')){
            $step = new Step();
            // get step image

            if(isset($_FILES['stepImage']) && $_FILES['stepImage']['error'] === 0){
                $allowed = ['image/jpeg', 'image/jpg', 'image/png'];  // allowed mime type
                $maxSize = 3 * 1024 * 1024; // = 3 Mo
                if((int)$_FILES['stepImage']['size'] <= $maxSize && in_array($_FILES['stepImage']['type'], $allowed)){
                    $tmp_name = $_FILES['stepImage']['tmp_name'];    // image temporary name
                    $ext = pathinfo($_FILES['stepImage']['name'], PATHINFO_EXTENSION);   // file extension
                    $name = $this->createRandomName() . "." . $ext;
                    $step->setImgName($name);
                    move_uploaded_file($tmp_name, 'uploads/' . $name);
                }
                else{
                    $_SESSION['error'] = "L'image " . $this->cleanEntries($_FILES['name']) . " est trop grande";
//                    header("Location: index.php?c=articles&p=art_form");
                }
            }
            else{
                $_SESSION['error'] = "erreur lors du chargement de l'image " . $this->cleanEntries($_FILES['name']);
//                header("Location: index.php?c=articles&p=art_form");
            }
            $stepTitle = $this->cleanEntries('stepTitle');
            $stepDescription = $this->cleanEntries('stepDescription');
            $step
                ->setTitle($stepTitle)
                ->setDescription($stepDescription);
            return $step;
        }
        return null;
    }

    /**
     * @return string
     */
    private function createRandomName (): string {
        try {
            $bytes = random_bytes(15);
        } catch (Exception $e) {
            $bytes = openssl_random_pseudo_bytes(15);
        }
        return bin2hex($bytes);
    }

}