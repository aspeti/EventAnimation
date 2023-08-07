

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Productos</h1>
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
          <div class="col-md-8">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Editar Producto</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="<?php echo base_url();?>index.php/productos/EditPro" method="POST">
                <div class="card-body">
									<input type="hidden" name="id" class="form-control" id="exampleInputEmail1" placeholder="Categoria" value="<?php echo $id;?>">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Titulo:</label>
                    <input type="text" name="titulo" class="form-control" id="exampleInputEmail1" placeholder="Titulo" value="<?php echo $nombre;?>">
                  </div>
									<div class="form-group">
                    <label for="exampleInputEmail1">Autor:</label>
                    <input type="text" name="autor" class="form-control" id="exampleInputEmail1" placeholder="Autor" value="<?php echo $autor;?>">
                  </div>
									<div class="form-group">
                    <label for="exampleInputEmail1">Editorial:</label>
                    <input type="text" name="editorial" class="form-control" id="exampleInputEmail1" placeholder="Editorial" value="<?php echo $editorial;?>">
                  </div>
									<div class="form-group">
                    <label for="exampleInputEmail1">Categoria:</label>
										<select name="categoria" class="form-control">
										<option values="<?php echo $cate;?>"><?php echo $cate;?></option>

                                                  <?php
                                                  foreach ($categoria as $i => $cat)
                                                    echo '<option values="',$i,'">',$cat,'</option>';
                                                  ?>
                                                  </select>                  </div>
									<div class="form-group">
                    <label for="exampleInputEmail1">Precio:</label>
                    <input type="text" name="precio" class="form-control" id="exampleInputEmail1" placeholder="Precio" value="<?php echo $precio;?>">
                  </div>
									<div class="form-group">
                    <label for="exampleInputEmail1">Stock:</label>
                    <input type="text" name="stock" class="form-control" id="exampleInputEmail1" placeholder="Stock" value="<?php echo $stock;?>">
                  </div>
									<div class="form-group">
                    <label for="exampleInputEmail1">Area:</label>
                    <input type="text" name="area" class="form-control" id="exampleInputEmail1" placeholder="Area" value="<?php echo $area;?>">
                  </div>
									<div class="form-group">
                    <label for="exampleInputEmail1">Campo:</label>
                    <input type="text" name="campo" class="form-control" id="exampleInputEmail1" placeholder="Campo" value="<?php echo $campo;?>">
                  </div>	
									<div class="form-group">
                    <label for="exampleInputEmail1">Ciudad:</label>
                    <input type="text" name="ciudad" class="form-control" id="exampleInputEmail1" placeholder="Ciudad" value="<?php echo $ciudad;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Año publicacion</label>
                    <input type="text" name="publicacion" class="form-control" id="exampleInputPassword1" placeholder="Año publicacion" value="<?php echo $año_publicacion;?>">
                  </div>
									<div class="form-group">
                    <label for="exampleInputEmail1">Nro Edicion:</label>
                    <input type="text" name="nro_edicion" class="form-control" id="exampleInputEmail1" placeholder="Nro Edicion" value="<?php echo $nro_edicion;?>">
                  </div>
									<div class="form-group">
                    <label for="exampleInputEmail1">Formato:</label>
                    <input type="text" name="formato" class="form-control" id="exampleInputEmail1" placeholder="Formato" value="<?php echo $formato;?>">
                  </div>
									<div class="form-group">
                    <label for="exampleInputEmail1">Codigo</label>
                    <input type="text" name="codigo" class="form-control" id="exampleInputEmail1" placeholder="Codigo" value="<?php echo $codigo;?>">
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
          <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="card-title">Imagen </h3>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <div class="custom-file">
												<?php
                            echo form_open_multipart('productos/subir')
                                ?>
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="file" name="userfile">    
                            <button type="submit" class="btn btn-outline-info btn-xs"  >Subir</button>
                            <?php
                            echo form_close();
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                             <!-- <?php if(file_exists("./cargas/productos/".$foto)): ?>
                                <img id="img-product" src="<?php echo base_url(); ?>cargas/productos/<?php echo $foto; ?>" class="img-full rounded">
                            <?php else: ?>
                                <img id="img-product" src="<?php echo base_url(); ?>cargas/productos/inicio.jpg" class="img-full rounded">
                            <?php endif ?>      -->
														<?php
                                                        $fot= $foto;
                                                        if ($fot=="") {
                                                            //mostrar una imagen por defecto
                                                            ?>
                                                            <img width="350" src="<?php echo base_url(); ?>/cargas/productos/inicio.jpg">
                                                            <?php
                                                        }
                                                        else {
                                                            //mostrar foto del usuario
                                                            ?>
                                                            <img width="350" src="<?php echo base_url(); ?>/cargas/productos/<?php echo $foto; ?>">
                                                            
                                                            <?php
                                                        }

                                                        ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  