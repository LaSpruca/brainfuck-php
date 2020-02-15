<!-- PHP has been moved to runBraifuck.php and is run inside of an Iframe-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BrainFunk Interpreter</title>

    <link rel="stylesheet/less" type="text/css" href="main.less" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" ></script>
</head>
<body>
<h3 style="text-align: center;">PREPARE FOR YOU BRAIN TO BE FUCKED!</h3>
    <div class="input">
        <div class="input-container">
            <form action="runBrainfuck.php" method="post" target="program" >
                <label>Brainfuck Code</label>
                <input type="text" name="code" id="code" class="code-input">

                <label>Comma-separated Inputs</label>
                <input type="text" name="inputs" id="inputs" class="code-input">

                <input type="submit" value="Run code" name="compileThis" id="compileThis">
            </form>
            <div id="program_box"><iframe name="program" style=""> <!-- A bad way to submit but not refresh the page -->
                </iframe></div>

            <br>
            <br>
            <br>

            <h2>Instructions on how to use:</h2>
            <h4>
            <ul>
                <li>Don't.</li>
            </ul>

            </h4>
        </div>
    </div>

</body>
</html>
