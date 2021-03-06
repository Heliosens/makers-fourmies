<?php


class StepController extends Controller
{
    /**
     * @return array
     */
    public function createSteps()
    {
        $steps = [];
        foreach ($_POST['stepTitle'] as $key => $item){
            $title = $this->cleanItem($item);
            $step = new Step();
            // get step image
            if(isset($_FILES['stepImage'])){
                if($_FILES['stepImage']['error'][$key] === 0){
                    $maxSize = 4 * 1024 * 1024; // = 4 Mo
                    $currentFile = $_FILES['stepImage']['tmp_name'][$key];
                    if((int)$_FILES['stepImage']['size'][$key] <= $maxSize){
                        if($this->testMimeType($currentFile)){
                            $tmp_name = $currentFile;    // image temporary name
                            $ext = pathinfo($_FILES['stepImage']['name'][$key], PATHINFO_EXTENSION);   // file extension
                            $name = $this->createRandomName(10) . "." . $ext;
                            $step->setImgName($name);
                            move_uploaded_file($tmp_name, 'uploads/' . $name);
                        }
                        else{
                            $_SESSION['error'] = "Type d'image non pris en charge";
                            header('Location: /index.php?c=articles&p=art_form');
                            exit;
                        }
                    }
                    else{
                        $_SESSION['error'] = "L'image est trop grande";
                        header('Location: /index.php?c=articles&p=art_form');
                        exit;
                    }
                }
                else{
                    $_SESSION['error'] = "Erreur lors du chargement de l'image";
                    header('Location: /index.php?c=articles&p=art_form');
                    exit;
                }
            }

            $description = $this->cleanItem($_POST['stepDescription'][$key]);
            $tool = $this->cleanItem($_POST['stepTool'][$key]);
            $matter = $this->cleanItem($_POST['stepMatter'][$key]);

            $step
                ->setTitle($title)
                ->setDescription($description)
                ->setTool($tool)
                ->setMatter($matter)
            ;

            $steps[] = $step;
        }
        return $steps;
    }

    /**
     * delete one step uploads
     * @param $id
     */
    public function deleteStepUploads($id) {
        $img = StepManager::findUploadedImg($id);
        foreach ($img as $item){
            unlink("/uploads/' . $item . '");
        }
    }

    /**
     * @param $id
     */
    public static function deleteUploadsByArt($id) {
        $img = StepManager::artUploadedImg($id);
        foreach ($img as $item){
            if(isset($item)){
                unlink("/uploads/' . $item . '");
            }
        }
    }

}