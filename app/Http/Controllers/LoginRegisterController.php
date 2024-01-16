<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Futsal;
use App\Models\Badminton;
use App\Models\Lapangan;
use App\Models\jLapangan;
use App\Models\Pemesanan;
use Database\Seeders\FutsalSeeder;
use PDF;

class LoginRegisterController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }
    public function registerLapangan()
    {
        return view('auth.registerLapangan');
    }

    public function userHome(Request $request)
    {
        $search = $request->input('search');

        $data = Lapangan::where(function ($query) use ($search) {
            $query->where('nama_lapangan', 'Like', '%' . $search . '%');
        })->paginate(100);

        return view('user.home', compact('data'));
    }
    public function superadmin()
    {
        $userCount = User::where('level', 'user')->count();
        $adminCount = User::where('level', 'admin')->count();
        $saCount = User::where('level', 'superadmin')->count();

        return view('superadmin.home', compact('userCount', 'adminCount', 'saCount'));
    }


    public function UserDataProfil()
    {
        return view('user.dataprofil');
    }

    public function UserProfil()
    {
        return view('user.profil');
    }



    public function userBadminton(Request $request)
    {
        $search = $request->input('search');

        $data = Lapangan::where(function ($query) use ($search) {
            $query->where('nama_lapangan', 'Like', '%' . $search . '%');
        })->paginate(100);

        return view('user.badminton', compact('data'));
    }

    public function userFutsal(Request $request)
    {
        $search = $request->input('search');

        $lapangan = Lapangan::all();

        $data = Lapangan::where(function ($query) use ($search) {
            $query->where('nama_lapangan', 'Like', '%' . $search . '%');
        })->paginate(100);

        return view('user.futsal', compact('data', 'lapangan'));
    }

    public function userBooking(Request $request, $id)
    {
        $d = $id;
        $j_lapangan = jLapangan::all();
        $lapangan = Lapangan::find($id);
    
        // Fetch booked times for the specified date
        $tanggal = $request->input('tanggal'); // Assuming you have a 'tanggal' field in your form
        $bookedTimes = Pemesanan::where('lapangan_id', $id)
            ->where('tanggal', $tanggal)
            ->pluck('jam_m'); // Assuming 'jam_m' is the field for start time
    
        // Generate available times as integers for the dropdown
        $currentHour = now()->format('H');
        $availableTimes = [];
        for ($i = 8; $i <= 24; $i++) {
            if (!in_array($i, $bookedTimes->toArray()) && ($tanggal != now()->format('Y-m-d') || $i >= $currentHour)) {
                $availableTimes[] = $i;
            }
        }
        return view('user.booking', compact('j_lapangan', 'lapangan', 'd', 'availableTimes'));
    }


    public function userTransaksi()
    {
        $p = Pemesanan::all();
        $user = User::all();
    

        return view('user.transaksi', compact('p', 'user'));
    }


    public function adminHome(Request $request)
    {
        $search = $request->input('search');

        $data = User::where('level', 'admin')->where('name', 'LIKE', '%' . $search . '%')->paginate(100);

        return view('admin.home', compact('data'));
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:20|confirmed',
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = 'user';
        $user->status = 'aman';

        $user->save();

        if ($user) {
            return redirect('auth/login')->with('success', 'Akun berhasil dibuat, silakan login!');
        } else {
            return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
        }
    }
    public function postRegisterLapangan(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:20|confirmed',
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = 'admin';
        $user->status = 'aman';

        $user->save();

        if ($user) {
            return redirect('auth/login')->with('success', 'Akun berhasil dibuat, silakan login');
        } else {
            return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
        }
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:20',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            if ($user->level == 'user' ) {
                if ($user->status == 'Blokir') { 
                    return redirect('/user/blokir');
                } else {
                    return redirect('/user/home');
                }
            } elseif ($user->level == 'admin') {
                if ($user->status == 'Blokir') { 
                    return redirect('/admin/blokir');
                } else {
                    return redirect('/admin/lapangan');
                }
            } elseif ($user->level == 'superadmin') {
                return redirect('/superadmin/home');
            }
        }

        return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    // Example Controller method
    public function postPemesanan(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'nama_p' => 'required|string|max:255',
            'hari' => 'required|string',
            'tanggal' => 'required|date',
            'lapangan' => 'required|integer',
            'jam_mulai' => 'required|integer',
            'jam_selesai' => 'required|integer',
        ]);
    
        // Check if the time slot is already booked
        $existingBooking = Pemesanan::where('lapangan_id', $id)
            ->where('hari', $validatedData['hari'])
            ->where('tanggal', $validatedData['tanggal'])
            ->where('jam_m', $validatedData['jam_mulai'])
            ->where('jam_s', $validatedData['jam_selesai'])
            ->first();
    
        if ($existingBooking) {
            // Redirect with error message
            return redirect()->route('user.transaksi')->with('error', 'Waktu tersebut sudah disewakan.');
        }
    
        // Save data to the database
        Pemesanan::create([
            'nama_p' => $validatedData['nama_p'],
            'j_lapangan_id' => $validatedData['lapangan'],
            'users_id' => Auth::user()->id,
            'hari' => $validatedData['hari'],
            'lapangan_id' => $id,
            'tanggal' => $validatedData['tanggal'],
            'jam_m' => $validatedData['jam_mulai'],
            'jam_s' => $validatedData['jam_selesai'],
            'status' => 'Belum Dibayar'
        ]);
    
        // Redirect with success message
        return redirect()->route('user.transaksi')->with('success', 'Pemesanan berhasil disimpan.');
    }


    public function userbuktiBooking(Request $request)
    {
        $currentDate = now()->format('Y-m-d');

        return view('user.buktiBooking', compact('currentDate'));
    }
    public function usercetakBukti(Request $request, $id)
    {
        
        $currentDate = now()->format('Y-m-d');
        
        $pay = Pemesanan::where('id', $id)->first();
        $data = Pemesanan::all();
        $filename = $currentDate . '.pdf';

        $pdf = PDF::loadView('user.cetakBukti', compact('pay', 'currentDate', 'data'));

        return $pdf->download($filename);
    }


    public function superadmindLapangan(Request $request)
    {
        $search = $request->input('search');

        $data = User::where('level', 'admin')->where('name', 'LIKE', '%' . $search . '%')->paginate(100);

        return view('superadmin.dLapangan', compact('data'));
    }


    public function superadmindPemesan(Request $request)
    {
        $search = $request->input('search');

        $data = User::where('level', 'user')->where('name', 'LIKE', '%' . $search . '%')->paginate(100);

        return view('superadmin.dPemesan', compact('data'));
    }
    public function delete($id)
    {
        // Find the user by ID
        $user = User::find($id);

        if ($user) {
            // Delete the user
            $user->delete();

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
        $user = User::find($id);
    
        if ($user) {
            // Delete the user
            $user->delete();
    
            // Delete related pemesanan
            $user->pemesan()->delete();
    
            // Redirect back or to another page after deletion
            return redirect()->route('superadmin.dPemesan')->with('success', 'User and related Pemesan deleted successfully');
        } else {
            // User not found
            return redirect()->route('superadmin.dPemesan')->with('error', 'User not found');
        }
    }
    


}