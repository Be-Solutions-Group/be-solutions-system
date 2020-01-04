<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsitePagesController extends Controller
{
    public function currentProjects()
    {
        return view('website.projects');
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
