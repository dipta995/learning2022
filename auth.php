<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login / Registration</title>
</head>
<?php
include 'Controller/database.php';
include 'Controller/session.php';

$msg="";

// 
// Create New Account 
// 
if (isset($_POST['register'])) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];

  $query1 = "SELECT * FROM users WHERE email='$email'";
  $emailcheck = $con->query($query1);
  $query2 = "SELECT * FROM users WHERE phone='$phone'";
  $phonecheck = $con->query($query2);

  if (!preg_match("/^[a-zA-Z-']*$/", $first_name)) {
    $msg = "Only letters are allowed for first Name";
  } elseif (!preg_match("/^[a-zA-Z-']*$/", $last_name)) {
    $msg = "Only letters are allowed for Last Name";
  } elseif (strlen($password) < 8) {
    $msg = "Password must be minimum 8 Digit";
  } elseif (strlen($phone) != 11) {
    $msg = "Phone number must be 11 Digits";
  } elseif (!preg_match("/^(?:\\+88|88)?(01[3-9]\\d{8})/", $phone)) {
    $msg = "Phone number is not valid (First two digits must be '01'!)";
  } elseif (!preg_match("/(^[a-z0-9]+$){0,}([.]?(^[a-z0-9]+$){1,})/", $email)) {
    $msg = "Invalid email address (Only lowercase letters allowed!)";
  } elseif (!preg_match("/[@](gmail.com|hotmail.com|yahoo.com)/", $email)) {
    $msg = "Invalid email address (Please enter gmail, hotmail or yahoo!)";
  } elseif ($emailcheck->num_rows > 0) {
    $msg = "This email address has already been Registered";
  } elseif ($phonecheck->num_rows > 0) {
    $msg = "This phone no. has already been Registered";
  } else {
    $query = "INSERT INTO users(first_name,last_name,email,phone,password,role)VALUES('$first_name','$last_name','$email','$phone','$password','user')";
    $result = $con->query($query);
    if ($result) {
      header('Location:auth.php');
    } else {
      $msg = "Something wrong try again";
    }
  }
}

// 
// Log in 
// 
if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
      $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
      $result = $con->query($query);
      if ($result->num_rows > 0) {
          $value = mysqli_fetch_array($result);
          $_SESSION['active'] = "active";
          $_SESSION['role'] = $value['role'];
          $_SESSION['first_name'] = $value['first_name'];
          $_SESSION['last_name'] = $value['last_name'];
          $_SESSION['email'] = $value['email'];
          $_SESSION['phone'] = $value['phone'];
          $_SESSION['user_id'] = $value['id'];
        
          if ($value['role']=='admin') {
             
            header('Location:admin/index.php');
          }else{
            header('Location:index.php');
          }
         
           
       }else{
           $msg = "Incorrent Email and Password";
       } 
      }


?>

<body>
  <section>
    <div class="container">
      <div class="user signinBx">
        <div class="imgBx"><img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img1.jpg" alt="" /></div>
        <div class="formBx">
        
          
          <form action="" method="post">
            <h2>Sign In</h2>
            <div class="text-danger">
              <h4 style="color:red;">
              <?php
                echo $msg;
              ?>
              </h4>
           
          </div>
            <input type="email" name="email" placeholder="email" />
            <input type="password" name="password" placeholder="Password" />
            <input type="submit" name="login" value="Login" />
            <p class="signup">
              Don't have an account ?
              <a href="#" onclick="toggleForm();">Sign Up.</a>
            </p>
          </form>
        </div>
      </div>
      <div class="user signupBx">
        <div class="formBx">
          <form action="" method="POST">
            <h2>Create an account</h2>
            <div class="text-danger">
            <h4 style="color:red;">
              <?php
                echo $msg;
              ?>
              </h4>
          </div>
            <input type="text" required name="first_name" placeholder="First name" />
            <input type="text" required name="last_name" placeholder="Last name" />
            <input type="text" required name="phone"  placeholder="Phone Number" />
            <input type="email" required name="email" placeholder="Email Address" />
            <input type="password" required name="password" placeholder="Password" />
            <input type="submit" name="register" value="Sign Up" />
            <p class="signup">
              Already have an account ?
              <a href="#" onclick="toggleForm();">Sign in.</a>
            </p>
          </form>
        </div>
        <div class="imgBx"><img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img2.jpg" alt="" /></div>
      </div>
    </div>
  </section>
  <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
.message{color: red; background-color: #f5f5f5;}
    section {
      position: relative;
      min-height: 100vh;
      background-color: #f8dd30;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    section .container {
      position: relative;
      width: 800px;
      height: 500px;
      background: #fff;
      box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    section .container .user {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
    }

    section .container .user .imgBx {
      position: relative;
      width: 50%;
      height: 100%;
      background: #ff0;
      transition: 0.5s;
    }

    section .container .user .imgBx img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    section .container .user .formBx {
      position: relative;
      width: 50%;
      height: 100%;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px;
      transition: 0.5s;
    }

    section .container .user .formBx form h2 {
      font-size: 18px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 2px;
      text-align: center;
      width: 100%;
      margin-bottom: 10px;
      color: #555;
    }

    section .container .user .formBx form input {
      position: relative;
      width: 100%;
      padding: 10px;
      background: #f5f5f5;
      color: #333;
      border: none;
      outline: none;
      box-shadow: none;
      margin: 8px 0;
      font-size: 14px;
      letter-spacing: 1px;
      font-weight: 300;
    }

    section .container .user .formBx form input[type='submit'] {
      max-width: 100px;
      background: #677eff;
      color: #fff;
      cursor: pointer;
      font-size: 14px;
      font-weight: 500;
      letter-spacing: 1px;
      transition: 0.5s;
    }

    section .container .user .formBx form .signup {
      position: relative;
      margin-top: 20px;
      font-size: 12px;
      letter-spacing: 1px;
      color: #555;
      text-transform: uppercase;
      font-weight: 300;
    }

    section .container .user .formBx form .signup a {
      font-weight: 600;
      text-decoration: none;
      color: #677eff;
    }

    section .container .signupBx {
      pointer-events: none;
    }

    section .container.active .signupBx {
      pointer-events: initial;
    }

    section .container .signupBx .formBx {
      left: 100%;
    }

    section .container.active .signupBx .formBx {
      left: 0;
    }

    section .container .signupBx .imgBx {
      left: -100%;
    }

    section .container.active .signupBx .imgBx {
      left: 0%;
    }

    section .container .signinBx .formBx {
      left: 0%;
    }

    section .container.active .signinBx .formBx {
      left: 100%;
    }

    section .container .signinBx .imgBx {
      left: 0%;
    }

    section .container.active .signinBx .imgBx {
      left: -100%;
    }

    @media (max-width: 991px) {
      section .container {
        max-width: 400px;
      }

      section .container .imgBx {
        display: none;
      }

      section .container .user .formBx {
        width: 100%;
      }
    }
  </style>
  <script>
    const toggleForm = () => {
      const container = document.querySelector('.container');
      container.classList.toggle('active');
    };
  </script>
</body>

</html>