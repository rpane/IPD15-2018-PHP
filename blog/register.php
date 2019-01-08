<?php

// heredoc
$form = <<< MARKER
  
 <h3>New User Registration</h3>       
<form method="post">
    Desired username <input type="text" name="username"><br>
    Your email <input type="text" name="email"><br>
    Password <input type="password" name="password"><br>
    Password (repeat) <input type="password" name="password2"><br>
    <input type="submit" value="Register!">
</form>
MARKER;


if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    if ($_POST['password'] === $_POST['password2']) {
        $password = $_POST['password2'];
    }
    $errorList = array();
    if (strlen($username) < 4 || strlen($username) > 20) {
        array_push($errorList, "Username must be between 4 and 20 characters");
    } else {
        if(preg_match('/^[a-z0-9]+$/', $username) != 1){
            array_push($errorList, "Username must be composed of lower case letters and numbers");
        } else{
            $query = sprintf("SELECT * FROM users WHERE username='%s'",
            mysqli_real_escape_string($link,$username));
            $result = mysqli_query($link, $query);
            if(!$result){
                echo "<p>Error: SQL Database query error: ". mysqli_errno($link) . "</p>";
                exit;
            }
        }
        if (strpos($email, '@') == 0 || strpos($email, '@') == strlen($email)) {
            array_push($errorList, "Invalid Email");
        }
        if (strlen($password) < 6 || strlen($password) > 100) {
            array_push($errorList, "Password must be between 6 and 100 characters");
        }
    }

    if ($errorList) {
        echo "<h3>Problems detected</h3>";
        echo "<ul>\n";
        foreach ($errorList as $error) {
            echo "<li>" . $error . "</li>\n";
        }
        echo "</ul>\n";
        echo $form;
    } else {
        
    }
}else{
    echo $form;
}
?>

