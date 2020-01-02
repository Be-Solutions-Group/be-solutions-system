<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Gallery;
use App\Models\Image;
use App\Models\Message;
use App\Models\Project;
use App\Models\ProjectTimeline;
use App\Models\Service;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $projects = Project::all()->count();
        $inProgressProjects = ProjectTimeline::with('project')->where('approved', null)->count();
        $completedProjects = ProjectTimeline::with('project')->where('approved', 1)->count();
        $waitingProjects = ProjectTimeline::with('project')->where('design_start', null)->count();

        $projectTimelines = ProjectTimeline::with('project')
            ->orderBy('development_finish', 'desc')
            ->where('approved', null)
            ->get();
        return view('dashboard.welcome', compact('projectTimelines', 'projects', 'inProgressProjects', 'completedProjects', 'waitingProjects'));
    }
}
