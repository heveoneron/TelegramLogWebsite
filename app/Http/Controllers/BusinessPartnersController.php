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

    public function getData()
    {
        // $listAddon = AddOnMasterData::all();
        // dd($listAddon);
        // return DataTables::of($listAddon);

        $users = BusinessPartner::all();

        // Format untuk JSON response DataTables
        return response()->json([
            'recordsTotal' => BusinessPartner::count(),
            'recordsFiltered' => $users->count(),
            'data' => $users
        ]);

        // //  // Ambil semua data BusinessPartner
        // $users = BusinessPartner::all();

        // // Format untuk JSON response DataTables dengan styling untuk teks
        // return response()->json([
        //     'recordsTotal' => BusinessPartner::count(),
        //     'recordsFiltered' => $users->count(),
        //     'data' => $users->map(function($user) {
        //         // Misalnya ubah warna berdasarkan kode BP
        //         $user->bp_code = '<span style="color: black;">' . $user->bp_code . '</span>';
        //         $user->bp_name = '<span style="color: black;">' . $user->bp_name . '</span>';
        //         $user->address = '<span style="color: black;">' . $user->address . '</span>';
        //         $user->telegram_token = '<span style="color: black;">' . $user->telegram_token . '</span>';
        //         return $user;
        //     })
        // ]);
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
