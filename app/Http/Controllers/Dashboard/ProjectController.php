<?php

namespace App\Http\Controllers\Dashboard;

use App\Classes\Upload;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Member;
use App\Models\Position;
use App\Models\Project;
use App\Models\ProjectTimeline;
use App\Models\Status;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('dashboard.project.index', compact('projects'));
    }

    public function myProjects()
    {
        $authUser = Auth::user();
        $member = Member::where('user_id', '=', $authUser->id)->first();
        if ($member->position_id == 9)
        {
            $finishedDesigns = [];
            $projectsTimelines = ProjectTimeline::where('design_approved', '!=', null)->get();
            foreach ($projectsTimelines as $projectsTimeline)
            {
                array_push($finishedDesigns, $projectsTimeline->project_id);
            }
            $projects = Project::where('project_type', '=', 'Web')
                ->whereIn('id', $finishedDesigns)
                ->get();
            return view('dashboard.project.index', compact('projects'));
        }

        if ($member->position_id == 5)
        {
            $projects = Project::where('project_type', '=', 'Mobile & Web')->get();
            return view('dashboard.project.index', compact('projects'));
        }

        if ($member->position_id == 6)
        {
            $finishedDesigns = [];
            $projectsTimelines = ProjectTimeline::where('design_approved', '=', null)->get();
            foreach ($projectsTimelines as $projectsTimeline)
            {
                array_push($finishedDesigns, $projectsTimeline->project_id);
            }
            $projects = Project::where('project_type', '=', 'Web')
                ->whereIn('id', $finishedDesigns)
                ->get();
            return view('dashboard.project.index', compact('projects'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$latestWebProject = Project::with('member')->where('project_type', '==', 'Web')->orderBy('');
        $salesTeams = Team::with('member')->where('name', 'like', 'sales%')->get();
        $positions = Position::with('position')->where('title', 'like', 'sale%')->get();
        $arrayOfSalesPositions = [];
        foreach ($positions as $position)
        {
            array_push($arrayOfSalesPositions, $position->id);
        }
        $members = Member::with('position')->whereIn('position_id', $arrayOfSalesPositions)->get();
        $status = Status::all();
        return view('dashboard.project.create', compact('salesTeams', 'members', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'              => 'bail|required|max:200',
            'client_name'       => 'bail|required',
            'project_type'      => 'bail|required',
            'description'       => 'bail|nullable',
            'team_id'           => 'bail|required|int',
            'sales_man'         => 'bail|required|int',
            'status'            => 'bail|required|int',
            'domain'            => 'bail|nullable|url',
            'image_id'          => 'bail|nullable|mimes:jpeg,jpg,png,gif,mp4',
            'contract'          => 'bail|required|mimes:jpeg,jpg,png,gif,mp4,pdf,doc,docx',
            'content'           => 'bail|nullable|mimes:jpeg,jpg,png,gif,mp4,zip,rar,doc,docx',
        ], [], [
            'name'              => 'Name',
            'client_name'       => 'Client',
            'team_id'           => 'Team',
            'sales_man'         => 'Sales Man',
            'status'            => 'Status',
            'domain'            => 'Domain',
            'image_id'          => 'Image',
            'contract'          => 'Contract',
            'content'           => 'Content',
        ]);

        $client = new Client();
        $client->name = \request('client_name');
        //Save Logo
        if (isset($request->image_id))
        {
            $logo = new Upload($request, 'image_id', 'projects', 'jpeg,jpg,png,gif,mp4');
            $uploadedLogoId = $logo->publicUpload();
            $client->logo = $uploadedLogoId;
        }
        $client->save();

        //Save Contract
        $contract = new Upload($request, 'contract', 'projects', 'jpeg,jpg,png,gif,mp4,pdf,doc,docx');
        $uploadedContractId = $contract->publicUpload();

        $project = new Project();
        $project->name = \request('name');
        $project->domain = \request('domain');
        $project->client_id = $client->id;
        $project->sales_man_id = \request('sales_man');
        $project->status_id = \request('status');
        $project->project_type = \request('project_type');
        $project->contract_id = $uploadedContractId;
        //Save Content
        if (isset($request->image_id))
        {
            $content = new Upload($request, 'content', 'projects', 'jpeg,jpg,png,gif,mp4,zip,rar,doc,docx');
            $uploadedContentId = $content->publicUpload();
            $project->content_id = $uploadedContentId;
        }
        $project->save();

        $project->projectTimelines()->create(['project_id', $project->id]);

        return redirect(adminUrl('/project'))->with('create', 'Project Has Been Created Successfully and Sent To Team');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.project.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salesTeams = Team::with('member')->where('name', 'like', 'sales%')->get();
        $positions = Position::with('position')->where('title', 'like', 'sale%')->get();
        $arrayOfSalesPositions = [];
        foreach ($positions as $position)
        {
            array_push($arrayOfSalesPositions, $position->id);
        }
        $members = Member::with('position')->whereIn('position_id', $arrayOfSalesPositions)->get();
        $status = Status::all();
        $project = Project::find($id);
        return view('dashboard.project.edit', compact('project', 'salesTeams', 'members', 'status'));
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
        $input = $request->all();
        $project = Project::find($id);
        $request->validate([
            'name'              => 'bail|required|max:200',
            'description'       => 'bail|nullable|text',
            'team_id'           => 'bail|required|int',
            'sales_man'         => 'bail|required|int',
            'status'            => 'bail|required|int',
            'domain'            => 'bail|nullable|url',
            'contract'          => 'bail|mimes:jpeg,jpg,png,gif,mp4,pdf,doc,docx',
            'content'           => 'bail|nullable|mimes:jpeg,jpg,png,gif,mp4,zip,rar,doc,docx',
        ], [], [
            'name'              => 'Name',
            'team_id'           => 'Team',
            'sales_man'         => 'Sales Man',
            'status'            => 'Status',
            'domain'            => 'Domain',
            'contract'          => 'Contract',
            'content'           => 'Content',
        ]);

        //Save Contract
        if (isset($input['contract']))
        {
            $contract = new Upload($request, 'contract', 'projects', 'jpeg,jpg,png,gif,mp4,pdf,doc,docx');
            $uploadedContractId = $contract->publicUpload();
            $project->contract_id = $uploadedContractId;
        }

        $project->name = \request('name');
        $project->domain = \request('domain');
        $project->sales_man_id = \request('sales_man');
        $project->status_id = \request('status');
        $project->project_type = \request('project_type');

        //Save Content
        if (isset($input['content']))
        {
            $content = new Upload($request, 'content', 'projects', 'jpeg,jpg,png,gif,mp4,zip,rar,doc,docx');
            $uploadedContentId = $content->publicUpload();
            $project->content_id = $uploadedContentId;
        }
        $project->save();

        return redirect(adminUrl('/project'))->with('update', 'Project Has Been Updated Successfully and Sent To Team');

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
