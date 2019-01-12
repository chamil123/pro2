@extends('Admin.layout')
@section('title','Member')
@section('body')
<section class="content-header">
    <h1>
        Member
        <small>Add member</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>image</th>
                                <th style="width: 200px">Product Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>PV value</th>
                                <th>Category</th>
                                <th style="width: 230px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td> <img src="{{asset('storage/images/'.$product->product_image)}}" width="90px"></td>
                                <td> {{$product->product_name}}</td>
                                <td>{{$product->product_description}}</td>
                                <td>{{$product->product_price}}</td>
                                <td>{{$product->product_pv_value}}</td>
                                <td>{{$product->cat_id}}</td>
                                <td style="width: 230px">
                                    <button id="viewbtn" onclick="abc({{$product->id}});"type="button" class="  btn btn-default btn-sm " >
                                        <i class="glyphicon glyphicon-edit"></i> view</button>

                                    <a href="{{'/product/'.$product->id.'/edit'}}"  style="color: white">  <button type="button" class="btn btn-warning btn-sm ">
                                            <i class="glyphicon glyphicon-edit"></i> update</button>
                                    </a>
                                    <a href=""  style="color: white">  <button type="button" class="btn btn-danger btn-sm ">
                                            <i class="glyphicon glyphicon-trash"></i> delete </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</section>



<!-- Button trigger modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document" style="width: 57%">
        <div class="modal-content" style="border-radius: 4px;" >
            <!--            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal titlessss</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>-->
            <div class="modal-body" style="padding-top: 10px">
                <div class="row" style="margin-top: 20px">
                    <div class="col-md-5" >
                        <img id="myimg" class="img-thumbnail" src="" width="290px">
                    </div>
                    <div class="col-md-7">


                        <form action="/action_page.php">
                            <div class="form-group">
                                <label style="font-size: 19px;font-weight: bold" id="product_title"></label> 
                            </div>
                            <div class="form-group">
                                <label id="product_PV" style="font-size: 15px;color: #22dd77"></label>
                            </div>
                            <div class="form-group">
                                <label id="product_price" style="font-size: 20px;"></label>
                            </div>
                            <div class="form-group">
                                <label id="product_dis" style="font-weight: normal" for="pwd"></label>
                            </div>
                        </form>
                    </div>
                </div> 
                <!--{{asset('storage/images/'.$product->product_image)}}-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')
<script type="text/javascript">
//    $('#read-data').on('click',function (){
//       alert("sdsdsds"); 
//    });

//    $(document).ready(function () {
//        $(document).on('click', '#viewbtn', function () {
    function abc(id) {
    $.ajax({
    url: "{{url('product')}}" + "/" + id, //this is your uri
            type: 'get', //this is your method

            //dataType: 'JSON',
            success: function (data) {
            var img = data.product_image;
            $('#exampleModal').modal("show");
            $('#product_title').html(data.product_name);
            $('#product_dis').html(data.product_description);
            $('#product_price').html("Rs " + data.product_price + ".00");
            $('#product_PV').html("PV value : " + data.product_price );
            $("#myimg").attr('src', "{{asset('storage/images/')}}/" + img); 
            }
    });
//            $.get("{{URL::to('/product')}}",function (data){
//               alert(data);
//            });
//            
//            
//            $('#exampleModal').modal('show');
    //alert("sdsdsds"); 

//            $.ajax({
//                url: "fetch.php",
//                method: "POST",
//                //data:{id:id}
//                dataType: 'json',
//                success: function (data, textStatus, jqXHR) {
//
//                }
//            });
//        });
//
//    });
    }
</script>
@endsection




