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

    public function getData()
    {
        // $listAddon = AddOnMasterData::all();
        // dd($listAddon);
        // return DataTables::of($listAddon);

        $addons = AddOnMasterData::all();

        // Format untuk JSON response DataTables
        return response()->json([
            'recordsTotal' => AddOnMasterData::count(),
            'recordsFiltered' => $addons->count(),
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
