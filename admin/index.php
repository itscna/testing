<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body>
      <h1>Login</h1>
      <form action="login.php" method="post">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" autofocus>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password">
          </div>
          <input type="submit" class="btn btn-info" value="Login">
      </form>
  </body>
</html>
