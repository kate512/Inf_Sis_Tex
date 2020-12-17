<?php
    function selection(){
        $arr = $_POST["array"];
        $n = count($arr);
        $k = 1;
        $i_b = 0;
        $i_begin = 0;
        $i_end = 0;
        $max_len = 1;
        for($i = 1; $i < $n; $i++) {
            echo $i;
            if ($arr[$i - 1] == $arr[$i]) {
                if ($k == 1){
                    $i_b = $i - 1; 
                }
                $k++;
                if(($i == $n - 1) && ($max_len < $k)){
                    $max_len = $k;
                    $i_end = $i ;
                    $i_begin = $i_b;

                }
            }
            else {
                if($max_len < $k){
                    $max_len = $k;
                    $i_end = $i - 1;
                    $i_begin = $i_b;

                }
                $k = 1;
                
            }
        }

        echo("Выходной массив:  ");
        for($i = 0; $i < $i_begin; $i++) {
            echo (string)$arr[$i]."  ";
        }
        echo("<span style = 'background: #05ff13'>");
        for($i; $i <= $i_end; $i++) {
           echo (string)$arr[$i]."  ";
        }
        echo("</span>");
        for($i; $i < $n; $i++) {
            echo (string)$arr[$i]."  ";
        }
    }
   