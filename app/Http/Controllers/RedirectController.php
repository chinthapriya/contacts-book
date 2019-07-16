<?php

namespace App\Http\Controllers;

// use App\Contact;
// use App\CsvData;
// use App\Http\Requests\CsvImportRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class RedirectController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    public function getAdmin()
    {
        return view('admin');
    }
    public function getUser()
    {
        return view('user');
    }
    public function getModerator()
    {
        return view('Moderator');
    }

}
