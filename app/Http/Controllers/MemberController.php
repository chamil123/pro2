<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\member;
use App\partner;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members=member::all();
        //return view('Admin.registerPartner');
        return view('Admin.viewmembers',compact('members'));
    }
     public function viewMembers()
    {
        $members=member::all();
       
        return view('Admin.viewmembers',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('Admin.addmember');
        $member=member::find(1);

        return view('Admin.registerPartner',compact('member'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member=new member;
        $member->member_name=$request->member_name;
        $member->member_nic=$request->member_nic;
        $member->member_contact_1=$request->member_contact_1;
        $member->password=base64_encode('123');
        $member->image="uploads/2.png";
        $member->save();
        $last_id=$member->id;
        
        $partner=new partner;
        $partner->nic_dummey=$request->nic_dummey;
        $partner->side=$request->side;
        $partner->member_id=1;
        $partner->partner_id=$last_id;
        $partner->save();
        //return $last_id;
       return redirect('partner');

        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
