<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FLASK</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <link href="css/signin.css" rel="stylesheet">
    </head>
    <body class='text-center'>
        <form class="form-signin" method="post" action="controller/login_controller.php">
            <h1>FLASK</h1>
            </br>
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword"  class="sr-only">Password</label>
                <input type="password" id="inputPassword" name= "inputPassword" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block button" type="submit">Sign in</button>
            <a class="btn btn-lg btn-primary btn-block button" href="registerUser.php">
                Register
            </a>
        </form>
    </body>
</html>
