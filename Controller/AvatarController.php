<?php


class AvatarController extends Controller
{
    public function change($option)
    {
        if (!AvatarManager::updateUserAvat($option)) {
            $_SESSION['error'] = 'Une erreur s\'est produite';
        }
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }
}