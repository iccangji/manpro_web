<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = auth()->user()->level;
        if ($level == 'sewa') {
            $order = Order::where('pemesan', auth()->user()->user)->get();
        } elseif ($level == 'lapangan') {
            $lapangan = Lapangan::where('pemilik', auth()->user()->user)->get();
            $order = Order::where('lapangan', $lapangan[0]->nama)
                ->orderBy('created_at', 'desc')
                ->get();
            // dd($order);
            // return $order;
        } else {
            $order = Order::orderBy('created_at', 'desc')->get();
        }
        $lapangan = Lapangan::orderBy('created_at', 'desc')->get();
        $nama_lapangan = [];
        foreach ($order as $o) {
            foreach ($lapangan as $l) {
                if ($o->lapangan == $l->nama) {
                    array_push($nama_lapangan, $l->nama);
                }
            }
        }

        // dd($nama_lapangan);
        // return ($nama_lapangan);
        return view('order', [
            'title' => 'Sportky | Pesanan',
            'order' => $order,
            'nama_lapangan' => $nama_lapangan,
            'level' => $level,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return ($request);
        // return ($request->all());
        $data = request()->validate([
            'pemesan' => '',
            'olahraga' => '',
            'lapangan' => '',
            'indeks' => '',
            'konfirmasi' => '',
            'tanggal' => '',
            'waktu' => '',
        ]);
        // $data['waktu'] = $data['waktu'] . ' ' . $request->all()['jam'];
        // dd($data);
        Order::create($data);
        // $request->session()->flash('success', 'Akun berhasil didaftarkan');
        $request->session()->flash('success', 'Pesanan berhasil ditambahkan');

        return redirect('/pesanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    public function konfirmasi($id, Request $request)
    {
        Order::find($id)->update(['konfirmasi' => 1]);
        $request->session()->flash('success', 'Pesanan berhasil dikonfirmasi');
        return redirect()->intended('/pesanan');
    }
    public function cek_konfirmasi($id)
    {
        $data = Order::where('id', $id)->get()[0];
        $lapangan = Lapangan::where('nama', $data->lapangan)->get()[0];
        return view('konfirmasi', [
            'title' => 'Cek Konfirmasi Pembayaran',
            'data' => $data,
            'lapangan' => $lapangan,
        ]);
    }
    public function upload_konfirmasi(Request $request, $id)
    {
        Order::find($id)->update(['bukti' => $request->file('bukti')->store('uploaded-images')]);
        // $request->session()->flash('success', 'Pesanan berhasil dikonfirmasi');
        return redirect('/pesanan/' . $id . '/cek-konfirmasi');
    }
}
