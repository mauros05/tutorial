$(document).ready(function(){
    let obj = {};
    $("#btn-logout").click(function(){
        obj.data  = "";
        obj.url   = 'cerrar_sesion';
        obj.type  = "GET";

        let res  = peticionAjax(obj);

        if (res.flag == 1){
            window.location = "redirect"

            var $alert = $('<div class="alert alert-warning">Sesion Cerrada Correctamente</div>');
            $('#div-message').html($alert);
            $alert.fadeIn();
            
            setTimeout(function() {
                $alert.fadeOut();
            }, 5000);
        }
    })
})