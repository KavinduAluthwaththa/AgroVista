<?php
session_start();
include '../db/DBcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['your_name']);
    $password = $_POST['your_pass'];

    // Check if user exists in users table
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_type'] = $user['user_type']; // Get user_type from database
            $_SESSION['name'] = 'Administrator'; // Default admin name
            
            // Check if user is admin
            if ($user['user_type'] === 'admin') {
                header("Location: ../admin/dashboard_admin.php");
            } else {
                header("Location: ../shared/index.php"); // Redirect regular users to main site
            }
            exit;
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "User not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login | Agro Vista</title>

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    
    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/main.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            display: flex;
            min-height: 500px;
        }
        
        .login-image {
            flex: 1;
            background: linear-gradient(135deg, #4CAF50, #45a049);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: white;
            padding: 40px;
            position: relative;
        }
        
        .login-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('../assets/img/logo.png') center/100px no-repeat;
            opacity: 0.1;
        }
        
        .login-image h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .login-image p {
            font-size: 1.1rem;
            text-align: center;
            opacity: 0.9;
        }
        
        .login-form {
            flex: 1;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .form-title {
            font-size: 2rem;
            font-weight: 600;
            color: #2c5530;
            margin-bottom: 10px;
            text-align: center;
        }
        
        .form-subtitle {
            color: #666;
            text-align: center;
            margin-bottom: 40px;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-control {
            width: 100%;
            padding: 15px 20px 15px 50px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s;
            background: #f8f9fa;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #4CAF50;
            background: white;
            box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
        }
        
        .form-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #4CAF50;
            font-size: 18px;
        }
        
        .btn-login {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 16px;
            width: 100%;
            transition: all 0.3s;
            margin-top: 20px;
        }
        
        .btn-login:hover {
            background: linear-gradient(135deg, #45a049, #3d8b40);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
        }
        
        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        }
        
        .back-link {
            text-align: center;
            margin-top: 30px;
        }
        
        .back-link a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: 500;
        }
        
        .back-link a:hover {
            color: #45a049;
        }
        
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                margin: 20px;
            }
            
            .login-image {
                padding: 30px 20px;
            }
            
            .login-form {
                padding: 40px 30px;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        <!-- Login Image/Branding Side -->
        <div class="login-image">
            <h2>Agro Vista</h2>
            <p>Welcome to the Agricultural E-Commerce Administration Panel</p>
            <p>Manage products, sellers, and marketplace content efficiently</p>
        </div>

        <!-- Login Form Side -->
        <div class="login-form">
            <h2 class="form-title">Admin Login</h2>
            <p class="form-subtitle">Please sign in to access the dashboard</p>
            
            <?php if (isset($error)) { ?>
                <div class="error-message">
                    <i class="bi bi-exclamation-triangle"></i> <?php echo $error; ?>
                </div>
            <?php } ?>
            
            <?php if (isset($_GET['success']) && $_GET['success'] == 'registered') { ?>
                <div class="success-message" style="background: #d4edda; color: #155724; padding: 12px 20px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                    <i class="bi bi-check-circle"></i> Registration successful! You can now login.
                </div>
            <?php } ?>
            
            <form method="POST">
                <div class="form-group">
                    <i class="bi bi-envelope form-icon"></i>
                    <input type="email" name="your_name" id="your_name" class="form-control" 
                           placeholder="Enter your email address" required />
                </div>
                
                <div class="form-group">
                    <i class="bi bi-lock form-icon"></i>
                    <input type="password" name="your_pass" id="your_pass" class="form-control" 
                           placeholder="Enter your password" required />
                </div>
                
                <button type="submit" name="signin" class="btn-login">
                    <i class="bi bi-box-arrow-in-right"></i> Sign In
                </button>
            </form>
            
            <div class="back-link">
                <a href="../shared/index.php">
                    <i class="bi bi-arrow-left"></i> Back to Main Site
                </a>
            </div>
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
