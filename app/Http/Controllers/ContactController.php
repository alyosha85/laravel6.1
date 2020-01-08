<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Company;
use App\ContactTitle;
use App\ContactReason;
use App\ContactStatus;
use Illuminate\Http\Request;
use App\Communication;

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
       //return redirect('companies/'. $company_id .'?path=2',compact('contact','contact_titles','contact_statuses','company_id'));
       //'companies/'. $contact->company->id .'?path=2'
        
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
        return redirect('companies/'. $contact->company->id)->with('message','Erfolgreich hinzugefügt');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        $communications = Communication::where('contact_id',$contact->id)->orderBy('created_at','desc')->get();
        return view('contact.show',compact('contact','communications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $contact_titles = ContactTitle::all();
        $contact_statuses = ContactStatus::all();
        return view ('contact.edit',compact('contact','contact_titles','contact_statuses'));
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
        $contact->update($this->validateRequest());
        return redirect('companies/'. $contact->company_id)->with('message','Erfolgreich geändert');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->back();
    }


    private function validateRequest()
    {
        return request()-> validate ([
                'contact_title_id' => 'required',
                'contact_status_id' => 'required',
                'first_name' => '',
                'last_name' => 'required',
                'email' => '',
                'phone' => '',
                'fax' => '',
                'note' => '',
 
        ]);
    }
}



