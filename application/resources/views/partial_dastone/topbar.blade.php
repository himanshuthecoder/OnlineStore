 <?php
$baseurl=url('/');
//$user=Auth::user();
?>

<!-- Top Bar Start -->
        
   <nav class="navbar navbar-expand-lg navbar-light bg-light" >
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{url('/')}}/logo/logo.png" height="38" alt="" class="mr-1">
            
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link btn-primary btn text-white pt-1 pb-1" href="{{url('/')}}"> Home </a>
                </li>
            </ul><!--end navbar-nav-->
            <form class="form-inline my-2 my-lg-0">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-soft-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form><!--end form-->
        </div><!--end navbar-collapse-->
    </nav>

<!-- Top Bar End -->


<script type="text/javascript">

 var _topbar = {};

 
function toggleTheme(sidebar,theme)
{

    root_url = window.location.href.split('?')[0];
    if(theme=='light'){
        window.location.href=root_url+'?theme='+sidebar;
    }else{
        window.location.href=root_url+'?darktheme&theme='+sidebar;
    }

};


</script>
