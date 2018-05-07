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
  <form class="form-signin" method="post" action="#">
    <div class="form-item" >
      <label for="email"></label>
      <input type="email" name="email" required="required" placeholder="Email Address" id="inputEmail"></input>
    </div>
    <div class="form-item">
      <label for="password"></label>
      <input type="password" name="password" required="required" placeholder="Password" ></input>
    </div>
    <div class="button-panel">
      <input type="submit" class="button" title="Sign In" value="Sign In"></input>
    </div>
  </form>
  <div class="form-footer">
    <p><a href="registerUser.php">Create an account</a></p>
  </div>
</div>
  
</body>

</html>
