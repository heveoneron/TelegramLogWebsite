<?php

namespace App\Http\Controllers;

use App\Models\ListLog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data log pertama (grafik pertama)
        $logs1 = ListLog::selectRaw('DATE(date) as date, COUNT(*) as total_logs')
            ->groupBy('date') // Kelompokkan berdasarkan tanggal
            ->orderBy('date', 'asc') // Urutkan berdasarkan tanggal
            ->get();

        // Ambil data log kedua (grafik kedua) dengan kriteria berbeda jika diperlukan
        $logs2 =  ListLog::selectRaw('
        
            COUNT(*) as total_logs,
            business_partners.bp_name as bp_name')
            ->join('business_partners', 'list_logs.bp_code', '=', 'business_partners.bp_code') // Join dengan tabel business_partners
            ->groupBy('business_partners.bp_name') // Grup berdasarkan tanggal dan nama business partner
            ->orderBy('business_partners.bp_name', 'asc') // Urutkan berdasarkan tanggal
            ->get();


        $logs3 =  ListLog::selectRaw('
        
            COUNT(*) as total_logs,
            addon_master_data.addon_name as addon_name')
            ->join('addon_master_data', 'list_logs.addon_id', '=', 'addon_master_data.addon_id') // Join dengan tabel business_partners
            ->groupBy('addon_master_data.addon_name') // Grup berdasarkan tanggal dan nama business partner
            ->orderBy('addon_master_data.addon_name', 'asc') // Urutkan berdasarkan tanggal
            ->get();





        // Kirim kedua set data ke view
        return view('dashboard', compact('logs1', 'logs2','logs3'));
    }
}
