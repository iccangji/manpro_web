<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('name', auth()->user()->name)->value('name');
        // return Lapangan::where('pemilik', auth()->user()->user)->get();
        if (auth()->user()->level == 'lapangan') {
            $libur = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            return view('index', [
                'title' => 'SportKy | Tempat Penyewaan Lapangan Olahraga',
                'info' => (Lapangan::where('pemilik', auth()->user()->user)->get())[0],
                'libur' => $libur
            ]);
        }
        // $request->session()->flash('log', 'Selamat datang, ');
        return view('index', [
            'count_futsal' => Lapangan::where('olahraga', 'futsal')->get(),
            'count_badminton' => Lapangan::where('olahraga', 'badminton')->get(),
            'title' => 'SportKy | Tempat Penyewaan Lapangan Olahraga',
        ]);
    }
}
