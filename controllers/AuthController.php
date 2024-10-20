<?php
class AuthController
{
  private $conn;

  // Constructor to initialize database connection
  public function __construct($dbConnection)
  {
    $this->conn = $dbConnection;
  }

  // Login function
  public function Login()
  {
    session_start();

    try {
      // Enable exceptions for MySQLi
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

      // Check if form was submitted
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize user input
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        // Prepare SQL statement
        $stmt = $this->conn->prepare("SELECT id, password FROM admin_cred WHERE email = ?");
        if (!$stmt) {
          throw new Exception("Failed to prepare statement: " . $this->conn->error);
        }

        // Bind parameters and execute statement
        $stmt->bind_param("s", $email);
        $stmt->execute();

        // Fetch result
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
          $user = $result->fetch_assoc();

          // Verify password
          if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $email;

            // Redirect to a protected page
            header("Location: dashboard.php");
            exit;
          } else {
            throw new Exception("Invalid password!");
          }
        } else {
          throw new Exception("No user found with this email!");
        }

        $stmt->close();
      }

    } catch (Exception $e) {
      // Handle error (log it or display user-friendly message)
      echo "Error: " . $e->getMessage();
    }
  }

  // Register function
  public function Register()
  {
    // Implement registration logic here
  }

  // Logout function
  public function logout()
  {
    session_start();
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
  }
}
