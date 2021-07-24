@include('user.partial.header')


      <div class="page-container">
            @include('user.partial.sidebar')
            

            <!-- Page Content-->
            <div class="page-content mb-5" >
                  @include('user.partial.topbar')
                  <!-- content using ajax -->

                  <div class="page-inner" id='appcontent'></div>


                  <!-- <footer class="page-footer" style="position: fixed;bottom:0px;right: 0px;width:100%;">
                     <div class="pd-t-4 pd-b-0 pd-x-20 col text-right ">
                        <div class="tx-10 tx-uppercase tx-gray-500 tx-spacing-1">
                           <p class="pd-y-10 mb-0">&copy; 2021 OnlineStore</p>
                        </div>
                     </div>
                  </footer> -->
                  
            </div>
            <!-- end page content -->

      </div>
@include('user.partial.footer')
