
<div class="wrapper">
  <!-- Navbar -->
 

    <!-- Right navbar links -->
   

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cliente</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
						<a href="<?php echo base_url(); ?>index.php/clientes/nuevoCli"><button type="submit" class="btn btn-outline-info" >Nuevo Registro</button></a>

              <!-- <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/categoria/nuevoCat">Nuevo Registro</a></li> -->
            </ol>
          </div> 
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista</h3>
              </div>
              <!-- /.card-header -->
              
            <!-- /.card -->

            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
									<tr>
                    <th>N°</th>
										<th>Nombre</th>
										<th>C.I.</th>
										<th>Telefono</th>
										<th>Correo</th>
                    <th>Direccion</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
									<tbody>
                                        <?php
                    $indice=1;
                    //invocaremos a [estudiante] q pusimos en el array asociativo $data de estudiante.php
                    foreach ($cliente-> result() as $row) {
                        ?>
                                            <tr>
                                                <td><?php echo $indice;?></td>
																								<td><?php echo $row->nombre;?></td>
                                                <td><?php echo $row->ci;?>                                                  
                                                </td>
																								<td><?php echo $row->telefono;?>                                                  
                                                </td>
																								<td><?php echo $row->correo;?>                                                  
                                                </td>
                                                <td><?php echo $row->direccion;?></td> 
																								<!-- <td>
																									
																									<?php 
																									if ($row->estado == 1) {
																										echo 'Habilitado';
																									}
																									else {
																										echo 'Deshabilitado';
																									}
																									?>
																								</td>  -->

                                                <td>
																								<div class="btn-group btn-group-justified" >

                                                    <?php
                                                        echo form_open_multipart('clientes/editarCli')
                                                    ?>
                                                   <input type="hidden" name="idUsuario_Acciones" value="<?php echo $this->session->userdata('idusuario');?>"> 
													                          <input type="hidden" name="nombre" value="<?php echo $row->nombre;?>">
                                                    <input type="hidden" name="ci" value="<?php echo $row->ci;?>">
                                                    <input type="hidden" name="telefono" value="<?php echo $row->telefono;?>">
                                                    <input type="hidden" name="correo" value="<?php echo $row->correo;?>">
													                          <input type="hidden" name="direccion" value="<?php echo $row->direccion;?>"> 
																										<input type="hidden" name="id" value="<?php echo $row->id;?>"> 

                                                    <button type="submit" class="btn btn-outline-primary" title="editar" >
                                                    <span class="fas fa-user-edit"></span>

                                                    </button>
                                                    <?php
                                                        echo form_close();
                                                    ?>



<!-- <?php
                                                        echo form_open_multipart('cliente/habilDes')
                                                    ?>
																									 <input type="hidden" name="estado" value="<?php echo $row->estado;?>"> 
                                                    <input type="hidden" name="id" value="<?php echo $row->id;?>">   
                                                    <button type="submit" class="btn btn-outline-warning" title="Habilitar-Deshabilitar" >
                                                    <span class="fas fa-user-edit"></span>

                                                    </button>
                                                    <?php
                                                        echo form_close();
                                                    ?> -->


<?php
                                                        echo form_open_multipart('clientes/eliminarCliente')
                                                    ?>
                                                    <input type="hidden" name="id" value="<?php echo $row->id;?>">                                                             

                                                    <button type="submit" class="btn btn-outline-danger" title="Eliminar" >
                                                    <span class="fas fa-trash-alt"></span>

                                                    </button>
                                                    <?php
                                                        echo form_close();
                                                    ?>
                                                                                                    </div>

                                                </td>
                                            </tr>
                        <?php
                        $indice++;
                    }
                    ?>                                            
                                        </tbody>
                  <tfoot>
                  <tr>
									<th>N°</th>
										<th>Nombre</th>
										<th>C.I.</th>
										<th>Telefono</th>
										<th>Correo</th>
                    <th>Direccion</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

