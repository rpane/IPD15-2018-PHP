<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $counter = 0;

        //Show form
        function displayForm() {
            ?><form>
                Min: <input name="min" type="number"><br>
                Max: <input name="max" type="number"><br>
                How Many: <input name="howMany" type="number"><br>
                <input type="submit" value="Generate">
            </form><?php
    }

    //Fails
    function displayFailForm() {
            ?>
            Error: min & max must be integers and min <= max.
            <form>                
                Min: <input name="min" type="number"><br>
                Max: <input name="max" type="number"><br>
                How Many: <input name="howMany" type="number"><br>
                <input type="submit" value="Generate">
            </form><?php
        if (is_numeric($min) and is_numeric($max) and is_numeric($howMany)) {
            displayRandoms();
        }
    }

    //Success
    function displayRandoms() {
        while ($counter < $howMany) {
            echo(rand($min, $max)) . ',';
            $counter++;
        }
    }

    displayForm();
    if (isset($_GET['min'])) {

        $min = $_GET['min'];
        $max = $_GET['max'];
        $howMany = $_GET['howMany'];

        if (is_numeric($min) and is_numeric($max) and is_numeric($howMany)) {
            displayRandoms();
        } else {
            displayFailForm();
        }
    }
        ?>

    </body>
</html>
