<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\member;
use App\partner;
use App\Auth;
use App\User;

class MemberController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
       
        $members = User::all();
        //return view('Admin.registerPartner');
        return view('Admin.viewmembers', compact('members'));
        
    }

    public function viewMembers() {
        $members = member::all();

        return view('Admin.viewmembers', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //return view('Admin.addmember');
        $member = member::find(1);

        return view('Admin.registerPartner', compact('member'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $member = new member;
        $member->member_name = $request->member_name;
        $member->member_nic = $request->member_nic;
        $member->member_contact_1 = $request->member_contact_1;
        $member->password = base64_encode('123');
        $member->image = "uploads/2.png";
        $member->save();
        $last_id = $member->id;

        $partner = new partner;
        $partner->nic_dummey = $request->nic_dummey;
        $partner->side = $request->side;
        $partner->member_id = 1;
        $partner->partner_id = $last_id;
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
    public function show($id) {
        $members = member::find($id);
        return view('Admin.memberProfile', compact('members'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $member = member::find($id);
        $member->member_name = $request->member_name;
        $member->member_nic = $request->member_nic;
        $member->member_address = $request->member_address;
        $member->member_dob = $request->member_dob;
        $member->member_contact_1 = $request->member_contact_1;
        $member->member_contact_2 = $request->member_contact_2;
        $member->member_bank_name = $request->member_bank_name;
        $member->member_bank_branch = $request->member_bank_branch;
        $member->member_account_no = $request->member_account_no;
        $member->member_benifit_name = $request->member_benifit_name;
        $member->member_benifit_address = $request->member_benifit_address;
        //$member->member_account_no = $request->member_account_no;

        //

        if ($request->hasFile('image')) {

            $fileName = $request->image->getClientOriginalName();
            $request->image->storeAs('public/images', $fileName);

            $member->image = $fileName;
        } else {
            return 'no file selected';
        }

        $member->save();
        return redirect('member');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function profile() {
        
    }

}
