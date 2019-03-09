<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Auth;

class AccountController extends Controller
{    
    public function __construct()
        {
            $this->middleware('auth');
        }

    public function index() {
        $projectsTotal = Project::all()->count();

        $allProjects = Project::where('user_id', Auth::id())->get();
        $allProjectNames = [];


        foreach ($allProjects as $project) {
            array_push($allProjectNames, $project->title);
        }
        // return $allProjectNames;
        return view('account/dashboard', compact('projectsTotal', 'allProjectNames'));
    }
}
