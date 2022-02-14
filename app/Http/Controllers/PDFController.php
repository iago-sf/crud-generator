<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use App\Customer;
  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateCustomerPDF(Customer $customer)
    {
        $data = [
            'name' => $customer->name,
            'date' => date('m/d/Y'),
            'email' => $customer->email,
            'phone' => $customer->phone,
            'address' => $customer->address,
            'creation_date' => $customer->created_at,
        ];
          
        $pdf = PDF::loadView('myPDF', $data);
    
        return $pdf->download( ''.$customer->name.'.pdf');
    }
}