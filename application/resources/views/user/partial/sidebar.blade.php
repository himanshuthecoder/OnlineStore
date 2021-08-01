<?php
$baseurl=url('/');
$theme_sidebar=(Request::has('theme'))?Request::get('theme'):0; // 0,1,2

$dark_global_theme=(Request::has('darktheme'))?true:false;; // true false
?>
<!-- Left Sidenav -->
<div class="left-sidenav">
    <!-- LOGO -->
    <div class="brand">
        <a href="index.html" class="logo">
            <span>
                <img src="logo/logo.png" alt="logo-small" style="height: 50px;margin-top: 8px;" class="logo-sm">
            </span>
            <span>
                <img src="logo/logo.png" alt="logo-large" class="logo-lg logo-light">                
            </span>
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <ul class="metismenu left-sidenav-menu">            
            <li>
                <a href="javascript: void(0);" onclick="menuaction('dashboard')"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Dashboard</span></a>                
            </li>

            <li>
                <a href="javascript: void(0);" onclick="menuaction('products')"><i data-feather="grid" class="align-self-center menu-icon"></i><span>Products</span></a>                
            </li>

            <li>
                <a href="javascript: void(0);" onclick="menuaction('stores')"><i data-feather="lock" class="align-self-center menu-icon"></i><span>Stores</span></a>
                
            </li> 

            <hr class="hr-dashed hr-menu" >
            <li class="menu-label my-2">Components & Uses</li>

            <li>
                <a href="javascript: void(0);" onclick="menuaction('help')"><i data-feather="box" class="align-self-center menu-icon"></i><span>Help</span></a>
            </li>
        </ul>

        <!-- google ads -->
        <!-- <div class="update-msg text-center">
            <a href="javascript: void(0);" class="float-right close-btn text-muted" data-dismiss="update-msg" aria-label="Close" aria-hidden="true">
                <i class="mdi mdi-close"></i>
            </a>
            <h5 class="mt-3">Mannat Themes</h5>
            <p class="mb-3">We Design and Develop Clean and High Quality Web Applications</p>
            <a href="javascript: void(0);" class="btn btn-outline-warning btn-sm">Upgrade your plan</a>
        </div> -->
    </div>
</div>
<!-- end left-sidenav-->

<script type="text/javascript">

function menuaction(pageurl,data){
    
    url = "user/"+pageurl;
    ajaxcall(url,data,'GET','appcontent');   
}

function ajaxcall(pageurl,data,type,responsediv,callback){
    
    
    $.ajax({
        type: type,
        url: pageurl,
        data: data,        
        success: function(res) {              
            $('#'+responsediv).html(res);            
            callback(res);
        }
        
        
    });



}

function notify(title,msg)
{

  var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            width: 250,
            timerProgressBar: true,
            onOpen: function(toast) {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          });

    if(title=='success')
    {
      Toast.fire({
        icon: 'success',
        title: msg
      })
    }
    if(title=='error')
    {
      Toast.fire({
        icon: 'error',
        title: msg
      })
    }
    if(title=='notification')
    {
      Toast.fire({
        icon: 'info',
        title: msg
      })

    }
    if(title=='warning')
    {
      Toast.fire({
        icon: 'warning',
        title: msg
      })

    }
}



</script>
