<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compaines = Company::all()->where('user_id',Auth::user()->id);
        return view('companies.index',compact('compaines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $company = new Company();
        $company->name=$request->name;
        $company->description=$request->description;
        $company->user_id=Auth::user()->id;
        $company->save();

//        $update = $company->update([
//            'name'  =>  $request->name,
//            'description'   => $request->description
//        ]);

        return redirect(route('companies.index'))->with('success','The Company has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        if ($company->user_id == Auth::user()->id){
            $projects = $company->projects()->get();
            $comments = $company->comments;
            return view('companies.show',compact('company','projects','comments'));
        }

        return abort(404);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $company->name = $request->name;
        $company->description = $request->description;
        $company->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $status = $company->delete();
        if ($status){
            return redirect(route('companies.index'))->with('success','The '.$company->name.' has been deleted!');
        }

    }
}
