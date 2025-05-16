<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $tasks=Tarea::all();
        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $project=Tarea::create([
            "name"=>$request->name,
            "description"=>$request->description,
            "priority"=>$request->priority,
            "due_date"=>$request->due_date,
            "status"=>$request->status,
        ]);

        return response()->json($project,201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UpdateTaskRequest $request,$id)
    {
         $project=Tarea::where('id',$id)->first();

          if (!$project) return response()->json(['message'=>'Project not found'],404);

          $project->title=$request->get('title');
          $project->description=$request->get('description');
          $project->status=$request->get('status');
          $project->priority=$request->get('priority');
          $project->due_date=$request->get('due_date');

        $project->save();

        return response()->json($project);
    }

    public function getDetails(Request $request,$id){

        $details=Tarea::where('id',$id)->first();

        if (!$details) return response()->json(['message'=>'Project not found'],404);

        return response()->json($details);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        $project=Tarea::where('id',$id)->first();

        if (!$project) return response()->json(['message'=>'Project not found'],404);

        return response()->json(["message"=>"project eliminated"]);
    }
}
