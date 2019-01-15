@extends('Web.layout')

@section('body')
<script src="http://localhost:8000/bower_components/jquery/dist/jQuery-2.1.4.min.js"></script>
<script>
    $(document).ready(function () {
        $("#cartMsg").hide();
                @foreach($carts as $cart)
        $('#upCart{{$cart->id}}').on('change keyup', function () {
            var newQty = $('#upCart{{$cart->id}}').val();
            var rowID = $('#rowID{{$cart->id}}').val();
//       alert(rowId);
            $.ajax({
                url: '{{url('/cart/update')}}',
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
    });
</script>
<!-- breadcrumb area start -->
<!--    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
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
    </div>-->
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
                                    <td class="pro-price"><span> {{$cart->options->pv*$cart->qty}}</span></td>
                                    <td class="pro-quantity" >
                                        <input type="hidden" value="{{$cart->rowId}}" id="rowID{{$cart->id}}">
                                        <!--<div class="row">-->
                                        <div class="pro-price">
                                            <input class="form-controll" style="padding-left: 15px;width: 55px"type="number" id="upCart{{$cart->id}}" value="{{$cart->qty}}">
                                        </div>

                                        <!--                                        </div>
                                                                                <div class="row">
                                                                                    <button type="button" style="width: 90px" class="btn btn-success btn-sm ">Update</button>
                                        
                                                                                </div>
                                                                                 <div class="row">
                                                                                    <button type="button" style="width: 90px" class="btn btn-danger btn-sm">Remove</button>
                                        
                                                                                </div>-->

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
                        <a href="checkout.html" class="sqr-btn d-block">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- cart main wrapper end -->
</main>



@endsection