<?php
if($_GET['submit'] == "yes"){
    
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BrainFunk Interpreter</title>
</head>
<body>
<form action="index.php" method="get" >
    <label>Input Code</label>
    <input type="text" name="code" id="code">
    <label>Program Inputs</label>
    <input type="text" name="inputs" id="inputs">
    <input type="button" name="compileThis" id="compileThis">
</form>
</body>
</html>
