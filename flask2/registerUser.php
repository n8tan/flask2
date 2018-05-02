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
        <form class="form-signin" method="POST" action="registerUserController.php"> <!--Action would point to register php file. -->
            <h1>FLASK</h1>
            </br>
            <h1 class="h3 mb-3 font-weight-normal">Please fill out your details</h1>
            <label for="userName" class="sr-only">User name</label>
                <input type="text" id="userName" name="userName" class="form-control" placeholder="User Name" required autofocus>

            <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>

            <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
            
            <label for="confirmPassword" class="sr-only">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirm Password" required>
            <input class = "btn btn-lg btn-primary btn-block button" type="submit" name="submit" value="Register Account!" />
           
            <a class="btn btn-lg btn-primary btn-block button" href="index.php">
                Back
            </a>
        </form>
    </body>
</html>

