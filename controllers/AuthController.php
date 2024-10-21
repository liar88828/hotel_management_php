<?php
require_once 'core/controller.php';
require_once 'models/AdminModel.php';

class AuthController extends Controller
{

  private AdminModel $adminModel;

  // Constructor to initialize database connection
  public function __construct()
  {
    $this->adminModel = $this->model('AdminModel');
  }

  // Login function
  public function login()
  {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      header('Location: /');
    }
    try {
      // Check if form was submitted
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        // Sanitize guess input
//        $admin_name = filter_var($_POST['admin_name'], FILTER_SANITIZE_EMAIL);
        $admin_name = $_POST['admin_name'];
        $password = $_POST['admin_pass'];

        // Prepare SQL statement
        $foundAdmin = $this->adminModel->findName($admin_name);
        if (!$foundAdmin) {
          throw new Exception('admin is not found');
//          throw new Exception("Failed to prepare statement: " . mysqli_error($this->adminModel->conn));
//          throw new Exception("Failed to prepare statement: " . $this->conn->error);
        }
//print_r($password, $foundAdmin->admin_pass);
        // Verify password
        if (!
//        password_verify(
          $password == $foundAdmin->admin_pass
//      )
        ) {
          throw new Exception("Invalid password!");
        }

        // Set session variables
        $_SESSION['adminLogin'] = $admin_name;

        // Redirect to a protected page
        header("Location: /admin/dashboard");


//        $this->view('admin/dashboard');

      }

    } catch (Exception $e) {
      // Handle error (log it or display guess-friendly message)
      echo "Error: " . $e->getMessage();
    }
  }

  // Register function
  public function register()
  {
    try {
      // Enable exceptions for MySQLi
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

      // Check if form was submitted
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize guess input
        $name = filter_var($_POST['admin_name'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['admin_pass'];
        $confirmPassword = $_POST['confirm_password'];

        // Check if passwords match
        if ($password !== $confirmPassword) {
          throw new Exception("Passwords do not match!");
        }
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $foundAdmin = $this->adminModel->findName($name);
        if (!$foundAdmin) {
          throw new Exception('admin is not found');
//          throw new Exception("Failed to prepare statement: " . mysqli_error($this->adminModel->conn));
//          throw new Exception("Failed to prepare statement: " . $this->conn->error);
        }

        if ($foundAdmin->num_rows > 0) {
          throw new Exception("Email is already registered!");
        }

        // Insert the new guess into the database
        $this->adminModel->register($name, $hashedPassword);

        // Registration successful
        echo "Registration successful! You can now log in.";
        $this->adminModel->close();
      }

    } catch (Exception $e) {
      // Handle error (log it or display guess-friendly message)
      echo "Error: " . $e->getMessage();
    }
  }


  // Logout function
  public function logout()
  {
//    print_r('test');
//    session_start();
    session_unset();
    session_destroy();
//    header("Location: login.php");
//    exit();
    $this->view('home/index');

  }
}
