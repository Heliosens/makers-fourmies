<?php


class ProfileController extends Controller
{
    public function displayProfile($id){
        $data = [
            'user' => UserManager::getUserById($id)
        ];
    }
}