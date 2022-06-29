<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
    <style type="text/css">
    div.a{
        text-decoration: underline;
  -webkit-text-decoration-color: red; /* Safari */  
  text-decoration-color: black;
  text-transform: capitalize;
    }
    div.a{
        text-decoration-color: black;
    }
</style>
<body>
    <div class="a">
        <?php echo "<h2>Welcome " . $_SESSION['username'] . "</h2>"; ?>
    </div>
</body>
</html>