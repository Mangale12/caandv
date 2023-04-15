<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from adminlte.io/themes/v3/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jul 2022 11:49:48 GMT -->
   <!-- Added by HTTrack -->
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <!-- /Added by HTTrack -->
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Colab | @yield('title')</title>
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
      <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
      <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
      <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/adminlte.min2167.css?v=3.2.0')}}">
      <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
      <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
      <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
      <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
      <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
      <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
      <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
      <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/style.css')}}">
      <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />
      <link href="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.css" rel="stylesheet">

    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/extensions/print/bootstrap-table-print.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>

      <script>
         var base_url = window.location.origin;
      </script>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
         </div>
         @include('admin.components.top-nav')
         <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="/" class="brand-link">
            <img src="{{asset('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Colab</span>
            </a>
            @include('admin.components.sidebar')
         </aside>
         <div class="content-wrapper">
            @yield('content')
         </div>
         <footer class="main-footer">
            <strong>Copyright &copy; {{date('Y')}} </strong>
            All rights reserved.
         </footer>
         <aside class="control-sidebar control-sidebar-dark">
         </aside>
      </div>

      <div class="modal fade" id="modal-show">
         <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
               <h4 class="modal-title">
                  {{-- fill from ajax --}}
               </h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
               {{-- fill from ajax --}}
                  <div class="loader"></div>
             </div>
           </div>

         </div>

       </div>
   </body>

   <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
   <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
   <script>
      $.widget.bridge('uibutton', $.ui.button)
   </script>
   <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
   <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
   <script src="{{asset('js/adminlte2167.js')}}"></script>
   <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
   <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
   <script src="{{asset('js/editable.js')}}"></script>
   <!-- <script src="{{asset('plugins/chart.js')}}/Chart.min.js')}}"></script> -->
   <!-- <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script> -->
   <!-- <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script> -->
   <!-- <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> -->
   <!-- <script src="{{asset('js/demo.js')}}"></script> -->
   <!-- <script src="{{asset('plugins/moment/moment.min.js')}}"></script> -->
   <!-- <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script> -->
   <!-- <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script> -->
   <!-- <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script> -->

   <script src="{{asset('js/pages/dashboard.js')}}"></script>

   {{-- flash messages --}}
   @if(session()->has('success'))
      <script>
         toastr.success('{{session()->get('success')}}')
      </script>
   @endif


   @if(session()->has('error'))
      <script>
         toastr.error('{{session()->get('error')}}')
      </script>
   @endif
   {{-- flash messages --}}

   {{-- <script>
    $(document).ready(function () {

  });
  </script> --}}
   <script>
      function showItem(url,titleText,itemType,toggleElement = ''){
         var modal = $('#modal-show');
         var modalTitle = $('.modal-title');
         var modalBody = $('.modal-body');

         modal.modal('show');
         modalTitle.text(titleText);

         $.ajax({
            url: window.location.origin+url,
            method: 'GET',
            beforeSend: function() {
               modalBody.html('<div class="loader"></div>');
            },
            success: function(data) {
               if(itemType == 'message'){
                  $(toggleElement).html('<span class="btn btn-danger">Read</span>')
               }
               modalBody.html( data );
            },
            error: function(xhr) {
               alert("Error occured.please try again");
               modalBody.html(xhr.statusText + xhr.responseText);
            },
            complete: function() {
            }
         });

      }
      $(document).ready(function(){
         //show modal
         //delete item sweetalert initialize
         if($('.delete-item').length > 0){
            $('.delete-item').on('click',function(e){
               e.preventDefault();
               var form_id = $(this).data('form');
               var form = $(form_id);
               Swal.fire({
               title: 'Are you sure?',
               text: "You won't be able to revert this!",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Yes, delete it!'
               }).then((result) => {
                  if (result.isConfirmed) {
                     form.submit();
                  }
               })

            });
         }

         //item list datatable initialize
         if($('#dataTable').length > 0){
            // $('.table').DataTable();
            $('#dataTable').DataTable({
                  "paging": true,
                  "lengthChange": true,
                  "searching": true,
                  "ordering": true,
                  "info": true,
                  "autoWidth": false,
                  "responsive": true,
                  "dom": 'lBfrtip',
                  "buttons": [
                     'copy', 'csv', 'excel', 'pdf', 'print'
                  ]
            });

         }

         //item edit/create summernote initialize
         if($('.summernote').length > 0){
            $('.summernote').summernote({
               height: 150,   //set editable area's height
            });
         }

      });
   </script>
   @yield('script');

</html>
