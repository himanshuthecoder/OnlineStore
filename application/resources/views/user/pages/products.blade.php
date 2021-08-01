<?php 
$rstr=Request::get('rstr','a'.Str::random(10));
$categories = App\Models\Product::make()->getselecttype('category');
$stores = App\Models\Store::where('user_id',Auth::user()->id)->get();

?>
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Product List</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">StoreName</a></li>                            
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div><!--end col-->
                    <div class="col-auto align-self-center">
                        <a class="btn  btn-sm btn-outline-primary float-right" onclick="_product.showNewProductForm('{{$rstr}}')" title="New Job"><i id="new_job_btn_animation" class="fas fa-briefcase mr-2"> </i> New</a>
                    </div><!--end col-->  
                </div><!--end row-->                                                              
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-md-12 col-sm-12 mb-2">
            <div class="row ml-1">                        
              <div class="input-group col-3  pl-0">
                <span class="input-group-prepend">                              
                    <button class="btn btn-light form-control btn-sm form-control-sm" type="button">Store</button>                        
                </span>
                <select class="form-control form-control-sm" id="approval_status">
                    <option value="active">All</option>
                    <option value="all">Store1</option>
                    <option value="0">Store2</option>                        
                </select>                        
              </div>
              <div class="input-group col-6 ml-0 pl-0">
                <div class="input-group-prepend">                              
                    <select class="form-control form-control-sm bg-light" id="mandate_filtertype" style="border-radius:5px 0px 0px 5px;">
                        <option value="id">ID</option>
                        <option value="designation">Category</option>                        
                        <option value="client">Name</option>
                        
                    </select>                        
                </div>
                <input type="text" class="form-control form-control-sm" id="mandate_filterquery">
                <!--  used when mulitple searching
                <select type="text" class="form-control select2 multiselect createnewtag select2-multiple"  multiple="multiple" id="mandate_filterdata" >  
                </select> -->                         
              </div>
              <div class="col-3">
                <button class="btn btn-outline-primary btn-sm" onclick="_store.applyfilter()"><i class='ti ti-check'></i></button>
                <button class="btn btn-outline-danger btn-sm" onclick="_store.removefilter()"><i class="ti ti-close"></i></button>
              </div>
            </div>
        </div>        
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive ">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Store</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>                        
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>
                            <img src="/storage/images/{{$product->store->image}}" alt="" width="50" height="40">
                            <p class="d-inline-block align-middle mb-0 ml-2">
                                <a href="store/{{$product->store_id}}" class="d-inline-block align-middle mb-0 product-name ">{{$product->store->name}}</a> 
                                <br>
                            </p>
                        </td>
                        <td>
                            <img src="/storage/images/{{$product->image}}" alt="" width=50 height="40">
                            <p class="d-inline-block align-middle mb-0 ml-2">
                                <a href="product/{{$product->id}}" class="d-inline-block align-middle mb-0 product-name">{{$product->name}}</a> 
                                <br>
                                {{-- <span class="text-muted font-13">size-08 (Model 2020)</span>  --}}
                            </p>
                        </td>
                        <td>{{$product->getselecttype('category')[$product->category]}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>                                                
                        <td>                                                       
                            <a href="product/{{$product->id}}"  target="_blank" ><i class="las la-eye mr-1 text-success font-18"></i></a>
                            <a href="javascript::void()"  onclick="_product.editProduct('{{$product->id}}','{{$product->name}}','{{$product->description}}','{{$product->price}}','{{$product->category}}','{{$product->quantity}}','{{$product->store_id}}','{{$product->image}}','{{$rstr}}')" class="mr-2"><i class="las la-pen text-info font-18"></i></a>
                            <a href="javascript::void()" onclick="_product.deleteProduct('{{$product->id}}')"><i class="las la-trash-alt text-danger font-18"></i></a>

                        </td>
                    </tr>                         
                    @endforeach               
                    </tbody>
                </table>        
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</div><!-- container -->

<div class="modal fade" id="productconfig_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-cog mr-2"></i>Product <span class="badge badge-primary" id="{{$rstr}}-configproductid">New<span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="user" id=formId method="post" enctype="multipart/form-data">
      @csrf 
      <input name=action value="saveproduct" class="d-none"/>
      <input name=product_id value="new" id="{{$rstr}}-form_productid" class="d-none"/>
      <div class="modal-body">
            <div class="row mb-5">
            <div class="col-4 mt-2 mb-2 offset-4">
              <div class="dastone-profile" style="">
                  <div class="dastone-profile-main">
                      <div class="dastone-profile-main-pic ">
                        <img src="/storage/images/productplaceholder.png" alt="" height="130" width="130"class="rounded-circle" id="{{$rstr}}-photopreview" style="border-radius: 50%;">
                        <input type="file" name=image class="d-none"  id="{{$rstr}}-image" accept="image/*" onchange="$('#{{$rstr}}-photopreview').attr('src',
                          window.URL.createObjectURL(document.getElementById('{{$rstr}}-image').files[0]) );"  />
                        <span class="dastone-profile_main-pic-change" onclick="$('#{{$rstr}}-image').click();">
                            <i class="fas fa-camera"></i>
                        </span>
                      </div>
                  </div>
              </div>

            </div>

          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Select Store</label>
            <select type="text" name=productstoreid class="form-control" id="{{$rstr}}-configproductstoreid" >
              <option>None</option>
              @foreach($stores as $store)
              <option value="{{$store->id}}" >{{$store->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Product Name:</label>
            <input type="text" name=productname class="form-control" id="{{$rstr}}-configproductname">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Product Category:</label>
            <select type="text" name=productcategory class="form-control" id="{{$rstr}}-configproductcategory">
                <option value=""></option>
                @foreach($categories as $key=>$category)
                <option value="{{$key}}">{{$category}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Product Descrition:</label>
            <textarea class="form-control" name=productdescription id="{{$rstr}}-configproductdescription"></textarea>
          </div>          
          <div class="form-group">
            <label for="message-text" class="col-form-label">Product Price:</label>
            <input type="number" name=productprice class="form-control" id="{{$rstr}}-configproductprice"/>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Product Quantity:</label>
            <input type="number" name=productquantity class="form-control" id="{{$rstr}}-configproductquantity"/>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" >Save</button>
      </div>
    </form>
    </div>
  </div>
</div>

<script type="text/javascript">
    
var _product = {};


_product.showNewProductForm = function(rstr)
 {
    $('#'+rstr+'-configproductname').val('');
    $('#'+rstr+'-configproductdescription').val('');
    $('#'+rstr+'-configproductprice').val('');
    $('#'+rstr+'-configproductcategory').val('');    
    $('#'+rstr+'-configproductquantity').val('');    
    $('#'+rstr+'-configproductstoreid').val('');        
    $('#'+rstr+'-configproductid').val('New');
    $('#'+rstr+'-form_productid').val('new');
    $('#'+rstr+'-photopreview').attr('src','/storage/images/productplaceholder.png');
    $('#productconfig_modal').modal('show');
 }   


_product.editProduct = function(id,name,description,price,category,quantity,storeid,imagename,rstr)
 {
    $('#'+rstr+'-configproductname').val(name);
    $('#'+rstr+'-configproductdescription').val(description);
    $('#'+rstr+'-configproductprice').val(price);
    $('#'+rstr+'-configproductcategory').val(category);    
    $('#'+rstr+'-configproductquantity').val(quantity);    
    $('#'+rstr+'-configproductstoreid').val(storeid); 
    $('#'+rstr+'-configproductid').text(id);
    $('#'+rstr+'-form_productid').val(id);
    $('#'+rstr+'-photopreview').attr('src','/storage/images/'+imagename);
    $('#productconfig_modal').modal('show');
 }

_product.deleteProduct = function(id)
{   data = {};
    data['_token']= "{{ csrf_token() }}";
    data['id'] = id;
    ajaxcall('user/deleteproduct',data,'DELETE','FakeDiv',function(res){
      if(res['status'] == 'ok')
      {
        notify('success',res['msg']);
        menuaction('products');                 
      }
      else notify('error',res['msg']);
    });
}

$( '#formId' )
  .submit( function( e ) {
    $.ajax( {
      url: 'user',
      type: 'POST',
      data: new FormData( this ),
      success: function(res) {                          
         if(res['status'] == 'ok')
          {
            notify('success',res['msg']);
            $('#productconfig_modal').modal('hide');
            $('#productconfig_modal').on('hidden.bs.modal',function(e){
                    menuaction('products');          
            });


          }
          else notify('error',res['msg']);
        },
      processData: false,
      contentType: false
    } );
    e.preventDefault();
  } );

// _product.saveProduct = function(rstr)
// {
//     data = {};    
//     data['_token']= "{{ csrf_token() }}";
//     data['action'] = 'saveproduct';
//     data['productname']        = $('#'+rstr+'-configproductname').val();
//     data['productdescription'] = $('#'+rstr+'-configproductdescription').val();
//     data['productprice']       = $('#'+rstr+'-configproductprice').val();
//     data['productcategory']    = $('#'+rstr+'-configproductcategory').val();    
//     data['productquantity']    = $('#'+rstr+'-configproductquantity').val();    
//     data['productstoreid']     = $('#'+rstr+'-configproductstoreid').val(); 
//     data['product_id']         = $('#'+rstr+'-configproductid').text();
//     //TODO Action
//     ajaxcall('user',data,'POST','FakeDiv',function(res){

//       if(res['status'] == 'ok')
//       {
//         notify('success',res['msg']);
//         $('#productconfig_modal').modal('hide');
//         $('#productconfig_modal').on('hidden.bs.modal',function(e){
//                 menuaction('products');          
//         });


//       }
//       else notify('error',res['msg']);

//    });
// }


</script>