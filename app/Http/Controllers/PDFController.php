<?php

namespace App\Http\Controllers;

use App\Models\Parkir;
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
    public function generatePDF($idParkir)
    {
        $parkir = Parkir::getParkirByID($idParkir);

        $data = [
            'title' => 'Struk',
            'date' => date('m/d/Y'),
            'data' => $parkir
        ];

        $pdf = PDF::loadView('struk.pdfstruk', $data);

        return $pdf->download('struk-' . $idParkir . '.pdf');
    }

    public function generatePDFReport()
    {
        $parkir = Parkir::getAllParkir();

        $data = [
            'title' => 'Report',
            'date' => date('m/d/Y'),
            'data' => $parkir
        ];

        $pdf = PDF::loadView('transaksi.pdfreport', $data);

        return $pdf->download('report' . Carbon::now() . '.pdf');
    }

    public function generatePDFReportFilterDate(Request $request)
    {
        $startDate = Carbon::parse($request->startDatePdf)->startOfDay();
        $endDate = Carbon::parse($request->endDatePdf)->endOfDay();

        $parkir = Parkir::getParkirByDate($startDate, $endDate);

        $data = [
            'title' => 'Report Filter Day',
            'date' => date('m/d/Y'),
            'data' => $parkir
        ];

        $pdf = PDF::loadView('transaksi.pdfreport', $data);

        return $pdf->download('report-filter' . $startDate . '-' . $endDate . '.pdf');
    }

    public function generatePDFReportFilterJenis(Request $request)
    {
        $parkir = Parkir::getParkirByJenis($request->jenis);

        $data = [
            'title' => 'Report Filter Jenis',
            'date' => date('m/d/Y'),
            'data' => $parkir
        ];

        $pdf = PDF::loadView('transaksi.pdfreport', $data);

        return $pdf->download('report-filter-jenis' . $request->jenis . '.pdf');
    }
}
