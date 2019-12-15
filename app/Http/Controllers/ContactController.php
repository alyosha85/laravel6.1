<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Company;
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
       
       return view('contact.create',compact('contact','company_id'));


    //    $contact = Contact::find(1);
    //    $company_id = $conatact->company_id; 


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        $data = request()->validate([
            'contact_title' => 'required',
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'email',
            'phone' => '',
            'fax' => '',
            'note' => '',
            'active' => 'required',  
            'company_id' => 'required',
        ]);

        $contact = new Contact();
        $contact->contact_title = request('contact_title');
        $contact->company_id = request('company_id');
        $contact->first_name = request('first_name');
        $contact->last_name = request('last_name');
        $contact->email = request('email');
        $contact->phone = request('phone');
        $contact->fax = request('fax');
        $contact->active = request('active');
        $contact->note = request('note');
        $contact->save();


        return back();
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
