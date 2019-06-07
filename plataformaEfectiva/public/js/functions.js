$(document).ready(function () {
    $(document).on("click", ".imagenNavegacion", function () {
        $(".imagenNavegacion").attr("id", "menuNavImg");
        $("#menuNavImg").attr("src", "../img/cerrar.png");
        $(".menuCursos").attr('style', 'height:250px; top:59px; transition:1s;');
    });

    $(document).on("click", "#menuNavImg", function () {
        $(".imagenNavegacion").attr("src", "../img/menuNav.png");
        $("#menuNavImg").attr("id", "");
        $(".menuCursos").attr('style', 'height:0px; top:59px; transition:1s;');
    });

    $(document).on("click", ".descripcionCurso", function () {
        var id = $(this).attr("data-id");
        var url = $(this).attr("data-url");

        $.ajax({
            type: "GET",
            url: url + "/" + id,
            success: function (e) {
                $("#modalDetalleCursoPrincipal").modal("show");
                $("#modalBodyCursoPrincipal").html(e);
            }
        });
    });
    
    //CHAT
    
    $(document).on("click",".botonChat",function(){
               $(".contenidoDelChat").attr("style","height:400px; overflow:hidden; transition:1s;");
    });
    
    $(document).on("click","#cerrarChat",function(){
        $(".contenidoDelChat").attr("style","height:0px; overflow:hidden; transition:1s; margin-bottom:-10px;");
    });


    //PERFIL DEL USUARIO
     $(document).on("click","#editarFormPerfilUser", function(){

        //inputs formularios
        $("#fotografiaFormPerfil").prop('disabled', false);
        $("#fotografiaFormPerfil").prop('readonly', false);
        
        $("#nombreFormPerfil").prop('disabled', false);
        $("#nombreFormPerfil").prop('readonly', false);

        $("#apellidoFormPerfil").prop('disabled', false);
        $("#apellidoFormPerfil").prop('readonly', false);

        $("#ciudadFormPerfil").prop('disabled', false);
        $("#ciudadFormPerfil").prop('readonly', false);

        $("#telefonoFormPerfil").prop('disabled', false);
        $("#telefonoFormPerfil").prop('readonly', false);

        $("#Actualizar").prop('disabled', false);

        $("#editarFormPerfilUser").attr("class","btn btn-danger");
        $("#editarFormPerfilUser").attr("value","CANCELAR");

        $("#editarFormPerfilUser").attr("id","cancelarEdicionFormPerfilUser");

     });

     $(document).on("click","#cancelarEdicionFormPerfilUser", function(){

        $("#fotografiaFormPerfil").prop('disabled', true);
        
        $("#nombreFormPerfil").prop('disabled', true);

        $("#apellidoFormPerfil").prop('disabled', true);

        $("#ciudadFormPerfil").prop('disabled', true);

        $("#telefonoFormPerfil").prop('disabled', true);

        $("#Actualizar").prop('disabled', true);

        $("#cancelarEdicionFormPerfilUser").attr("class","btn btn-success");
        $("#cancelarEdicionFormPerfilUser").attr("value","EDITAR");

        $("#cancelarEdicionFormPerfilUser").attr("id","editarFormPerfilUser");

     });
});