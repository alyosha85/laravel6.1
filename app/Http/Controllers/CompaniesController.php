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
use App\Section;
use App\CompanySection;
use App\CityCompany;
use App\CompanyProfession;
use App\Communication;
use App\CommunicationProfession;




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
    
    
    public function index(Request $request)
    {
        
        $values = Profession::all('name');  
        $standort = City::find(Auth::user()->city_id);
        $bundesland = State::find($standort->state_id);
        
        $type = $request->input('type');
        if($type === 'state') {
            $state = City::find(Auth::user()->city_id);
            $companies = Company::where('state_id',$state->state_id)->get();
        }
        elseif ($type === 'all') {
            $companies = Company::all();
        }
        else {
            $comp = CityCompany::where('city_id',Auth::user()->city_id)->pluck('company_id')->toArray();
            $companies = Company::wherein('id',$comp)->get();
        }

        return view('companies.index',compact('companies','values','standort','bundesland','type'));
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
        $sections = Section::all();
        $states = State::all();
        $cities = City::all();
        $stateid = City::where('id', Auth::user()->city_id)->first();
        $stateid = State::where('id',$stateid->state_id)->first();
        $stateid = $stateid->id;
        $cityid = Auth::user()->city_id;
        return view ('companies.create',compact('company','branches','statuses','titles','professions','states','cities','sections','stateid','cityid'));
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
        $section = Section::find($request->section_id);
        $company->sections()->attach($section);
        return redirect('companies/'. $company->id)->with('message','Erfolgreich hinzugefügt');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company, Request $request)
    {   
        $request = $request->path ? $request->path : 1;
        $lastcommunication = Communication::where('company_id',$company->id)->orderBy('date','desc')->first();
        // $lastprofessions = $lastcommunication->professions->pluck('name')->toArray();          
        return view('companies.show',compact('company','request','lastcommunication'));
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
        $stateid = City::where('id', Auth::user()->city_id)->first();
        $stateid = State::where('id',$stateid->state_id)->first();
        $stateid = $stateid->id;
        $states = State::all();
        $cities = City::all();
        $cityid = Auth::user()->city_id;
        $selected_section = CompanySection::where('company_id',$company->id)->pluck('section_id')->toArray();

        return view ('companies.edit',compact('company','branches','statuses','titles','professions','states','cities','stateid','cityid','selected_section'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Company $company)
    {
        $company->update($this->validateRequest());
        CityCompany::where('company_id',$company->id)->delete();
        foreach($request->city_id as $item) {
            $bridge = new CityCompany();
            $bridge->company_id = $company->id;
            $bridge->city_id = $item;
            $bridge->save();
        }
        CompanyProfession::where('company_id',$company->id)->delete();
        foreach($request->profession_id as $item) {
            $bridge = new CompanyProfession();
            $bridge->company_id = $company->id;
            $bridge->profession_id = $item;
            $bridge->save();
        }
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
        return redirect('companies')->with('message','Erfolgreich gelöscht');
    }
    private function validateRequest()
    {
        return request()-> validate ([
                'name' => 'required|min:3',
                'title_id' => 'required',
                'status_id' => 'required',
                'branch_id' => 'required',
                'email' => '',
                'state_id' => 'required',
                'address' => '',
                'address2' => '',
                'zipcode' => '',
                'fax' => '',
                'phone' => '',
                'website' => '',
                'professions' => '',
                'description' => '',
                'cities' => '', 
                'created_by' => '',
        ]);
    }
    
}
