<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'jam_masuk' => 'datetime',
        'jam_keluar' => 'datetime'
    ];

    // mengambil data biaya dari tanggal
    static public function getFeeByDate($startDate, $endDate)
    {
        return Parkir::join('motors', 'motors.id', '=', 'parkirs.id_motor')
            ->join('jenis_motors', 'jenis_motors.id', '=', 'motors.id_jenis')
            ->select('jenis_motors.biaya')
            ->where('parkirs.status', '=', 'selesai')
            ->whereBetween('parkirs.created_at', [$startDate, $endDate])
            ->get();
    }

    // mengambil data parkir hari ini
    static public function GetParkirDateNow()
    {
        return Parkir::leftJoin('motors', 'parkirs.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->whereDate('parkirs.created_at', date('Y-m-d'))
            ->select('parkirs.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->get();
    }

    // batal parkir / ubah status data parkir menjadi di batalkan
    static public function cancelParkir($id)
    {
        $parkir = Parkir::findOrFail($id);

        return $parkir->update([
            'status' => 'dibatalkan',
        ]);
    }

    // melakukan pembayaran dengan tunai / cash
    static public function payWithCash($id, $dateNow)
    {
        return Parkir::where('id', $id)
            ->update([
                'status' => 'selesai',
                'tipe_pembayaran' => 'cash',
                'jam_keluar' => $dateNow,
            ]);
    }

    // melakukan pembayaran dengan transfer
    static public function payWithTRansfer($id, $dateNow, $imageName)
    {
        return Parkir::where('id', $id)
            ->update([
                'bukti_bayar' => $imageName,
                'status' => 'selesai',
                'tipe_pembayaran' => 'transfer',
                'jam_keluar' => $dateNow,
            ]);
    }

    // melakukan pembayaran dengan transfer
    static public function getAllKomplain()
    {
        return Parkir::leftJoin('motors', 'parkirs.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->join('komplains', 'parkirs.id_komplain', '=', 'komplains.id')
            ->select('parkirs.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya', 'komplains.id as id_komplain', 'komplains.komplain', 'komplains.status', 'komplains.biaya as biaya_ganti_rugi')
            ->get();
    }

    // menambahkan komplain pada parkir
    static public function addKomplain($id, $komplain)
    {
        return Parkir::where('id', $id)
            ->update([
                'komplain' => $komplain,
            ]);
    }

    // ambil data parkir melalui id
    static public function getParkirByID($id)
    {
        return Parkir::leftJoin('motors', 'parkirs.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->where('parkirs.id', $id)
            ->select('parkirs.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->first();
    }

    // ambil semua data pada parkir
    static public function getAllParkir()
    {
        return Parkir::leftJoin('motors', 'parkirs.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->select('parkirs.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->get();
    }

    // ambil data pada parkir sesuai tanggal
    static public function getParkirByDate($startDate, $endDate)
    {
        return Parkir::leftJoin('motors', 'parkirs.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->select('parkirs.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->whereBetween('parkirs.created_at', [$startDate, $endDate])
            ->get();
    }
    // ambil semua data pada parkir
    static public function getParkirByJenis($jenis)
    {
        return Parkir::leftJoin('motors', 'parkirs.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->select('parkirs.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya')
            ->where('jenis_motors.id', '=', $jenis)
            ->get();
    }
}
