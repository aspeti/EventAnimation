

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
              <li class="breadcrumb-item">Editar</li>
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
                <h3 class="card-title">Editar Usuario</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="<?php echo base_url();?>index.php/usuarios/editarUsuario" method="POST">
                <div class="card-body">
								<input type="hidden" name="id"  value="<?php echo $id;?>">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Titulo" value="<?php echo $nombre;?>">
                  </div>
									<div class="form-group">
                    <label for="exampleInputEmail1">C.I.:</label>
                    <input type="text" name="ci" class="form-control" id="exampleInputEmail1" placeholder="Autor" value="<?php echo $ci;?>">
                  </div>
									<div class="form-group">
                    <label for="exampleInputEmail1">Telefono:</label>
                    <input type="text" name="telefono" class="form-control" id="exampleInputEmail1" placeholder="Editorial" value="<?php echo $telefono;?>">
                  </div>
							
									<div class="form-group">
                    <label for="exampleInputEmail1">Correo:</label>
                    <input type="text" name="correo" class="form-control" id="exampleInputEmail1" placeholder="Precio" value="<?php echo $correo;?>">
                  </div>
									<div class="row ">
											<div class="col-md-4 form-group">
												<label for="exampleInputPassword1">Login</label>
												<input type="text" name="login" class="form-control" id="exampleInputPassword1" placeholder="Login" value="<?php echo $login;?>" >
											</div>
											<div class="col-md-4 form-group">
												<label for="exampleInputEmail1">Password:</label>
												<input type="text" name="password" class="form-control" id="exampleInputEmail1" placeholder="Password" value="<?php echo $pa;?>" >
											</div>
											 <div class="col-md-4 form-group">
												<label for="exampleInputEmail1">rol:</label>
												<select class="form-control" name="rol" id="">
													<option value="<?php echo $roluser;?>"><?php echo $rol;?></option>
													<option value="1">Admin</option>
													<option value="2">User</option>
												</select>
											</div> 
                  </div>
									
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">Aceptar modificacion</label>
                    </div>
                  </div>

								
									
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
									<button class="btn btn-primary" type="submit" title="Guardar Cambios" >
																									<span class="far fa-save"> Guardar Cambios</span>
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
  