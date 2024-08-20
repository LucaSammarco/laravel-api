<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
Use App\Models\Type;
Use App\Models\Technology;
use App\Model\User;

class ProjectController extends Controller
{
    //
    public function index()
    {


        // $projects = Project::all();

        $projects = Project::with("type", "technologies", )->paginate(100);


        return

        response()->json(

            [
            'success' => true,
            'results' => $projects

            ]


        );

    }

    public function show(Project $project)
    {

    }

}