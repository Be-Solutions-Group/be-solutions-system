<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Member;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::with('member')->get();
        return view('dashboard.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $managers = Member::with('user')->where('is_leader', '!=', null)->get();
        return view('dashboard.team.create', compact('managers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'bail|required|max:200',
            'leader_id'           => 'bail|nullable|int',
        ], [], [
            'name'              => ' Name',
            'leader_id'         => ' Leader',
        ]);


        $team = new Team();
        $team->name = \request('name');
        $team->leader_id = \request('leader_id');
        $team->save();

        return redirect(adminUrl('/team'))->with('create', 'Team Has Been Created Successfully');
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
        $managers = Member::with('user')->where('is_leader', '!=', null)->get();
        $team = Team::find($id);
        return view('dashboard.team.edit', compact('managers', 'team'));
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
        $team = Team::find($id);
        $request->validate([
            'name'              => 'bail|required|max:200',
            'leader_id'           => 'bail|nullable|int',
        ], [], [
            'name'              => ' Name',
            'leader_id'         => ' Leader',
        ]);

        $team->name = \request('name');
        $team->leader_id = \request('leader_id');
        $team->save();

        return redirect(adminUrl('/team'))->with('update', 'Team Has Been Updated Successfully');
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
