<?php

namespace App\Http\Controllers;
use App\Models\BusinessPartner;
use Illuminate\Http\Request;

class BusinessPartnersController extends Controller
{
    //
    public function index()
    {
        $addons = BusinessPartner::all();
        //dd($addons);
        return view('business_partners.index', compact('addons'));
        //return view('addon_list.index');
    }

    public function create()
    {
        // Ambil data dari AddOnMasterData dan BusinessPartner untuk ditampilkan di dropdown
        //$addons = AddOnMasterData::all();

        return view('business_partners.createBP_List');
    }

    public function getData()
    {
        // $listAddon = AddOnMasterData::all();
        // dd($listAddon);
        // return DataTables::of($listAddon);

        $addons = BusinessPartner::all();

        // Format untuk JSON response DataTables
        return response()->json([
            'recordsTotal' => BusinessPartner::count(),
            'recordsFiltered' => $addons->count(),
            'data' => $addons
        ]);
    }

    public function store(Request $request)
    {
        // Ensure the user is authenticated
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Validasi input
        // $request->validate([
        //     'addon_id' => 'required|exists:addon_master_data,addon_id',
        //     'bp_code' => 'required|exists:business_partners,bp_code',
        //     'description' => 'required|string|max:255',
        //     'date' => 'required|date',
        //     'status' => 'required|string|max:50',
        // ]);

        // Simpan data ke tabel addon_list
        BusinessPartner::create([
            'bp_name' => $request->bp_name,
            'address' => $request->address,
            'telegram_token' => $request->telegram_token
        ]);

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('business_partners.index')->with('success', 'Business Partners berhasil ditambahkan!');
    }
}
