<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;


class WebsitePagesController extends Controller
{
    public function lastAddedProjects()
    {
        $projects = Project::with('projectTimeline')->orderBy('created_at', 'desc')->limit(10)->get();
        return view('website.welcome', compact('projects'));
    }


    public function currentProjects()
    {
        //return url()->current();
        if ($type = $_GET['type'])
        {
            if ($type == 'all')
            {
                $projects = Project::with('projectTimeline')->orderBy('created_at', 'desc')->get();
                return view('website.projects', compact('projects'));
            }

            elseif ($type == 'in-progress')
            {
                $projects = Project::with('projectTimeline')
                    ->where('status_id', '!=', 1)
                    ->orderBy('created_at', 'desc')
                    ->get();
                return view('website.projects', compact('projects'));
            }

            elseif ($type == 'completed')
            {
                $projects = Project::with('projectTimeline')
                    ->where('status_id', '=', 12)
                    ->orderBy('created_at', 'desc')
                    ->get();
                return view('website.projects', compact('projects'));
            }
        }


        else
        {
            $projects = Project::with('projectTimeline')->orderBy('created_at', 'desc')->get();
            return view('website.projects', compact('projects'));
        }

    }

    public function showProject($id)
    {
        $project = Project::with('projectTimeline')->find($id);
        return view('website.showProject', compact('project'));
    }

    public function addNewProject()
    {
        return view('website.createProject');
    }

    public function currentUpdates()
    {
        return view('website.updates');
    }

    public function addNewUpdate()
    {
        return view('website.createUpdate');
    }

}
