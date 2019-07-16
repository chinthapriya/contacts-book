<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacts = Contact::all()->toArray();
        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:120',
            'email' => 'required|max:120',
            // 'phone' => 'required|regex:/[0-9]{5}/',
            'address' => 'required|max:120',
            'user_email' => 'required|max:120'
        ]);
        $contact = new Contact([
            'name'  => $request->get('name'),
            'email'  => $request->get('email'),
            'contact' => $request->get('contact'),
            'address'  => $request->get('address'),
            'pincode'  => $request->get('pincode'),
            'user_email'  => $request->get('user_email')

        ]);
        $contact->save();
        return redirect()->route('contact.index')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    //     $contact = Contact::find($id);
    //     return view('contact.edit', compact('contact','id'));
    // }
    public function edit($id)
    {
        $temp = Contact::find($id);
        return view('contact.edit', compact('temp', 'id'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    //     $this->validate($request, [
    //         'name' => 'required|max:120',
    //         'email' => 'required|max:120',
    //         // 'phone' => 'required|regex:/[0-9]{5}/',
    //         'address' => 'required|max:120',
    //         'user_email' => 'required|max:120'
    //     ]);
    //     $contact = Contact::find($id);
    //     $contact->name  = $request->get('name');
    //     $contact->email = $request->get('email');
    //     $contact->contact = $request->get('contact');
    //     $contact->address  = $request->get('address');
    //     $contact->pincode  = $request->get('pincode');
    //     $contact->user_email  = $request->get('user_email');
    //     $contact->save();
    //     return redirect()->route('contact.index')->with('success', 'Data Updated');

    // }

    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name'    =>  'required',
        //     'email'     =>  'required',
        //     'contact'     =>  'required',
        //     'address'     =>  'required',
        //     'pincode'     =>  'required',
        //     'user_email'     =>  'required'
        // ]);

        $temp = Contact::find($id);
        // if(!is_null($temp) {
        //     return view('welcome');
        // }
        // $input = $request->all();
        // $temp->fill($input)->save();
        $temp->name = $request->get('name');
        $temp->email = $request->get('email');
        $temp->contact = $request->get('contact');
        $temp->address = $request->get('address');
        $temp->pincode = $request->get('pincode');
        $temp->user_email = $request->get('user_email');
        $temp->save();
        return redirect()->route('contact.index')->with('success', 'Data Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('contact.index')->with('success', 'Data Deleted');
    }
}
