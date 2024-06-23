<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;
use App\Models\User;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id)
    {
        $motor = Motor::where('id', $id)->first();

        $data = [
            'title' => 'Struk',
            'date' => date('m/d/Y'),
            'data' => $motor
        ];

        $pdf = PDF::loadView('dashboard.pdfstruk', $data);

        return $pdf->download('struk-' . $id . '.pdf');
    }
}
