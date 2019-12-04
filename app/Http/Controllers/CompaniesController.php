<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Branch;
use App\Title;
use App\Profession;
use App\Status;
use App\Contact;
use App\State;


class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index()
    {
        $companies = Company::all();
        return view('companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $company = new Company();
        $branches = Branch::all();
        $statuses = Status::all();
        $titles = Title::all();
        $professions = Profession::all();
        $states = State::all();
        return view ('companies.create',compact('company','branches','statuses','titles','professions','states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Company::create($this->validateRequest());
        return redirect('companies')->with('message','Erfolgreich hinzugefügt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $branches = Branch::all();
        $statuses = Status::all();
        $titles = Title::all();
        $professions = Profession::all();
        $states = State::all();
        return view ('companies.edit',compact('company','branches','statuses','titles','professions','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Company $company)
    {
            $company->update($this->validateRequest());
            return redirect('companies/'. $company->id)->with('message','Erfolgreich geändert');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect('index');
    }

    private function validateRequest()
    {
        return request()-> validate ([
                'name' => 'required|min:3',
                'title_id' => 'required',
                'status_id' => 'required',
                'branch_id' => 'required',
                'email' => 'email',
                'state_id' => 'required',
                'profession_id' => '',
                'address' => '',
                'address2' => '',
                'zipcode' => '',
                'phone' => '',
                'fax' => '',
                'website' => '', 
        ]);
    }
    
}
