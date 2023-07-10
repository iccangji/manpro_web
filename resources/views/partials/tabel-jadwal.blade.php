<table class="table table-non-mobile table-success text-center mt-1">
    <tr>
        <th>Jam</th>
        @php
            for ($i = 0; $i < 7; $i++) {
                $hari = date('w', strtotime('' . $i . ' days'));
                if (is_null($lapangan->hari_libur)) {
                    echo '<th>' . date('d/m', strtotime('' . $i . ' days')) . '</th>';
                } else {
                    if ($hari == $lapangan->hari_libur) {
                        echo '<th class="table-danger">' . date('d/m', strtotime('' . $i . ' days')) . '</th>';
                    } else {
                        echo '<th>' . date('d/m', strtotime('' . $i . ' days')) . '</th>';
                    }
                }
            }
        @endphp
    </tr>
    @for ($i = intval(date('s', intval($lapangan->jam_buka))); $i <= intval(date('s', intval($lapangan->jam_tutup))); $i++)
        @if ($i >= intval(date('s', intval($lapangan->jam_istirahat))) and
            $i <= intval(date('s', intval($lapangan->jam_buka_kembali))))
            @continue
        @endif
        <tr>
            <td>{{ $i }}:00</td>
            @php
                for ($j = 0; $j < 7; $j++) {
                    $pesanan = false;
                    $tgl = date('Y-m-d', strtotime('' . $j . ' days'));
                    $jam = date_format(date_create($i . ':00:00'), 'H:i:s');
                    for ($k = 0; $k < count($order); $k++) {
                        if ($order[$k]->tanggal == $tgl and $order[$k]->waktu == $jam) {
                            $pesanan = true;
                        }
                    }
                    if ($pesanan) {
                        echo '<td><button class="btn btn-danger readonly">Telah dipesan</button></td>';
                    } else {
                        if (date('w', strtotime('' . $j . ' days')) != $lapangan->hari_libur) {
                            echo '<td><button class="btn btn-success JPO_open" value="' . $tgl . ' ' . $jam . '">Pesan</button></td>';
                        } else {
                            echo '<td class="table-danger"></td>';
                        }
                    }
                }
            @endphp
        </tr>
    @endfor
    {{-- <tr>
        <td>20.00</td>
        <td><button class="btn btn-danger">Telah dipesan</button></td>
    </tr>
    <tr>
        <td>21.00</td>
        <td><button class="btn btn-danger">Telah dipesan</button></td>
    </tr> --}}
</table>

{{-- TABEL JADWAL MOBILE --}}

<div class="table-mobile">
    @for ($i = 0; $i < 7; $i++)
        @php
            $hari = date('w', strtotime('' . $i . ' days'));
        @endphp
        @if ($hari != $lapangan->hari_libur)
            <table class="table table-success text-center mt-1">
                <tr>
                    <th colspan="2">{{ date('d/m', strtotime($i . ' days')) }}</th>
                </tr>
                <tr>
                    <th>Jam</th>
                    <th>Status</th>
                </tr>
                @php
                    $j = intval(date('s', intval($lapangan->jam_buka)));
                @endphp
                @while ($j <= intval(date('s', intval($lapangan->jam_tutup))))
                    @php
                        $pesanan = false;
                        if ($j >= intval(date('s', intval($lapangan->jam_istirahat))) and $j <= intval(date('s', intval($lapangan->jam_buka_kembali)))) {
                            $j++;
                        } else {
                            echo "<tr>
                                <td>" .
                                $j .
                                ':00</td>';
                            $tgl = date('Y-m-d', strtotime('' . $i . ' days'));
                            $jam = date_format(date_create($j . ':00:00'), 'H:i:s');
                            for ($k = 0; $k < count($order); $k++) {
                                if ($order[$k]->tanggal == $tgl and $order[$k]->waktu == $jam) {
                                    $pesanan = true;
                                }
                            }
                            if ($pesanan) {
                                echo '<td><button class="btn btn-danger" readonly>Telah dipesan</button></td>';
                            } else {
                                echo '<td><button class="btn btn-success JPO_open" value="' . date('Y/d/m', strtotime($i . ' days')) . ' ' . $jam . '">Pesan</button></td>';
                            }
                            $j++;
                        }
                        
                    @endphp
                @endwhile
        @endif
        </table>
    @endfor
</div>
