<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Project;
use App\Models\ProjectTimeline;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectTimeLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $authUser = Auth::user();
        $member = Member::where('user_id', '=', $authUser->id)->first();

        //Return Designer Edit Page
        if ($member->position_id == 6)
        {
            $project = Project::find($id);
            $designers = Member::with('position')->whereIn('position_id', [6, 19])->get();
            $developers = Member::with('position')->whereIn('position_id', [5, 7, 8, 9, 10, 11])->get();
            $lastProjectDesign = ProjectTimeline::with('designerMember')->orderBy('design_finish', 'desc')->first();
            $status = Status::all();
            return view('dashboard.projectTimeline.designerEdit', compact('project', 'designers', 'developers', 'status', 'lastProjectDesign'));
        }

        //Return Developer Edit Page
        if ($member->position_id == 9 || $member->position_id == 5)
        {
            $project = Project::find($id);
            $designers = Member::with('position')->whereIn('position_id', [6, 19])->get();
            $developers = Member::with('position')->whereIn('position_id', [5, 7, 8, 9, 10, 11])->get();
            $status = Status::all();
            $lastProjectDevelopment = ProjectTimeline::with('developerMember')->orderBy('development_finish', 'desc')->first();
            return view('dashboard.projectTimeline.developerEdit', compact('project', 'designers', 'developers', 'status', 'lastProjectDevelopment'));
        }

    }

    public function developerEdit($id)
    {
        $designers = Member::with('position')->whereIn('position_id', [6, 19])->get();
        $developers = Member::with('position')->whereIn('position_id', [5, 7, 8, 9, 10, 11])->get();
        $project = Project::with('projectTimeline')->find($id);
        $status = Status::all();
        return view('dashboard.projectTimeline.developerEdit', compact('project', 'designers', 'developers', 'status'));
    }

    public function designerEdit($id)
    {
        $designers = Member::with('position')->whereIn('position_id', [6, 19])->get();
        $developers = Member::with('position')->whereIn('position_id', [5, 7, 8, 9, 10, 11])->get();
        $project = Project::with('projectTimeline')->find($id);
        $status = Status::all();
        return view('dashboard.projectTimeline.designerEdit', compact('project', 'designers', 'developers', 'status'));
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
        //return $request->all();
        $input = $request->all();
        $projectTimeline = ProjectTimeline::with('project')->find($id);
        if (isset($input['design_start']))
        {
            $projectTimeline->design_start = $input['design_start'];
        }
        if (isset($input['design_finish']))
        {
            $projectTimeline->design_finish = $input['design_finish'];
        }
        if (isset($input['design_approved']))
        {
            $projectTimeline->design_approved = $input['design_approved'];
        }
        if (isset($input['dev_start']))
        {
            $projectTimeline->development_start = $input['dev_start'];
        }
        if (isset($input['dev_end']))
        {
            $projectTimeline->development_finish = $input['dev_end'];
        }
        if (isset($input['designer']))
        {
            $projectTimeline->designer = $input['designer'];
        }
        if (isset($input['developer']))
        {
            $projectTimeline->developer = $input['developer'];
        }

        if (isset($input['notes']))
        {
            $projectTimeline->notes = $input['notes'];
        }

        if (isset($input['tested']))
        {
            if ($input['tested'] == 'on')
            {
                $projectTimeline->tested = 1;
            }

        }
        if (isset($input['data_filled']))
        {
            if ($input['data_filled'] == 'on')
            {
                $projectTimeline->data_filled = 1;
            }
        }
        if (isset($input['deployed']))
        {
            if ($input['deployed'] == 'on')
            {
                $projectTimeline->deployed = 1;
            }
        }
        if (isset($input['approved']))
        {
            if ($input['approved'] == 'on')
            {
                $projectTimeline->approved = 1;
            }
        }

        $projectTimeline->save();
        $projectTimeline->project->update(['status_id' => $input['status']]);

        $project = Project::with('projectDeploymentInfo')->where('id', $projectTimeline->project_id)->first();
        $project->projectDeploymentInfo()->update([
            'domain'  =>  \request('domain'),
            'cpanel_url'  =>  \request('cpanel_url'),
            'cpanel_username'  =>  \request('cpanel_username'),
            'cpanel_password'  =>  \request('cpanel_password'),
            'dashboard_url'  =>  \request('dashboard_url'),
            'dashboard_username'  =>  \request('dashboard_username'),
            'dashboard_password'  =>  \request('dashboard_password'),
        ]);



        return redirect(adminUrl('/my-projects'))->with('updated', 'Project Has Benn Updated Successfully');
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
