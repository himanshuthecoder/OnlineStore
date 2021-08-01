@extends('store.index')

@section('appcontent')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Store Detail</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/store')}}">Home</a></li>
                            <li class="breadcrumb-item active">{{$store->name}}</li>
                        </ol>
                    </div><!--end col-->
                    <div class="col-auto align-self-center">                        
                        <a href="#" class="btn btn-sm btn-outline-primary">
                            <i  class="align-self-center fas fa-share mr-1 icon-xs"></i>Share 
                        </a>
                    </div><!--end col-->  
                </div><!--end row-->                                                              
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- end page title end breadcrumb -->    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dastone-profile">
                        <div class="row">
                            <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                <div class="dastone-profile-main">
                                    <div class="dastone-profile-main-pic">
                                        <img src="{{url('/')}}/storage/images/{{$store->image}}" alt="" height="110" width="110" class="rounded-circle">
                                        
                                    </div>
                                    <div class="dastone-profile_user-detail">
                                        <h5 class="dastone-user-name">{{$store->name}}</h5>                                                        
                                        <p class="badge badge-purple px-3 py-2 bg-soft-primary font-weight-semibold">{{$store->getselecttype('storetype')[$store->storetype]}}</p>                                                        
                                    </div>
                                </div>                                                
                            </div><!--end col-->
                            
                            <div class="col-lg-4 ml-auto align-self-center">
                                <ul class="list-unstyled personal-detail mb-0">
                                    <li class=""><i class="las la-phone mr-2 text-secondary font-22 align-middle"></i> <b> phone </b> : {{$store->contactno}}</li>
                                    <li class="mt-2"><i class="las la-envelope text-secondary font-22 align-middle mr-2"></i> <b> Email </b> : {{$store->user->email}}</li>
                                    <li class="mt-2"><i class="las la-globe text-secondary font-22 align-middle mr-2"></i> <b> Address </b> : {{$store->address}}
                                    </li>                                                   
                                </ul>
                               
                            </div><!--end col-->
                            <div class="col-lg-4 align-self-center">
                                <div class="row">
                                    <div class="col-auto text-right border-right">
                                        <button type="button" class="btn btn-soft-primary btn-icon-circle-sm mb-2">
                                            <i class="fas fa-cubes"></i>
                                        </button>
                                        <p class="mb-0 font-weight-semibold">Products</p>
                                        <h4 class="m-0 font-weight-bold">1563 </h4>
                                    </div><!--end col-->
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-soft-info btn-icon-circle-sm mb-2">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <p class="mb-0 font-weight-semibold">Views</p>
                                        <h4 class="m-0 font-weight-bold">58k <span class="text-muted font-12 font-weight-normal">Views</span></h4>
                                    </div><!--end col-->
                                </div><!--end row-->                                               
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end f_profile-->                                                                                
                </div><!--end card-body-->          
            </div> <!--end card-->    
        </div><!--end col-->
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
               <div class="card-body">
                    <i data-feather="truck" class="align-self-center"></i>
                    <h4 class="font-15 text-dark">Fast Delivery</h4>
                    <p class="text-muted mb-0">
                        It is a long established fact that a reader will be distracted.
                        Contrary to popular belief.
                    </p>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-lg-3">
            <div class="card">
               <div class="card-body">
                    <i data-feather="rotate-cw" class="align-self-center"></i>
                    <h4 class="font-15 text-dark">Returns in 30 Days</h4>
                    <p class="text-muted mb-0">
                        It is a long established fact that a reader will be distracted.
                        Contrary to popular belief.
                    </p>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-lg-3">
            <div class="card">
               <div class="card-body">
                    <i data-feather="headphones" class="align-self-center"></i>
                    <h4 class="font-15 text-dark">Online Support 24/7</h4>
                    <p class="text-muted mb-0">
                        It is a long established fact that a reader will be distracted.
                        Contrary to popular belief.
                    </p>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-lg-3">
            <div class="card">
               <div class="card-body">
                    <i data-feather="dollar-sign" class="align-self-center"></i>
                    <h4 class="font-15 text-dark">Secure Payment</h4>
                    <p class="text-muted mb-0">
                        It is a long established fact that a reader will be distracted.
                        Contrary to popular belief.
                    </p>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->                                        
    </div><!--end row-->                    
    
    <div class="row">   
        @foreach($store->product as $product)                     
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">                    
                    <img src="{{url('/')}}/storage/images/{{$product->image}}" alt="" class="d-block mx-auto my-4" height="150">
                    <div class="row my-4">
                        <div class="col">
                            <span class="badge badge-light mb-2">{{$product->getselecttype('category')[$product->category]}}</span>
                            <a href="#" class="title-text d-block">{{$product->name}}</a>
                        </div>
                        <div class="col-auto">
                            <h4 class="text-dark mt-0">Rs. {{$product->price}}</h4>  
                            <ul class="list-inline mb-0 product-review align-self-center">
                                <li class="list-inline-item"><i class="la la-star text-warning font-16"></i></li>
                                <li class="list-inline-item"><i class="la la-star text-warning font-16 ml-n2"></i></li>
                                <li class="list-inline-item"><i class="la la-star text-warning font-16 ml-n2"></i></li>
                                <li class="list-inline-item"><i class="la la-star text-warning font-16 ml-n2"></i></li>
                                <li class="list-inline-item"><i class="la la-star-half-o text-warning font-16 ml-n2"></i></li>
                            </ul> 
                        </div>      
                    </div> 
                    <a class="btn btn-soft-primary btn-block" href="{{url('/')}}/product/{{$product->id}}">View</a>      
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->                 
        @endforeach          
    </div><!--end row-->
</div><!-- container -->
@endsection 
