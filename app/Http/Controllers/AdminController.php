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
use App\Charts\ChartPeminjaman;
use App\Models\jLapangan;
use Barryvdh\DomPDF\Facade\Pdf;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use ConsoleTVs\Charts\Facades\Charts;

class AdminController extends Controller
{
    public function adminaprofile(){
        $data = Lapangan::all();
        
        return view('admin.aProfile', compact('data'));
    }

    public function adminLapangan(Request $request)
    {
        $search = $request->input('search ');

        $data = Lapangan::where(function ($query) use ($search) {
            $query->where('jenis_lapangan', 'LIKE', '%' . $search . '%');
        })->paginate(100);
        return view('admin.lapangan', compact('data'));
    }
    public function admintambahLapangan(Request $request)
    {
        $search = $request->input('search');

        $data = Lapangan::where(function ($query) use ($search) {
            $query->where('jenis_lapangan', 'LIKE', '%' . $search . '%');
        })->paginate(100);
        return view('admin.tambahLapangan', compact('data'));
    }
    public function admintambahjLapangan(Request $request)
    {
        $search = $request->input('search');
        $users = Lapangan::all();
        $data = Lapangan::where(function ($query) use ($search) {
            $query->where('jenis_lapangan', 'LIKE', '%' . $search . '%');
        })->paginate(100);
        return view('admin.tambahjLapangan', compact('data', 'users'));
    }



    public function adminManajemen(Request $request)
    {

        $data = jLapangan::all();
        return view('admin.manajemen', compact('data'));
    }
    public function adminPemesanan(Request $request)
{
  

    // Ambil data Pemesanan dan Lapangan
    $pemesanans = Pemesanan::all();
    $lapangans = Lapangan::all();

    // Kirim data ke tampilan
    return view('admin.pemesanan', compact('pemesanans', 'lapangans'));
}


    public function tambahLapangan()
    {
        $users = User::all();
        return view('admin.tambahLapangan', ['users' => $users]);
    }


    public function tambahjLapangan()
    {
        $users = User::all();
        return view('admin.tambahjLapangan', ['users' => $users]);
    }
    public function posttambahLapangan(Request $request)
    {
        $data = Lapangan::all();
        $request->validate([
            'nama' => 'required',
            'jenis_lapangan' => 'required',
            'nama_lapangan' => 'required',
            'deskripsi' => 'required',
            'harga_sewa' => 'required',
            'lokasi' => 'required',
            'gambar' => 'required|image|max:5120',

        ]);

        $lapangan = new Lapangan();
        $lapangan->user_id = $request->nama;
        $lapangan->jenis_lapangan = $request->jenis_lapangan;
        $lapangan->nama_lapangan = $request->nama_lapangan;
        $lapangan->deskripsi = $request->deskripsi;
        $lapangan->harga_sewa = $request->harga_sewa;
        $lapangan->lokasi = $request->lokasi;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $lapangan->gambar = $filename;
        }
        $lapangan->save();
        if ($lapangan) {
            return view('admin.lapangan', compact('data'))->with('success', 'Lapangan baru berhasil ditambahkan!');
        } else {
            return back()->with('failed', 'Data gagal ditambahkan!');
        }
    }
    // public function posttambahjLapangan(Request $request)
    // {
    //     $data = jLapangan::all();
    //     $request->validate([

    //         'lapangan_id' => 'required',
    //         'nama_lapangan' => 'required',


    //     ]);

    //     $lapangan = new jLapangan();
    //     $lapangan->lapangan_id = $request->lapangan_id;
    //     $lapangan->nama_lapangan = $request->nama_lapangan;


    //     $lapangan->save();  
    //     if ($lapangan) {
    //         return view('admin.manajemen', compact('data'))->with('success', 'Lapangan baru berhasil ditambahkan!');
    //     } else {
    //         return back()->with('failed', 'Data gagal ditambahkan!');
    //     }
    // }
    public function posttambahjLapangan(Request $request)
    {
        $request->validate([
            'lapangan_id' => 'required',
            'nama_lapangan' => 'required',
        ]);
    
        $lapangan = new jLapangan();
        $lapangan->lapangan_id = $request->lapangan_id;
        $lapangan->nama_lapangan = $request->nama_lapangan;
    
        if ($lapangan->save()) {
            // Tambahkan pengalihan ke halaman lain setelah berhasil
            return redirect()->route('admin.manajemen')->with('success', 'Lapangan baru berhasil ditambahkan!');
        } else {
            return back()->with('failed', 'Data gagal ditambahkan!');
        }
    }
    
    public function editLapangan($id)
    {
        $data = Lapangan::find($id);
        return view('admin.editLapangan', compact('data'));
    }
    public function posteditLapangan(Request $request, $id)
    {
        $data = Lapangan::all();
        $request->validate([
            'jenis_lapangan' => 'required',
            'nama_lapangan' => 'required',
            'deskripsi' => 'required',
            'harga_sewa' => 'required',
            'lokasi' => 'required',
            'gambar' => 'image|max:5120',

        ]);

        $lapangan = Lapangan::find($id);
        $lapangan->jenis_lapangan = $request->jenis_lapangan;
        $lapangan->nama_lapangan = $request->nama_lapangan;
        $lapangan->deskripsi = $request->deskripsi;
        $lapangan->harga_sewa = $request->harga_sewa;
        $lapangan->lokasi = $request->lokasi;

        if ($request->hasFile('gambar')) {
            $filepath = 'images/' . $lapangan->gambar;
            if (File::exists($filepath)) {
                File::delete($filepath);
            }
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $lapangan->gambar = $filename;
        }
        $lapangan->save();
        if ($lapangan) {
            return view('admin.lapangan', compact('data'))->with('success', 'Data berhasil diupdate!');
        } else {
            return back()->with('failed', 'Data gagal diupdate!');
        }
    }

    public function deleteLapangan($id)
    {
        // Step 1: Retrieve the associated records from the j_lapangan table
        $lapangan = Lapangan::findOrFail($id);
        $associatedRecords = JLapangan::where('lapangan_id', $id)->get();

        // Step 2: Delete the associated records
        foreach ($associatedRecords as $associatedRecord) {
            $associatedRecord->delete();
        }

        // Step 3: Delete the record from the lapangan table
        $filepath = 'news_images/' . $lapangan->foto;
        if (File::exists($filepath)) {
            File::delete($filepath);
        }

        $lapangan->delete();

        if ($lapangan) {
            return back()->with('success', 'Data lapangan berhasil dihapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus data lapangan!');
        }
    }


    public function editjLapangan($id)
    {
        $data = jLapangan::find($id);
        return view('admin.editjLapangan', compact('data'));
    }
    public function posteditjLapangan(Request $request, $id)
    {
        $data = jLapangan::all();
        $request->validate([
            'nama_lapangan' => 'required',

        ]);

        $lapangan = jLapangan::find($id);
        $lapangan->nama_lapangan = $request->nama_lapangan;

    
        
        $lapangan->save();
        if ($lapangan) {
            return view('admin.manajemen', compact('data'))->with('success', 'Data berhasil diupdate!');
        } else {
            return back()->with('failed', 'Data gagal diupdate!');
        }
    }

    public function deletejLapangan($id)
    {
        // Step 1: Retrieve the associated records from the j_lapangan table
        $lapangan = jLapangan::find($id);

        $lapangan->delete();

        if ($lapangan) {
            return back()->with('success', 'Data lapangan berhasil dihapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus data lapangan!');
        }
    }

    public function deletePemesanan($id)
    {
        // Step 1: Retrieve the associated records from the j_lapangan table
        $lapangan = Pemesanan::find($id);
        $lapangan->delete();

        if ($lapangan) {
            return back()->with('success', 'Data lapangan berhasil dihapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus data lapangan!');
        }
    }

    
    public function konfirmasi($id) {
        $pesan = Pemesanan::find($id);
        $pesan->status = 'Sudah Bayar';
        $pesan->save();

        if ($pesan) {
            return redirect('admin/pemesanan')->with('success', 'Data pemesanan berhasil diupdate!');
        } else {
            return redirect('admin/pemesanan')->with('failed', 'Gagal mengupdate data pemesanan!');
        }
    }
    public function blokir($id) {
        $pesan = User::find($id);
        $pesan->status = 'Blokir';
        $pesan->save();

        if ($pesan) {
            return redirect('superadmin/dLapangan')->with('success', 'Data berhasil diblokir!');
        } else {
            return redirect('superadmin/dLapangan')->with('failed', 'Gagal blokir data!');
        }
    }

    public function halBlokir() {
        return view('admin.blokir');
    }

   


 
}