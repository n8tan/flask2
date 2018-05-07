<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>FLASK</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <div class="form-wrapper">
  <h1>FLASK</h1>
  <form class="form-signin" method="POST" action="registerUserController.php">
    <div class="form-item">
      <label for="username"></label>
      <input type="text" name="userName" placeholder="User Name" id="userName" required autofocus>
      </input>
    </div>
    <div class="form-item">
      <label for="inputEmail"></label>
      <input type="email" id="inputEmail" name="inputEmail" placeholder="Email Address" required autofocus>
      </input>
    </div>
    <div class="form-item">
        <label for="inputPassword"></label>
        <input type="password" id="inputPassword" name="inputPassword" placeholder="Password" required>
        </input>
    </div>
    <div class="form-item">
        <label for="confirmPassword"></label>
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
        </input>
    </div>
    <div class="button-panel">
      <input type="submit" class="button" title="Register Account" value="Register Account"></input>
    </div>
  </form>
  <div class="form-footer">
    <p><a href="index.php">Back</a></p>
  </div>
</div>
  
  

</body>

</html>
