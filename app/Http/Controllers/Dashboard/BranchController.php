<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Member;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::with('member')->get();
        return view('dashboard.branch.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $managers = Member::with('user')->where('is_leader', '!=', null)->get();
        return view('dashboard.branch.create', compact('managers'));
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
            'manager'           => 'bail|required',
        ], [], [
            'name'              => ' Name',
            'manager'           => ' Manager',
        ]);


        $branch = new Branch();
        $branch->name = \request('name');
        $branch->manager_id = \request('manager');
        $branch->save();

        return redirect(adminUrl('/branch'))->with('create', 'Branch Has Been Created Successfully');

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
        $branch = Branch::find($id);
        $managers = Member::with('user')->where('is_leader', '!=', null)->get();
        return view('dashboard.branch.edit', compact('managers', 'branch'));
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
        $branch = Branch::find($id);
        $request->validate([
            'name'              => 'bail|required|max:200',
            'manager'           => 'bail|required',
        ], [], [
            'name'              => ' Name',
            'manager'           => ' Manager',
        ]);


        $branch->name = \request('name');
        $branch->manager_id = \request('manager');
        $branch->save();

        return redirect(adminUrl('/branch'))->with('update', 'Branch Has Been Updated Successfully');
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
