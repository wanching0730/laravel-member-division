<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Division;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::orderBy('name', 'asc')->get();
    
        return view('members.index', ['members' => $members]);
    }

    public function create()
    {
        $member = new Member();
        $divisions = Division::orderBy('name', 'asc')->get();
        // $ids =[];

        // for($i=0; $i<sizeof($divisions); $i++) {
        //     array_push($names, $divisions[$i]['name']);
        // }

        return view('members.create', ['member' => $member, 'divisions' => $divisions]);
    }

    public function store(Request $request)
    {
        if(Auth::check()) {

            $this->validate($request, [
                'membership_no' => 'required|numeric|digits:10',
                'nric' => 'required',
                'name' => 'required',
                'gender' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $member = new Member;
            $member->fill($request->all());
            $member->save();
            
            return redirect()->route('member.index')
                    ->with('success', 'Member was added successfully');
        }

        return redirect()->route('member.index')->with('error', 'Error in adding new member');
    }

    public function show($id)
    {
        $member = Member::find($id);
        if(!$member)
            throw new ModelNotFoundException;

        return view('members.show', ['member' => $member]);     
    }

    public function edit($id)
    {
        $member = Member::find($id);
        $divisions = Division::orderBy('name', 'asc')->get();
        $division_name = Division::find($member->division_id)->name;
        
        if(!$member)
            throw new ModelNotFoundException;

        return view('members.edit', ['member' => $member, 'divisions' => $divisions, 'division_name' => $division_name]);
    }

    public function update(Request $request, $id)
    {
        $member = Member::find($id);
        if(!$member)
            throw new ModelNotFoundException;

        $member->fill($request->all());
        $member->save();

        return redirect()->route('member.index');
    }

    public function destroy($memberId) 
    {
        $findMember = Member::find($memberId);
        if($findMember->delete()) {
            return redirect()->route('member.index')
            ->with('success', 'Member was deleted successfully');
        }
    }


    public function image($id){
        $member = Member::find($id);

        $pic = Image::make($member->image);
        $response = Response::make($pic->encode('jpeg'));
        $response->header('Content-Type','image/jpeg');

        return $response;

    }

    public function addMemberToGroup($group_id) {
        $group = App\Member::find($group_id);
        $group->members()->attach($member_id);
    }

    public function detachOneMember($member_id) {
        $group->members()->detach($member_id);
    }

    public function detachAllMembers() {
        $group->members()->detach();
    }

}
