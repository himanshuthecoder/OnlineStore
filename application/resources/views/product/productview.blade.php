<?php
$msg = "Greetings from OnlineStore, I want to order this ";

?>
@extends('product.index')

@section('appcontent')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Product Detail</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/product')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('store').'/'.$product->store_id}}">{{$product->store->name}}</a></li>
                            <li class="breadcrumb-item active">{{$product->name}}</li>
                        </ol>
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
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <img src="{{url('/')}}/storage/images/{{$product->image}}" alt="" class=" mx-auto  d-block" height="300" width="500">                                           
                        </div><!--end col-->
                        <div class="col-lg-6 align-self-center">
                            <div class="single-pro-detail">
                                <p class="mb-1">{{$product->getselecttype('category')[$product->category]}}</p>
                                <div class="custom-border mb-3"></div>
                                <h3 class="pro-title">{{$product->name}}</h3>
                                <p class="text-muted mb-0">{{$product->description}}</p> 
                                <ul class="list-inline mb-2 product-review">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star-half text-warning"></i></li>
                                    <li class="list-inline-item">4.5</li>
                                </ul>
                                <h2 class="pro-price">Rs. {{$product->price}}</h2>                                                 
                                {{-- <h6 class="text-muted font-13">Features :</h6> 
                                <ul class="list-unstyled pro-features border-0">
                                    <li>It is a long established fact that a reader will be distracted.</li>
                                    <li>Contrary to popular belief, Lorem Ipsum is not text. </li>
                                </ul> --}}
                                <div class="quantity mt-3 ">         
                                    <?php
                                        $productlink = url('/product/'.$product->id);
                                        $ordertext = $msg.' '.$productlink;
                                    ?>                           
                                    <a target=_blank href="https://wa.me/91{{$product->store->contactno}}?text={{urlencode($ordertext)}}" class="btn btn-primary btn-sm text-white px-4 d-inline-block"><i class="mdi mdi-cart mr-2"></i>Buy</a>
                                </div>                                             
                            </div>
                        </div><!--end col-->                                            
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->

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
    
    <h3 class="mt-3 mb-3">Similar Products you may like</h3>
    <div class="row">                        
        @foreach($similarproducts as $similarproduct)
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">                    
                    <img src="{{url('/')}}/storage/images/{{$similarproduct->image}}" alt="" class="d-block mx-auto my-4" height="150">
                    <div class="row my-4">
                        <div class="col">
                            <span class="badge badge-light mb-2">{{$similarproduct->getselecttype('category')[$similarproduct->category]}}</span>
                            <a href="#" class="title-text d-block">{{$similarproduct->name}}</a>
                        </div>
                        <div class="col-auto">
                            <h4 class="text-dark mt-0">Rs. {{$similarproduct->price}}</h4>  
                            <ul class="list-inline mb-0 product-review align-self-center">
                                <li class="list-inline-item"><i class="la la-star text-warning font-16"></i></li>
                                <li class="list-inline-item"><i class="la la-star text-warning font-16 ml-n2"></i></li>
                                <li class="list-inline-item"><i class="la la-star text-warning font-16 ml-n2"></i></li>
                                <li class="list-inline-item"><i class="la la-star text-warning font-16 ml-n2"></i></li>
                                <li class="list-inline-item"><i class="la la-star-half-o text-warning font-16 ml-n2"></i></li>
                            </ul> 
                        </div>      
                    </div> 
                    <a class="btn btn-soft-primary btn-block" href="{{$similarproduct->id}}">View</a>      
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        @endforeach                           
    </div><!--end row-->

    <h3 class="mt-3 mb-3">Shop From Trends </h3>
    <div class="row">                        
        @foreach($randomproducts as $randomproduct)
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">                    
                    <img src="{{url('/')}}/storage/images/{{$randomproduct->image}}" alt="" class="d-block mx-auto my-4" height="150">
                    <div class="row my-4">
                        <div class="col">
                            <span class="badge badge-light mb-2">{{$randomproduct->getselecttype('category')[$randomproduct->category]}}</span>
                            <a href="#" class="title-text d-block">{{$randomproduct->name}}</a>
                        </div>
                        <div class="col-auto">
                            <h4 class="text-dark mt-0">Rs. {{$randomproduct->price}}</h4>  
                            <ul class="list-inline mb-0 product-review align-self-center">
                                <li class="list-inline-item"><i class="la la-star text-warning font-16"></i></li>
                                <li class="list-inline-item"><i class="la la-star text-warning font-16 ml-n2"></i></li>
                                <li class="list-inline-item"><i class="la la-star text-warning font-16 ml-n2"></i></li>
                                <li class="list-inline-item"><i class="la la-star text-warning font-16 ml-n2"></i></li>
                                <li class="list-inline-item"><i class="la la-star-half-o text-warning font-16 ml-n2"></i></li>
                            </ul> 
                        </div>      
                    </div> 
                    <a class="btn btn-soft-primary btn-block" href="{{$randomproduct->id}}">View</a>      
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        @endforeach                           
    </div><!--end row-->
    <div class="row mb-3">
        <div class="col-md-6 offset-md-3 col-sm-12 text-center">
            <a href="{{url('/product')}}" class="btn btn-primary  btn-block">Explore More Products</a>
        </div>
    </div>
</div><!-- container -->
@endsection 
