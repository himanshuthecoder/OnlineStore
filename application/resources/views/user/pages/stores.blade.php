<?php 
$rstr=Request::get('rstr','a'.Str::random(10));
$storetypes = App\Models\Store::make()->getselecttype('storetype');


?>
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
                        <li class="breadcrumb-item active">{{Auth::user()->name}}</li>
                    </ol>
                </div><!--end col-->
                 <div class="col-auto align-self-center">
                    <a class="btn  btn-sm btn-outline-primary float-right" onclick="_store.showNewStoreForm('{{$rstr}}')" title="New Job"><i id="new_job_btn_animation" class="fas fa-briefcase mr-2"> </i> New</a>
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
                <div class="float-right">                                        
                    <div class="dropdown d-inline-block">
                        <a class="dropdown-toggle arrow-none" id="dLabel1" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="las la-ellipsis-v font-24 text-muted"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel1" style="">
                            <a class="dropdown-item" href="store/{{$store->id}}" target="_blank">View</a>
                            <a class="dropdown-item" href="javascript::void()" onclick="_store.editStore('{{$store->id}}','{{$store->name}}','{{$store->description}}','{{$store->storetype}}','{{$store->address}}','{{$store->contactno}}','{{$store->image}}','{{$rstr}}')">Edit</a> 
                            <a class="dropdown-item" href="#">Share</a> 
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>
                </div>                                        
                <div class="media mb-3">
                    <img src="storage/images/{{$store->image}}" alt="" class="thumb-md rounded-circle">                                      
                    <div class="media-body align-self-center text-truncate ml-3">                                            
                        <h4 class="m-0 font-weight-semibold text-dark font-15">{{$store->name}}</h4>   
                        <p class="text-muted  mb-0 font-13"><span class="text-dark">Store Type : </span>{{$store->getselecttype('storetype')[$store->storetype]}}</p>                                         
                    </div><!--end media-body-->
                </div>   
                <hr class="hr-dashed">
                
                <div class="row">
                    <div class="col">
                        <div>
                            <h5 class="font-16 m-0 font-weight-bold">{{$store->product->count()}}</h5>
                            <p class="mb-0 font-weight-semibold">Total Produts</p>                                        
                        </div>
                    </div><!--end col-->
                    <div class="col-auto align-self-center">
                        <h6 class="font-weight-semibold m-0">Started : <span class="text-muted font-weight-normal"> {{date('d M Y',strtotime($store->created_at))}}</span></h6>
                    </div><!--end col-->
                </div><!--end row-->
                
                <div> 
                    <p class="text-muted mt-2 mb-1">{{$store->description}}
                    </p>
                </div><!--end task-box-->                                                                  
            </div><!--end card-body-->
            <div class="card-footer">
                <div class="row">
                    <div class='col-6'> 
                        <a class="btn btn-block  btn-soft-primary" href="store/{{$store->id}}" target=_blank>View</a>
                    </div>
                    <div class='col-6'>
                        <button class="btn btn-block btn-primary">Dashboard</button>
                    </div>
                </div>
            </div>
        </div><!--end card-->

    </div><!--end col-->    
    @endforeach
</div>

</div><!-- container -->

<div class="modal fade" id="storeconfig_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-cog mr-2"></i>Store <span class="badge badge-primary" id="{{$rstr}}-config_storeid">New<span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="user" id=formId method="post" enctype="multipart/form-data">
      @csrf 
      <input name=action value="savestore" class="d-none"/>
      <input name=storeid value="New" id="{{$rstr}}-form_storeid" class="d-none"/>
      <div class="modal-body">
        
          <div class="row mb-5">
            <div class="col-4 mt-2 mb-2 offset-4">
              <div class="dastone-profile" style="">
                  <div class="dastone-profile-main">
                      <div class="dastone-profile-main-pic ">
                        <img src="/storage/images/placeholder.png" alt="" height="130" width="130"class="rounded-circle" id="{{$rstr}}-photopreview" style="border-radius: 50%;">
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
            <label for="recipient-name" class="col-form-label">Store Name:</label>
            <input type="text" name=storename class="form-control" id="{{$rstr}}-config_storename">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Store type:</label>
            <select type="text" name=storetype class="form-control" id="{{$rstr}}-config_storetype">
                <option value=""></option>
                @foreach($storetypes as $key=>$storetype)
                <option value="{{$key}}">{{$storetype}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Store Descrition:</label>
            <textarea class="form-control" name=storedescription id="{{$rstr}}-config_storedescription"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Store Address:</label>
            <textarea class="form-control" name=storeaddress id="{{$rstr}}-config_storeaddress"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Store Contact NO:</label>
            <input type="number" name=storecontactno class="form-control" id="{{$rstr}}-config_storecontactno"/>
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

var _store = {};

_store.showNewStoreForm = function(rstr)
 {
    $('#'+rstr+'-config_storename').val('');
    $('#'+rstr+'-config_storedescription').val('');
    $('#'+rstr+'-config_storeaddress').val('');
    $('#'+rstr+'-config_storetype').val('');
    $('#'+rstr+'-config_storecontactno').val('');
    $('#'+rstr+'-config_storeid').val('New');
    $('#'+rstr+'-form_storeid').val('new');
    $('#'+rstr+'-photopreview').attr('src','/storage/images/storeplaceholder.png');
    $('#storeconfig_modal').modal('show');
 }   

 _store.editStore = function(id,name,description,storetype,address,contactno,imagename,rstr)
 {
    $('#'+rstr+'-config_storename').val(name);
    $('#'+rstr+'-config_storedescription').val(description);
    $('#'+rstr+'-config_storeaddress').val(address);
    $('#'+rstr+'-config_storetype').val(storetype);
    $('#'+rstr+'-config_storecontactno').val(contactno);
    $('#'+rstr+'-config_storeid').text(id);
    $('#'+rstr+'-form_storeid').val(id);
    $('#'+rstr+'-photopreview').attr('src','/storage/images/'+imagename);
    $('#storeconfig_modal').modal('show');
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
              $('#storeconfig_modal').modal('hide');
              $('#storeconfig_modal').on('hidden.bs.modal',function(e){
                      menuaction('stores');          
              });


            }
            else notify('error',res['msg']);
        },
      processData: false,
      contentType: false
    } );
    e.preventDefault();
  } );

_store.saveStore = function(rstr)
{
    data = {};    
    data['_token']= "{{ csrf_token() }}";
    data['action'] = 'savestore';
    data['storename']        = $('#'+rstr+'-config_storename').val();
    data['storedescription'] = $('#'+rstr+'-config_storedescription').val();
    data['storeaddress']     = $('#'+rstr+'-config_storeaddress').val();
    data['storetype']        = $('#'+rstr+'-config_storetype').val();
    data['storecontactno']   = $('#'+rstr+'-config_storecontactno').val();
    data['storeid']          = $('#'+rstr+'-config_storeid').text();
    data['image']            = {'type':'file','elem':rstr+'-image'};
    
    ajaxcall('user',data,'POST','FakeDiv',function(res){

      if(res['status'] == 'ok')
      {
        notify('success',res['msg']);
        $('#storeconfig_modal').modal('hide');
        $('#storeconfig_modal').on('hidden.bs.modal',function(e){
                menuaction('stores');          
        });


      }
      else notify('error',res['msg']);

   });
}


</script>