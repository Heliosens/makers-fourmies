<?php
// connection class
require __DIR__ . '/Model/DB.php';

// Entity class
require __DIR__ . '/Model/Entity/Technique.php';
require __DIR__ . '/Model/Entity/Article.php';
require __DIR__ . '/Model/Entity/Category.php';
require __DIR__ . '/Model/Entity/Category_link.php';
require __DIR__ . '/Model/Entity/User.php';
require __DIR__ . '/Model/Entity/Avatar.php';
require __DIR__ . '/Model/Entity/Role.php';
require __DIR__ . '/Model/Entity/Type.php';
require __DIR__ . '/Model/Entity/Image.php';
require __DIR__ . '/Model/Entity/Matter.php';
require __DIR__ . '/Model/Entity/Own_category.php';
require __DIR__ . '/Model/Entity/Resource.php';
require __DIR__ . '/Model/Entity/Take_part.php';
require __DIR__ . '/Model/Entity/Tool.php';
require __DIR__ . '/Model/Entity/Use_matter.php';
require __DIR__ . '/Model/Entity/Use_resource.php';
require __DIR__ . '/Model/Entity/Use_tech.php';
require __DIR__ . '/Model/Entity/Use_tool.php';

// router class
require __DIR__ . '/Routing/Router.php';

// controller class
require __DIR__ . '/Controller/Controller.php';
require __DIR__ . '/Controller/HomeController.php';
require __DIR__ . '/Controller/MakerController.php';
require __DIR__ . '/Controller/ResourcesController.php';
require __DIR__ . '/Controller/ProjectsController.php';
require __DIR__ . '/Controller/ContactController.php';
require __DIR__ . '/Controller/UserController.php';
require __DIR__ . '/Controller/ProfileController.php';

// Manager class
require __DIR__ . '/Model/Manager/TechnicManager.php';
require __DIR__ . '/Model/Manager/CategoryManager.php';
require __DIR__ . '/Model/Manager/ProjectsManager.php';
require __DIR__ . '/Model/Manager/TypeManager.php';
require __DIR__ . '/Model/Manager/RoleManager.php';
require __DIR__ . '/Model/Manager/UserManager.php';
require __DIR__ . '/Model/Manager/AvatarManager.php';
require __DIR__ . '/Model/Manager/MatterManager.php';
require __DIR__ . '/Model/Manager/ResourceManager.php';
require __DIR__ . '/Model/Manager/ToolManager.php';

