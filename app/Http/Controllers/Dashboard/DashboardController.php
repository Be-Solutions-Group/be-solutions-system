<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Gallery;
use App\Models\Image;
use App\Models\Message;
use App\Models\Service;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.welcome');
    }
}
