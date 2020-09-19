<?php

namespace App\Modules\Import;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Modules\Invoice\InvoiceImport;
use App\Modules\InvoiceStatus\InvoiceStatusImport;

class ImportController extends Controller
{
    public function index()
    {
        return view('import.index');
    }

    public function store(Request $request)
    {
        $import_type = $request->import_type;
        $file_name = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->store('public');

        switch ($import_type) {
            case 'invoice':
                $result = Excel::import(new InvoiceImport, $path);
                break;
            case 'invoice_status':
                $result = Excel::import(new InvoiceStatusImport, $path);
            break;
            default:
                # code...
                break;
        }

        return back()->with(['success' => "The {$import_type} records were imported"]);;
    }
}
