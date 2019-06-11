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
});