$(document).ready(function () {
    $("#registerForm").submit(function (event) {
        $.post("register.php", $("#registerForm").serialize(), function (data) {
            console.log(data);
            if (data == "Registered succesfully.") {
                $(".message").addClass("success").html(data).fadeOut(1000, function () {
                    $(".hidden-options").slideUp();
                    $("#registerForm")[0].reset();
                });
            } else if (data.startsWith("Error")) {
                if (data.startsWith("Error Duplicate entry")) {
                    $(".message").addClass("failure").html("The email adress is already registered.").fadeOut(5000);
                } else {
                    $(".message").addClass("failure").html("Unexpected error occured!").fadeOut(5000);
                }
            }
        });
        event.preventDefault();
    });



    $("#stanowisko").change(function () {
        //TODO: dorobić plik php który generuje JSON z wszystkimi stanowiskami aby nie trzeba było modyfikować kodu w PHP oraz w JS
        if ($("#stanowisko").val() == "Tester") {
            $("#hidden1").attr("placeholder", "Systemy testujące");
            $("#hidden2").attr("placeholder", "Systemy raportowe");
            $(".checkbox-text").html("Zna Selenium");

        } else if ($("#stanowisko").val() == "Developer") {
            $("#hidden1").attr("placeholder", "Środowiska IDE");
            $("#hidden2").attr("placeholder", "Języki programowania");
            $(".checkbox-text").html("Zna MYSQL");

        } else if ($("#stanowisko").val() == "Project Manager") {
            $("#hidden1").attr("placeholder", "Metodologie prowadzenia projektów");
            $("#hidden2").attr("placeholder", "Systemy raportowe");
            $(".checkbox-text").html("Zna SCRUM");

        }
        $(".hidden-options").slideDown();
    });

});