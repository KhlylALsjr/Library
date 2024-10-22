<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
    <p>Home content goes here.</p>
    <a href="index.php?action=logout">Logout</a>
</body>
</html>