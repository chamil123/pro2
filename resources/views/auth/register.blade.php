@extends('Admin.layout')

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
    <form  method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Horizontal Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Member Image</label>

                            <div class="col-sm-8">
                                <input type="hidden" class="form-control" id="user_id" name="user_id"  value="{{ Auth::user()->id }}" >
                                <img src="{{asset('storage/images/'.Auth::user()->image)}}" alt="awaweaaw" width="110px">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">NIC </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputPassword3"  value=" {{ Auth::user()->user_nic }} " placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Member name </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value=" {{ Auth::user()->name }} " id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Mobile Number </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value=" {{ Auth::user()->user_contact_1 }} " id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Address </label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" rows="5" placeholder="Enter user address"></textarea>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Purchasing Value </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Partner details</h3>
                    </div>

                    <div class="box-body">
                        <div class="form-group{{ $errors->has('nic_dummey') ? ' has-error' : '' }}">
                            <label for="exampleInputEmail1">Tracking Center</label>
                            <select class="form-control" id="sel1" name="nic_dummey"  required autofocus>
                                @foreach($dummeys as $dummey)
                                <option value="{{$dummey->id}}">{{$dummey->dummey_name}}</option>
                                @endforeach

                            </select>
                            @if ($errors->has('nic_dummey'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nic_dummey') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('side') ? ' has-error' : '' }}">
                            <label for="exampleInputEmail1">Side</label>
                            <select class="form-control" id="sel1" name="side" value="{{ old('side') }}"  required autofocus>




                                @foreach($sides as $side)
                            
                                @if($side->side=='Left')
                                <option> Right</option>
                                @elseif($side->side=='Right')
                                <option> Left</option>
                                @endif
                                @endforeach
                                @if($sides=='[]')
                                <option>Left</option>
                                <option>Right</option>
                                @endif


                                <!--                                <option>Left</option>
                                                                <option>Right</option>-->
                            </select>
                            @if ($errors->has('side'))
                            <span class="help-block">
                                <strong>{{ $errors->first('side') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('user_nic') ? ' has-error' : '' }}">
                            <label for="exampleInputEmail1">Partner NIC</label>
                            <input type="text" class="form-control" id="user_nic" name="user_nic" placeholder="Enter NIC number"  value="{{ old('user_nic') }}" required autofocus>
                            @if ($errors->has('user_nic'))
                            <span class="help-block">
                                <strong>{{ $errors->first('user_nic') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('user_contact_1') ? ' has-error' : '' }}">
                            <label for="user_contact_1">Mobile Number</label>
                            <input type="text" class="form-control" id="user_contact_1" name="user_contact_1" placeholder="Enter Address"  value="{{ old('user_contact_1') }}" required autofocus>
                            @if ($errors->has('user_contact_1'))
                            <span class="help-block">
                                <strong>{{ $errors->first('user_contact_1') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Address"  value="{{ old('password') }}" required autofocus>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" placeholder="Enter Address"  name="password_confirmation" required>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <button type="submit" class="btn btn-success">Add Member</button>
        <button type="reset" name="reset" class="btn btn-danger">
            <i class="glyphicon glyphicon-trash"></i>
            Clear</button>
    </form> 
    <!-- /.row -->
</section>

@endsection
