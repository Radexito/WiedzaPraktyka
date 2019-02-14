<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 loginform">
            <img src="/img/logo.png" class="logo" alt="Wiedza i Praktyka">
            <?php
                if(!is_null(@$_POST['dbip']) && !is_null(@$_POST['dbuser']) && !is_null(@$_POST['dbname'])){
                    //instaluj
                    
                    $str=file_get_contents('config-sample.txt');
                    $str=str_replace("localhost", $_POST['dbip'],$str);
                    $str=str_replace("root", $_POST['dbuser'],$str);
                    $str=str_replace("password", $_POST['dbpass'],$str);
                    $str=str_replace("wiedzaipraktyka", $_POST['dbname'],$str);
                    $str=str_replace("emailadress@mail.pl", $_POST['email'],$str);
                    file_put_contents('config.php', $str);

                    require_once("config.php");
                $result = DBi::$db->query("CREATE TABLE `".$_POST['dbname']."`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `imie` TEXT NOT NULL , `nazwisko` TEXT NOT NULL , `email` VARCHAR(255) NOT NULL , `opis` TEXT NOT NULL , `stanowisko` VARCHAR(255) NOT NULL , `json_form` TEXT NOT NULL , PRIMARY KEY (`id`), UNIQUE (`email`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_polish_ci;");
                    if($result){
                        echo "<a href='/'><h1>Odwiedź stronę</h1></a>";
                        
                    }else{
                        echo "Error ". DBi::$db->error;
                    }

                    //kasujemy plik instalacyjny
                    unlink(__FILE__);
                    
                }else{
            ?>
                <form action="install.php" method="POST">
                <div class="form-group">
                        <input type="text" placeholder="DB IP" class="form-control" name="dbip" id="dbip" required>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="DB User" class="form-control" name="dbuser" id="dbuser" required>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="DB Pass" class="form-control" name="dbpass" id="dbpass" >
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="DB Name" class="form-control" name="dbname" id="dbname" required>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Email used as sending email" class="form-control" name="email" id="email" required>
                    </div>
                    <button class="btn btn-primary">Zainstaluj</button>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>