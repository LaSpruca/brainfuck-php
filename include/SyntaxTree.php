<?php

class OperatorGroup {
    public array $operators;

     function append_child(Operator $child){
        array_push($this->operators, $child);
     }
}

class Operator extends Enum {
    const PLUS = "+";
    const MINUS = "-";
    const COMMA = ",";
    const PERIOD = ".";

    const L_ANGLE_BRACE = "<";
    const R_ANGLE_BRACE = ">";
    const L_SQUARE_BRACE = "[";
    const R_SQUARE_BRACE = "]";
}

function execute(OperatorGroup $parsed_source, array $inputs) {
    $cells = array_fill(0, 1300, 0);
    $pointer = 0;
    $input_pointer = 0;

    foreach($parsed_source->operators as $operator) {
        switch ($operator) {
            case Operator::PLUS :
                $cells[$pointer]++;
                break;
            case Operator::MINUS:
                $cells[$pointer]--;
                break;
            case Operator::L_ANGLE_BRACE:
                $pointer--;
                break;
            case Operator::R_ANGLE_BRACE:
                $pointer++;
                break;
            case Operator::PERIOD:
                echo $cells[$pointer];
                break;
            case Operator::COMMA:
                $cells[$pointer] = $inputs[$input_pointer];
                break;
            case Operator::L_SQUARE_BRACE:
                if (input != 0) {
                    do {
                        $pointer++;
                    } while ($cells[pointer] != Operator::R_SQUARE_BRACE);
                }
                break;
            default:
                break;
        }
    }
}