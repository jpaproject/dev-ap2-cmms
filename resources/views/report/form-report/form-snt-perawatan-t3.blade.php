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
            font-size: 7px;
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
            border: 1px solid #ffffff;
            text-align: left;
            font-size: 7px;
        }

        tr:nth-child(even) {
            background-color: #ffffff;
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
            background-color: #ffffff;
        }

        .row-white {
            background-color: #ffffff;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;

        }

        .my-table {
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

        .no {
            border-top: none;
            border-bottom: none;
            border-right: 1px solid black;
            border-left: 1px solid black;
            text-align: center;

        }

        .header-table th {
            border: 1px solid black;
            font-size: 7px;
        }

        .title-table tr td {
            border: 1px solid black;
        }

        table tr td {
            border: none;
        }

        .border {
            border: 1px solid black;
            text-align: center;
        }

        .hide {
            border-top: none;
            border-bottom: none;
        }

        .br {
            border: 1px solid black;
            border-radius: 20px;
            margin: 20px;

        }


        .my-table td,
        .my-table th {

            border-left: 1px solid black;
            /* Set the left border of cells */
            border-right: 1px solid black;
            /* Set the right border of cells */
            border-top: 1px solid black;
            /* Set the top border of cells */
            border-bottom: 1px solid black;
            /* Set the bottom border of cells */
            vertical-align: middle;
            text-align: center;
            font-size: 7px;
            height: 10;

        }

        .table-borderless {
            padding-right: 20px;
            padding-left: 20px;
            font-family: arial, sans-serif;
        }

        .table-borderless th,
        .table-borderless td {
            border: none;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="body">
            <div class="table">
                <table class="my-table">
                    <tr class="header-table">
                        <th colspan="2" class="center"><img style="width: 50px; text-align:center;"
                                src="{{ public_path('img/soekarno-hatta.jpeg') }}" alt=""></th>
                        <th colspan="10" class="center">
                            <h1 style="font-size: 16px;font-weight:bold">LAPORAN CHECK LIST</h1>
                        </th>
                        <th class="center"style="width: 80px"><img style="width: 50px; text-align:center;"
                                src="{{ public_path('img/AP2.png') }}" alt=""></th>
                    </tr>
                    <tr class="header-table">
                        <th colspan="2" style="background-color: white;" class="center">
                            NAMA PETUGAS
                        </th>
                        <th colspan="10" style="background-color: white;" class="center">
                            LOKASI
                        </th>
                        <th style="background-color: white;" class="center">
                            HARI : {{ $tanggal_hari }}
                        </th>
                    </tr>
                    <tr>
                        <th rowspan="2" colspan="2" style="background-color: white;" >
                            <table class="table-borderless">
                                @forelse ($userTechnicals as  $userTechnical)
                                    <tr  style="text-align: left;">
                                        <td style="text-align: left;font-size:7px">{{ $loop->iteration }}. {{ $userTechnical }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td style="text-align: center">No Data Available</td>
                                    </tr>
                                @endforelse
                            </table>
                        </th>
                        <th rowspan="2" colspan="10" style="background-color: white;" class="center">
                            BANDARA INTERNASIONAL SOEKARNO HATTA
                        </th>
                        <th class="center">
                            Tanggal : {{ $tanggalWo }}
                        </th>
                    </tr>
                    <tr class="header-table">
                        <th class="center">
                            Petugas Shift :
                        </th>
                    </tr>

                    <tr class="my-table">
                        <td rowspan="2" style="width: 15px">
                            NO
                        </td>
                        <td rowspan="2" style="width:10%">
                            NAMA PERALATAN
                        </td>
                        <td colspan="3">
                            PERAWATAN
                        </td>
                        <td colspan="7">
                            PENGECEKAN
                        </td>
                        <td>
                            KETERANGAN
                        </td>
                    </tr>

                    <tr class="my-table">
                        <td style="width: 30px">HARIAN</td>
                        <td style="width: 30px">MINGGUAN</td>
                        <td style="width: 30px">BULANAN</td>
                        <td style="width: 30px">OPERASI</td>
                        <td style="width: 30px">TIDAK BEROPERASI</td>
                        <td style="width: 30px">TEGANGAN</td>
                        <td style="width: 30px">ARUS</td>
                        <td style="width: 30px">PELAMPUNG</td>
                        <td style="width: 30px">CEK PEMIPAAN</td>
                        <td style="width: 30px">MEMERSIHKAN SAMPAH</td>
                        <td style="width: 30px;font-family: DejaVu Sans, sans-serif;">NORMAL/OPERASI = √ OFF/RUSAK = X
                        </td>
                    </tr>
                    @php
                        $number = 0;
                        $number2 = 1;
                        $number3 = 1;
                        $alphabet = range('A', 'Z');
                        $prevGroup = null;
                    @endphp
                    @foreach ($formSntPerawatanT3VIPs as $key => $formSntPerawatanT3VIP)
                        @if ($prevGroup != $formSntPerawatanT3VIP->group)
                            <tr class="my-table" style="background-color: yellow">
                                <td>
                                    {{ $alphabet[$number] }}
                                </td>
                                <td style="text-align: left" colspan="12">
                                    {{ $formSntPerawatanT3VIP->group }}</td>
                            </tr>
                            @php
                                $prevGroup = $formSntPerawatanT3VIP->group;
                                $number++;
                            @endphp
                        @endif
                        <tr class="my-table">

                            @if (
                                $key == 0 ||
                                    $key == 2 ||
                                    $key == 4 ||
                                    $key == 6 ||
                                    $key == 8 ||
                                    $key == 10 ||
                                    $key == 12 ||
                                    $key == 14 ||
                                    $key == 16 )
                                <td>{{ $number2 }}.</td>
                                @php
                                    $number2++;
                                @endphp
                            @elseif($key == 18 ||
                                    $key == 21 )
                                    <td>{{ $number3 }}.</td>
                                    @php
                                    $number3++;
                                @endphp
                                @elseif($key == 24 ||
                                    $key == 27  )
                                    <td>1.</td>
                            @else
                                <td>-</td>
                            @endif
                            <td style="text-align: left">{{ $formSntPerawatanT3VIP->nama_peralatan }}</td>
                            <td style="text-align:center; padding: 5px;"><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 7px">{{ $formSntPerawatanT3VIP->periode == 'HARIAN' ? '✔' : '' }}</span>
                            </td>
                            <td style="text-align:center; padding: 5px;"><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 7px">{{ $formSntPerawatanT3VIP->periode == 'MINGGUAN' ? '✔' : '' }}</span>
                            </td>
                            <td style="text-align:center; padding: 5px;"><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 7px">{{ $formSntPerawatanT3VIP->periode == 'BULANAN' ? '✔' : '' }}</span>
                            </td>
                            <td style="text-align:center; padding: 5px;"><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 7px">{{ $formSntPerawatanT3VIP->operasi == 'OPERASI' ? '✔' : '' }}</span>
                            </td>
                            <td style="text-align:center; padding: 5px;"><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 7px">{{ $formSntPerawatanT3VIP->operasi == 'TIDAK BEROPERASI (stan by)' ? '✔' : '' }}</span>
                            </td>
                            <td style="text-align: center">{{ $formSntPerawatanT3VIP->tegangan }}</td>
                            <td style="text-align: center">{{ $formSntPerawatanT3VIP->arus }}</td>
                            <td style="text-align: center">{{ $formSntPerawatanT3VIP->pelampung }}</td>
                            <td style="text-align: center">{{ $formSntPerawatanT3VIP->pemipaan }}</td>
                            <td style="text-align: center">{{ $formSntPerawatanT3VIP->sampah }}</td>
                            <td style="text-align:center; padding: 5px;"><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 7px">{{ $formSntPerawatanT3VIP->keterangan == 'NORMAL OPERASI' ? '✔' : 'X' }}</span>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="my-table">
                        <td colspan="2" style="font-size:10px;">CATATAN :</td>
                        <td colspan="11"
                            style="height: 40px; vertical-align:baseline; text-align:left; font-size:10px;vertical-align:baseline">
                            {!! $formSntPerawatanT3VIP->catatan !!}</td>
                    </tr>
                </table>

                <table class="table-borderless" style="padding-top: 20px">
                    <tr>
                        <td>PT. AngkasaPura II</td>
                        <td></td>
                        <td>PT Angkasa Pur Solusi</td>
                    </tr>
                    <tr>
                        <td class="row-white" colspan="3" style="height: 80px">
                        </td>
                    </tr>
                    <tr height="60">
                        <td>(_____________________)</td>
                        <td></td>
                        <td>(_____________________)</td>
                    </tr>
                </table>
            </div>

        </div>
        <div style="clear: both"></div>
    </div>






</body>

</html>
