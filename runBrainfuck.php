<?php
//The code that runs in a I-Frame and interprets the Brain Fuck
//It is also completely vulnerable to injection attacks lol
if (isset($_POST['compileThis'])){

include "include/SyntaxTree.php";

//Process Data
$codeRegexAllowedCharacters = "~[\[\]<>+-.,,]~";
$inputRegexAllowedCharacters = "~^[0-9]+$~";

echo "<style>@font-face {
font-family: \"Comic Sans\";
src: url('comic.ttf');
}</style>";

echo "<div style='font-family: \"Comic Sans\";'>";
$rawCode = $_POST['code'];
$rawProgramInputs = $_POST['inputs'];
echo "Checking code<br>";
$splitRawCode = str_split($rawCode);
$code = array();
foreach ($splitRawCode as $x){
    if (preg_match ($codeRegexAllowedCharacters,$x) == 1){
        array_push($code,$x);
    }

}


echo "Checking Input<br>";
$input = array();
$splitRawProgramInputs=  explode (",",$rawProgramInputs);
    foreach ($splitRawProgramInputs as $x) {
        if (preg_match($inputRegexAllowedCharacters, $x) == 1) {
            array_push($input, $x);
        }
    }
}
echo "Matching Braces";
$codeBraces = array();
$nestedLevel = 0;
foreach($code as $i=>$x){ //i is index, x is the text at index
    if ($x == Operator::L_SQUARE_BRACE){
        $nestedLevel++;
        $codeBraces += [$i => array(false,$nestedLevel)];

    }
    elseif ($x == Operator::R_SQUARE_BRACE){

        for($findLeftBrace=$i;$findLeftBrace >= 0;$findLeftBrace--){
            if ($code[$findLeftBrace] == Operator::L_SQUARE_BRACE) {
                if($codeBraces["$findLeftBrace"][1] == $nestedLevel){
                    $codeBraces += [$i => array($findLeftBrace,$nestedLevel)];
                    $nestedLevel--;
                    break;
                }

            }
        }
    }
}

//sleep(3);
echo "<br>Running Code<br>";
$codeTimeStart =microtime(true);
execute($code,$input,$codeBraces);
$codeTime =  microtime(true)- $codeTimeStart ;
echo "Done, Runtime:",$codeTime;
echo "</div>";