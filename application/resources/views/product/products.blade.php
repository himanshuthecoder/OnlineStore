@extends('product.index')

@section('appcontent')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Products</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">OnlineStore</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div><!--end col-->                    
                </div><!--end row-->                                                              
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- end page title end breadcrumb -->
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">                    
                    <img src="{{url('/')}}/storage/images/{{$product->image}}" alt="" class="d-block mx-auto my-4" height="150" width="250">
                    <div class="row my-4">
                        <div class="col">
                            <span class="badge badge-light mb-2">{{$product->getselecttype('category')[$product->category]}}</span>
                            <a href="{{$product->id}}" class="title-text d-block">{{$product->name}}</a>
                            <a href="{{url('/store')}}/{{$product->store_id}}" class="text-muted d-block">{{$product->store->name}}</a>
                        </div>
                        <div class="col-auto">
                            <h4 class="text-dark mt-0 ">Rs. {{$product->price}}</h4>  
                            <ul class="list-inline mb-0 product-review align-self-center">
                                <li class="list-inline-item"><i class="la la-star text-warning font-16"></i></li>
                                <li class="list-inline-item"><i class="la la-star text-warning font-16 ml-n2"></i></li>
                                <li class="list-inline-item"><i class="la la-star text-warning font-16 ml-n2"></i></li>
                                <li class="list-inline-item"><i class="la la-star text-warning font-16 ml-n2"></i></li>
                                <li class="list-inline-item"><i class="la la-star-half-o text-warning font-16 ml-n2"></i></li>
                            </ul> 
                        </div>      
                    </div> 
                    <a class="btn btn-soft-primary btn-block" href="product/{{$product->id}}">View</a>      
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        @endforeach
    </div>  <!--end row-->   
</div><!-- container -->
@endsection