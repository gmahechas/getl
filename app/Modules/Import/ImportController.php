<?php

namespace App\Modules\Import;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Modules\Invoice\InvoiceImport;
use App\Modules\Invoice\Invoice;
use App\Modules\InvoiceStatus\InvoiceStatusImport;
use App\Modules\InvoiceStatus\InvoiceStatus;
use App\Modules\InvoiceStatus\InvoiceStatusPayeeImport;

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
                //Invoice::query()->truncate();
                $result = Excel::import(new InvoiceImport, $path);
                break;
            case 'invoice_status':
                //InvoiceStatus::query()->truncate();
                $result = Excel::import(new InvoiceStatusImport, $path);
              break;
            case 'invoice_payee':
                $result = Excel::import(new InvoiceStatusPayeeImport, $path);
              break;
            default:
                # code...
                break;
        }

        return back()->with(['success' => "The {$import_type} records were imported"]);;
    }
}
