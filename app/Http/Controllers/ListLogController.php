<?php

namespace App\Http\Controllers;

use App\Models\AddOnMasterData;
use App\Models\BusinessPartner;
use App\Models\ListLog;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ListLogController extends Controller
{
    //
    public function index()
    {
        return view('list_logs.index');
    }

    public function getData()
    {
        //$listLogs = ListLog::with(['addOn', 'businessPartner'])->select('list_logs.*');
        //$listLogs = ListLog::with(['addOn', 'businessPartner'])->select('list_logs.*')->get();
        $listLogs = ListLog::with(['addOn', 'businessPartner'])->get();
        //dd($listLogs);
        // return DataTables::of($listLogs)
        //     ->addColumn('addon_name', function ($log) {
        //         return $log->addOn->addon_name ?? '-';
        //     })
        //     ->addColumn('bp_name', function ($log) {
        //         return $log->businessPartner->bp_name ?? '-';
        //     })
        //     ->make(true);
        return response()->json([
            'recordsTotal' => ListLog::count(),
            'recordsFiltered' => $listLogs->count(),
            'data' => $listLogs->map(function($log) {
                return [
                    'id' => $log->id,
                    'addon_name' => $log->addOn->addon_name ?? '-', // Accessing addon_name from the related model
                    'bp_name' => $log->businessPartner->bp_name ?? '-', // Accessing bp_name from the related model
                    'description' => $log->description,
                    'date' => $log->date,
                    'status' => $log->status,
                ];
            })
        ]);
    }

    public function create()
    {
        // Ambil data dari AddOnMasterData dan BusinessPartner untuk ditampilkan di dropdown
        $addons = AddOnMasterData::all();
        $businessPartners = BusinessPartner::all();

        return view('list_logs.create', compact('addons', 'businessPartners'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'addon_id' => 'required|exists:addon_master_data,addon_id',
            'bp_code' => 'required|exists:business_partners,bp_code',
            'description' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|string|max:50',
        ]);

        // Simpan data ke tabel list_logs
        ListLog::create([
            'addon_id' => $request->addon_id,
            'bp_code' => $request->bp_code,
            'description' => $request->description,
            'date' => $request->date,
            'status' => $request->status,
        ]);

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('list-logs.index')->with('success', 'Log berhasil ditambahkan!');
    }
}
