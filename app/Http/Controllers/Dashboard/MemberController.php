<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Member;
use App\Models\Status;
use App\Models\Team;
use App\Models\Position;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::with('branch', 'position', 'team')->get();
        return view('dashboard.member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();
        $teams = Team::all();
        $positions = Position::all();
        return view('dashboard.member.create', compact('branches', 'teams', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $request->validate([
            'name'              => 'bail|required|max:200',
            'team_id'           => 'bail|nullable|int',
            'position'          => 'bail|required|int',
            'branch'            => 'bail|nullable|int',
            'is_leader'         => 'bail|nullable|int',
        ], [], [
            'name'              => ' Name',
            'team_id'           => ' Team',
            'position'          => ' Position',
            'branch'            => ' branch',
            'is_leader'         => ' is leader',
        ]);

        $member = new Member();
        $member->username = \request('name');
        $member->branch_id = \request('branch');
        $member->team_id = \request('team_id');
        $member->position_id = \request('position');
        $member->is_leader = \request('is_leader');
        $member->save();

        return redirect(adminUrl('/member'))->with('create', 'Member Has Been Created Successfully');

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
        $member = Member::with('branch')->find($id);
        $branches = Branch::all();
        $teams = Team::all();
        $positions = Position::all();
        return view('dashboard.member.edit', compact('branches', 'teams', 'positions', 'member'));
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
        $member = Member::with('branch')->find($id);
        $request->validate([
            'name'              => 'bail|required|max:200',
            'team_id'           => 'bail|nullable|int',
            'position'          => 'bail|required|int',
            'branch'            => 'bail|nullable|int',
            'is_leader'         => 'bail|nullable|int',
        ], [], [
            'name'              => ' Name',
            'team_id'           => ' Team',
            'position'          => ' Position',
            'branch'            => ' branch',
            'is_leader'         => ' is leader',
        ]);

        $member->username = \request('name');
        $member->branch_id = \request('branch');
        $member->team_id = \request('team_id');
        $member->position_id = \request('position');
        $member->is_leader = \request('is_leader');
        $member->save();

        return redirect(adminUrl('/member'))->with('update', 'Member Has Been Updated Successfully');
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
