$(document).ready(function(){
    $("#btn_login").click(function(){    
             var user = $("#rut_funcionario").val().trim();
        var pass = $("#clave_intranet").val().trim();
        alert(user);
        alert(pass);

        if( user != "" && pass != "" ){
            $.ajax({
                url:'./class/class_usuario.php',
                type:'post',
                data:{user:user,pass:pass},
                success:function(response){
                    var msg = "";
                    if(response == 1){
                        window.location = "auditorias.php";
                    }else{
                        msg = "Usuario y clave no validos!!";
                    }
                    $("#mensaje").html(msg);
                }
            });
        }
    });
});