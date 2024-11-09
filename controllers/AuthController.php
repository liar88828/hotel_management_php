<?php


class AuthController extends Controller
{

    private AdminModel $adminModel;
    private StaffModel $staffModel;
    private GuestModel $guestModel;

    // Constructor to initialize database connection
    public function __construct()
    {
        $this->adminModel = $this->model('AdminModel');
        $this->staffModel = $this->model('StaffModel');
        $this->guestModel = $this->model('GuestModel');

    }

    // Login function
    public function login(): void
    {

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $this->redirect('/');
//            header('Location: /');
        }
        try {
            // Check if form was submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                // Sanitize guest input


                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $password = trim($_POST['password']);
                $role = trim($_POST['role']);

                // Prepare SQL statement
                $foundEmail = [];
                if ($role == 'admin') {
                    $foundEmail = $this->adminModel->findEmail($email);
                } else if ($role == 'staff') {
                    $foundEmail = $this->staffModel->findEmail($email);
                } else if ($role == 'guest') {
                    $foundEmail = $this->guestModel->findEmail($email);
                }

                if (!$foundEmail) {
                    throw new Exception('Email is not found');
                }

                // Verify password
                if ($role == 'admin') {
                    if (!$password == $foundEmail->password) {
                        throw new Exception("Invalid password!");
                    }
                } elseif ($role == 'guest' || $role == 'staff') {
                    if (!password_verify($password, $foundEmail[0]->password)) {
                        throw new Exception("Invalid password!");
                    }
                } else {
                    throw new Exception("Invalid role!");
                }

                if ($role == 'admin') {
                    // Set session variables
                    $_SESSION['adminLogin'] = $foundEmail->email;
                    // Redirect to a protected page
//                    header("Location: /admin/dashboard");
                    $this->redirect('/admin/dashboard');
                }
                if ($role == 'staff') {
                    $data = $foundEmail[0];
                    $data->password = '';
                    $_SESSION['staffLogin'] = $data;
                    $this->redirect('/staff/dashboard');
//                    header("Location: /");
                }
                if ($role == 'guest') {
                    $data = $foundEmail[0];
                    $data->password = '';
                    $data->role = $role;
                    print_r($data);
                    $_SESSION['guestLogin'] = $data;
                    $this->redirect('/guest/profile');
//                    header("Location: /");
                }
            }

        } catch (Exception $e) {
            // Handle error (log it or display guess-friendly message)
//            echo "Error: " . $e->getMessage();
            $this->redirect('/', ['message' => $e->getMessage()]);

        } finally {
            $this->redirect('/');

        }
    }

    // Register function
    public function register(): void
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $this->redirect('/');
            }

            // Enable exceptions for MySQLi
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            // Check if form was submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
//                print_r($_POST);
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
                    'phone' => trim($_POST['phone']),
                    'image' => $_FILES['image']['name'], // Handle file upload separately
                    'address' => trim($_POST['address']),
                    'pin_code' => trim($_POST['pin_code']),
                    'date_of_birth' => trim($_POST['date_of_birth']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'role' => trim($_POST['role'])
                ];
                $foundEmail = [];
                if ($data['role'] == 'guest') {
                    $foundEmail = $this->guestModel->findEmail($data['email']);
//                    print_r('is guest');
                } elseif ($data['role'] === 'staff') {
                    $foundEmail = $this->staffModel->findEmail($data['email']);
//                    print_r('is staff');
                } else {
                    throw new Exception('Invalid role');
                }
//                print_r($foundEmail);

                if (count($foundEmail) > 0) {
                    throw new Exception("Email is already registered!");
                }

                // Validate passwords
                if ($data['password'] !== $data['confirm_password']) {
                    throw new Exception("Passwords do not match!");
                }

                // Hash the password for security
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

                // Handle image upload (store image in a directory and get the path)

                // Insert the new guess into the database
                if ($data['role'] == 'guest') {
                    $this->guestModel->create($data);
                } elseif ($data['role'] == 'staff') {
                    $this->staffModel->create($data);
                } else {
                    throw new Exception("Invalid role!");
                }
                if ($data['image']) {
                    $target_dir = "images/person/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                }
//                $this->adminModel->register($data);

                // Registration successful
//                echo "Registration successful! You can now log in.";
//                $this->adminModel->close();
//                header("Location: /");

                $this->redirect('/');
            }

        } catch (Exception $e) {
            // Handle error (log it or display guess-friendly message)
//            echo "Error: " . $e->getMessage();
            $this->redirect('/', ['message' => $e->getMessage()]);

        }
    }


    // Logout function
    public function logout(): void
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $this->view('/auth/logout');
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                session_unset();
                session_destroy();
                $this->redirect('/');
                exit();

            }
        } catch (Exception $e) {
            $this->redirect('/', ['message' => $e->getMessage()]);
        } finally {
            $this->redirect('/');
        }
    }
}
