<div id="wrapper"
    style="opacity: 1;   backdrop-filter: blur(8px);backdrop-filter: blur(5px); visibility: hidden; position: fixed; overflow: auto; z-index: 100001; width: 100%; height: 100%; top: 0px; left: 0px; text-align: center; background-color: rgba(0,0,0,0.5);display:flex; justify-content:center;">
    <div class="popup"
        style="width: 60%; background-color:; visibility: hidden; pointer-events: auto; display: block; outline: none;
        text-align: left; position: relative; vertical-align: middle; position:absolute; margin: 0; position: absolute; top: 50%; -ms-transform: translateY(-50%); transform: translateY(-50%);"
        class="mx-auto">
        <div class="bg-light rounded p-4" id="" style="width: 100%">
            <div class="row d-flex flex-row-reverse">
                <div class="col-lg-1 col-xl-1 col-sm-1 d-flex justify-content-end flex-sm-column-reverse">
                    <button class="btn btn-light JPO_close">
                        <h4>X</h4>
                    </button>
                </div>
                <div class="col-lg-11 col-xl-11 col-sm-11">
                    <h3>PEMESANAN</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <form class="py-2" method="POST" action="/pesan/{{ $lapangan->id }}">
                        @csrf
                        <div class="form-group">
                            <strong>
                                <label for="exampleInputEmail1">Nama</label>
                            </strong>
                            <input name="pemesan" type="text" class="form-control" id="pemesan"
                                aria-describedby="emailHelp" value="{{ auth()->user()->user }}" readonly>
                            <input type="hidden" name="olahraga" value="{{ $lapangan->olahraga }}">
                        </div>
                        <div class="form-group">
                            <strong>
                                <label for="exampleInputEmail1">Lapangan</label>
                            </strong>
                            <input name="lapangan" type="text" class="form-control" id="lapangan"
                                aria-describedby="emailHelp" value="{{ $lapangan->nama }}" readonly>
                        </div>
                        <div class="form-group">
                            <strong>
                                <label for="exampleInputEmail1">Lapangan Ke</label>
                            </strong>
                            <input name="indeks" type="text" class="form-control" id="indeks"
                                aria-describedby="emailHelp" value="{{ $index }}" readonly>
                        </div>
                        <div class="form-group">
                            <strong>
                                <label for="exampleInputEmail1">Tanggal</label>
                            </strong>
                            <input name="tanggal" type="text" class="form-control" id="inputtanggal"
                                aria-describedby="emailHelp" value="" readonly>
                            <input name="konfirmasi" type="hidden" class="form-control" id=""
                                aria-describedby="emailHelp" value="0" readonly>
                        </div>
                        <div class="form-group">
                            <strong>
                                <label for="exampleInputEmail1">Jam</label>
                            </strong>
                            <input name="waktu" type="text" class="form-control" id="inputjam"
                                aria-describedby="emailHelp" value="" readonly>
                        </div>
                        <div class="form-group">
                            <strong>
                                <label for="exampleInputEmail1">Tarif</label>
                            </strong>
                            <input type="text" class="form-control" aria-describedby="emailHelp"
                                value="{{ $lapangan->tarif }}" readonly>
                        </div>
                        {{-- <div class="my-4">
                    <small>Pembayaran dilakukan melalui transfer bank, masukkan nama alias rekening anda</small>
                    <div class="form-group my-1">
                        <strong>
                            <label for="exampleInputEmail1">Nama Rekening</label>
                        </strong>
                        <input type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                </div> --}}
                        <button type="submit" class="btn btn-primary my-2 w-100">PESAN</button>
                    </form>
                </div>
            </div>
            <!-- Add a button to close the popup (optional) -->
        </div>
    </div>
</div>
