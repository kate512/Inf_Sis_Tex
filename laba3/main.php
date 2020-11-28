<?php
    //Задача 3
    /*Найти максимальную цепочку идущих подряд одинаковых чисел. 
    Эту цепочку нужно выделить. Если таких несколько, выделить одну любую.*/

    function randomArr(){
        echo("<div style = ' text-align : center;'>");
        $n = 10;
        $arr = [];
        for($i=0; $i < $n; $i++){
            $arr[$i] = random_int(1,9);
           // $arr[$i]=$arr[$i]."";
        }
        echo("Входной массив:  ");
        for($i = 0; $i < $n; $i++){
            echo ($arr[$i]."  ");
        }
        echo("<br><br>");
        echo("Выходной массив:  ");

        $k = 1;
        $i_b = 0;
        $i_begin = 0;
        $i_end = 0;
        $max_len = 1;
        for($i = 1; $i < $n; $i++) {
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
        for($i = 0; $i < $i_begin; $i++) {
            echo (string)$arr[$i]."  ";
        }
        echo("<span style = 'background: #05ff13;'>");
        for($i = $i_begin; $i <= $i_end; $i++) {
           echo (string)$arr[$i]."  ";
        }
        echo("</span>");
        for($i; $i < $n; $i++) {
            echo (string)$arr[$i]."  ";
        }
       
        echo("<br><br><a href='index.html'>Вернуться к началу</a>");
        echo('</div>');
    }

    function unrandomArr(){
        echo("<div style = ' text-align : center;'>");
        $n = $_GET['n'];
        if($n>100){
            echo("Кол-во элементов массива должно быть меньше 100");
        }
        else{
            echo('<form id="test" action="" method="POST">
                    Введите '. (int)$n .' элементов <br>
                    Введите элементы массива через пробел<br/>
                    <textarea name = "array" cols = "40" rows = "3"></textarea>
                    <br><br>
                    <button name = "method" value = "unrandom"> Отправить </button>
                </form>'
            );
            try{
                $arr = explode(" ", $_POST['array']);
                echo("Входной массив:");
                for($i = 0; $i < $n; $i++){
                    echo ($arr[$i]."  ");
                }
                echo("<br><br>");
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
                echo("<br><br><a href='index.html'>Вернуться к началу</a>");
            }
            catch(Exception $e){
                echo("Не удалось разбить строку на элементы");
            }
        }
        echo('</div>');

    }

    if($_GET['method'] == "random"){
        randomArr();
    }
    else{
        echo('
        <form id="test" action="" method="GET" style = " text-align : center;">
            Введите количество элементов массива <br/> 
            <input type = "number" name = "n">
            <button name = "method" value = "unrandom"> Ввести числа вручную </button>
        </form>');
        if($_GET['n'] != ""){
            unrandomArr();
        }
        
    }
?>

