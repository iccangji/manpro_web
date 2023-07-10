<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\Order;
use Illuminate\Http\Request;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return (Lapangan::all());
        if (auth()->user()->level == 'admin') {
            $olahraga = $request->is('futsal') ? 'futsal' : 'badminton';
            // return Lapangan::where('olahraga', $olahraga)->get();
            // return (Lapangan::where('olahraga', $olahraga)->get())[0];
            return view('lapangan', [
                'title' => "Sportky | Lapangan",
                'lapangan' => Lapangan::where('olahraga', $olahraga)->get(),
                'libur' => ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']
            ]);
        }
        return view('lapangan', [
            'title' => 'Sportky | Lapangan',
            'futsal' => Lapangan::where('olahraga', 'futsal')->get(),
            'badminton' => Lapangan::where('olahraga', 'badminton')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('ok');
        return view('tambah', [
            'title' => 'Tambah Lapangan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return time() . '.' . $request->gambar1;
        $data = $request->validate([
            'nama' => '',
            'pemilik' => 'required|unique:lapangans|alpha_dash',
            'alamat' => '',
            'olahraga' => '',
            'fitur' => '',
            'tarif' => '',
            'jumlah' => '',
            'hari_libur' => '',
            'jam_buka' => '',
            'jam_tutup' => '',
            'jam_istirahat' => '',
            'jam_buka_kembali' => '',
            'maps' => '',
            'gambar1' => '',
            'gambar2' => '',
        ]);
        // $request->merge(['jam_buka' =>  $request->all()['jam_buka'] . ':00:00']);
        // $request->merge(['jam_tutup' =>  $request->all()['jam_tutup'] . ':00:00']);
        // $request->merge(['jam_istirahat' =>  $request->all()['jam_istirahat'] . ':00:00']);
        // $request->merge(['jam_buka_kembali' =>  $request->all()['jam_buka_kembali'] . ':00:00']);
        // $request->all()['jam_buka'] = $request->jam_buka . ':00:00';
        // return  $request->all()['jam_buka'];
        // dd($request->all());
        $data['gambar1'] = $request->file('gambar1')->store('uploaded-images');
        $data['gambar2'] = $request->file('gambar2')->store('uploaded-images');
        $data['jam_buka'] = $data['jam_buka'] . ':00:00';
        $data['jam_tutup'] = $data['jam_tutup'] . ':00:00';
        $data['jam_istirahat'] = $data['jam_istirahat']  . ':00:00';
        $data['jam_buka_kembali'] = $data['jam_buka_kembali']  . ':00:00';
        Lapangan::create($data);
        $request->session()->flash('success', 'Lapangan berhasil ditambahkan');
        return redirect('/lapangan/tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lapangan  $lapangan
     * @return \Illuminate\Http\Response
     */
    public function show($id, $index = null)
    {
        date_default_timezone_set("Asia/Makassar");
        if (is_null($index)) {
            $default_index = 1;
        } else {
            $default_index = intval($index);
        }

        // dd($default_index);
        $lapangan = Lapangan::find($id);
        // return $lapangan;
        $order = Order::where('lapangan', $lapangan->nama)->where('konfirmasi', 1)->where('indeks', $default_index)->get();
        // return ($order);
        return view('view-lapangan', [
            'title' => "Sportky | " . $lapangan->nama,
            'lapangan' => $lapangan,
            'order' => $order,
            'index' => $default_index
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lapangan  $lapangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Lapangan $lapangan, $id)
    {
        return view('edit', [
            'data' => Lapangan::where('id', $id)->get()[0],
            'title' => 'Sportky | Edit Lapangan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lapangan  $Lapangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lapangan $lapangan)
    {
        // return time() . '.' . $request->gambar1;
        $data = $request->all();
        // $request->merge(['jam_buka' =>  $request->all()['jam_buka'] . ':00:00']);
        // $request->merge(['jam_tutup' =>  $request->all()['jam_tutup'] . ':00:00']);
        // $request->merge(['jam_istirahat' =>  $request->all()['jam_istirahat'] . ':00:00']);
        // $request->merge(['jam_buka_kembali' =>  $request->all()['jam_buka_kembali'] . ':00:00']);
        // $request->all()['jam_buka'] = $request->jam_buka . ':00:00';
        // return  $request->all()['jam_buka'];
        // dd($request->all());
        // return $data;
        Lapangan::find($data['id'])->update([
            'nama' => $data['nama'],
            'pemilik' => $data['pemilik'],
            'alamat' => $data['alamat'],
            'olahraga' => $data['olahraga'],
            'tarif' => $data['tarif'],
            'jumlah' => $data['jumlah'],
            'hari_libur' => $data['hari_libur'],
            'jam_buka' => $data['jam_buka'],
            'jam_tutup' => $data['jam_tutup'],
            'jam_istirahat' => $data['jam_istirahat'],
            'jam_buka_kembali' => $data['jam_buka_kembali']
        ]);
        if ($request->file('gambar1')) {
            Lapangan::find($data['id'])->update([
                'gambar1' => $request->file('gambar1')->store('uploaded-images')
            ]);
        }
        if ($request->file('gambar2')) {
            Lapangan::find($data['id'])->update([
                'gambar2' => $request->file('gambar2')->store('uploaded-images')
            ]);
        }
        // Lapangan::create($data);
        $request->session()->flash('log', 'Data lapangan berhasil diubah');
        return redirect('/');

        // $request->session()->flash('success', 'Pesanan berhasil dikonfirmasi');
        // return redirect()->intended('/pesanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lapangan  $lapangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lapangan $lapangan)
    {
        //
    }
}
