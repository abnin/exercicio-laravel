<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUpdateRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $contacts = Contact::orderBy('id','desc')->paginate(5);
        return view('contacts.index', compact('contacts'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('contacts.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate($this->validateRulesCreate());
        
        Contact::create($request->post());

        return redirect()->route('contacts.index')->with('success','Contact has been created successfully.');
    }

    /**
    * Display the contact's information.
    */
    public function show(Contact $contact)
    {
        return view('contacts.show',compact('contact'));
    }

    /**
    * Display the contact's form.
    */
    public function edit(Contact $contact)
    {
        return view('contacts.edit',compact('contact'));
    }

    /**
    * Update the contact's information.
    */
    public function update(Request $request, Contact $contact)
    {
        $request->validate($this->validateRulesEdit($contact->id));
        
        $contact->fill($request->post())->save();

        return redirect()->route('contacts.index')->with('success','Contact has been updated successfully');
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
        return redirect()->route('contacts.index')->with('success','Contact has been deleted successfully');
    }

    /**
    * Rules for validation on edit
    */
    private function validateRulesEdit($idContact) {
        return [
            'name' => ['required','min:5'],
            'email' => ['required', 'email', Rule::unique(Contact::class)->ignore($idContact)],
            'phone_number' => ['required', 'numeric','digits:9', Rule::unique(Contact::class)->ignore($idContact)]
        ];
    }

    /**
    * Rules for validation on create
    */
    private function validateRulesCreate() {
        return [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:contacts',
            'phone_number' => 'required|unique:contacts|numeric|digits:9'
        ];
    }
}
