@extends('Admin.layout')

@section('title','Member')

@section('body')
<section class="content-header">
    <h1>
        Member
        <small>Member profile</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Personal details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="/member">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Member name</label>
                            <input type="text" class="form-control" id="member_name" value="{{$members->member_name}}" name="member_name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Member NIC</label>
                            <input type="text" class="form-control" id="member_nic" value="{{$members->member_nic}}"  name="member_nic" placeholder="Enter NIC number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Member Address</label>
                            <textarea id="member_address" class="form-control" rows="3" >{{$members->member_address}}</textarea>
                            <!--<input type="text" class="form-control" id="member_address" name="member_address" placeholder="Enter Address">-->
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="exampleInputEmail1">Member Gender</label>
                            </div>
                            <div>
                                <label class="radio-inline">
                                    <input type="radio"   name="member_gender" id="member_gender" value="male">male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="member_gender" id="member_gender" value="female">female
                                </label>
                                <span id="genderInfo"  class="col-sm-12" style="padding-left: 30px;color: #ff0033" ></span>                 
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="exampleInputEmail1">Date Of Birth</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="member_dob"  value="{{$members->member_dob}}" class="form-control pull-right" id="datepicker">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Number 1</label>
                            <input type="text" class="form-control" id="member_contact_1" name="member_contact_1" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Number 2</label>
                            <input type="text" class="form-control" id="member_contact_2" name="member_contact_2" placeholder="Enter Address">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Bank Details </h3>
                </div>

                <form role="form" method="post" action="/member">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bank name</label>
                            <input type="text" class="form-control" id="member_name" value="{{$members->member_name}}" name="member_name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Branch</label>
                            <input type="text" class="form-control" id="member_nic" value="{{$members->member_nic}}"  name="member_nic" placeholder="Enter NIC number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Account number</label>
                            <input type="text" class="form-control" id="member_nic" value="{{$members->member_nic}}"  name="member_nic" placeholder="Enter NIC number">
                        </div>
                    </div>
                </form>
            </div>
        </div>
              <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Beneficiary Details </h3>
                </div>

                <form role="form" method="post" action="/member">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bank name</label>
                            <input type="text" class="form-control" id="member_name" value="{{$members->member_name}}" name="member_name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Branch</label>
                            <input type="text" class="form-control" id="member_nic" value="{{$members->member_nic}}"  name="member_nic" placeholder="Enter NIC number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Account number</label>
                            <input type="text" class="form-control" id="member_nic" value="{{$members->member_nic}}"  name="member_nic" placeholder="Enter NIC number">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--/.col (right) -->
    </div>
    <button type="submit" class="btn btn-warning">Save changes</button>
        <button type="reset" name="reset" class="btn btn-danger">
            <i class="glyphicon glyphicon-trash"></i>
            Clear</button>
    <!-- /.row -->
</section>


@endsection