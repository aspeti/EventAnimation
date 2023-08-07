
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
            <h1>Ventas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
						<a href="<?php echo base_url(); ?>index.php/ventas/nuevaVen"><button type="submit" class="btn btn-outline-warning" >Nueva Venta</button></a>

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
										<th>Cliente</th>
										<th>Vendedor</th>
										<th>Fecha</th>
										<th>Total</th>
										<th>Comprovante</th>
                 					</tr>
                    </thead>
									<tbody>
                                        <?php
                    $indice=1;
                    //invocaremos a [estudiante] q pusimos en el array asociativo $data de estudiante.php
                    foreach ($ventas-> result() as $row) {
                        ?>
                                            <tr>
                                                <td><?php echo $indice;?></td>
																								<td><?php echo $row->cliente;?></td>
                                                <td><?php echo $row->vendedor;?>                                                  
                                                </td>
																								<td><?php echo $row->fecha;?>                                                  
                                                </td>
																								<td><?php echo $row->total;?>                                                  
                                                </td>
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
                                                        echo form_open_multipart('ventas/reimprimir')
                                                    ?>
                                                   <input type="hidden" name="idUsuario_Acciones" value="<?php echo $this->session->userdata('idusuario');?>"> 
												   <input type="hidden" name="id" value="<?php echo $row->id;?>"> 
                                                    <button type="submit" class="btn btn-outline-success" title="REIMPRIMIR" >
                                                    <span class="fas fa-user-edit"></span>

                                                    </button>
                                                    <?php
                                                        echo form_close();
                                                    ?>
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
										<th>Cliente</th>
										<th>Vendedor</th>
										<th>Fecha</th>
										<th>Total</th>
										<th>Comprovante</th>
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

