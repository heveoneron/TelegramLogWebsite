<?php

namespace App\Http\Controllers;

use App\Models\AddOnMasterData;
use Illuminate\Http\Request;

class AddonListController extends Controller
{
    //
    public function index()
    {
        $addons = AddOnMasterData::all();
        //dd($addons);
        return view('addon_list.index', compact('addons'));
        //return view('addon_list.index');
    }

    public function create()
    {
        // Ambil data dari AddOnMasterData dan BusinessPartner untuk ditampilkan di dropdown
        //$addons = AddOnMasterData::all();

        return view('addon_list.createAddon_List');
    }

    public function getData(Request $request)
    {
        $length = $request->input('length', 10); // Jumlah data per halaman
        $start = $request->input('start', 0); // Offset untuk pagination
        $searchValue = $request->input('search.value', ''); // Pencarian

        // Parameter sorting yang diterima DataTables
        $orderColumnIndex = $request->input('order.0.column', 0); // Kolom yang akan diurutkan
        $orderDirection = $request->input('order.0.dir', 'asc'); // Arah pengurutan

        // Kolom yang dapat diurutkan
        $columns = ['addon_id', 'addon_name'];

        // Query awal
        $query = AddOnMasterData::query();

        // Pencarian (search)
        if (!empty($searchValue)) {
            $query->where('addon_id', 'like', "%{$searchValue}%")
                ->orWhere('addon_name', 'like', "%{$searchValue}%");
        }

        // Sort berdasarkan kolom yang dipilih dan arah pengurutan
        $query->orderBy($columns[$orderColumnIndex], $orderDirection);

        // Total data setelah filter
        $totalFiltered = $query->count();

        // Pagination
        $addons = $query->offset($start)->limit($length)->get();

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => AddOnMasterData::count(), // Total data tanpa filter
            'recordsFiltered' => $totalFiltered, // Total data setelah filter
            'data' => $addons
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        // $request->validate([
        //     'addon_id' => 'required|exists:addon_master_data,addon_id',
        //     'bp_code' => 'required|exists:business_partners,bp_code',
        //     'description' => 'required|string|max:255',
        //     'date' => 'required|date',
        //     'status' => 'required|string|max:50',
        // ]);

        // Simpan data ke tabel addon_list
        AddOnMasterData::create([
            'addon_name' => $request->addon_name
        ]);

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('addon_list.index')->with('success', 'Addon berhasil ditambahkan!');
    }
}
