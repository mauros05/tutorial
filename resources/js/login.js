$(document).ready(function() {
    let obj = {};
    $('#btn-signIn').click(function(event){
        event.preventDefault

        let correo   = $("#email").val();
        let password = $("#password").val();

        if(correo == "" || password == ""){
            if(correo == ""){
                $("#correo-error").html("El correo no puede estar vacio");
                $("#correo-error").removeAttr("hidden")
            } else {
                $("#correo-error").html("");
                $("#correo-error").attr("hidden", true);
            }

            if(password == ""){
                $("#password-error").html("La contraseña no puede estar vacia");
                $("#password-error").removeAttr("hidden");
            } else {
                $("#password-error").html("");
                $("#password-error").attr("hidden", true);
            }
        } else {
            let data  = $("#login-form").serialize();
            obj.data  = data;
            obj.url   = 'login_access';
            obj.type  = "POST";
    
            let res  = peticionAjax(obj);
        
            if(res.flag == 1){

                window.location = "redirect"

            } else if(res.flag == 0){

                var $alert = $('<div class="alert alert-danger">' + res.msg_error + '</div>');
                $('#div-message').html($alert);
                $alert.fadeIn();
              
                // Hide the alert after 5 seconds
                setTimeout(function() {
                  $alert.fadeOut();
                }, 5000);
            }
        }
    })
});
