<?php
//The code that runs in a I-Frame and interprets the Brain Fuck
//It is also completely vulnerable to injection attacks lol
if (isset($_POST['compileThis'])){


//Process Data
$codeRegexAllowedCharacters = "~[\[\]<>+-.,]~";
$inputRegexAllowedCharacters = "~^[0-9]+$~";

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
echo "<br>Code:<br>";
print_r($code);
echo "<br>Inputs:<br>";
print_r($input);
$memoryArray = array_fill(0,129,0); //Max of 129 memory addresses because yes
for($i=0;$i<count($code);$i++){
    echo "Looks like we haven't coded '",$code[$i],"' in yet. Possibly because we haven't codded any yet";
}
