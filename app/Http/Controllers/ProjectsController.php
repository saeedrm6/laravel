<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Company;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all()->where('user_id',Auth::user()->id);
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=null)
    {
        if ($id){
            $company = Company::all()->where('id',$id)->first();
            if ($company->user_id === Auth::user()->id){
                return view('projects.create',compact('company'));
            }
        }else{
            $companies = Company::all()->where('user_id',Auth::user()->id);
            return view('projects.create',compact('companies'));
        }

        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Project::create([
            'name'  =>  $request->name,
            'description'   =>  $request->description,
            'company_id'    =>  $request->company_id,
            'user_id'   =>  Auth::user()->id,
            'days'  =>  $request->days
        ]);
        if ($project){
            return redirect(route('projects.index'))->with('success','The Project has been added!');
        }
        return redirect(route('projects.index'))->with('errors','Error on Save!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        if ($project->user_id == Auth::user()->id){
//            $comments = Comment::where('commentable_id',$project->id)->orderBy('created_at')->get();
            $comments = $project->comments;
            return view('projects.show',compact('project','comments'));
        }

        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project->name = $request->name;
        $project->description = $request->description;
        $project->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $status = $project->delete();
        if ($status){
            return redirect(route('projects.index'))->with('success','The '.$project->name.' has been deleted!');
        }
    }
}
