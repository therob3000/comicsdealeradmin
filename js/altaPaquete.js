$(document).ready(function(){
    $("#navbar").load("../html/layouts/navbar_layout.html");
    $("#sidebar").load("../html/layouts/sidebar_layout.html", function(){
        $("#sidebar").find("#5").attr("class", "active");
    });
    submitPaquete();
});

function submitPaquete(){
    $('#paquete').submit(function(e){
        console.log($(this).serialize());
        $.post("/php/altaPaquete.php",
                $(this).serialize(),
                function(data){
                    if(data.exito == true){
                        alert("Exito");
                        window.location.href = "altaPaquete.php";
                    }
                    else{
                        aler("Error, quisiera estar muerto.");
                    }
                },
                'json');
        e.preventDefault();
    });
}