$(document).on("ready",inicio);

function inicio(){
	mostrarDatos("");
	$("#buscar").keyup(function(){
		buscar = $("#buscar").val();
		mostrarDatos(buscar);
	});
	$("#btnbuscar").click(function(){
		mostrarDatos("");
		$("#buscar").val("");
	});
	$("#btnactualizar").click(actualizar);
	$("#form-create-personaj").submit(function (event){

		event.preventDefault();

		$.ajax({
			url:$("form").attr("action"),
			type:$("form").attr("method"),
			data:$("form").serialize(),
			success:function(respuesta){
				alert(respuesta);
				mostrarDatos("");
				$("#nombre").val("");
				$("#ubicacion").val("");
			}
		});
	});

	$("body").on("click","#listaPersonaJ tr",function(event){
        variable = $(this).data("href");
				$('#contenedor').load("http://grupok.daniel-iglesias.com.ve/carpeta?var1='"+variable+"'");
    });
		
	$("body").on("click","#listaPersonaJ a",function(event){
		event.preventDefault();
		idsele = $(this).attr("href");
		nombressele = $(this).parent().parent().children("td:eq(1)").text();
		apellidossele = $(this).parent().parent().children("td:eq(2)").text();

		$("#idsele").val(idsele);
		$("#nombresele").val(nombressele);
		$("#ubicacionsele").val(apellidossele);
	});
	$("body").on("click","#listaPersonaJ button",function(event){
		idsele = $(this).attr("value");
		eliminar(idsele);
	});
}

function mostrarDatos(valor){
	$.ajax({
		url:"http://grupok.daniel-iglesias.com.ve/personaj/mostrar",
		type:"POST",
		data:{buscar:valor},
		success:function(respuesta){
			//alert(respuesta);
			//console.log("hola");
			var registros = eval(respuesta);

			html ="<table class='table table-responsive table-bordered'><thead>";
 			html +="<tr><th>#</th><th>Nombre</th><th>Ubicacion</th><th>Accion</th></tr>";
			html +="</thead><tbody>";
			for (var i = 0; i < registros.length; i++) {
				if (registros[i]["tipo"] != "PERSONA NATURAL") {
				html +="<tr class='clickable' data-href='"+registros[i]["id_entidad"]+"' ><td>"+registros[i]["id_entidad"]+"</td><td>"+registros[i]["nombre"]+"</td><td>"+registros[i]["ubicacion"]+"</td><td><a href='"+registros[i]["id_entidad"]+"' class='btn btn-warning' data-toggle='modal' data-target='#myModal'>E</a> <button id='eliminar'class='btn btn-danger' type='button' value='"+registros[i]["id_entidad"]+"'>X</button></td></tr>";
				}
			};
			html +="</tbody></table>";
			$("#listaPersonaJ").html(html);
		}
	});
}

function actualizar(){
	$.ajax({
		url:"http://grupok.daniel-iglesias.com.ve/personaj/actualizar",
		type:"POST",
		data:$("#form-actualizar").serialize(),
		success:function(respuesta){
			alert(respuesta);
			mostrarDatos("");
			$("#nombresele").val("");
			$("#ubicacionsele").val("");
		}
	});
}

function eliminar(idsele){
	$.ajax({
		url:"http://grupok.daniel-iglesias.com.ve/personaj/eliminar",
		type:"POST",
		data:{id:idsele},
		success:function(respuesta){
			alert(respuesta);
			mostrarDatos("");
			$("#nombresele").val("");
			$("#ubicacionsele").val("");
		}
	});
}
