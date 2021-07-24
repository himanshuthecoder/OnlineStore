@include('user.partial.header')
@include('user.partial.sidebar')

      <div class="page-wrapper">

            @include('user.partial.topbar')

            <!-- Page Content-->
            <div class="page-content" >

                  <!-- content using ajax -->
                  <div id='appcontent'></div>

                  <footer class="footer text-center text-sm-left">
                    &copy; 2021 OnlineStore <span class="d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Himanshu Sharma</span>
                </footer><!--end footer-->
            </div>
            <!-- end page content -->

      </div>
@include('user.partial.footer')
