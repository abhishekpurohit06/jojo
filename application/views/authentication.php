<!DOCTYPE html>
<html>
<head>
    <title>Authentication</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Open Sans', sans-serif;
      background-color: black !important;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      width: 600px;
      margin: 0 auto;
      padding: 50px;
      background-color: #333;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      color: #fff;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
      font-size: 36px;
      color: #b38bff;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      margin-bottom: 10px;
      font-size: 18px;
    }

    input {
      padding: 12px;
      border: none;
      border-radius: 5px;
      margin-bottom: 20px;
      font-size: 16px;
      color: #fff;
      background-color: #555;
    }

    button {
      padding: 10px;
      background-color: #b38bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 18px;
      transition: background-color 0.2s ease-in-out;
    }

    button:hover {
      background-color: #8c5fb2;
    }

    a {
      text-decoration: none;
      color: #b38bff;
      font-size: 18px;
      transition: color 0.2s ease-in-out;
    }

    a:hover {
      color: #8c5fb2;
    }

    p {
      text-align: center;
      margin: 8px;
    }
    </style>
   
</head>
<body>
  <?php if(!empty( $_SESSION['data'])==1){  ?>
<div class="alert alert-success alert-dismissible fade show">
        <strong><?php if(!empty( $_SESSION['data'])==1){  echo $_SESSION['data'];} ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php } ?>
<div class="container">
    <div class="form-container" id="login-form">
      <h1>Login</h1>
      <form action="login" method="post">
        <label for="number">Number</label>
        <input type="text" id="username" name="number" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <button class="mt-4" type="submit">Login</button>
      </form>
      <p>Don't have an account? <a href="#" id="signup-link">Sign up</a></p>
    </div>

    <div class="form-container" id="signup-form" style="display: none;">
      <h1>Sign Up</h1>
      <form  action="register" method="post" >
        <label >Username</label>
        <input type="text" name="newusername" required>
        <label for="new-number">Number</label>
        <input type="number" name="newnumber" required>
        <label for="new-password">Password</label>
        <input type="password" name="newpassword" required>
        <button class="mt-4 " type="submit">Sign Up</button>
      </form>
      <p>Already have an account? <a href="#" id="login-link">Login</a></p>
    </div>
  </div>
</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script>
  const loginForm = document.getElementById('login-form');
const signupForm = document.getElementById('signup-form');
const loginLink = document.getElementById('login-link');
const signupLink = document.getElementById('signup-link');

loginLink.addEventListener('click', (event) => {
  event.preventDefault();
  signupForm.style.display = 'none';
  loginForm.style.display = 'block';

  setTimeout(() => {
    signupForm.style.opacity = 0;
    loginForm.style.opacity = 1;
  }, 10);
});

signupLink.addEventListener('click', (event) => {
  event.preventDefault();
  loginForm.style.display = 'none';
  signupForm.style.display = 'block';

  setTimeout(() => {
    loginForm.style.opacity = 0;
    signupForm.style.opacity = 1;
  }, 10);
});
        </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>