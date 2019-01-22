@extends('Web.layout')

@section('body')
<script src="http://localhost:8000/bower_components/jquery/dist/jQuery-2.1.4.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<script>
    $(document).ready(function () {
        $("#cartMsg").hide();
                @foreach($carts as $cart)
                $('#upCart{{$cart->id}}').on('change keyup', function () {
            var newQty = $('#upCart{{$cart->id}}').val();
            var rowID = $('#rowID{{$cart->id}}').val();
//       alert(rowId);
            $.ajax({
            url: '{{url(' / cart / update')}}',
                    data: 'rowID=' + rowID + '&newQty=' + newQty,
                    type: 'get',
                    success: function (response) {
                    $("#cartMsg").show();
                    // console.log(response);
                    $("#cartMsg").html(response);
                    }
        });
        // alert(newQty);
    });
            @endforeach
    });</script>

<style>

    .dropdown-menu {
        width: 300px !important;
        height: 400px !important;
    }
</style>
<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="shop-grid-left-sidebar.html">shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">cart</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- page main wrapper start -->
<main>
    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper pt-100 pb-100 pt-sm-58 pb-sm-58">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Cart Table Area -->
                    <div class="cart-table table-responsive">
                        <!--@if(isset($msg))-->

                        <!--@endif-->
                        <div id="cartMsg" class="alert alert-success" ></div>
                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Thumbnail</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-price">PV value</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($carts as $cart)
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="{{asset('storage/images/'.$cart->options->img)}}"alt="Product"/></a></td>

                                    <td class="pro-title"><a href="#"></a>{{$cart->name}}</td>
                                    <td class="pro-price"><span>Rs {{$cart->price}}</span></td>
                                    <td class="pro-price"><span> {{$cart->options->pv*$cart->qty}}</span> <button  class="btn btn-dark btn-sm"  data-toggle="modal" data-target="#exampleModal">advance</button></td>
                                    <td class="pro-quantity" >
                                        <input type="hidden" value="{{$cart->rowId}}" id="rowID{{$cart->id}}">
                                        <!--<div class="row">-->
                                        <div class="pro-price">
                                            <input class="form-controll" style="padding-left: 15px;width: 55px"type="number" id="upCart{{$cart->id}}" value="{{$cart->qty}}">
                                        </div>
                                    </td>
                                    <td class="pro-subtotal"><span>Rs {{$cart->price*$cart->qty}}</span></td>
                                    <td class="pro-remove"><a href="{{url('cart/remove')}}/{{$cart->rowId}}"><i class="fas fa-trash-alt"></i></a></td>
                                </tr> 
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    @if(Cart::count()!="0")
                    @else
                    <div><h4>Cart is empty</h4></div>
                    @endif
                    <!-- Cart Update Option -->
                    <!-- <div class="cart-update-option d-block d-md-flex justify-content-between">
                        <div class="apply-coupon-wrapper">
                            <form action="#" method="post" class=" d-block d-md-flex">
                                <input type="text" placeholder="Enter Your Coupon Code" required />
                                <button class="sqr-btn">Apply Coupon</button>
                            </form>
                        </div>
                        <div class="cart-update mt-sm-16">
                            <a href="#" class="sqr-btn">Update Cart</a>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 ml-auto">
                    <!-- Cart Calculation Area -->
                    <div class="cart-calculator-wrapper">
                        <div class="cart-calculate-items">
                            <h3>Cart Totals</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Sub Total</td>
                                        <td>Rs {{Cart::subtotal()}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td>Rs0</td>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <td class="total-amount">Rs {{Cart::subtotal()}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <a href="checkout" class="sqr-btn d-block">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- cart main wrapper end -->
</main>

<!-- Button trigger modal -->

<div class="modal fade"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width: 100%" role="document" >
        <div class="modal-content" style="border-radius: 4px;" >

            <div class="modal-body" style="padding-top: 10px">
                <div class="row" style="margin-top: 20px">

                    <div class="col-md-12">

                        <div class="box box-primary">
                            <div class="box-body">
                                <form class="form-inline" id="addform">
                                    {{csrf_field()}}

                                    <div class="form-group " >
                                        <label for="staticEmail2" style="width: 300px" class="sr-only">Email</label>
                                        <select class="form-control-sm form-control" style="width: 300px" id="dummey_id" name="dummey_id">
                                            <option  >Select dummry </option>
                                            <option value="1" >876073829_A</option>
                                            <option value="2" >876073829_B</option>

                                        </select>
                                    </div>
                                    <div class="form-group mx-sm-3 ">
                                        <label for="inputPassword2" class="sr-only">Password</label>
                                        <input type="text" class="form-control " id="pv_value" name="pv_value" placeholder="pv value">
                                    </div>
                                    <button type="submit" class="btn btn-primary "  ><i class="fas fa-plus-circle"></i> Add </button>
                                </form>
                                <div id="controlid">

                                </div>

                            </div>
                        </div>
                    </div>
                </div> 

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script >
//    $('#read-data').on('click',function (){
//       alert("sdsdsds"); 
//    });

    $(document).ready(function () {
        $('#addform').on('submit', function (e) {
//    function abc() {
//        $('#addform').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "/dummey_pv", //this is your uri
                type: 'POST', //this is your method
                data: $('#addform').serialize(),
                success: function (data) {
                    console.log(data)
                    alert("sdsd");
//          
                }
            });
            loadData();
        });   
    });
    function loadData(){
        alert("asa");
                    $.ajax({
                url: "{{url('viewdummey_pv')}}", //this is your uri
                type: 'get', //this is your method
                success: function (data) {

                    var table = '<div class="row">'
                    table = '<div class="col-md-12">'
                    table = ' <div class="box">'

                    table = '<div class="box-body">';
                    table = '<table class="table  table-dark " style="width:100%">';
                    table += '<thead style="width:100%">'

                    table += '<tr>'
                    table += '<td>Dummey Id</td>'
                    table += '<td>Pv value</td>'
                    table += '<td>Action</td>'
                    table += '</tr>'
                    table += '</thead>'
                    table += '<tbody>'
                    for (var i in data) {

                        dummey_id = data[i].dummey_id;
                        pv_value = data[i].pv_value;
                        table += '<tr>'
                        table += '<td>'
                        table += dummey_id;
                        table += '</td>'
                        table += '<td>'
                        table += pv_value;
                        table += '</td>'

                        table += '<td>'
                        table += '<button onclick="loadData();" type="button" class="btn btn-danger btn-sm "> <i class="fas fa-trash-alt"></i> Delete</button>';
                        table += '</td>'

                        table += '</tr>'
                    }
                    table += '</tbody>'
                    table += '</div>';
                    table += '</div>';
                    table += '</div>';
                    table += '</div>';

                    $('#controlid').html(table);
                }



            });
    }

</script>
@endsection
