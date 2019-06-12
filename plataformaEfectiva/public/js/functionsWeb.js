$(document).ready(function(){
	$(document).on("click","#edicion_persona_form",function(){
		
        $("#nombre_persona").prop('disabled', false);
        $("#file").prop('disabled', false);

        $("#apellido_persona").prop('disabled', false);
        $("#ciudad_persona").prop('disabled', false);
        $("#telefono_persona").prop('disabled', false);

        $("#correo_persona").prop('disabled', false);
        $("#clave_persona").prop('disabled', false);
        
        $("#actualizar_persona_form").prop('disabled', false);


		$("#edicion_persona_form").html("Cancelar");
		$("#edicion_persona_form").attr("class","btn btn-danger");
		
		$("#edicion_persona_form").attr("id","cancelar_persona_form");
	});

	$(document).on("click","#cancelar_persona_form",function(){
        
        $("#nombre_persona").prop('disabled', true);
        $("#file").prop('disabled', false);
        
        $("#apellido_persona").prop('disabled', true);
        $("#ciudad_persona").prop('disabled', true);
        $("#telefono_persona").prop('disabled', true);

        $("#correo_persona").prop('disabled', true);
        $("#clave_persona").prop('disabled', true);
		
        $("#actualizar_persona_form").prop('disabled', true);


		$("#cancelar_persona_form").html("Editar");
		$("#cancelar_persona_form").attr("class","btn btn-success");
		
		$("#cancelar_persona_form").attr("id","edicion_persona_form");

	});


        /*EDICION PERSONA ROL ADMINISTRADOR*/
        $(document).on("click","#edicion_persona_perfil_form",function(){
                
                $("#file_persona_perfil").prop('disabled', false);
                $("#identificacion_persona_perfil").prop('disabled', false);
                $("#codigo_persona_perfil").prop('disabled', false);
                $("#nombre_persona_perfil").prop('disabled', false);
                $("#apellido_persona_perfil").prop('disabled', false);
                $("#ciudad_persona_perfil").prop('disabled', false);
                $("#telefono_persona_perfil").prop('disabled', false);
                $("#slug_usuario_persona_perfil").prop('disabled', false);
                $("#clave_persona_perfil").prop('disabled', false);
                $("#correo_persona_perfil").prop('disabled', false);

                $("#actualizar_persona_form").prop('disabled', false);


                $("#edicion_persona_perfil_form").html("Cancelar");
                $("#edicion_persona_perfil_form").attr("class","btn btn-danger");
                
                $("#edicion_persona_perfil_form").attr("id","cancelar_persona_perfil_form");
        });

        $(document).on("click","#cancelar_persona_perfil_form",function(){
                $("#file_persona_perfil").prop('disabled', true);
                $("#identificacion_persona_perfil").prop('disabled', true);
                $("#codigo_persona_perfil").prop('disabled', true);
                $("#nombre_persona_perfil").prop('disabled', true);
                $("#apellido_persona_perfil").prop('disabled', true);
                $("#ciudad_persona_perfil").prop('disabled', true);
                $("#telefono_persona_perfil").prop('disabled', true);
                $("#slug_usuario_persona_perfil").prop('disabled', true);
                $("#clave_persona_perfil").prop('disabled', true);
                $("#correo_persona_perfil").prop('disabled', true);

                $("#actualizar_persona_form").prop('disabled', true);


                $("#cancelar_persona_perfil_form").html("Editar");
                $("#cancelar_persona_perfil_form").attr("class","btn btn-success");
                
                $("#cancelar_persona_perfil_form").attr("id","edicion_persona_perfil_form");

        });


});