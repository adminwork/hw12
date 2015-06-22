<?php

require_once 'dbconnect.php';

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>SELECT</title>
</head>
<body>
<form action="action_push.php" method="post">
    <p><input placeholder="Username" name="username"></p>
    <p><select name="option">
            <option selected disabled>Option</option>
            <option value="file">File</option>
            <option value="email">E-mail</option>
        </select></p>
    <p><input placeholder="Name or Login" name="name"></p>
    <p>Text<Br>
        <textarea name="text" cols="40" rows="3"></textarea></p>
    <p><input type="submit" value="Submit"></p>
</form>

</body>
</html>