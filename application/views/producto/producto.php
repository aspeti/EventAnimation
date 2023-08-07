
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
            <h1>Producto</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
						<a href="<?php echo base_url(); ?>index.php/productos/nuevoPro"><button type="submit" class="btn btn-outline-info" >Nuevo Registro</button></a>

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
					<th>Codigo</th>

                    <th>Titulo</th>
					<th>Autor</th>
					<th>Editorial</th>
                    <th>Categoria</th>
					<th>Precio</th>
                    <th>Stock</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
									<tbody>
                                        <?php
                    $indice=1;
                    //invocaremos a [estudiante] q pusimos en el array asociativo $data de estudiante.php
                    foreach ($productos-> result() as $row) {
                        ?>
                                            <tr>
                                                <td><?php echo $indice;?></td>
												<td><?php echo $row->codigo;?></td>

                                                <td><?php echo $row->nombre;?>                                                  
                                                </td>
												<td><?php echo $row->autor;?>                                                  
                                                </td>
												<td><?php echo $row->editorial;?>                                                  
                                                </td>
                                                <td><?php echo $row->categoria;?></td> 
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
											<td><?php echo $row->precio;?></td>

											

											<td><?php echo $row->stock;?></td>
											<td><?php echo $row->descripcion;?></td>



                                                <td>
																								<div class="btn-group btn-group-justified" >

                                                    <?php
                                                        echo form_open_multipart('productos/editarProd')
                                                    ?>
                                                   <input type="hidden" name="idUsuario_Acciones" value="<?php echo $this->session->userdata('idusuario');?>"> 
                                                    <input type="hidden" name="codigo" value="<?php echo $row->codigo;?>">
													                          <input type="hidden" name="nombre" value="<?php echo $row->nombre;?>">
                                                    <input type="hidden" name="precio" value="<?php echo $row->precio;?>">
                                                    <input type="hidden" name="stock" value="<?php echo $row->stock;?>">
                                                    <input type="hidden" name="categoria" value="<?php echo $row->categoria;?>">
													                          <input type="hidden" name="autor" value="<?php echo $row->autor;?>">
                                                    <input type="hidden" name="editorial" value="<?php echo $row->editorial;?>">
                                                    <input type="hidden" name="categoria" value="<?php echo $row->categoria;?>">
													                          <input type="hidden" name="area" value="<?php echo $row->area;?>">
													                          <input type="hidden" name="campo" value="<?php echo $row->campo;?>">
													                          <input type="hidden" name="ciudad" value="<?php echo $row->ciudad;?>">
													                          <input type="hidden" name="año_publicacion" value="<?php echo $row->año_publicacion;?>">
													                          <input type="hidden" name="nro_edicion" value="<?php echo $row->nro_edicion;?>">
                                                    <input type="hidden" name="formato" value="<?php echo $row->formato;?>">
                                                    <input type="hidden" name="descripcion" value="<?php echo $row->descripcion;?>">   
                                                    <input type="hidden" name="id" value="<?php echo $row->id;?>">    
																										<input type="hidden" name="foto" value="<?php echo $row->foto;?>">                                                             
                                                         

                                                    <button type="submit" class="btn btn-outline-primary" title="editar" >
                                                    <span class="fas fa-user-edit"></span>

                                                    </button>
                                                    <?php
                                                        echo form_close();
                                                    ?>



<!-- <?php
                                                        echo form_open_multipart('categoria/habilDes')
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
                                                        echo form_open_multipart('productos/eliminarProductos')
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
									<th>Codigo</th>

									<th>Titulo</th>
					<th>Autor</th>
					<th>Editorial</th>
					<th>Categoria</th>
					<th>Precio</th>
                    <th>Stock</th>
                    <th>Descripcion</th>
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

