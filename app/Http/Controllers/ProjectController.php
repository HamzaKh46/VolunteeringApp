<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        // Retrieve all projects with their tags
        $projects = Project::with('tags')->get();

        // Return to the view
        return view('projects.index', compact('projects'));
    }
}
