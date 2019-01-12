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
                                <th>member name</th>
                                <th>NIC numbdr</th>
                                <th>Contact number</th>
                                <th>Address</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($members as $member)
                            <tr>
                                <td> {{$member->member_name}}</td>
                                <td>{{$member->member_nic}}</td>
                                <td>{{$member->member_contact_1}}</td>
                                <td>{{$member->member_address}}</td>
                                <td>{{$member->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>


        </div>


    </div>

</section>


@endsection