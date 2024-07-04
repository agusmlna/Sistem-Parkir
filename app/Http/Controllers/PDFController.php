<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
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

    public function generatePDFReport()
    {
        $transaction = Transaction::leftJoin('motors', 'transactions.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->select('transactions.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->get();

        // dd($transaction);

        $data = [
            'title' => 'Report',
            'date' => date('m/d/Y'),
            'data' => $transaction
        ];

        $pdf = PDF::loadView('transaksi.pdfreport', $data);

        return $pdf->download('report' . Carbon::now() . '.pdf');
    }

    public function generatePDFReportFilterDate(Request $request)
    {
        $startDate = Carbon::parse($request->startDatePdf)->startOfDay();
        $endDate = Carbon::parse($request->endDatePdf)->endOfDay();

        $transaction = Transaction::leftJoin('motors', 'transactions.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->select('transactions.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->whereBetween('transactions.created_at', [$startDate, $endDate])
            ->get();
        // dd($transaction);

        $data = [
            'title' => 'Report Filter Day',
            'date' => date('m/d/Y'),
            'data' => $transaction
        ];

        $pdf = PDF::loadView('transaksi.pdfreport', $data);

        return $pdf->download('report-filter' . $startDate . '-' . $endDate . '.pdf');
    }

    public function generatePDFReportFilterJenis(Request $request)
    {
        $transaction = Transaction::leftJoin('motors', 'transactions.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->select('transactions.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->where('jenis_motors.id', '=', $request->jenis)
            ->get();
        // dd($transaction);

        $data = [
            'title' => 'Report Filter Jenis',
            'date' => date('m/d/Y'),
            'data' => $transaction
        ];

        $pdf = PDF::loadView('transaksi.pdfreport', $data);

        return $pdf->download('report-filter-jenis' . $request->jenis . '.pdf');
    }
}
