<?php

namespace App\Http\Controllers;

use App\Communication;
use Illuminate\Http\Request;
use App\ContactType;
use App\ContactReason;
use App\Contact;
use App\Company;


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
    public function create(Request $request,$id)
    {
        $communication = New Communication();
        $company_id = $request->company_id;
        $contact_types = ContactType::all();
        $contact_reasons = ContactReason::all();
        $contacts = Contact::where('company_id',$id)->get();

        return view('communication.create',compact('communication','contact_types','contact_reasons','contacts','company_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $communication = Communication::create($this->validateRequest());
        $contacttype = ContactType::find($request->contact_type_id);
        $communication->contact_types()->attach($contacttype);


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Communication  $communication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Communication $communication)
    {
        //
    }
    private function validateRequest()
    {
    return request()-> validate ([
        'date' => 'required',
        'contact_reason_id' => '',
        'company_id' => 'required',
        'contact_id' => 'required',
        'participant' => '',
        'memo' => '',



]);
}
}


