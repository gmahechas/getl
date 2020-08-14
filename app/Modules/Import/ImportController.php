<?php

namespace App\Modules\Import;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function index()
    {
        return view('import.index');
    }

    public function store(Request $request)
    {
        /* $import_type = $request->import_type; */
        $path = $request->file('file')->store('uploads');

        return $path;
    }
}
