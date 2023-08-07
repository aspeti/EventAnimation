

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categoria</h1>
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
                <h3 class="card-title">Editar de Categoria</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="<?php echo base_url();?>index.php/categoria/EditCat" method="POST">
                <div class="card-body">
				<input type="hidden" name="id" class="form-control" id="exampleInputEmail1" placeholder="Categoria" value="<?php echo $id;?>">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Categoria" value="<?php echo $nombre;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Descripcion</label>
                    <input type="text" name="descripcion" class="form-control" id="exampleInputPassword1" placeholder="Descripcion" value="<?php echo $descripcion;?>">
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
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  