<?php

namespace App\Http\Controllers;

use App\Models\Badminton;
use App\Models\Futsal;
use App\Models\Lapangan;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use App\Models\Pemilik;
use App\Models\Penyewa;
use App\Models\User;
use App\Charts\ChartPemesanan;
use App\Models\jLapangan;
use Barryvdh\DomPDF\Facade\Pdf;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class SuperAdmin extends Controller
{
    public function superadminHome()
    {

        return view('superadmin.home');
    }
    
    public function delete($id)
{
    // Find the user by ID
    $users = User::find($id);

    if ($users) {
        // Delete the user
        $users->delete();

        // Redirect back or to another page after deletion
        return redirect()->route('superadmin.dLapangan')->with('success', 'User deleted successfully');
    } else {
        // User not found
        return redirect()->route('superadmin.dLapangan')->with('error', 'User not found');
    }
}
public function deletePemesan($id)
{
    // Find the user by ID
    $users = User::find($id);

    if ($users) {
        // Delete the user
        $users->delete();

        // Redirect back or to another page after deletion
        return redirect()->route('superadmin.dPemesan')->with('success', 'User deleted successfully');
    } else {
        // User not found
        return redirect()->route('superadmin.dPemesan')->with('error', 'User not found');
    }
}
public function ublokir($id)
{
    // Your logic to unblock the user goes here
    // Example: Update user status or perform any necessary action

    return redirect()->back()->with('success', 'User successfully unblocked.');
}
public function haluBlokir() {
    return view('user.ublokir');
}
}