<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Contacts;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function getAdmin()
    {
        return view('admin');
    }
    public function index()
    {

        // $data = DB::table('contacts')->get()->toArray();
        // return view('moderatorhome', 'data');
        // return view('moderatorhome');
        $data = DB::table('contacts')->paginate(10);
        return view('adminhome', compact('data'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function create()
    {
        //
        return view('admincreate');
    }
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
        $contact = new Contacts([
            'name'  => $request->get('name'),
            'email'  => $request->get('email'),
            'contact' => $request->get('contact'),
            'address'  => $request->get('address'),
            'pincode'  => $request->get('pincode'),
            'user_email'  => $request->get('user_email')

        ]);
        $contact->save();
        return redirect()->route('adminhome')->with('success', 'Data Added');
    }
    public function edit($id)
    {
        $temp = Contacts::find($id);
        return view('adminedit', compact('temp', 'id'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'    =>  'required',
            'email'     =>  'required',
            'contact'     =>  'required',
            'address'     =>  'required',
            'pincode'     =>  'required',
            'user_email'     =>  'required'
        ]);

        $t = Contacts::find($id);
        $t->name = $request->get('name');
        $t->email = $request->get('email');
        $t->contact = $request->get('contact');
        $t->address = $request->get('address');
        $t->pincode = $request->get('pincode');
        $t->user_email = $request->get('user_email');
        $t->save();
        return redirect()->route('adminhome')->with('success', 'Data Updated');
    }

    public function destroy($id)
    {
        $contact = Contacts::find($id);
        $contact->delete();
        return redirect()->route('adminhome')->with('success', 'Data Deleted');
    }
}
