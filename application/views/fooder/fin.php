
  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->

  <!-- Main Footer -->
	<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2023 - 2025 <a href="https://adminlte.io">Fernando Silva</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->


<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>adminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>adminLTE/dist/js/adminlte.js"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url(); ?>adminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>adminLTE/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>adminLTE/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url(); ?>adminLTE/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>adminLTE/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>adminLTE/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>adminLTE/dist/js/pages/dashboard2.js"></script>


<!-- desde aca la validacion -->


<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>adminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url(); ?>adminLTE/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>adminLTE/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->

<!-- Page specific script -->
<script>
$(function () {
   //$.validator.setDefaults({
  //   submitHandler: function () {
  //     alert( "Registro satisfactorio!" );
  //   }
  // });
  $('#quickForm').validate({
    rules: {
      nombre: {
        required: true,
        email: false,
				minlength: 5,
      },
      descripcion: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
			titulo: {
				required: true,
        email: false,
				minlength: 5,
      },
			autor: {
				required: true,
        email: false,
				minlength: 5,
      },
			editorial: {
				required: true,
        email: false,
				minlength: 5,
      },
			publicacion: {
				required: true,
        email: false,
				minlength: 4,
      },
			precio: {
				required: true,
        email: false,
				minlength: 1,
      },
			stock: {
				required: true,
        email: false,
				minlength: 1,
      },
			codigo: {
				required: true,
        email: false,
				minlength: 1,
      },
			nombre1: {
				required: true,
        email: false,
				minlength: 1,
      },
			ci: {
				required: true,
        email: false,
				minlength: 1,
      },
			telefono: {
				required: true,
        email: false,
				minlength: 1,
      },
			login: {
				required: true,
        email: false,
				minlength: 3,
				maxlength:25,
      }
			,
			password: {
				required: true,
        email: false,
				minlength: 3,
				maxlength:25,
      }	,
			cliente1: {
				required: true,
        email: false,
				minlength: 5,
				maxlength:30,
      }

    },
    messages: {
			cliente1: {
        required: "Por favor ingrese nombre del cliente",
        minlength: "Ingrese un nombre valido",
				maxlength: "Maximo de 30 caracteres"

      },
      nombre: {
        required: "Por favor ingrese nombre de categoria",
        minlength: "Ingrese un nombre valido"
      },
			login: {
        required: "Por favor ingrese un login para iniciar sesion",
        minlength: "Ingrese un minimo de 3 caracteres",
				maxlength: "Ingrese un maximo de 25 caracteres"

      },
			password: {
        required: "Por favor ingrese un password",
				minlength: "Ingrese un minimo de 3 caracteres",
				maxlength: "Ingrese un maximo de 25 caracteres"  
			},
			titulo: {
        required: "Por favor ingrese un titulo",
        minlength: "Ingrese un nombre valido"
      },
      descripcion: {
        required: "Por favor ingrese una descripcion",
        minlength: "su descripcion tiene un minimo de 10 caracteres"
      },
			editorial: {
        required: "Por favor ingrese editorial",
        minlength: "Ingrese un nombre valido"
      },
			publicacion: {
        required: "Por favor ingrese año de publicacion",
        minlength: "Ingrese un año valido"
      },
			precio: {
        required: "Por favor ingrese un precio",
        minlength: "Ingrese un precio valido"
      },
			stock: {
        required: "Por favor ingrese un stock",
        minlength: "Ingrese un stock valido"
      },
			codigo: {
        required: "Por favor ingrese un codigo",
        minlength: "Ingrese un codigo valido"
      },
			autor: {
        required: "Por favor ingrese un Autor",
        minlength: "Ingrese un autor valido"
      },
			
			nombre1: {
        required: "Por favor ingrese nombre del cliente",
        minlength: "Ingrese un nombre valido"
      },
			
			ci: {
        required: "Por favor ingrese C.I.",
        minlength: "Ingrese un C.I. valido"
      },
			
			telefono: {
        required: "Por favor ingrese un Nro de Telefono",
        minlength: "Ingrese un numero valido"
      },
		
      terms: "Por favor acepte los terminos"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>



<!-- hast aaca la validacion -->




<!-- desde aca par alas tablas -->
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>adminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!-- estos tres son par aexcel y pdf -->
<script src="<?php echo base_url(); ?>adminLTE/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>adminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>adminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<!-- hasta aca es par aexcel y pdf -->
<script src="<?php echo base_url(); ?>adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>adminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/cliente.js"></script>

<!-- AdminLTE App -->

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(function () {
    $("#example11").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


<!-- hasta est epunto las tablas -->

<script src="<?php echo base_url(); ?>assets/js/cliente.js"></script>

<!-- DESDE ACA PARA LA BUSQUEDA -->
<!-- PARA LAS BUSQUEDAS EN LINEA -->
<




<!-- desde aaca los otros nuegvos -->
<!-- <script src="<?php echo base_url(); ?>assets2/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <!-- <script src="<?php echo base_url(); ?>assets2/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script> -->
  <!-- <script src="<?php echo base_url(); ?>assets2/vendor/jquery-scroll-lock/jquery-scrollLock.min.js"></script> -->
  <!-- Optional JS -->
  <script src="<?php echo base_url(); ?>assets2/vendor/chart.js/Chart.min.js"></script>
  <!-- Datatable -->

  <!-- Sweet Alert 2 -->
  <script src="<?php echo base_url(); ?>assets2/vendor/sweetalert2/sweetalert2.min.js"></script>

  <!-- <script src="<?php echo base_url(); ?>assets2/vendor/moment.min.js"></script> -->
  <!-- <script src="<?php echo base_url(); ?>assets2/vendor/bootstrap-datetimepicker.js"></script> -->
  
  <!-- Argon JS -->
  <!-- <script src="<?php echo base_url(); ?>assets2/js/argon.js"></script> -->
<!-- asta aca los nuevos -->


</body>
</html>
