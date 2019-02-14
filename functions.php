<?php

function sanitize_input($input){
    $input = DBi::$db->real_escape_string($input);
    return $input;
}

function sendConfirmationEmail($name , $lastname, $email, $opis, $stanowisko, $hidden1, $hidden2, $hidden3){
    $subject = 'Registration confirmation';
    $message = 'hello '.$name.' '.$lastname.'<br>
    email:'.$email.'
    opis:'.$opis.'
    stanowisko:'.$stanowisko.'
    '.getHiddenFromStanowisko($stanowisko)[0].':'.$hidden1.'
    '.getHiddenFromStanowisko($stanowisko)[1].':'.$hidden2.'
    '.getHiddenFromStanowisko($stanowisko)[2].':'.$hidden3.'
    ';//TODO: get from database all fields.
                        //TODO: make message pretty.
    $headers = 'From: ' . $email_adress . "\r\n" .
        'Reply-To: ' . $email_adress . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($email, $subject, $message, $headers);
}

function displayUserTableFromStanowisko($stanowisko){
    $stanowisko = sanitize_input($stanowisko);

    echo "<h1>".$stanowisko."'s</h1>";
$result = DBi::$db->query("SELECT * FROM `users` WHERE `stanowisko` = '".$stanowisko."'");
    if($result){
        echo "<table class='users-table table table-striped table-dark'>
                <thead>
                    <tr class='thead-dark'>
                        <th>Id</th>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>Email</th>
                        <th>Opis</th>
                        <th>Stanowisko</th>
                        <th>".getHiddenFromStanowisko($stanowisko)[0]."</th>
                        <th>".getHiddenFromStanowisko($stanowisko)[1]."</th>
                        <th>".getHiddenFromStanowisko($stanowisko)[2]."</th>
                    </tr>
                </thead>
                <tbody>
                    ";
                    while ($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        printf ("<td>%s</td>\n", $row['id']);
                        
                        printf ("<td>%s</td>\n", $row['imie']);
                        printf ("<td>%s</td>\n", $row['nazwisko']);
                        printf ("<td>%s</td>\n", $row['email']);
                        printf ("<td>%s</td>\n", $row['opis']);
                        printf ("<td>%s</td>\n", $row['stanowisko']);
                        printf ("<td>%s</td>\n", json_decode($row["json_form"])[0]);
                        printf ("<td>%s</td>\n", json_decode($row["json_form"])[1]);
                        printf ("<td>%s</td>\n", json_decode($row["json_form"])[2]);
                        echo "</tr>";
                    }
                    echo "</tbody></table>";
    }else{
        echo "Error ". DBi::$db->error;
        //TODO: add better error parsing
    }

}

function getHiddenFromStanowisko($stanowisko){
    $arr = [null,null,null];
    switch($stanowisko){
        case "Tester":
            $arr = [
                "Systemy testujące",
                "Systemy raportowe",
                "Zna Selenium"
            ];
            break;
        case "Developer":
            $arr = [
                "Środowiska IDE",
                "Języki programowania",
                "Zna MYSQL"
            ];
            break;
        case "Project Manager":
            $arr = [
                "Metodologie prowadzenia projektów",
                "Systemy raportowe",
                "Zna SCRUM"
            ];
            break;
        
    }
    return $arr;
}

?>