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
        $parkir = Parkir::leftJoin('motors', 'parkirs.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->where('parkirs.id', $idParkir)
            ->select('parkirs.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->first();

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
        $parkir = Parkir::leftJoin('motors', 'parkirs.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->select('parkirs.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->get();

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

        $parkir = Parkir::leftJoin('motors', 'parkirs.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->select('parkirs.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->whereBetween('parkirs.created_at', [$startDate, $endDate])
            ->get();

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
        $parkir = Parkir::leftJoin('motors', 'parkirs.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->select('parkirs.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->where('jenis_motors.id', '=', $request->jenis)
            ->get();

        $data = [
            'title' => 'Report Filter Jenis',
            'date' => date('m/d/Y'),
            'data' => $parkir
        ];

        $pdf = PDF::loadView('transaksi.pdfreport', $data);

        return $pdf->download('report-filter-jenis' . $request->jenis . '.pdf');
    }
}
