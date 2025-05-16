<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\updateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks=Proyecto::all();
        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        $project=Proyecto::create([
            "name"=>$request->name,
            "description"=>$request->description,
            "status"=>$request->status,
        ]);

        return response()->json($project,201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(updateProjectRequest $request,$id)
    {
         $project=Proyecto::where('id',$id)->first();

          if (!$project) return response()->json(['message'=>'Project not found'],404);

          if ($request->get('name')) {
              $project->name=$request->get('name');
          }

          if ($request->get('description')) {
            $project->description=$request->get('description');
          }

          if ($request->get('status')) {
            $project->status=$request->get('status');
          }


        $project->save();

        return response()->json($project);
    }

    public function getDetails(Request $request,$id){

        $details=Proyecto::where('id',$id)->first();

        if (!$details) return response()->json(['message'=>'Project not found'],404);

        return response()->json($details);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        $project=Proyecto::where('id',$id)->first();

        if (!$project) return response()->json(['message'=>'Project not found'],404);

        return response()->json(["message"=>"project eliminated"]);
    }
}
