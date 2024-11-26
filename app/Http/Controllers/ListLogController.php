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

    public function getData(Request $request)
    {
        // Ambil parameter dari DataTables
        $length = $request->input('length', 10); // Jumlah data per halaman
        $start = $request->input('start', 0); // Offset
        $page = ($start / $length) + 1; // Hitung halaman saat ini
        $searchValue = $request->input('search.value', ''); // Nilai pencarian

        // Ambil parameter untuk sorting
        $orderColumnIndex = $request->input('order.0.column', 0); // Indeks kolom yang diurutkan
        $orderDirection = $request->input('order.0.dir', 'asc'); // Arah pengurutan ('asc' atau 'desc')

        // Kolom yang bisa diurutkan (hapus 'status' dari sini)
        $columns = ['id', 'description', 'addon_name', 'bp_name', 'date'];

        // Query data dengan relasi
        $query = ListLog::with(['addOn', 'businessPartner']);

        // Tambahkan pencarian (filter)
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('description', 'like', "%{$searchValue}%")
                    ->orWhere('status', 'like', "%{$searchValue}%")
                    ->orWhereHas('addOn', function ($q) use ($searchValue) {
                        $q->where('addon_name', 'like', "%{$searchValue}%");
                    })
                    ->orWhereHas('businessPartner', function ($q) use ($searchValue) {
                        $q->where('bp_name', 'like', "%{$searchValue}%");
                    });
            });
        }

        // Menangani sorting berdasarkan kolom yang dipilih
        $orderByColumn = $columns[$orderColumnIndex]; // Ambil nama kolom berdasarkan indeks

        // Menangani sort untuk kolom date (menggunakan 'date' sebagai nama kolom yang benar)
        if ($orderByColumn == 'date') {
            $query->orderByRaw("STR_TO_DATE(date, '%Y-%m-%d') " . $orderDirection); // Pastikan mengurutkan dengan benar berdasarkan tanggal
        } else {
            $query->orderBy($orderByColumn, $orderDirection);
        }

        // Pagination
        $listLogs = $query->paginate($length, ['*'], 'page', $page);

        // Convert the paginated data to a collection
        $logs = $listLogs->items();  // Use items() instead of getCollection()

        // Response untuk DataTables
        return response()->json([
            'draw' => $request->input('draw'), // DataTables tracking
            'recordsTotal' => ListLog::count(), // Total data di database
            'recordsFiltered' => $listLogs->total(), // Total data setelah filter
            'data' => array_map(function ($log) {
                return [
                    'id' => $log->id,
                    'addon_name' => $log->addOn->addon_name ?? '-',
                    'bp_name' => $log->businessPartner->bp_name ?? '-',
                    'description' => $log->description,
                    'date' => $log->date,
                    'status' => $log->status,
                ];
            }, $logs),
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
