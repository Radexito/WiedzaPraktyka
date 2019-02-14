<?php
require("config.php");
require("functions.php");

if(isset($_POST['imie']) 
&& isset($_POST['nazwisko']) 
&& isset($_POST['email']) 
&& isset($_POST['stanowisko']) 
&& isset($_POST['hidden1']) 
&& isset($_POST['hidden2']))
{
    registerUser(
        $_POST['imie'],
        $_POST['nazwisko'],
        $_POST['email'],
        @$_POST['opis'],
        $_POST['stanowisko'],
        $_POST['hidden1'],
        $_POST['hidden2'],
        @$_POST['hidden3']
    );
                
}

function registerUser($name , $lastname, $email, $opis, $stanowisko, $hidden1, $hidden2, $hidden3){
    if(is_null($hidden3)) $hidden3 = "Nie";
    $arr = array(sanitize_input($hidden1), sanitize_input($hidden2), sanitize_input($hidden3));
    $json_hidden = json_encode($arr);

    $result = DBi::$db->query("INSERT INTO `users` (`id`, `imie`, `nazwisko`, `email`, `opis`, `stanowisko`, `json_form`) VALUES (NULL, '".sanitize_input($name)."', '".sanitize_input($lastname)."', '".sanitize_input($email)."', '".sanitize_input($opis)."', '".sanitize_input($stanowisko)."', '".$json_hidden."');");
    if($result){
        sendConfirmationEmail($name , $lastname, $email, $opis, $stanowisko, $hidden1, $hidden2, $hidden3);
        echo "Registered succesfully.";
        
    }else{
        echo "Error ". DBi::$db->error;
    }
    
}

?>