<?php
$categories = App\Models\Product::make()->getselecttype('category');
?>
<div class="container-fluid">
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title">Dashboard</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">OnlineStore</a></li>
                        <li class="breadcrumb-item active">{{Auth::user()->name}}</li>                        
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
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">                      
                        <h4 class="card-title">Category Wise Products</h4>                      
                    </div><!--end col-->                    
                </div>  <!--end row-->                                  
            </div><!--end card-header-->
            <div class="card-body" id="categorychart"> 
            </div><!--end card-body--> 
        </div><!--end card-->          
    </div><!-- end col-->     
</div>

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">                      
                        <h4 class="card-title">Recent Products</h4>                      
                    </div><!--end col-->                                        
                </div>  <!--end row-->                                  
            </div><!--end card-header-->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-top-0">Product</th>
                                <th class="border-top-0">Category</th>
                                <th class="border-top-0">Price</th>
                                <th class="border-top-0">Quantity</th>                                
                                <th class="border-top-0">View</th>
                            </tr><!--end tr-->
                        </thead>
                        <tbody>
                            @foreach($latestproducts as $product)
                            <tr>                                                        
                                <td>
                                    <div class="media">
                                        <img src="{{url('/')}}/storage/images/{{$product->image}}" width="35" height="30" class="mr-3 align-self-center rounded" alt="...">
                                        <div class="media-body align-self-center"> 
                                            <h6 class="m-0">{{$product->name}}</h6>
                                            <a href="#" class="font-12 text-primary">ID: {{$product->id}}</a>                                                                                           
                                        </div><!--end media body-->
                                    </div>
                                </td>
                                <td><span class="badge badge-soft-primary">{{$product->getselecttype('category')[$product->category]}}</span></td>
                                <td>Rs. {{$product->price}}</td>                                   
                                <td>{{$product->quantity}}</td>
                                <td>                                                       
                                    <a href="#" class="mr-2"><i class="las la-pen text-info font-18"></i></a>
                                    <a href="#"><i class="las la-trash-alt text-danger font-18"></i></a>
                                </td>
                            </tr>
                            @endforeach            
                        </tbody>
                    </table> <!--end table-->                                               
                </div><!--end /div-->
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div> <!--end col-->   
    <div class="col-4 ">
        <div class="card report-card">
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <p class="text-dark mb-0 font-weight-semibold">Stores</p>
                        <h3 class="m-0">{{$totalstore}}</h3>                        
                    </div>
                    <div class="col-auto align-self-center">
                        <div class="report-main-icon bg-light-alt">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-self-center text-muted icon-sm"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>  
                        </div>
                    </div>
                </div>
            </div><!--end card-body--> 
        </div><!--end card--> 
         <div class="card report-card">
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <p class="text-dark mb-0 font-weight-semibold">Products</p>
                        <h3 class="m-0">{{$totalproduct}}</h3>                        
                    </div>
                    <div class="col-auto align-self-center">
                        <div class="report-main-icon bg-light-alt">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-self-center text-muted icon-sm"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>  
                        </div>
                    </div>
                </div>
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div>                                                
</div>


</div><!-- container -->

<script type="text/javascript">
    
var category_product_chart = JSON.parse(atob('{{base64_encode(json_encode($category_product_chart))}}'));
showCategoryChart(category_product_chart.category,category_product_chart.productcount)
function showCategoryChart(productcategory,productcount)
{
    var options = {
          series: [{
          name: 'Products',
          data: productcount,
        }],
          chart: {
          height: 350,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            borderRadius: 10,
            columnWidth: '20%',
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          }
        },
        dataLabels: {
          enabled: true,
          formatter: function (val) {
            return val + "";
          },
          offsetY: -20,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
        },
        
        xaxis: {
          categories: productcategory,
          position: 'bottom',
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          crosshairs: {
            fill: {
              type: 'gradient',
              gradient: {
                colorFrom: '#D8E3F0',
                colorTo: '#BED1E6',
                stops: [0, 100],
                opacityFrom: 0.4,
                opacityTo: 0.5,
              }
            }
          },
          tooltip: {
            enabled: true,
          }
        },
        yaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false,
            formatter: function (val) {
              return val;
            }
          }
        
        },
        title: {
          text: 'Category wise Products',
          floating: true,
          offsetY: 330,
          align: 'center',
          style: {
            color: '#444'
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#categorychart"), options);
        chart.render();
}


</script>