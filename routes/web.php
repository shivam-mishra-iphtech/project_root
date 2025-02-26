<?php 
require_once __DIR__ . '/../app/controllers/UserController.php'; 
$controller = new UserController();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'create':$controller->createForm(); break;
        case 'login':$controller->loginForm(); break;
        case 'logout':$controller->logoutUser(); break;


        // case 'edit':
        //     if (isset($_GET['id'])) {
        //         $controller->edit($_GET['id']);
        //     } else {
        //         echo "Error: Missing product ID.";
        //     }
        //     break;
        // case 'update':
        //     if (isset($_GET['id'])) {
        //         $controller->update($_GET['id']);
        //     } else {
        //         echo "Error: Missing product ID.";
        //     }
        //     break;
        // case 'delete':
        //     if (isset($_GET['id'])) {
        //         $controller->delete($_GET['id']);
        //     } else {
        //         echo "Error: Missing product ID.";
        //     }
        //     break;
        default:
            $controller->index();
            break;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-user'])) {
        // echo "<pre>";
        // print_r($_POST);
        // print_r($_FILES);die;
        //Keeping original field names
        $userData = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'contact' => $_POST['contact'],
            'dob' => $_POST['dob'],
            'address' => $_POST['address'],
            'about' => $_POST['about'],
            'password' => $_POST['password'],
            'image' => $_FILES['images']
        ];
        $controller->addUser($userData);
    }

    elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login-user'])) {
        // echo "<pre>";
        // print_r($_POST);die;
       
        $userData = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];
        $controller->loginUser($userData);
    
} else {
    echo'';
}
?>
