<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("projects.create", [
            "projects" => Project::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            "name" => "required",
            "description" => "required"
        ]);

        Project::forceCreate([
            "name" => request("name"),
            "description" => request("description")
        ]);

        return ["message" => "Project created!"];
    }
}
