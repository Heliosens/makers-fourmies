<?php

require __DIR__ . '/Model/DB.php';

require __DIR__ . '/Model/Entity/Technique.php';
require __DIR__ . '/Model/Entity/Article.php';
require __DIR__ . '/Model/Entity/Category.php';
require __DIR__ . '/Model/Entity/User.php';
require __DIR__ . '/Model/Entity/Avatar.php';
require __DIR__ . '/Model/Entity/Role.php';

require __DIR__ . '/Routing/Router.php';

require __DIR__ . '/Controller/Controller.php';
require __DIR__ . '/Controller/HomeController.php';
require __DIR__ . '/Controller/MakerController.php';
require __DIR__ . '/Controller/ResourcesController.php';
require __DIR__ . '/Controller/ProjectsController.php';
require __DIR__ . '/Controller/ContactController.php';
require __DIR__ . '/Controller/UserController.php';

require __DIR__ . '/Model/Manager/TechnicManager.php';
require __DIR__ . '/Model/Manager/CategoryManager.php';
require __DIR__ . '/Model/Manager/ProjectsManager.php';
require __DIR__ . '/Model/Manager/TypeManager.php';
require __DIR__ . '/Model/Manager/RoleManager.php';
require __DIR__ . '/Model/Manager/UserManager.php';
require __DIR__ . '/Model/Manager/AvatarManager.php';

