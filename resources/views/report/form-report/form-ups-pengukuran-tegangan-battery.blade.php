
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
            margin-top: 30px;
            margin-bottom: 20px;
            font-size: 10px;
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
            padding-right: 20px;
            padding-left: 20px;

        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            vertical-align: middle;
            padding: 2px;
            width: auto;
            /* Set the desired height for table cells */
            overflow: hidden;
            /* Prevent content from overflowing */
            white-space: nowrap;
            /* Prevent line breaks */
            font-size: 8px;
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

        .float-left {
            margin: 20px 0 0 10%;
            text-align: left;
            width: 30%;
            float: left;
            font-size: 15px;
        }

        .float-right {
            margin: 20px 0 0 0px;
            text-align: left;
            width: 70%;
            float: right;
            font-size: 15px;
        }

        .ttd-left {
            margin: 20px 0 0 20px;
            text-align: center;
            width: 40%;
            float: left;
            font-size: 15px;
        }

        .ttd-right {
            margin: 20px 0 0 20px;
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
        }

        .g1 {
            width: 50%;
            text-align: left;
            display: inline;
        }

        .g2 {
            width: 50%;
            text-align: left;
            display: inline;
            position: absolute;
            left: 30%;
        }

        .sub-header,
        .sub-header td,
        .sub-header th {
            border: none;
            /* Menghilangkan batas sel */
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
            font-size: 10px;

        }

        .vertical-text {
            writing-mode: vertical-rl;
            /* Menulis dari atas ke bawah (vertikal) dari kanan ke kiri */
            transform: rotate(-90deg);
            /* Memutar teks sejauh 180 derajat (agar berhadapan dengan tabel) */
            white-space: nowrap;
            /* Mencegah teks memotong dan tetap dalam satu baris */
        }

        .table-borderless {
            padding-right: 20px;
            padding-left: 20px;
        }

        .table-borderless th,
        .table-borderless td {
            border: none;
        }
    </style>
</head>

<body>
    <div class="body">
        <table class="sub-header table">
            <tr>
                <td colspan="2" style="font-size:16px; text-align:center; font-weight: bold ">
                    <h1>CHEKLIST PENGUKURAN TEGANGAN BATTERY BANK <br></br>
                    PERALATAN UPS</h1>
                </td>
            </tr>
            <tr style="margin-top: 20px">
                <td style="text-align:left; font-size: 10px">
                    Hari / Tanggal : {{ $tanggal_hari }} / {{ $tanggalWo }}
                </td>
            </tr>
            <tr>
                <td style="text-align:left; font-size: 10px">
                    Lokasi Peralatan : {{ $lokasi }}
                </td>
            </tr>
            <tr>
                <td style="text-align:left; font-size: 10px">
                    Peralatan : 
                </td>
            </tr>
        </table>
    </div>

    <div class="body">
        <div class="table">
            <table class="my-table">
                @php
                    $number =1;
                @endphp
                <tr>
                    <td colspan="4" style="background-color: greenyellow; font-size: 14px; font-weight:bold">GARDU REKONSILIASI INTER DAN DOMESTIK (TERMINAL 3)</td>
                </tr>
            <tr>
                <td>
                    <table class="my-table">
                        <tr style="background-color: #dddddd">
                            <td colspan="2">BANK 1</td>
                        </tr>
                        <tr style="background-color: #008baa">
                            <td style="width: 2%">NO</td>
                            <td>V.Battery</td>
                        </tr>
                        @foreach ($formUpsPengukuranTeganganBatterys as $formUpsPengukuranTeganganBattery)
                            @if ($formUpsPengukuranTeganganBattery->nama_bank == 'BANK 1')
                                <tr>
                                    <td height="8">{{ $number }}
                                    </td>
                                    <td>{{ $formUpsPengukuranTeganganBattery->hasil }}</td>
                                </tr>
                                @php
                                    $number++;
                                @endphp
                            @endif
                        @endforeach
                        @for ($i = 0; $i < $tempCount-$tempCount1; $i++)
                            <tr>
                                    <td  height="8">
                                    </td>
                                    <td></td>
                                </tr>
                        @endfor
                    </table>
                </td>

                <td>
                    <table class="my-table">
                        @php
                    $number =1;
                @endphp
                        <tr style="background-color: #dddddd">
                            <td colspan="2">BANK 2</td>
                        </tr>
                        <tr style="background-color: #008baa">
                            <td style="width: 2%">NO</td>
                            <td>V.Battery</td>
                        </tr>
                        @foreach ($formUpsPengukuranTeganganBatterys as $formUpsPengukuranTeganganBattery)
                            @if ($formUpsPengukuranTeganganBattery->nama_bank == 'BANK 2')
                                <tr>
                                    <td height="8">{{ $number }}
                                    </td>
                                    <td>{{ $formUpsPengukuranTeganganBattery->hasil }}</td>
                                </tr>
                                @php
                                    $number++;
                                @endphp
                            @endif
                        @endforeach
                        @for ($i = 0; $i < $tempCount-$tempCount2; $i++)
                            <tr>
                                    <td height="8">
                                    </td>
                                    <td></td>
                                </tr>
                        @endfor
                    </table>
                </td>

                <td>
                    <table class="my-table">
                        @php
                    $number =1;
                @endphp
                        <tr style="background-color: #dddddd">
                            <td colspan="2">BANK 3</td>
                        </tr>
                        <tr style="background-color: #008baa">
                            <td style="width: 2%">NO</td>
                            <td>V.Battery</td>
                        </tr>
                        @foreach ($formUpsPengukuranTeganganBatterys as $formUpsPengukuranTeganganBattery)
                            @if ($formUpsPengukuranTeganganBattery->nama_bank == 'BANK 3')
                                <tr>
                                    <td height="8">{{ $number }}
                                    </td>
                                    <td>{{ $formUpsPengukuranTeganganBattery->hasil }}</td>
                                </tr>
                                @php
                                    $number++;
                                @endphp
                            @endif
                        @endforeach
                        @for ($i = 0; $i < $tempCount-$tempCount3; $i++)
                            <tr>
                                    <td height="8">
                                    </td>
                                    <td></td>
                                </tr>
                        @endfor
                    </table>
                </td>

                <td>
                    <table class="my-table">
                        @php
                    $number =1;
                @endphp
                        <tr style="background-color: #dddddd">
                            <td colspan="2">BANK 4</td>
                        </tr>
                        <tr style="background-color: #008baa">
                            <td style="width: 2%">NO</td>
                            <td>V.Battery</td>
                        </tr>
                        @foreach ($formUpsPengukuranTeganganBatterys as $formUpsPengukuranTeganganBattery)
                            @if ($formUpsPengukuranTeganganBattery->nama_bank == 'BANK 4')
                                <tr>
                                    <td height="8">{{ $number }}
                                    </td>
                                    <td>{{ $formUpsPengukuranTeganganBattery->hasil }}</td>
                                </tr>
                                @php
                                    $number++;
                                @endphp
                            @endif
                        @endforeach
                        @for ($i = 0; $i < $tempCount-$tempCount4; $i++)
                            <tr>
                                    <td height="8">
                                    </td>
                                    <td></td>
                                </tr>
                        @endfor
                    </table>
                </td>
            </tr>
                
            </table>
            <table class="my-table"style="table-layout: fixed;" >
                <tr>
                <td colspan="9" style="background-color: rgb(86, 128, 143);font-size: 12px">Dokumentasi</td>
            </tr>
            <tr>
                <td style="width: 25%" height="80">
                    <img style="width: 150px; text-align:right; display:inline;"
                                src="{{ public_path('storage/dokumentasibatt-ups/' . $fotoPath1) }}" alt="">
                </td>
                <td style="width: 25%" height="80">
                    <img style="width: 150px; text-align:right; display:inline;"
                                src="{{ public_path('storage/dokumentasibatt-ups/' . $fotoPath2) }}" alt="">
                </td>
                <td style="width: 25%" height="80">
                    <img style="width: 150px; text-align:right; display:inline;"
                                src="{{ public_path('storage/dokumentasibatt-ups/' . $fotoPath3) }}" alt="">
                </td>
                <td style="width: 25%" height="80">
                    <img style="width: 150px; text-align:right; display:inline;"
                                src="{{ public_path('storage/dokumentasibatt-ups/' . $fotoPath4) }}" alt="">
                </td>
                <td style="background-color: black">

                </td>
            </tr>
                <tr>
                <td colspan="9" style="font-size: 12
                px">CATATAN</td>
            </tr>
            <tr>
                <td style="vertical-align: baseline;text-align:left;font-size: 10px;" colspan="9" height="80">
                    {!! $formUpsPengukuranTeganganBatterys[0]->catatan !!}
                </td>
            </tr>
                
            </table>
        </div>
        <table class="table-borderless" style="padding: 20px">
            <tr class="table-borderless">
                <td>PENGAWAS AP 2
                </td>
                <td>Petugas AP 2
                </td>
            </tr>
            <tr class="table-borderless">
                <td>(_______________________________)</td>
                <td>
                    <table class="table-borderless">
                        @forelse ($userTechnicals as  $userTechnical)
                            <tr style="background-color: white">
                                <td style="text-align: left;">{{ $loop->iteration }}. {{ $userTechnical }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td style="text-align: center">No Data Available</td>
                            </tr>
                        @endforelse
                    </table>
                </td>
            </tr>
            
        </table>

    </div>

</body>

</html>
