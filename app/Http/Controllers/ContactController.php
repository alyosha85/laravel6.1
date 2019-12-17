<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Company;
use App\ContactTitle;
use App\ContactStatus;
use Illuminate\Http\Request;

class ContactController extends Controller
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
    public function create(Request $request)
    {   
       $contact = new Contact(); 
       $company_id = $request->company_id;
       $contact_titles = ContactTitle::all();
       $contact_statuses = ContactStatus::all();
       return view('contact.create',compact('contact','contact_titles','contact_statuses','company_id'));
       //return redirect('companies/'. $company_id,compact('contact','contact_titles','contact_statuses','company_id'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = request()->validate([
        
        ]);

        $contact = new Contact();
        $contact->contact_title_id = request('contact_title_id');
        $contact->contact_status_id = request('contact_status_id');
        $contact->first_name = request('first_name');
        $contact->last_name = request('last_name');
        $contact->email = request('email');
        $contact->phone = request('phone');
        $contact->fax = request('fax');
        $contact->note = request('note');
        $contact->company_id = request('company_id');
        $contact->save();


        return redirect('/companies/'.request('company_id').'/#nav-profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contact.show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}



