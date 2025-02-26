<?php 
require_once __DIR__ . '/../models/Users.php'; 

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new Users();
    }

    public function index() {
        $users = $this->userModel->getAll();
        require_once __DIR__ . '/index.php';
    }

    public function createForm() {
        header('Location: create.php');
        exit;
    }
    public function loginForm() {
        header('Location: login.php');
        exit;
    }

    public function addUser($userData) {
        // Validate required fields
        if (
            empty($userData['name']) || empty($userData['email']) || empty($userData['contact']) ||
            empty($userData['dob']) || empty($userData['address']) || empty($userData['about']) ||
            empty($userData['password']) || empty($userData['image']['name'])
        ) {
            header("Location: create.php?error=All fields are required");
            exit;
        }
    
        // Hash the password
        $userData['password'] = password_hash($userData['password'], PASSWORD_BCRYPT);
        $userData['address'] = json_encode($userData['address']);
        $userData['about'] = json_encode($userData['about']);
    
        // Handle image upload
        $imageName = null;
        if (!empty($userData['image']['name'])) {
            $imageExtension = pathinfo($userData['image']['name'], PATHINFO_EXTENSION);
            $imageName = time() . uniqid() . "." . $imageExtension;
            $imagePath = __DIR__ . "/../../storage/public/userImage/";
    
            if (!is_dir($imagePath) && !mkdir($imagePath, 0777, true) && !is_dir($imagePath)) {
                header("Location: create.php?error=Failed to create directory");
                exit;
            }
    
            if (!move_uploaded_file($userData['image']['tmp_name'], $imagePath . $imageName)) {
                header("Location: create.php?error=Failed to upload image");
                exit;
            }
        }
        $userData['image'] = $imageName;
        // echo$userData['image'];die;
        // echo"<pre>";
        // print_r($userData);die;
        if ($this->userModel->create($userData)) {
            header("Location: create.php?success=User added successfully");
            exit;
        } else {
            header("Location: create.php?error=Failed to add user");
            exit;
        }
    }
    public function loginUser($loginData) {
       
        session_start();
        

        if (empty($loginData['email'])) {
            header("Location: login.php?error=Email is required");
            exit;
        }
    
        if (empty($loginData['password'])) {
            header("Location: login.php?error=Password is required");
            exit;
        }
    
        // Get user from the model
        $user = $this->userModel->loginNow($loginData);
    
        // Check if user exists
        if ($user && password_verify($loginData['password'], $user['password'])) {
            // Store user data in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
    
            // Redirect to profile page with success message
            header("Location: userProfile.php?success=User login successful");
            exit;
        } else {
            // Redirect back to login with error message
            header("Location: login.php?error=Invalid email or password");
            exit;
        }
    }
    
    public function logoutUser() {
        session_start(); 
    
        session_unset();
        $user=session_destroy();

        If($user){
            // echo "test";die;
            header("Location: login.php?success=Logged out successfully");
            exit;
        }
        else{
            header("Location: userProfile.php?error=Logged out failed");
        exit;
        }
    
        
    }
    public function editForm($id) {
        $user = $this->userModel->getById($id);
        require_once __DIR__ . 'edit.php';
    }
   
    function checkLogin() {
       if (isset($_SESSION['user_id'])) {
            header("Location: index.php?action=create");
        exit;
        }
        else{
            header("Location: index.php?action=login");
            exit;
        }
    }

    
}
