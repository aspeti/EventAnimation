

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuario</h1>
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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registro de Usuario</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="<?php echo base_url();?>index.php/usuarios/registrarNuevo" method="POST">
                <div class="card-body">
									<div class="row ">
												<div class="col-md-12 form-group" >
													<label for="exampleInputEmail1">Nombre:</label>
													<input type="text" name="nombre2" class="form-control" id="exampleInputEmail1" placeholder="Nombre" >
												</div>
												<!-- <div class="col-md-6 form-group">
												<label for="exampleInputEmail1">Autor:</label>
                    		<input type="text" name="autor" class="form-control" id="exampleInputEmail1" placeholder="Autor" >
												</div> -->
									</div>
									<br>
									<div class="row ">
											<div class="col-md-2 form-group">
												<label for="exampleInputEmail1">C.I.:</label>
												<input type="text" name="ci" class="form-control" id="exampleInputEmail1" placeholder="C.I." >
											</div>
											<div class="col-md-2 form-group">
												<label for="exampleInputEmail1">Telefono:</label>
												<input type="text" name="telefono" class="form-control" id="exampleInputEmail1" placeholder="Telefono" >
											</div>
											<div class="col-md-4 form-group">
												<label for="exampleInputEmail1">Correo:</label>
												<input type="text" name="correo" class="form-control" id="exampleInputEmail1" placeholder="Correo" >
											</div>
											<div class="col-md-4 form-group">
												<label for="exampleInputPassword1">Direccion</label>
												<select name="rol" id="rol" class="form-control">
													<option value="1">Administrador</option>
													<option value="2">Usuario</option>
												</select>
											</div>

                  </div>

							
									<br>
									<div class="row ">
											<div class="col-md-4 form-group">
												<label for="exampleInputEmail1">Login:</label>
												<input type="text" name="login" class="form-control" id="exampleInputEmail1" placeholder="Login" >
											</div>
											<div class="col-md-4 form-group">
												<label for="exampleInputEmail1">Password:</label>
												<input type="text" name="password" class="form-control" id="exampleInputEmail1" placeholder="Password" >
											</div>
											<div class="col-md-4 form-group">
												<label for="exampleInputEmail1">Password:</label>
												<input type="text" name="pa" class="form-control" id="exampleInputEmail1" placeholder="Password" >
											</div>
                  </div>
						
								
              <br>
							
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">Aceptar Registro</label>
                    </div>
                  </div>
									
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
									<button class="btn btn-primary" type="submit" title="Guardar Cambios" >
																									<span class="far fa-save"> Guardar</span>
																									</button>
										<button class="btn btn-primary" type="button" onclick="history.back()" name="volver atrás" title="" >
																									<span class="far fa-window-close"> Cancelar</span>

                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->

          <!-- right column 
				
				 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Editar Producto</h3>
              </div>-->
          
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  