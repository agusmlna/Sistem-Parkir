<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($idTransaction)
    {
        $transaction = Transaction::leftJoin('motors', 'transactions.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->where('transactions.id', $idTransaction)
            ->select('transactions.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->first();

        $data = [
            'title' => 'Struk',
            'date' => date('m/d/Y'),
            'data' => $transaction
        ];

        $pdf = PDF::loadView('struk.pdfstruk', $data);

        return $pdf->download('struk-' . $idTransaction . '.pdf');
    }
}
