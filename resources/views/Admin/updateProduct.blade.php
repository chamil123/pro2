@extends('Admin.layout')

@section('title','Member')

@section('body')
<section class="content-header">
    <h1>
        Member
        <small>Add member</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content">
    <form  method="post" action="/product/{{$products->id}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Basic details</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group" {{ $errors->has('product_name') ? ' has-error' : '' }}>
                            <label for="exampleInputEmail1">Product name</label>
                            <input type="text" class="form-control" id="product_name" value="{{$products->product_name}}" name="product_name" placeholder="Enter Product Name">
                            @if ($errors->has('product_name'))
                            <span class="help-block">
                                <strong style="color: #ff0000">{{ $errors->first('product_name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group" {{ $errors->has('product_description') ? ' has-error' : '' }}>
                            <label for="exampleInputEmail1">Product Description</label>
                            <textarea class="form-control" id="product_description" rows="4" name="product_description" placeholder="Enter Product Description">{{$products->product_description}}</textarea>
                            @if ($errors->has('product_description'))
                            <span class="help-block">
                                <strong style="color: #ff0000">{{ $errors->first('product_description') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group" {{ $errors->has('product_price') ? ' has-error' : '' }}>
                            <label for="exampleInputEmail1">Product Price</label>
                            <input type="text" class="form-control" id="product_price" value="{{$products->product_price}}" name="product_price" placeholder="Enter Prodcut Price">
                            @if ($errors->has('product_price'))
                            <span class="help-block">
                                <strong style="color: #ff0000">{{ $errors->first('product_price') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group" {{ $errors->has('cat_id') ? ' has-error' : '' }}>
                            <label for="exampleInputEmail1">Product Category </label>
                            <select class="form-control" id="cat_id" name="cat_id">

                                <option>Select Product Category</option>
                                @foreach($categorys as $category)
                                @if($products->cat_id==$category->id)
                                <option selected value="{{$category->id}}">{{$category->cat_name}}</option>
                                @endif
                                @endforeach
                            </select>
                            @if ($errors->has('cat_id'))
                            <span class="help-block">
                                <strong style="color: #ff0000">{{ $errors->first('cat_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Other details</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group"  {{ $errors->has('product_pv_value') ? ' has-error' : '' }}>
                            <label for="exampleInputEmail1">PV Value</label>
                            <input type="number" class="form-control" id="product_pv_value" value="{{$products->product_pv_value}}" name="product_pv_value" placeholder="Enter PV Value">
                            @if ($errors->has('product_pv_value'))
                            <span class="help-block">
                                <strong style="color: #ff0000">{{ $errors->first('product_pv_value') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group" {{ $errors->has('product_image') ? ' has-error' : '' }}>
                            <label for="exampleInputEmail1">Product Image</label>
                            <input type="file"  id="product_image" value="{{asset('storage/images/'.$products->product_image)}}" name="product_image" >
                            <img src="{{asset('storage/images/'.$products->product_image)}}" width="230px">
                            @if ($errors->has('product_image'))
                            <span class="help-block">
                                <strong style="color: #ff0000">{{ $errors->first('product_image') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-warning">Update Product</button>
        <button type="reset" name="reset" class="btn btn-danger">
            <i class="glyphicon glyphicon-trash"></i>
            Clear</button>
    </form>
</section>


@endsection