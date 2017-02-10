<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<div class="container">

		<section class="contenido">
			<div class="row">
				<p>
						<button type="button" id="btnback" class="btn btn-primary">Volver</button>
				</p>
				<ul class="nav nav-tabs">
			        <li class="active"><a href="#tab1" data-toggle="tab">Registrar</a></li>
			        <li><a id="tab-consultar" href="#tab2" data-toggle="tab">Consultar</a></li>
			    </ul>

			    <div class="tab-content">
			        <div class="tab-pane  active" id="tab1">
			        	<div class="col-lg-4"></div>
			            <div class="col-lg-4 text-center">
			            	<div id="titulo"></div>


							<form id="form-create-carpetaj" class="form-horizontal" role="form" action="<?php base_url();?>carpeta/guardar" method="POST">
											<div class="form-group">
												<input id="id_entidad" type="text" hidden="true" value="<?php echo $vista; ?>"/>
											</div>
											<div class="form-group">
		            				<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese su Nombre"/>
		            			</div>
		            			<div class="form-group">
		            				<input type="text" id="ubicacion" name="ubicacion" class="form-control" placeholder="Ingrese su Ubicacion  "/>
		            			</div>
		            			<div class="form-group">
				            		<button type="submit" class="btn btn-primary btn-block" value="Registrar">Registrar</button>
			      				</div>
		            		</form>
		            	</div>
			        </div>

			        <div class="tab-pane fade" id="tab2">

			            <div class="row">
			            	<br>
			            	<div class="col-lg-7"></div>
			            	<div class="col-lg-3">
			            		<input type="text" class="form-control" id="buscar" placeholder="Buscar">
			            	</div>
			            	<div class="col-lg-2">
			            		<input type="button" class="btn btn-primary btn-block" id="btnbuscar" value="Mostrar Todo" data-toggle='modal' data-target='#basicModal'>
			            	</div>
			            </div>
			            <hr>
			            <div class="row">
			            	<div id="listacarpetaj" class="col-lg-8">

			            	</div>
			            	<div class="col-lg-4">
			            		<div class="panel panel-default">
 									<div class="panel-heading">Editar Carpeta</div>
								  	<div class="panel-body">
								  		<form id="form-actualizar" class="form-horizontal" action="<?php echo base_url();?>carpeta/actualizar" method="post" role="form" style="padding:0 10px;">
								  			<div class="form-group">
								  				<label>Nombre:</label>
								  				<input type="hidden" id="idsele" name="idsele" value="">
								  				<input type="text" name="nombresele" id="nombresele" class="form-control">
								  			</div>
								  			<div class="form-group">
								  				<button type="button" id="btnactualizar" class="btn btn-success btn-block">Guardar</button>

								  			</div>
								  		</form>

								  	</div>
								</div>

			            	</div>

			            </div>

			        </div>

			    </div>


			</div>

		</section>


    </div>
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/carpeta.js"></script>
