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
        function displayForm(){
            ?><form>
            Name: <input name="name"><br>
            Age: <input name="age" type="number"><br>
            <input type="submit" value="Say Hello">
        </form><?php
        }
        
        if (isset($_GET['name'])) {

            $name = $_GET['name'];
            $age = $_GET['age'];
            if((strlen($name)>2) && ($age >0 && $age <150)){
                //State 2: Submission is Valid
                echo "<p>Hello! $name, you are $age y/o!</p>\n";
            }else{
                //State 3: Failed Submission
                echo "<p>Error: name must be at least 2 characters long"
                . " and age must be between 1 and 149</p>\n";
                displayForm();
            }
            
        } else { //State 1: First show of the form
            displayForm();
        }
        //echo "<p>Age is $age</p>";
        //echo "<p>Hello ". $_GET['name'] . "!</p>";
        ?>

     
    </body>
</html>
