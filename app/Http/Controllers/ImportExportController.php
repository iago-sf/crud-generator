<?php
     
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UserExport;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;
    
class ImportExportController extends Controller
{
    /**
 * @return \Illuminate\Support\Collection
 */
    public function importExportView()
    {
    return view('import');
    }
    
    /**
 * @return \Illuminate\Support\Collection
 */
    public function export() 
    {
        return Excel::download(new UserExport, 'users.xlsx');
    }
    
    /**
 * @return \Illuminate\Support\Collection
 */
    public function import() 
    {
        Excel::import(new UserImport, request()->file('file'));
            
        return back();
    }
}