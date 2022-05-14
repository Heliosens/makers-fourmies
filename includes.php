<?php

require __DIR__ . '/Config.php';
// connection class
require __DIR__ . '/Model/DB.php';

// Entity class
require __DIR__ . '/Model/Entity/User.php';
require __DIR__ . '/Model/Entity/Avatar.php';
require __DIR__ . '/Model/Entity/Role.php';
require __DIR__ . '/Model/Entity/Technique.php';
require __DIR__ . '/Model/Entity/Article.php';
require __DIR__ . '/Model/Entity/Step.php';
require __DIR__ . '/Model/Entity/Category.php';
require __DIR__ . '/Model/Entity/Type.php';
require __DIR__ . '/Model/Entity/Art_cat.php';
require __DIR__ . '/Model/Entity/Art_tech.php';
require __DIR__ . '/Model/Entity/Category_link.php';
require __DIR__ . '/Model/Entity/Resource.php';
require __DIR__ . '/Model/Entity/Favorite.php';
require __DIR__ . '/Model/Entity/State.php';

// router class
require __DIR__ . '/Routing/Router.php';

// controller class
require __DIR__ . '/Controller/Controller.php';
require __DIR__ . '/Controller/HomeController.php';
require __DIR__ . '/Controller/MakerController.php';
require __DIR__ . '/Controller/ResourcesController.php';
require __DIR__ . '/Controller/ArticlesController.php';
require __DIR__ . '/Controller/ContactController.php';
require __DIR__ . '/Controller/UserController.php';
require __DIR__ . '/Controller/ProfileController.php';
require __DIR__ . '/Controller/AvatarController.php';

// Manager class
require __DIR__ . '/Model/Manager/Manager.php';
require __DIR__ . '/Model/Manager/StepManager.php';
require __DIR__ . '/Model/Manager/TechnicManager.php';
require __DIR__ . '/Model/Manager/CategoryManager.php';
require __DIR__ . '/Model/Manager/CategoryLinkManager.php';
require __DIR__ . '/Model/Manager/ArticleManager.php';
require __DIR__ . '/Model/Manager/TypeManager.php';
require __DIR__ . '/Model/Manager/RoleManager.php';
require __DIR__ . '/Model/Manager/UserManager.php';
require __DIR__ . '/Model/Manager/AvatarManager.php';
require __DIR__ . '/Model/Manager/ResourceManager.php';
require __DIR__ . '/Model/Manager/StateManager.php';


