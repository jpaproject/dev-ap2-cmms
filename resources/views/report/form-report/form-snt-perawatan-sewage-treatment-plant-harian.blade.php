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
            border: 1px solid #ffffff;
            text-align: left;
            padding: 2px;
            font-size: 10px;
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
            font-weight: bold;
            border: 1px solid black;
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

        .tinggi {
            height: 7px;
            font-size: 5px;

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
            font-size: 8px;
            height: 10px;

        }

        .table-borderless {
            padding-top: 20px;
            padding-right: 20px;
            padding-left: 20px;
            font-family: arial, sans-serif;
        }

        .table-borderless th,
        .table-borderless td {
            border: none;
            text-align: center;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="body">
            <div class="table">
                <table>
                    <tr class="header-table">
                        <th colspan="3" class="center">
                            <h1 style="font-size: 16px;font-weight:bold">LAPORAN HARIAN</h1>
                        </th>
                    </tr>
                    <tr class="header-table">
                        <th style="background-color: white ;text-align:left;width: 25%">
                            PEKERJAAN
                        </th>
                        <th style="width: 2%"> : </th>
                        <th style="background-color: white ;text-align:left;">PEMELIHARAAN INSTALASI PENGOLAHAN LIMBAH
                            CAIR GED. 745 DI BANDARA SOEKARNO-HATTA</th>
                    </tr>

                    <tr class="header-table">
                        <th style="background-color: white ;text-align:left;width: 25%">
                            UNIT
                        </th>
                        <th style="width: 2%"> : </th>
                        <th style="background-color: white ;text-align:left;">SANITATION FACILITY</th>
                    </tr>

                    <tr class="header-table">
                        <th style="background-color: white ;text-align:left;width: 25%">
                            PELAKSANA
                        </th>
                        <th style="width: 2%"> : </th>
                        <th style="background-color: white ;text-align:left;">PT. SATUR PERISENTOSA
                        </th>
                    </tr>

                    <tr class="header-table">
                        <th style="background-color: white ;text-align:left;width: 25%">
                            NOMOR KONTRAK
                        </th>
                        <th style="width: 2%"> : </th>
                        <th style="background-color: white ;text-align:left;">PJJ.14.11/01/09/2018/0976
                        </th>
                    </tr>

                    <tr class="header-table">
                        <th style="background-color: white ;text-align:left;width: 25%">
                            HARI
                        </th>
                        <th style="width: 2%"> : </th>
                        <th style="background-color: white ;text-align:left;">{{ $tanggal_hari }}
                        </th>
                    </tr>

                    <tr class="header-table">
                        <th style="background-color: white ;text-align:left;width: 25%">
                            Tanggal
                        </th>
                        <th style="width: 2%"> : </th>
                        <th style="background-color: white ;text-align:left;">{{ $tanggalWo }}
                        </th>
                    </tr>

                    <tr class="header-table">
                        <th style="background-color: white ;text-align:left;width: 25%">
                            WAKTU
                        </th>
                        <th style="width: 2%"> : </th>
                        <th style="background-color: white ;text-align:left;">{{ $tanggalWo1 }} s/d
                            {{ $tanggalWo2 }}
                        </th>
                    </tr>

                </table>

                <table class="my-table">
                    <tr>
                        <td colspan="3" style="text-align: left;background-color:#dddddd">I. PENGECEKAN PERALATAN
                            SYSTEM PENGOLAHAN LIMBAH
                            CAIR GED. 745</td>
                    </tr>
                    <tr style="border: 0px">
                        <td style="border: 0px;vertical-align: baseline" height="100">
                            <table class="my-table">
                                <tr>
                                    <td rowspan="2" style="width: 2%">NO</td>
                                    <td rowspan="2">KEGIATAN</td>
                                    <td colspan="2">KONDISI</td>
                                </tr>
                                <tr>
                                    <td style="font-family: DejaVu Sans, sans-serif; width:40px">√ / X</td>
                                    <td>KET</td>
                                </tr>
                                @php
                                    $number = 1;
                                @endphp
                                @php
                                    $prevGroup = null;
                                @endphp
                                @foreach ($formSntPerawatanSewageTreatmentPlantHarians as $key => $formSntPerawatanSewageTreatmentPlantHarian)
                                    @if ($prevGroup != $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan)
                                        <tr>
                                            <td>
                                                {{ $number }}
                                            </td>
                                            <td style="text-align: left" colspan="3">
                                                {{ $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan }}</td>
                                        </tr>
                                        @php
                                            $prevGroup = $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan;
                                            $number++;
                                        @endphp
                                    @endif

                                    <tr>
                                        <td>-</td>
                                        <td>{{ $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan }}</td>
                                        <td style="font-family: DejaVu Sans, sans-serif; width:40px">
                                            {{ $formSntPerawatanSewageTreatmentPlantHarian->kondisi }}</td>
                                        <td>{{ $formSntPerawatanSewageTreatmentPlantHarian->keterangan }}</td>
                                    </tr>
                                    @break($key == 19)
                                @endforeach
                                @php
                                    $formSntPerawatanSewageTreatmentPlantHarians = $formSntPerawatanSewageTreatmentPlantHarians->slice(20);
                                @endphp
                            </table>
                        </td>

                        <td style="border: 0px;vertical-align: baseline" height="100">
                            <table class="my-table">
                                <tr>
                                    <td rowspan="2" style="width: 2%">NO</td>
                                    <td rowspan="2">KEGIATAN</td>
                                    <td colspan="2">KONDISI</td>
                                </tr>
                                <tr>
                                    <td style="font-family: DejaVu Sans, sans-serif; width:40px">√ / X</td>
                                    <td>KET</td>
                                </tr>
                                @php
                                    $number = 5;
                                @endphp
                                @php
                                    $prevGroup = null;
                                @endphp
                                @foreach ($formSntPerawatanSewageTreatmentPlantHarians as $key => $formSntPerawatanSewageTreatmentPlantHarian)
                                    @if ($prevGroup != $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan)
                                        <tr>
                                            <td>
                                                {{ $number }}
                                            </td>
                                            <td style="text-align: left" colspan="3">
                                                {{ $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan }}</td>
                                        </tr>
                                        @php
                                            $prevGroup = $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan;
                                            $number++;
                                        @endphp
                                    @endif

                                    <tr>
                                        <td>-</td>
                                        <td>{{ $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan }}</td>
                                        <td style="font-family: DejaVu Sans, sans-serif; width:40px">
                                            {{ $formSntPerawatanSewageTreatmentPlantHarian->kondisi }}</td>
                                        <td>{{ $formSntPerawatanSewageTreatmentPlantHarian->keterangan }}</td>
                                    </tr>
                                    @if ($key == 30)
                                        <tr>
                                            <td height="15"></td>
                                            <td height="15"></td>
                                            <td height="15"></td>
                                            <td height="15"></td>
                                        </tr>
                                    @endif
                                    @break($key == 38)
                                @endforeach

                                @php
                                    $formSntPerawatanSewageTreatmentPlantHarians = $formSntPerawatanSewageTreatmentPlantHarians->slice(19);
                                @endphp
                            </table>
                        </td>

                        <td style="border: 0px;vertical-align: baseline" height="100">
                            <table class="my-table">
                                <tr>
                                    <td rowspan="2" style="width: 2%">NO</td>
                                    <td rowspan="2">KEGIATAN</td>
                                    <td colspan="2">KONDISI</td>
                                </tr>
                                <tr>
                                    <td style="font-family: DejaVu Sans, sans-serif; width:40px">√ / X</td>
                                    <td>KET</td>
                                </tr>
                                @php
                                    $number = 9;
                                @endphp
                                @php
                                    $prevGroup = null;
                                @endphp
                                @foreach ($formSntPerawatanSewageTreatmentPlantHarians as $key => $formSntPerawatanSewageTreatmentPlantHarian)
                                    @if ($prevGroup != $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan)
                                        <tr>
                                            <td>
                                                {{ $number }}
                                            </td>
                                            <td style="text-align: left" colspan="3">
                                                {{ $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan }}</td>
                                        </tr>
                                        @php
                                            $prevGroup = $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan;
                                            $number++;
                                        @endphp
                                    @endif

                                    <tr>
                                        <td>-</td>
                                        <td>{{ $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan }}</td>
                                        <td style="font-family: DejaVu Sans, sans-serif; width:40px">
                                            {{ $formSntPerawatanSewageTreatmentPlantHarian->kondisi }}</td>
                                        <td>{{ $formSntPerawatanSewageTreatmentPlantHarian->keterangan }}</td>
                                    </tr>
                                    @break($key == 56)
                                    @if ($key == 49 || $key == 53)
                                        <tr>
                                            <td height="15"></td>
                                            <td height="15"></td>
                                            <td height="15"></td>
                                            <td height="15"></td>
                                        </tr>
                                    @endif
                                @endforeach
                                @php
                                    $formSntPerawatanSewageTreatmentPlantHarians = $formSntPerawatanSewageTreatmentPlantHarians->slice(18);
                                @endphp
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="border: 0px" >
                            @php
                                $number = 1;
                            @endphp
                            <table>
                                <tr>
                                    <td colspan="2" style="text-align: left;background-color:#dddddd">II.
                                        PEMELIHARAAN DAN KEBERSIHAN
                                        INSTALASI PENGOLAHAN LIMBAH CAIR GED. 745</td>
                                    <td style="font-family: DejaVu Sans, sans-serif; width:40px">√ / X</td>
                                    <td>KET</td>
                                </tr>

                                @foreach ($formSntPerawatanSewageTreatmentPlantHarians as $key => $formSntPerawatanSewageTreatmentPlantHarian)
                                    @if ($prevGroup != $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan)
                                        <tr>
                                            <td style="width: 2%">
                                                {{ $number }}
                                            </td>
                                            <td style="text-align: left;" colspan="3">
                                                {{ $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan }}</td>
                                        </tr>
                                        @php
                                            $prevGroup = $formSntPerawatanSewageTreatmentPlantHarian->group_peralatan;
                                            $number++;
                                        @endphp
                                    @endif

                                    <tr>
                                        <td>-</td>
                                        <td style="width:70%">
                                            {{ $formSntPerawatanSewageTreatmentPlantHarian->nama_peralatan }}</td>
                                        <td style="font-family: DejaVu Sans, sans-serif; width:40px">
                                            {{ $formSntPerawatanSewageTreatmentPlantHarian->kondisi }}</td>
                                        <td>{{ $formSntPerawatanSewageTreatmentPlantHarian->keterangan }}</td>
                                    </tr>
                                @endforeach

                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td style="height: 80px"> CATATAN : </td>
                        <td colspan="2" style="height: 80px">{!! $formSntPerawatanSewageTreatmentPlantHarian->catatan !!}</td>
                    </tr>

                    <tr>
                        <td class="row-white" colspan="2">
                            PT. ANGKASA PURA II (Persero) </br>
                            PENGAWAS LAPANGAN
                        </td>
                        <td>PELAKSANA</br>
                            PT. SATUR PERI SENTOSA</td>
                    </tr>
                    <tr>
                        <td class="row-white" colspan="2" style="height: 80px">
                        </td>
                        <td class="row-white" style="height: 80px">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">(_____________________)</td>
                        <td>(_____________________)</td>
                    </tr>

                </table>
            </div>

        </div>
        <div style="clear: both"></div>
    </div>






</body>

</html>
