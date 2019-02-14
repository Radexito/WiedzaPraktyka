<?php
    require("config.php");
    include("header.php");
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 loginform">
                <img src="/img/logo.png" class="logo" alt="Wiedza i Praktyka">
                <form id="registerForm" action="register.php" method="POST">
                    <div class="message"></div>
                    <div class="form-group">
                        <input type="text" placeholder="Jan" class="form-control" name="imie" id="imie" required>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Kowalski" class="form-control" name="nazwisko" id="nazwisko"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="JanKowalski@onet.pl" class="form-control" name="email" id="email"
                            required>
                    </div>
                    <div class="form-group">
                        <textarea placeholder="Przykładowy opis" name="opis" id="opis" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="stanowisko" id="stanowisko">
                            <option disabled="1" selected="1">Stanowisko</option>
                            <option>Tester</option>
                            <option>Developer</option>
                            <option>Project Manager</option>
                        </select>
                    </div>
                    <div class="hidden-options">
                        <div class="form-group">
                            <input type="text" placeholder="" class="form-control" name="hidden1" id="hidden1" required>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="" class="form-control" name="hidden2" id="hidden2" required>
                        </div>
                        <div class="form-group">
                            <input class="form-check-input" type="checkbox" value="Tak" name="hidden3" id="hidden3"><span
                                class="checkbox-text"></span>
                        </div>
                    </div>

                    <button class="btn btn-primary">Zarejestruj się</button>
                </form>
            </div>
        </div>
    </div>
    <?php
        include("footer.php");
    ?>
</body>

</html>