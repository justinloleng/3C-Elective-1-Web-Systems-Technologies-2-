<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathController extends Controller
{
    public function calculate($operation1, $num1, $num2, $operation2, $num3, $num4) //dito public function calculate ay isang function para icalculate at dito rin ang parameters nakailangan natin
    {
        $num1 = intval($num1); //ung nakuha niyang value is string, pagrereturn niya na magiging integer value ung $num1.
        $num2 = intval($num2); //ung nakuha niyang value is string, pagrereturn niya na magiging integer value ung $num2.
        $num3 = intval($num3); //ung nakuha niyang value is string, pagrereturn niya na magiging integer value ung $num3.
        $num4 = intval($num4); //ung nakuha niyang value is string, pagrereturn niya na magiging integer value ung $num4.

        function compute($operation, $num1, $num2) //itong function compute kukunin niya muna ung tatlong parameters at check niya at compute if pwede macompute ung values at tama ung operand.
        {

            if ($operation === 'divide' && $num2 == 0) { //sa if statment na ito checheck niya muna kung ung operand is pwede idvide sa zero ung num1 sa num2.
                return "<h3 style='color: red;'>Error: Cannot divide by zero</h3>"; //tapos if ung num2 is zero magrereturn ng error message na ito at papakita niya na cannot be divvide by zero.
            }

            switch ($operation) { //switch statement kukunin niya ung na input na operand sa url kung add ay nakakalagay pupunta siya sa case add.
                case 'add': //dito kung add ang nainput niya.
                    $result = $num1 + $num2; //ipagaadd niya ang num1 at num2 tas papasa sa $result.
                    $operator = 'add'; //lung ung operation ay add itong operator magiging add.
                    break; //ito ay break kapag meet niya ung case nato stop niya na o break.
                case 'subtract': //dito kung ung operation ay subtract.
                    $result = $num1 - $num2; //isusubtract niya ang num1 at num2 tas papasa sa $result.
                    $operator = 'subtract'; //kapag itong operation ay subtract magiging operator ay subtract.
                    break; //ito ay break kapag meet niya ung case nato stop niya na o break
                case 'multiply': //dito kung ung operation ay multiply.
                    $result = $num1 * $num2; //imumultiply niya ang num1 at num2 tas papasa sa $result.
                    $operator = 'multiply'; //kapag multiply ang operation niya magiging operator ay multiply.
                    break; //ito ay break kapag meet niya ung case nato stop niya na o break.
                case 'divide': //dito kung ung operation ay divide.
                    $result = $num1 / $num2; //ididivide niya ang num1 at num2 tas papasa sa $result.
                    $operator = 'divide'; //kapag divide ang operation niya magiging operator ay divide
                    break; //ito ay break kapag meet niya ung case nato stop niya na o break.
                default: //kapag walang namatch sa case o sa operation maactibo itong default.
                    return "<h3 style='color: red;'>Error: Invalid operation</h3>"; //tapos magrereturn ng error message na invalid operation
            }

            if ($result % 2 == 0) { //itong if statement ay checheck if ung $result ay even number.
                $style = "background-color: green; color: white; padding: 15px; 
                          width: 100px; text-align: center; font-size: 20px; 
                          font-weight: bold; border: 3px solid black; 
                          display: inline-block; margin-top: 10px;"; //tapos itong $style lalagyan niya ng css styles para sa box na ung EVEN number is greenbox.
                $displayText = "<span style='color: green; font-weight: bold;'>Result (Displayed in Green):</span>"; //dito even number ang display text color ay green.
            } else { // else naman kapag ang odd number.
                $style = "background-color: blue; color: white; padding: 15px; 
                          width: 100px; text-align: center; font-size: 20px; 
                          font-weight: bold; border: 3px solid black; 
                          display: inline-block; margin-top: 10px;"; //dito ang style ng box is blue kapag odd number
                $displayText = "<span style='color: blue; font-weight: bold;'>Result (Displayed in BLUE):</span>"; //dito odd number ang display text color ay blue.
            }


            return "
                <h3>Value 1: <span style='color: orange;'>$num1</span></h3>
                <h3>Value 2: <span style='color: blue;'>$num2</span></h3>
                <h3>Operator: $operator</h3>
                <h3 style='color: green;'>$displayText:</h3>
                <div style='$style'>$result</div>
            "; //display niya ang value 1, tapos ang text color ay orange ung $num1, sa value 2 text color niya ay blue, display niya ung operator, display text color green if even o odd pag blue, tas div style box para sa $result, even number green box o odd number blue box naman.
        }

        $display1 = compute($operation1, $num1, $num2); //tatawagin niya ang compute na function tas papasa niya ung argument, tapos maistore niya ung result sa $display1.
        $display2 = compute($operation2, $num3, $num4); //sabay lang ito sa $display1, tatawaging rin ung compute function, tas papasa ung argument, tapos maistore ung result dito sa $output2.


        return response("
            <h2>Justin Gerald G. Loleng|BSIT 3C</h2>         
            $display1
            $display2
        "); //dito rereturn ang response display niya muna ang pangalan ko at year section, tapos display ung mga outputs na ung $display1 ay $display2.
    }
}
