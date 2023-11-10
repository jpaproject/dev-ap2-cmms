<!DOCTYPE html>
<html>

<head>
    <title>Report Work Order</title>
    <style type="text/css">
        html,
        body,
        div,
        span,
        applet,
        object,
        iframe,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        blockquote,
        pre,
        a,
        abbr,
        acronym,
        address,
        big,
        cite,
        code,
        del,
        dfn,
        em,
        img,
        ins,
        kbd,
        q,
        s,
        samp,
        small,
        strike,
        strong,
        sub,
        sup,
        tt,
        var,
        b,
        u,
        i,
        center,
        dl,
        dt,
        dd,
        ol,
        ul,
        li,
        fieldset,
        form,
        label,
        legend,
        table,
        caption,
        tbody,
        tfoot,
        thead,
        tr,
        th,
        td,
        article,
        aside,
        canvas,
        details,
        embed,
        figure,
        figcaption,
        footer,
        header,
        hgroup,
        menu,
        nav,
        output,
        ruby,
        section,
        summary,
        time,
        mark,
        audio,
        video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
            font-family: sans-serif;
        }

        /* HTML5 display-role reset for older browsers */
        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        menu,
        nav,
        section {
            display: block;
        }

        body {
            line-height: 1;
        }

        ol,
        ul {
            list-style: none;
        }

        blockquote,
        q {
            quotes: none;
        }

        blockquote:before,
        blockquote:after,
        q:before,
        q:after {
            content: '';
            content: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .header {
            margin-top: 20px;
        }

        .header .title {
            margin-top: 30px;
            margin-bottom: 20px;
            font-size: 30px;
            font-weight: 700;
            text-align: center;
        }

        .body {
            /* margin-top: 30px; */
            margin-bottom: 20px;
            font-size: 12px;
            font-weight: 400;
        }

        .detail {
            margin: 0 20px;
            letter-spacing: 0.1px;
            line-height: 1.1rem;
        }

        .detail .bold {
            /* font-weight: bold; */
            margin-right: 5px;
        }

        .bold {
            font-weight: bold;
        }

        .detail .left {
            float: left;
            width: 40%;
        }

        .detail .right {
            float: right;
            width: 40%;
        }

        .table {
            margin: 20px 20px;

        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 7px;
            font-size:10px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .images {
            margin: 20px 20px;
            margin-top: 30;
        }

        .images .wo-image {
            width: 25%;
            margin-top: 30px;
        }

        .page-break {
            page-break-after: always;
        }

        .d-inline {
            display: inline;
        }

        .ttd {
            margin: 40px 0 0 50px;
            text-align: center;
            width: 20%;
            float: left;
            font-size: 15px;
        }

        .ttd-left {
            margin: 40px 0 0 0px;
            text-align: center;
            width: 40%;
            float: left;
            font-size: 15px;
        }

        .ttd-right {
            margin: 40px 0 0 50px;
            text-align: center;
            width: 40%;
            float: right;
            font-size: 15px;
        }

        .row-title {
            background-color: #d8d8d8;
        }

        .row-white {
            background-color: #ffffff;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .center {
            text-align: center;
            vertical-align: middle;
        }
        .table-data {
            border: 1px solid black;
        }
        .table-data tr td {
            background-color: white;
        }
        .no{
            border-top:none;
            border-bottom:none;
            border-right: 1px solid black;
            border-left: 1px solid black;
            text-align: center;

        }
        .header-table th{
            font-weight: bold;
            border: 1px solid black;
        }
        .title-table tr td{
            border: 1px solid black;
        }
        table tr td{
            border:none;
        }
        .border{
            border: 1px solid black;
            text-align: center;
        }
        .hide{
            border-top:none;
            border-bottom:none;
        }

    </style>
</head>

<body>
    <div class="content">

        {{-- <div class="header">
            <div class="title">
                <table style="border: none;">
                    <tr style="border: none;">
                        <td style="border: none; width: 50%;">
                            <h1 style="font-size: 20px; display:inline;">
                                KCU BANDARA SOEKARNO-HATTA ELECTRICAL UTILITY & VISUAL AID ELECTRICAL UTILITY
                            </h1>
                            <br>
                            <h1 style="font-size: 35px; display:inline;">
                                CHECK LIST 1
                            </h1>
                        </td>
                        <td style="border: none; width: 50%;">
                            <img style="width: 120px; text-align:right; display:inline;"
                                src="{{ public_path('img/AP2.png') }}" alt="">
                            <div class="table">
                                <table>
                                    <tr>
                                        <td>Tanggal: {{ $laporanKerusakanElectricalProtection[0]->tanggal }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jam (Pagi): {{ $laporanKerusakanElectricalProtection[0]->jam_pagi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jam (Sore): {{ $laporanKerusakanElectricalProtection[0]->jam_sore }}</td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>

                </table>
            </div>
        </div> --}}
        <table style="margin-top:50px; padding:20px 20px 0px 20px;" class="title-table">
            <tr style=" background-color: white;">
                <td style=" width: 20%; text-align:right;" rowspan="3">
                    <img style="width: 150px; text-align:left; display:inline;"
                        src="{{ public_path('img/AP2.png') }}" alt="">
                </td>
                <td style=" width: 60%; text-align:center;" colspan="2">
                    BANDAR UDARA INTERNASIONAL SOEKARNO-HATTA OPERATION & MAINTENANCE ELECTRICAL
                </td>
                <td style=" width: 20%; text-align:right;" rowspan="3">
                    <img style="width: 150px; text-align:right; display:inline;"
                        src="{{ public_path('img/AP2-solusi.png') }}" alt="">
                </td>
            </tr>
            <tr style="background-color: white; border: none;">
                <td style=" font-weight:bold; text-align:center;" colspan="2">
                    LAPORAN KERUSAKAN
                </td>
            </tr>
            <tr style="background-color: white; border: none;">
                <td>
                    DOK NO: {{$laporanKerusakanElectricalProtection->work_order_id}}
                </td>
                <td>
                    Tanggal: {{$laporanKerusakanElectricalProtection->created_at}}
                </td>
            </tr>
        </table>
        <div class="body">
            <div class="table">
                <table style="text-align:center" class="table-data">
                    <tr class="header-table">
                        <th style="width: 5%; background-color: white;" class="center">NO</th>
                        <th style="width: 10%; background-color: white;" class="center">URAIAN</th>
                        <th style="width: 30%; background-color: white;" class="center" colspan="2">DATA</th>
                    </tr>

                    <tr>
                        <td class="no">1</td>
                        <td class="uraian">Tanggal/Bulan/Tahun</td>
                        <td class="data" colspan="2">


                            <table class="waktu">
                                <tr>
                                    <td class="border">{{$date[0]}}</td>
                                    <td class="border">{{$date[1]}}</td>
                                    <td class="hide"></td>
                                    <td class="border">{{$month[0]}}</td>
                                    <td class="border">{{$month[1]}}</td>
                                    <td class="hide"></td>
                                    <td class="border">{{$year[0]}}</td>
                                    <td class="border">{{$year[1]}}</td>
                                    <td class="border">{{$year[2]}}</td>
                                    <td class="border">{{$year[3]}}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="no">2</td>
                        <td class="uraian">Lokasi</td>
                        <td class="data" colspan="2">
                            <table class="waktu">
                                <tr>
                                    <td class="border">
                            {{$laporanKerusakanElectricalProtection->lokasi}}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="no">3</td>
                        <td class="uraian">Fasilitas</td>
                        <td class="data" colspan="2">
                            <table class="waktu">
                                <tr>
                                    <td class="border">
                            {{$laporanKerusakanElectricalProtection->fasilitas}}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="no">4</td>
                        <td class="uraian">Peralatan</td>
                        <td class="data" colspan="2">
                            <table class="waktu">
                                <tr>
                                    <td class="border">
                            {{$laporanKerusakanElectricalProtection->peralatan}}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="no">5</td>
                        <td class="uraian">Bagian Peralatan</td>
                        <td class="data" colspan="2">
                            <table class="waktu">
                                <tr>
                                    <td class="border">
                            {{$laporanKerusakanElectricalProtection->bagian_peralatan}}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="no">6</td>
                        <td class="uraian">Kategori Kerusakan</td>
                        <td class="data" colspan="2">
                            <table class="waktu" style="width: 50px">
                                <tr>
                                    <td class="border">
                            {{$laporanKerusakanElectricalProtection->kategori_kerusakan}}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="no">7</td>
                        <td class="uraian">Uraian Kerusakan</td>
                        <td class="data" colspan="2">
                        </td>
                    </tr>
                    <tr>
                        <td class="no"></td>
                        {{-- <td class="uraian"></td> --}}
                        <td class="data" colspan="3">
                            <table class="waktu">
                                <tr>
                                    <td class="border">
                            {{$laporanKerusakanElectricalProtection->uraian_kerusakan}}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="no">8</td>
                        <td class="uraian">Tindakan Perbaikan</td>
                        <td class="data" colspan="2">
                        </td>
                    </tr>
                    <tr>
                        <td class="no"></td>
                        {{-- <td class="uraian"></td> --}}
                        <td class="data" colspan="3">
                            <table class="waktu">
                                <tr>
                                    <td class="border">
                            {{$laporanKerusakanElectricalProtection->tindakan_perbaikan}}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="no">9</td>
                        <td class="uraian">Penyebab Kerusakan</td>
                        <td class="data" colspan="2">
                            <table class="waktu">
                                <tr>
                                    <td class="border">
                            {{$laporanKerusakanElectricalProtection->penyebab_perbaikan}}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="no">10</td>
                        <td class="uraian">Tanggal Kerusakan</td>
                        <td class="data">
                            <table class="waktu">
                                <tr>
                                    <td class="border">{{$laporanKerusakanElectricalProtection->start_date[8]}}</td>
                                    <td class="border">{{$laporanKerusakanElectricalProtection->start_date[9]}}</td>
                                    <td class="border">{{$laporanKerusakanElectricalProtection->start_date[5]}}</td>
                                    <td class="border">{{$laporanKerusakanElectricalProtection->start_date[6]}}</td>
                                    <td class="border">{{$laporanKerusakanElectricalProtection->start_date[2]}}</td>
                                    <td class="border">{{$laporanKerusakanElectricalProtection->start_date[3]}}</td>
                                </tr>
                            </table>
                        </td>
                        <td class="data" rowspan="6">
                            <table>
                                <tr>
                                    <td class="border">KODE HAMBATAN</td>
                                </tr>
                                <tr>
                                    <td class="border" style="text-align: left">
                                        <ul>
                                            <li>AU - Tidak ada alat ukur</li>
                                            <li>PK - Menunggu Penerbangan kalibrasi</li>
                                            <li>TT - Tidak ada Teknisi
                                            <li>SC - Menunggu Suku cadang</li>
                                            <li>TR - Tidak ada transportasi</li>
                                            <li>ST - Peralatan belum serah terima</li>
                                            <li>PC - Pengaruh cuaca</li>
                                            <li>AL - Alasan lain (jelaskan)</li>
                                            <li>TH - Tidak ada hambatan</li>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="no"></td>
                        <td class="uraian">Jam Kerusakan</td>
                        <td class="data">
                            <table class="waktu">
                                <tr>
                                    <td class="border">{{$laporanKerusakanElectricalProtection->start_date[11]}}</td>
                                    <td class="border">{{$laporanKerusakanElectricalProtection->start_date[12]}}</td>
                                    <td class="border">{{$laporanKerusakanElectricalProtection->start_date[14]}}</td>
                                    <td class="border">{{$laporanKerusakanElectricalProtection->start_date[15]}}</td>
                                    <td class="hide"></td>
                                    <td class="hide"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="no">11</td>
                        <td class="uraian">Tgl. Selesai Perbaikan
                        </td>
                        <td class="data">
                            <table class="waktu">
                                <tr>
                                    <td class="border">{{$laporanKerusakanElectricalProtection->end_date[8]}}</td>
                                    <td class="border">{{$laporanKerusakanElectricalProtection->end_date[9]}}</td>
                                    <td class="border">{{$laporanKerusakanElectricalProtection->end_date[5]}}</td>
                                    <td class="border">{{$laporanKerusakanElectricalProtection->end_date[6]}}</td>
                                    <td class="border">{{$laporanKerusakanElectricalProtection->end_date[2]}}</td>
                                    <td class="border">{{$laporanKerusakanElectricalProtection->end_date[3]}}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="no"></td>
                        <td class="uraian">Jam Selesai Perbaikan </td>
                        <td class="data">
                            <table class="waktu">
                                <tr>
                                    <td class="border">{{$laporanKerusakanElectricalProtection->end_date[11]}}</td>
                                    <td class="border">{{$laporanKerusakanElectricalProtection->end_date[12]}}</td>
                                    <td class="border">{{$laporanKerusakanElectricalProtection->end_date[14]}}</td>
                                    <td class="border">{{$laporanKerusakanElectricalProtection->end_date[15]}}</td>
                                    <td class="hide"></td>
                                    <td class="hide"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="no">12</td>
                        <td class="uraian">Jumlah Jam Operasi Terputus
                        </td>
                        <td class="data">
                            <table class="waktu">
                                <tr>
                                    <td class="border">
                                        @if(strlen($laporanKerusakanElectricalProtection->jumlah_jam_operasi_terputus)>=1)
                                            {{$laporanKerusakanElectricalProtection->jumlah_jam_operasi_terputus[0]}}
                                        @endif
                                    </td>
                                    <td class="border">
                                        @if(strlen($laporanKerusakanElectricalProtection->jumlah_jam_operasi_terputus)>=2)
                                            {{$laporanKerusakanElectricalProtection->jumlah_jam_operasi_terputus[1]}}
                                        @endif
                                    </td>
                                    <td class="border">
                                        @if(strlen($laporanKerusakanElectricalProtection->jumlah_jam_operasi_terputus)>=3)
                                            {{$laporanKerusakanElectricalProtection->jumlah_jam_operasi_terputus[2]}}
                                        @endif
                                    </td>
                                    <td class="border">
                                        @if(strlen($laporanKerusakanElectricalProtection->jumlah_jam_operasi_terputus)>=4)
                                            {{$laporanKerusakanElectricalProtection->jumlah_jam_operasi_terputus[3]}}
                                        @endif
                                    </td>
                                    <td class="hide"></td>
                                    <td class="hide"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="no">13</td>
                        <td class="uraian">Kode Hambatan</td>
                        <td class="data">
                            <table class="kode-hambatan">
                                <tr>
                                    <td class="border">
                            {{$laporanKerusakanElectricalProtection->kode_hambatan[0]}}
                                    </td>
                                    <td class="border">
                            {{$laporanKerusakanElectricalProtection->kode_hambatan[1]}}
                                    </td>
                                    <td class="hide"></td>
                                    <td class="hide"></td>
                                    <td class="hide"></td>
                                    <td class="hide"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        {{-- <table>
            <tr>
                <td>
                    <p><span class="bold">PT. ANGKASAPURA II (Persero)</span></p>
                    @if ($approve !== null)
                        <img src="{{ public_path('img/users/ttd/' . ($approve->ttd ?? 'none.png')) }}" width="100px"
                            style="display: block">
                    @endif
                    <p><span>____________________</span></p>
                </td>
                <td>
                    <p><span class="bold">SUPERVISOR APS</span></p>
                    @if ($approve !== null)
                        <img src="{{ public_path('img/users/ttd/' . ($approve->ttd ?? 'none.png')) }}" width="100px"
                            style="display: block">
                    @endif
                    <p><span>____________________</span></p>
                </td>
                <td>
                    <p><span class="bold">TEKNISI APS</span></p>
                    @if ($user_technicals !== null)
                        <img src="{{ public_path('img/user-technicals/paraf/' . ($user_technicals->paraf ?? 'none.png')) }}"
                            width="100px" style="display: block">
                    @endif
                    <p><span>____________________</span></p>
                </td>
            </tr>
        </table>
        <div style="clear: both"></div> --}}
    </div>






</body>

</html>
