<?php
include 'DB.php';

if (isset($_POST['register'])) {
    $name = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confpassword = $_POST['password2'];
    $user = 'user';

    $cek_user = mysqli_query($conn, "SELECT * FROM register WHERE name = '$name' and Email = '$email' and password = '$password' ");
    $cek_login = mysqli_num_rows($cek_user);

    if ($cek_login > 0) {
        echo "<script>
            alert('you are already login');
            window.location = 'login.php';
        </script>";
    } else {
        if (empty($name) || empty($email) || empty($password)) {
            echo "<script>alert('Lengkapi dulu registrasinya')</script>";
        } elseif ($password != $confpassword) {
            echo "<script>
            alert('Invalid Confirmation Password!!');
            window.location = 'registrate.php';
        </script>";
        } else {
            // $password = password_hash($password,PASSWORD_DEFAULT); 
            mysqli_query($conn,"INSERT INTO register VALUES ('','$name','$email','$password','$user')");
            echo "<script>
            alert('Registrate Sucsess!!');
            window.location = 'login.php';
        </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<style>
    body,
.signin {
  background: url(images/GF63.jpg);
  font-family: 'Montserrat', sans-serif;
  color: #fff;
  font-size: 14px;
  letter-spacing: 1px;
}

.login {
  position: relative;
  height: 560px;
  width: 405px;
  margin: auto;
  padding: 60px 60px;
  background: url(https://picsum.photos/id/1004/5616/3744) no-repeat   center center #505050;   
  background-size: cover;
  box-shadow: 0px 30px 60px -5px #000;
}

form {
  padding-top: 80px;
}

.active {
  border-bottom: 2px solid #1161ed;
}

.nonactive {
  color: rgba(255, 255, 255, 0.2);
}

h2 {
  padding-left: 12px;
  font-size: 22px;
  text-transform: uppercase;
  padding-bottom: 5px;
  letter-spacing: 2px;
  display: inline-block;
  font-weight: 100;
}

h2:first-child {
  padding-left: 0px;
}

span {
  text-transform: uppercase;
  font-size: 12px;
  opacity: 0.4; 
  display: inline-block;
  position: relative;
  top: -65px;
  transition: all 0.5s ease-in-out;
}

.text {
  border: none;
  width: 89%;
  padding: 10px 20px;
  display: block;
  height: 15px;
  border-radius: 20px;
  background: rgba(255, 255, 255, 0.1);
  border: 2px solid rgba(255, 255, 255, 0);
  overflow: hidden;
  margin-top: 15px;
  transition: all 0.5s ease-in-out;
}

.text:focus {
  outline: 0;
  border: 2px solid rgba(255, 255, 255, 0.5);
  border-radius: 20px;
  background: rgba(0, 0, 0, 0);
}

.text:focus + span {
  opacity: 0.6;
}

input[type="text"],
input[type="password"] {
  font-family: 'Montserrat', sans-serif;
  color: #fff;
}



input {
  display: inline-block;
  padding-top: 20px;
  font-size: 14px;
}

h2,
span,
.custom-checkbox {
  margin-left: 20px;
}

.custom-checkbox {
  -webkit-appearance: none;
  background-color: rgba(255, 255, 255, 0.1);
  padding: 8px;
  border-radius: 2px;
  display: inline-block;
  position: relative;
  top: 6px;
}

.custom-checkbox:checked {
  background-color: rgba(17, 97, 237, 1);
}

.custom-checkbox:checked:after {
  content: '\2714';
  font-size: 10px;
  position: absolute;
  top: 1px;
  left: 4px;
  color: #fff;
}

.custom-checkbox:focus {
  outline: none;
}

label {
  display: inline-block;
  padding-top: 10px;
  padding-left: 5px;
}

.signin {
  background-color: #1161ed;
  color: #FFF;
  width: 100%;
  padding: 10px 20px;
  display: block;
  height: 39px;
  border-radius: 20px;
  margin-top: 30px;
  transition: all 0.5s ease-in-out;
  border: none;
  text-transform: uppercase;
}

.signin:hover {
  background: #4082f5;
  box-shadow: 0px 4px 35px -5px #4082f5;
  cursor: pointer;
}

.signin:focus {
  outline: none;
}

hr {
  border: 1px solid rgba(255, 255, 255, 0.1);
  top: 85px;
  position: relative;
}

a {
  text-decoration: none;
  color: #FFF;
}
</style>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<body>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

<div class="login">
    <form action="" method="post">
  <h2 class="active">Sign up</h2><h2><a class="active"href="index.php">lapang</a></h2> 
   
    

    <input type="text" class="text" name="nama">
     <span>username</span>

    <br>
    <input type="email" class="text" name="email">
     <span>Email</span>
    <br>
    <input type="password" class="text" name="password">
    <span>password</span>
    <input type="password" class="text" name="password2">
    <span>konfirmasi password</span>
    <br>
    <input type="submit" class="signin" onclick="contoh()" value="submit" name="register" > 
    <!-- <center><h2><strong><a href="index.html">LAPANG</a></strong></h2></center> -->
    <center><h2><strong><a href="Login.php">Login</a></strong></h2></center>
  </form>

</div>
</body>
<!-- https://script.google.com/macros/s/AKfycbztUtIgjLNSYvwyxh3i-ia-4RRGALlpjm8XRm7HJIKGTvziDY2AaX9DdeXB8RKPVNQwXw/exec -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous">
  </script>
  <!-- <script>
    const scriptURL = 'https://script.google.com/macros/s/AKfycbztUtIgjLNSYvwyxh3i-ia-4RRGALlpjm8XRm7HJIKGTvziDY2AaX9DdeXB8RKPVNQwXw/exec'
    const form = document.forms['submit-to-google-sheet']
  
    form.addEventListener('submit', e => {
      e.preventDefault()
      fetch(scriptURL, { method: 'POST', body: new FormData(form)})
        .then(response => console.log('Success!', response))
        .catch(error => console.error('Error!', error.message))
    })
  </script> -->

</html>