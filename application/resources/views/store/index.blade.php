@include('partial_dastone.header')
@include('partial_dastone.topbar')
      <div class="page-wrapper pt-2">            
            <!-- Page Content-->
            <div class="page-content" >

                  @yield('appcontent')                  
                  
            </div>
            <!-- end page content -->
            <footer class="footer text-center text-sm-left">
                    &copy; 2021 OnlineStore <span class="d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Himanshu Sharma</span>
                </footer><!--end footer-->
      </div>
@include('partial_dastone.footer')
