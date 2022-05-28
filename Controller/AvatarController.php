<?php


class AvatarController extends Controller
{
    public function change($option)
    {
        $value = $this->getOption($option);
        if (!AvatarManager::updateUserAvat($value[0], $value[1])) {
            $_SESSION['error'] = 'Une erreur s\'est produite';
        }
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }
}