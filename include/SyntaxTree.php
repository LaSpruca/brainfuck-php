<?php
abstract class Operator {
    const PLUS = "+";
    const MINUS = "-";
    const COMMA = ",";
    const PERIOD = ".";

    const L_ANGLE_BRACE = "<";
    const R_ANGLE_BRACE = ">";
    const L_SQUARE_BRACE = "[";
    const R_SQUARE_BRACE = "]";
}

function execute($code, array $inputs, array $codeBraces) {
    if (!set_time_limit(0)){
        print("<div style='color: red;'>[ERROR]</div>Unable to set execution timeout");
    }

    $cells = array_fill(0, 1300, 0);
    echo count($code)," brainfuck commands executing <br>";
    $pointer = 0;
    $input_pointer = 0;
    $codePointer = 0;
    while($codePointer < count($code)){
        $operator = $code[$codePointer];
        switch ($operator) {
            // +
            case Operator::PLUS:
                $cells[$pointer]++;
                break;

            // -
            case Operator::MINUS:
                $cells[$pointer]--;
                break;

            // <
            case Operator::L_ANGLE_BRACE:
                $pointer--;
                break;

            // >
            case Operator::R_ANGLE_BRACE:
                $pointer++;
                break;

            // .
            case Operator::PERIOD:
                echo $cells[$pointer],"<br>";
                break;

            // ,
            case Operator::COMMA:
                $cells[$pointer] = $inputs[$input_pointer];
                $input_pointer++;
                break;

            // [
            case Operator::L_SQUARE_BRACE:
                //echo "Left Bracket<br>";
                break;
            case Operator::R_SQUARE_BRACE:
                //echo "Entering hopeful loop <br>";
                //echo (int) ($codeBraces[$codePointer][0]);
                //$codePointer--;
                if ($cells[$pointer] != 0){
                    $codePointer =  (int) ($codeBraces[$codePointer][0]);
                }

                break;
            default:
                echo "Not recognised Character,",$operator;
                break;
        }
        $codePointer++;
    }

}