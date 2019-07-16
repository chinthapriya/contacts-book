<?php

namespace App\Http\Controllers;

use App\Contacts;
use App\CsvData;
use App\Http\Requests\CsvImportRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    public function getImport()
    {
        return view('import');
    }

    public function parseImport(CsvImportRequest $request)
    {

        $path = $request->file('csv_file')->getRealPath();

        if ($request->has('header')) {
            $data = Excel::load($path, function($reader) {})->get()->toArray();
        } else {
            $data = array_map('str_getcsv', file($path));
        }

        if (count($data) > 0) {
            if ($request->has('header')) {
                $csv_header_fields = [];
                foreach ($data[0] as $key => $value) {
                    $csv_header_fields[] = $key;
                }
            }
            $csv_data = $data;

            $csv_data_file = CsvData::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_header' => $request->has('header'),
                'csv_data' => json_encode($data)
            ]);
        } else {
            return redirect()->back();
        }

        return view('import_fields', compact( 'csv_header_fields', 'csv_data', 'csv_data_file'));

    }

    public function processImport(Request $request)
    {
        $data = CsvData::find($request->csv_data_file_id);
        // return view('import_fields', compact( $csv_data_file->csv_header_fields, $csv_data_file->csv_data, $csv_data_file->csv_data_file));
        $csv_data = json_decode($data->csv_data, true);
        // if (count($csv_data) > 0) {
        //     $items = CsvData::find($request->csv_data_file_id)->csv_data;
        //     return view('itemsview', compact('items'));
        // }
        foreach ($csv_data as $row) {
            // echo config('app.db_fields');
            $contact = new Contacts();
            foreach (config('app.db_fields') as $index => $field) {
                // echo $request->fields[$field]; 
                if ($data->csv_header) {
                    $contact->$field = $row[$request->fields[$field]];
                } else {
                    $contact->$field = $row[$request->fields[$index]];
                }
            }
            $contact->save();
        }

        return view('import_success');
    }

    // public function getAdmin()
    // {
    //     return view('admin');
    // }
    // public function getUser()
    // {
    //     return view('user');
    // }
    // public function getModerator()
    // {
    //     return view('Moderator');
    // }

}
