 {{-- Start Footer Section   --}}
 <footer>
     <div class="container-fluid">
         <div class="row border-top pt-2 mt-2">
             <div class="col-lg-10 col-md-9 ms-auto">
                 <div class="row">
                     <div class="col-md-6 text-center">
                         <ul class="list-inline">
                             <li class="list-inline-item me-2">
                                 <a href="javascript:void(0);">Data Land Techonology Co.,Ltd</a>
                             </li>
                             <li class="list-inline-item me-2">
                                 <a href="javascript:void(0);">About</a>
                             </li>
                             <li class="list-inline-item me-2">
                                 <a href="javascript:void(0);">Contact</a>
                             </li>
                         </ul>
                     </div>
                     <div class="col-md-6 text-center">
                         <p>&copy; <span id="getyear">2000</span> Copyright. All Rights Reserved.</p>
                     </div>
                 </div>

             </div>
         </div>
     </div>

 </footer>
 {{-- End Footer Section   --}}

 {{-- Start Right Navbar   --}}
 <div class="right-panels">
     <h6>Custom your template</h6>
     <p class="small">Hifi!!! Here youc oan change your theme</p>
     <hr />
     <div class="themecolors">
         <a href="javascript:void(0);"><i class="fas fa-square text-primary shadow fa-lg"></i></a>
         <a href="javascript:void(0);"><i class="fas fa-square text-secondary shadow fa-lg"></i></a>
         <a href="javascript:void(0);"><i class="fas fa-square text-info shadow fa-lg"></i></a>
         <a href="javascript:void(0);"><i class="fas fa-square text-success shadow fa-lg"></i></a>
         <a href="javascript:void(0);"><i class="fas fa-square text-warning shadow fa-lg"></i></a>
         <a href="javascript:void(0);"><i class="fas fa-square text-danger shadow fa-lg"></i></a>
         <a href="javascript:void(0);"><i class="fas fa-square text-muted shadow fa-lg"></i></a>
         <a href="javascript:void(0);"><i class="fas fa-square text-white shadow fa-lg"></i></a>
         <a href="javascript:void(0);"><i class="fas fa-square text-dark shadow fa-lg"></i></a>
         <a href="javascript:void(0);"><i class="fas fa-square text-light shadow fa-lg"></i></a>

     </div>
 </div>

 {{-- End Right Navbar   --}}

 {{-- START MODAL AREA   --}}
 <div id="quicksearchmodal" class="modal fade">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content rounded-0">
             <div class="modal-header">
                 <h6 class="modal-title">Result</h6>
                 <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
             </div>
             <div class="modal-body">
                 <ul class="list-group">
                     <li class="list-group-item"><a href="javascript:void(0);">WDF 1001</a></li>
                     <li class="list-group-item"><a href="javascript:void(0);">WDF 1002</a></li>
                     <li class="list-group-item"><a href="javascript:void(0);">WDF 1003</a></li>
                 </ul>
             </div>
             <div class="modal-footer">

             </div>
         </div>
     </div>
 </div>
 {{-- END MODAL AREA   --}}

 {{-- boostrap css1 js1   --}}
 <script src="{{ asset('./assets/libs/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js') }}" type="text/javascript">
 </script>
 {{-- jquery  --}}
 <script src="{{ asset('assets/libs/jquery/jquery-3.7.1.min.js') }}" type="text/javascript"></script>

 {{-- google chart js1  --}}
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 {{-- chartjs js1   --}}
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 {{-- Raphael must be included before justgage  --}}
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/justgage/1.2.9/justgage.min.js"></script>

 {{-- custom js   --}}
 <script src="{{ asset('assets/dist/js/app.js') }}" type="text/javascript"></script>

 {{-- toaser notification css 1 js 1  --}}
 {{-- <script src="{{ asset('assets/libs/toastr-master/build/toastr.min.js') }}" type="text/javascript"></script>

 @if (Session::has('success'))
     <script>
         toastr.success("{{ session()->get('success') }}", 'Successful')
     </script>
 @endif

 @if (Session::has('info'))
     <script>
         toastr.info("{{ session()->get('info') }}", 'Information')
     </script>
 @endif

 @if (Session::has('error'))
     <script>
         toastr.error("{{ session()->get('error') }}", 'Incnoveivable')
     </script>
 @endif

 @if ($errors)
     @foreach ($errors->all() as $error)
         <script>
             toastr.error("{{ session()->get('info') }}", 'Information', {
                 timeOut: 3000
             })
         </script>
     @endforeach
 @endif --}}


 <!-- Toastr JS -->
 <script src="{{ asset('assets/libs/toastr-master/build/toastr.min.js') }}" type="text/javascript"></script>

 <!-- Toastr Notifications -->
 @if (Session::has('success'))
     <script>
         toastr.success("{{ session()->get('success') }}", 'Success', {
             timeOut: 5000
         });
     </script>
 @endif

 @if (Session::has('info'))
     <script>
         toastr.info("{{ session()->get('info') }}", 'Information', {
             timeOut: 5000
         });
     </script>
 @endif

 @if (Session::has('error'))
     <script>
         toastr.error("{{ session()->get('error') }}", 'Error', {
             timeOut: 5000
         });
     </script>
 @endif

 @if ($errors->any())
     <script>
         @foreach ($errors->all() as $error)
             toastr.error("{{ $error }}", 'Validation Error', {
                 timeOut: 5000
             });
         @endforeach
     </script>
 @endif



 {{-- extra js  --}}
 @yield('scripts')


 </body>

 </htmL>
