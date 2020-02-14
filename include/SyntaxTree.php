<?php

class OperatorGroup {
    public array $operators;

     function append_child(Operator $child){
        array_push($this->operators, $child);
     }
}

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

function execute(array $code, array $inputs) {
    $cells = array_fill(0, 30000, 0);
    $pointer = 0;
    $input_pointer = 0;

    for($i = 0; $i < (sizeof($code)) ; $i++) {
        // Check to see that the pointer is not below 0, if so quitting execution
        if ($pointer < 0){
            print("<br>[ERROR] pointer went below 0!!<br>");
            return;
        }
        $operator = $code[$i];
        //print("$operator\t $i\t $cells[$pointer]\t $pointer<br>");

        // Switch statment to find out weather what to do with the code given
        switch ($operator) {
            // +
            case Operator::PLUS:
                $cells[$pointer]++;
                if ($cells[$pointer] > 255){
                    print("<br>ADD OVERFLOW<br>");
                    $cells[$pointer] = 0;
                }
                break;

            // -
            case Operator::MINUS:
                $cells[$pointer]--;
                if ($cells[$pointer] < 0) {
                    print("<br>MINUS OVERFLOW<br>");
                    $cells[$pointer] = 255;
                }
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
                print("$cells[$pointer]<br>");
                break;

            // ,
            case Operator::COMMA:
                $cells[$pointer] = $inputs[$input_pointer];
                break;

            // [
            case Operator::L_SQUARE_BRACE:
                if ($cells[$pointer] != 0) {
                    print($cells[$pointer]);
                    do {
                        $i++;
                    } while ($code[$i] != Operator::R_SQUARE_BRACE);
                    $i--;
                }
                break;

            // ]
            case Operator::R_SQUARE_BRACE:
                if($cells[$pointer] == 0) {
                    print($cells[$pointer]);
                    do{
                        $i--;
                    } while ($code[$i] != Operator::L_SQUARE_BRACE);
                    $i--;
                }
                break;
            default:
                break;
        }
    }
}