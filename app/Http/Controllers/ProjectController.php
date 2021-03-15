<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectStatu;
use App\Models\Manager;
use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectStatuss = ProjectStatu::all(['id', 'status']);
        $projets = Project::all();
        return view('projects.index', compact('projets','proyectStatuss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyectStatuss = ProjectStatu::all(['id', 'status']);
        $managers = Manager::all(['id', 'name']);
        $employes = Employe::all(['id', 'name']);
        return view('projects.create', compact('proyectStatuss','managers','employes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_info'=> 'required',
            'description'=> 'required',
            'fk_idproject_manager'=> 'required',
            'fk_idassigned_to'=> 'required',
            'fk_idstatus'=> 'required',
        ]);      

        DB::table('projects')->insert([
            'project_info' => $request['project_info'],
            'description' => $request['description'],
            'fk_idproject_manager' => $request['fk_idproject_manager'],
            'fk_idassigned_to' => $request['fk_idassigned_to'],
            'fk_idstatus' => $request['fk_idstatus']
        ]);

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        
        $project = Project::find($id);

        $proyectStatuss = ProjectStatu::all(['id', 'status']);
        $managers = Manager::all(['id', 'name']);
        $employes = Employe::all(['id', 'name']);
        return view('projects.edit', compact('proyectStatuss','managers','employes','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'project_info'=> 'required',
            'description'=> 'required',
            'fk_idproject_manager'=> 'required',
            'fk_idassigned_to'=> 'required',
            'fk_idstatus'=> 'required',
        ]);

        DB::table('projects')->where('id',$request->id)->update(array(
            'project_info' => $request['project_info'],
            'description' => $request['description'],
            'fk_idproject_manager' => $request['fk_idproject_manager'],
            'fk_idassigned_to' => $request['fk_idassigned_to'],
            'fk_idstatus' => $request['fk_idstatus']
        ));

        return redirect()->route('projects.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $project = Project::find($id);
        $project->delete();

        return redirect()->route('projects.index');
    }
}
