<?php

namespace App\Http\Controllers;

use App\Models\BusinessPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function getData(Request $request)
    {
        $length = $request->input('length', 10); // Jumlah data per halaman
        $start = $request->input('start', 0); // Offset untuk pagination
        $searchValue = $request->input('search.value', ''); // Pencarian

        // Parameter sorting yang diterima DataTables
        $orderColumnIndex = $request->input('order.0.column', 0); // Kolom yang akan diurutkan
        $orderDirection = $request->input('order.0.dir', 'asc'); // Arah pengurutan

        // Kolom yang dapat diurutkan
        $columns = ['bp_code', 'bp_name', 'address', 'telegram_token'];

        // Query awal
        $query = BusinessPartner::query();

        // Pencarian (search)
        if (!empty($searchValue)) {
            $query->where('bp_code', 'like', "%{$searchValue}%")
                ->orWhere('bp_name', 'like', "%{$searchValue}%")
                ->orWhere('address', 'like', "%{$searchValue}%")
                ->orWhere('telegram_token', 'like', "%{$searchValue}%");
        }

        // Sort berdasarkan kolom yang dipilih dan arah pengurutan
        $query->orderBy($columns[$orderColumnIndex], $orderDirection);

        // Total data setelah filter
        $totalFiltered = $query->count();

        // Pagination
        $partners = $query->offset($start)->limit($length)->get();

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => BusinessPartner::count(), // Total data tanpa filter
            'recordsFiltered' => $totalFiltered, // Total data setelah filter
            'data' => $partners
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
    public function destroy($bp_code)
    {
        $businessPartner = BusinessPartner::where('bp_code', $bp_code)->first();
        if ($businessPartner) {
            $businessPartner->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }
}
