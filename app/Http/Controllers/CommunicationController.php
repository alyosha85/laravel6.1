<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Communication;
use App\ContactType;
use App\ContactReason;
use App\Contact;
use App\Company;
use App\CommunicationContactType;
use App\CompanyProfession;
use App\Profession;
use Carbon\Carbon;

class CommunicationController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id,$contact_id='')
    {
        $communication = New Communication();
        $company_id = $request->company_id;
        $contact_types = ContactType::all();
        $contact_reasons = ContactReason::all();
        $contacts = Contact::where('company_id',$id)->get();
        $company_professions = CompanyProfession::where('company_id',$id)->pluck('profession_id')->toArray();
        $professions = Profession::wherein('id',$company_professions)->get();
        $profession_all = Profession::wherenotin('id',$company_professions)->get();




        return view('communication.create',compact('communication','contact_types','contact_reasons','contacts','company_id','contact_id','professions','profession_all'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->date = Carbon::parse($request->date)->format('Y-m-d');      
        if ($request->profession_id) 
        $profession_id = array_merge($request->profession_id,$request->profession_all_id); 
        else 
        $profession_id = $request->profession_all_id;

        $communication = Communication::create($this->validateRequest());
        $contacttype = ContactType::find($request->contact_type_id);
        $communication->contact_types()->attach($contacttype);
        $profession = Profession::find($profession_id);
        $communication->professions()->attach($profession);

        $profession = Profession::find($profession_id);
        $new_professions = [];
        foreach ($profession_id as $id) {
            if (!CompanyProfession::where('profession_id',$id)->where('company_id',$request->company_id)->first()) {
                $company = Company::find($request->company_id);
                $profession = Profession::find($id);
                $company->professions()->attach($profession);
            }
            
        }



        return redirect('/companies/'.request('company_id').'/#nav-profile');
      
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Communication  $communication
     * @return \Illuminate\Http\Response
     */
    public function show(Communication $communication)
    {
        return view('communication.show',compact('communication'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Communication  $communication
     * @return \Illuminate\Http\Response
     */
    public function edit(Communication $communication)
    {   
        $contact_types = ContactType::all();
        $contact_reasons = ContactReason::all();
        $contacts = Contact::where('company_id',$communication->company_id)->get();
        return view ('communication.edit',compact('communication','contact_types','contact_reasons','contacts'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Communication  $communication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Communication $communication)
    {
        
        $communication = Communication::find($communication->id);
        $communication->memo = $request->memo;
        $communication->date = $request->date;
        $communication->participant = $request->participant;
        $communication->contact_reason_id = $request->contact_reason_id;
        $communication->save();

        
        
        CommunicationContactType::where('communication_id',$communication->id)->delete();
        foreach($request->contact_type_id as $item) {
            $bridge = new CommunicationContactType();
            $bridge->communication_id = $communication->id;
            $bridge->contact_type_id = $item;
            $bridge->save();
        }
        
        return redirect('companies/'. $communication->company_id . '?path=3')->with('message','Erfolgreich geändert');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Communication  $communication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Communication $communication)
    {
        $communication->delete();
        return redirect('companies/'.$communication->company_id.'?path=3')->with('message','Erfolgreich gelöscht');
    }
    private function validateRequest()
    {
        
        return request()-> validate ([
            'date' => 'required',
            'memo' => 'required',
            'company_id' => 'required',
            'contact_id' => 'required',
            'contact_types'=> '',
            'contact_reason_id' => '',
            'participant' => '',

            ]);
    }
}


