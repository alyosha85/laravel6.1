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
use App\City;
use Auth;
use App\Communication;

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
        $values = Profession::all('name');  
        return view('companies.index',compact('companies','values'));
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
        $cities = City::all();
        return view ('companies.create',compact('company','branches','statuses','titles','professions','states','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $company = Company::create($this->validateRequest());
        $company->user_id = Auth::user()->id;
        $city = City::find($request->city_id);
        $company->cities()->attach($city);
        $profession = Profession::find($request->profession_id);
        $company->professions()->attach($profession);

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
        // $last_communication = Communication::where('company_id',$company)->get()->count();
        // return $last_communication;
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
        $cities = City::all();
        return view ('companies.edit',compact('company','branches','statuses','titles','professions','states','cities'));
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
            return redirect('companies/'. $company->id)->with('message','Erfolgreich geändert');
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
        return redirect('companies');
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
                'address' => '',
                'address2' => '',
                'zipcode' => '',
                'phone' => '',
                'fax' => '',
                'website' => '',
                'professions' => '',
                'cities' => '', 
                'created_by' => '',
        ]);
    }
    
}
