@extends('store.index')

@section('appcontent')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Stores</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">OnlineStore</a></li>
                            <li class="breadcrumb-item active">Stores</li>
                        </ol>
                    </div><!--end col-->                
                </div><!--end row-->                                                              
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- end page title end breadcrumb -->
    <div class="row">
        @foreach($stores as $store)
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="blog-card">
                        <center>
                        <img src="storage/images/{{$store->image}}" style="height: 200px !important;width: 300px !important;" alt="" class="img-fluid rounded">
                        </center>
                        <div class="row my-4">
                            <div class="col">
                                <span class="badge badge-purple px-3 py-2 bg-soft-primary font-weight-semibold ">{{$store->getselecttype('storetype')[$store->storetype]}}</span>   
                            </div>
                            <div class="col-auto align-self-center">
                            
                            <ul class="list-inline mb-0 product-review align-self-center">
                                <li class="list-inline-item"><i class="la la-star text-warning font-16"></i></li>
                                <li class="list-inline-item"><i class="la la-star text-warning font-16 ml-n2"></i></li>
                                <li class="list-inline-item"><i class="la la-star text-warning font-16 ml-n2"></i></li>
                                <li class="list-inline-item"><i class="la la-star text-warning font-16 ml-n2"></i></li>
                                <li class="list-inline-item"><i class="la la-star-half-o text-warning font-16 ml-n2"></i></li>
                            </ul> 
                        </div> 
                        </div>

                        <h4 class="my-3">
                            <a href="" class="">{{$store->name}}</a>
                        </h4>
                        <p class="text-muted">{{$store->description}}</p>
                                                
                        <hr class="hr-dashed">
                        <div class="d-flex justify-content-between">
                            <div class="meta-box">
                                <div class="media">
                                    <img src="dastone/images/users/user-5.jpg" alt="" class="thumb-sm rounded-circle mr-2">                                       
                                    <div class="media-body align-self-center text-truncate">
                                        <h6 class="m-0 text-dark">{{$store->user->name}}</h6>
                                        <ul class="p-0 list-inline mb-0 ">
                                            <li class="list-inline-item text-muted">{{$store->user->email}}</li>
                                            {{-- <li class="list-inline-item">by <a href="">admin</a></li> --}}
                                        </ul>
                                    </div><!--end media-body-->
                                </div>                                            
                            </div><!--end meta-box-->
                            <div class="align-self-center">
                                <a href="store/{{$store->id}}" class=" btn btn-primary">View Store <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>                                        
                    </div><!--end blog-card--> 
                                               
                </div><!--end card-body-->
            </div><!--end card-->
        </div>                     
        @endforeach                                
    </div>  <!--end row-->    

</div><!-- container -->
@endsection