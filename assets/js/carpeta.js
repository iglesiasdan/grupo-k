$(document).on("ready",inicio);

function inicio(){
	var id_enti=$("#id_enti").val();
	mostrarDatos("",id_enti);
	$("#buscar").keyup(function(){
		buscar = $("#buscar").val();
		mostrarDatos(buscar,id_enti);
	});
	$("#btnbuscar").click(function(){
		mostrarDatos("",id_enti);
		$("#buscar").val("");
	});
	$("#btnactualizar").click(actualizar);

	$("#form-create-carpetaj").submit(function (event){

		event.preventDefault();

		$.ajax({
			url:$("form").attr("action"),
			type:$("form").attr("method"),
			data:$("form").serialize(),
			success:function(respuesta){
				alert(respuesta);
				mostrarDatos("",id_enti);
				$("#nombre").val("");
				$("#ubicacion").val("");
			}
		});
	});

	// $("body").on("click","#listacarpetaj tr",function(event){
	// //$(".clickable").click(function() {
  //       variable = $(this).data("href");
  // //       $.ajax({
	// 	// 	url:"http://localhost:8888/grupo-k/carpeta",
	// 	// 	type:"POST",
	// 	// 	data:{buscar:variable},
	// 	// 	success:function(respuesta){
	// 	// 		//window.document.location = "http://localhost:8888/grupo-k/carpeta";
	// 	// 	}
	// 	// });
	// 	$('#contenedor').load("http://grupok.daniel-iglesias.com.ve/carpeta?var1='"+variable+"'");
	// 		//window.document.location = "http://localhost:8888/grupo-k/carpeta";
  //   });
	$("body").on("click","#listacarpetaj a",function(event){
		event.preventDefault();
		idsele = $(this).attr("href");
		nombressele = $(this).parent().parent().children("td:eq(1)").text();

		$("#idsele").val(idsele);
		$("#nombresele").val(nombressele);
	});
	$("body").on("click","#listacarpetaj button",function(event){
		idsele = $(this).attr("value");
		eliminar(idsele);
	});
}

function mostrarDatos(valor,id){
	$.ajax({
		url:"http://grupok.daniel-iglesias.com.ve/carpeta/mostrar",
		type:"POST",
		data:{buscar:valor,id:id},
		success:function(respuesta){
			//alert(respuesta);
			//console.log("hola");
			var registros = eval(respuesta);

			html ="<table class='table table-responsive table-bordered'><thead>";
 			html +="<tr><th>#</th><th>Nombre</th><th>Accion</th></tr>";
			html +="</thead><tbody>";
			for (var i = 0; i < registros.length; i++) {
				html +="<tr class='clickable' data-href='"+registros[i]["id_carpeta"]+"' ><td>"+registros[i]["id_carpeta"]+"</td><td>"+registros[i]["nombre_carpeta"]+"</td><td><a href='"+registros[i]["id_carpeta"]+"' class='btn btn-warning' data-toggle='modal' data-target='#myModal'>E</a> <button id='eliminar'class='btn btn-danger' type='button' value='"+registros[i]["id_carpeta"]+"'>X</button></td></tr>";
			};
			html +="</tbody></table>";
			$("#listacarpetaj").html(html);
		}
	});
}

function actualizar(){
	$.ajax({
		url:"http://grupok.daniel-iglesias.com.ve/carpeta/actualizar",
		type:"POST",
		data:$("#form-actualizar").serialize(),
		success:function(respuesta){
			alert(respuesta);
			mostrarDatos("",id_enti);
			$("#nombresele").val("");
			// $("#ubicacionsele").val("");
		}
	});
}

function eliminar(idsele){
	$.ajax({
		url:"http://grupok.daniel-iglesias.com.ve/carpeta/eliminar",
		type:"POST",
		data:{id:idsele},
		success:function(respuesta){
			alert(respuesta);
			mostrarDatos("",id_enti);
			$("#nombresele").val("");
			$("#ubicacionsele").val("");
		}
	});
}
