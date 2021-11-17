<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-block">
                  <div class="mb-4">
                  <h3>Sign In</h3>
                </div>
                <form action="login.php" name="login-form" method="post">
                  <div class="form-group first">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username"required>

                  </div>
                  <div class="form-group last mb-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                     pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" required>
                    
                  </div>

                  <input type="submit" value="Log In" name="login" class="btn btn-pill text-white btn-block btn-primary">
                  <?php
                    $error = '';
                    $db = new mysqli('localhost:3307', 'root', '', 'demo_sql_injection');
                    mysqli_set_charset($db, 'UTF8');

                     //$username = $_POST['username'];
                     //$password = $_POST['password'];
                    if(isset($_POST['login'])){

                        if ( empty($_POST['username']) || empty($_POST['password'])) { 
                            //var_dump('hihi');
                            echo ' </br> <p style="color:red"> Vui lòng nhập đầy đủ username và password !</p>';
                        }
                        else
                        {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $sql = "SELECT * FROM admin WHERE username = '{$username}' AND password = '{$password}'";
                            $query = $db->query($sql);
                            if ($query) {
                                $user = $query->fetch_assoc();
                                if (!$user) { 
                                    echo'</br> <p style="color:red"> Sai tên đăng nhập hoặc mật khẩu ! </p>';
                                }
                                else {
                                    session_start();
                                    $_SESSION['username'] = $username;

                                    header('Location: manageStudentMysql.php');
                                    
                                }
                            }
                        }
                    }
                    ?>
                </form>
              </div>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
