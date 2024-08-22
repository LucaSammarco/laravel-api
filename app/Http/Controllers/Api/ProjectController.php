<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use App\Models\User;

class ProjectController extends Controller
{
    // Metodo per restituire la lista di progetti con relazioni caricate
    public function index()
    {
        $projects = Project::with('type', 'technologies')->paginate(100);

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    // Metodo per restituire i dettagli di un singolo progetto
    public function show(Project $project)
    {
        $project->load('type', 'technologies');

        return response()->json([
            'success' => true,
            'results' => $project
        ]);
    }
}
