
<script src="<?php echo base_url(); ?>assets2/vendor/datatables.net/jquery.dataTables.min.js"></script> 
   <script src="<?php echo base_url(); ?>assets2/vendor/datatables.net-responsive-bs4/js/dataTables.bootstrap4.min.js"></script> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Venta</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Nuevo</li>
              <li class="breadcrumb-item active">Registro</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="input-group input-group-lg input-group-flush">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fas fa-search"></span>
                            </div>
                            </div>
                            <input id="search-product" type="search" class="form-control" placeholder="Buscar un producto">
                        </div>
                    </div>

                        <div class="col-lg-4 text-center">
                          Country :
						  <input id="busqueda" type="search" class="form-control" placeholder="Buscar un producto">

						<ul>
							<div id="result"></div>
						</ul>   
                    </div> 
                </div>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-3 col-3"> 
                        <button class="btn btn-icon btn-outline-danger" type="button" data-toggle="modal" data-target="#exampleModal">
                            <span class="btn-inner--icon"><i class="ni ni-single-02"></i></span>
                            <span class="btn-inner--text">Cliente</span>
                        </button>
                    </div>

                    <div class="col-lg-12">

                        <div class="table-responsive mt-4">
                            <table class="table align-items-center">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort">Id</th>
                                    <th scope="col" class="sort">Nombre</th>
                                    <th scope="col" class="sort">Precio</th>
                                    <th scope="col" class="sort">Stock</th>
                                    <th scope="col" class="sort">Cantidad</th>
                                    <th scope="col" class="sort">Importe</th>
                                    <th scope="col" class="sort"></th>
                                </tr>
                                </thead>
                                <tbody class="list-product">
                                
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4">
                        <div class="form-group">
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Sub total</span>
                            </div>
                            <input id="subtotal" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="0.00">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4">
                        <div class="form-group">
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Descuento</span>
                            </div>
                            <input id="discount" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="0.00">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4">
                        <div class="form-group">
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Total</span>
                            </div>
                            <input id="total" type="text" name="total" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="0.00">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 text-right">

                        <input type="hidden" id="voucherIgv">
                        <input type="hidden" id="igv">

                        <input type="hidden" id="voucherId" value="1">
                        <input type="hidden" id="clientId" >

                        <div class="form-group">
                            <button id="btnSave" class="btn btn-outline-success mt-4">Guardar</button>
                        </div>
                    </div>

                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal para el cliente-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Clientes Registrados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
						<table id="example11" class="table table-bordered table-striped">
                <thead class="thead-light">
                <tr>
                    <th>Nombre</th>
                    <th>N° documento</th>
                </tr>
                </thead>
                <tbody class="list-client">

                    <?php if(!empty($clientes)): ?>
                        <?php foreach($clientes as $client): ?>
                            <tr id="<?php echo $client->id; ?>" data-dismiss="modal">
                                <td><?php echo $client->cliente; ?></td>
                                <td><?php echo $client->ci; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    
                </tbody>
                </table>
            </div>
            <div class="modal-footer">
            	<button class="btn btn-icon btn-outline-success" type="button" data-toggle="modal" data-target="#exampleModal22">
                            <span class="btn-inner--icon"><i class="ni ni-single-02"></i></span>
                            <span class="btn-inner--text">Nuevo Cliente</span>
                </button>
               <!-- <a href="<?php echo base_url();?>client/Add" class="btn btn-success">Nuevo Cliente</a> -->
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>

    <!-- Modal para el cliente nuevo-->
    <div class="modal fade" id="exampleModal22" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
					<!-- para el registro -->
					<div class="card-body">
										<div class="row ">
													<div class="col-md-12 form-group" >
														<label for="exampleInputEmail1">Nombre:</label>
														<input type="text" name="nombre1" class="form-control" id="exampleInputEmail1" placeholder="Nombre" >
													</div>												
										</div>
										<br>
										<div class="row ">
												<div class="col-md-4 form-group">
													<label for="exampleInputEmail1">C.I.:</label>
													<input type="text" name="ci" class="form-control" id="exampleInputEmail1" placeholder="C.I." >
												</div>
												<div class="col-md-4 form-group">
													<label for="exampleInputEmail1">Telefono:</label>
													<input type="text" name="telefono" class="form-control" id="exampleInputEmail1" placeholder="Telefono" >
												</div>
												<div class="col-md-4 form-group">
													<label for="exampleInputEmail1">Correo:</label>
													<input type="text" name="correo" class="form-control" id="exampleInputEmail1" placeholder="Correo" >
												</div>
										</div>

										<br>
										<div class="row ">
												<div class="col-md-12 form-group">
													<label for="exampleInputPassword1">Direccion</label>
													<input type="text" name="direccion" class="form-control" id="exampleInputPassword1" placeholder="Direccion" >
												</div>														
										</div>
										<br>		
								</div>
								<!-- <div class="card-footer"> -->
									<!-- <button class="btn btn-primary" type="submit" title="Guardar Cambios" >
										<span class="far fa-save"> Guardar</span>
									</button> -->
									<!-- <button class="btn btn-primary" type="button" onclick="history.back()" name="volver atrás" title="" >
										<span class="far fa-window-close"> Cancelar</span>
									</button> -->
								<!-- </div> -->
					<!-- asta aca el registro nuevo -->


            </div>
            <div class="modal-footer">
       
                <!-- <a href="<?php echo base_url();?>client/Add" class="btn btn-success">Guardar</a>  -->
				<button class="btn btn-icon btn-outline-success" type="button" data-toggle="modal" data-target="#exampleModal">
                            <span class="btn-inner--icon"><i class="ni ni-single-02"></i></span>
                            <span class="btn-inner--text">Guardar</span>
                        </button>
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
    <!-- asta aca nuevo cliente -->
    </div>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
	
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

    
    function search(){
        $("#search-product").autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/ventas/getData",
                    type: "POST",
                     dataType:"json",
                    data:{ name: request.term},
                    success: function($data){
											alert(ajax.responseText);

                        response($data);
                    }
                });
            },
            select:function(event, ul){

                var html='<tr>'+
                    '<td>'+ul.item.id+'</td>'+
                    '<td>'+ul.item.nombre+'</td>'+
                    '<td>'+ul.item.precio+'</td>'+
                    '<td>'+ul.item.stock+'</td>'+
                    '<td><input id="cant" type="text" class="form-control" value="1" ></td>'+
                    '<td>'+ul.item.precio+'</td>'+
                    '<td><button class="btn btn-icon btn-danger btn-remove" type="button"><span class="btn-inner--icon"><i class="ni ni-fat-remove ni-lg"></i></span></button></td>'
                    '</tr>';

                $(".list-product").append(html);
                update();
            },
        });
    }
</script>
<!-- HAST AACA LA BUSQUEDA -->


<script type="text/javascript">
        $(this).ready( function() {
            $("#id").autocomplete({
                minLength: 1,
                source: 
                function(req, add){
                    $.ajax({
                        url: "<?php echo base_url();?>ventas/lookup",
                        dataType: 'json',
                        type: 'POST',
                        data: req,
                        success:    
                        function(data){
                            if(data.response =="true"){
                                add(data.message);
                            }
                        },
                    });
                },
            select: 
                function(event, ui) {
                    $("#result").append(
                        "<li>"+ ui.item.value + "</li>"
                    );                  
                },      
            });
        });
        </script>


<script>
function search(){
        $("#busqueda").autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url: "<?php echo base_url(); ?>ventas/getData",
                    type: "POST",
                     dataType:"json",
                    data:{ name: request.term},
                    success: function($data){
											alert(ajax.responseText);

                        response($data);
                    }
                });
            },
            select:function(event, ul){

                var html='<tr>'+
                    '<td>'+ul.item.id+'</td>'+
                    '<td>'+ul.item.nombre+'</td>'+
                    '<td>'+ul.item.precio+'</td>'+
                    '<td>'+ul.item.stock+'</td>'+
                    '<td><input id="cant" type="text" class="form-control" value="1" ></td>'+
                    '<td>'+ul.item.precio+'</td>'+
                    '<td><button class="btn btn-icon btn-danger btn-remove" type="button"><span class="btn-inner--icon"><i class="ni ni-fat-remove ni-lg"></i></span></button></td>'
                    '</tr>';

                $(".list-product").append(html);
                update();
            },
        });
    }
</script>