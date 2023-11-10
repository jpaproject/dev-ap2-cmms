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
                <table class="my-table">
                    <tr class="header-table">
                        <th height="30" class="center" style="width: 35%"><img style="width: 70px; text-align:center;"
                                src="{{ public_path('img/soekarno-hatta.jpeg') }}" alt=""></th>
                        <th class="center">
                            <h1 style="font-size: 16px;font-weight:bold">CHECK LIST</h1>
                        </th>
                        <th class="center" style="width: 30%"><img style="width: 70px; text-align:center;"
                                src="{{ public_path('img/logo-ndn.png') }}" alt=""></th>
                    </tr>
                    <tr class="header-table">
                        <th colspan="3" style="background-color: #dddddd;font-weight:bold"" class="center">
                            <h1 style="font-size: 10px;font-weight:bold">LAPORAN PEMELIHARAAN BULANAN</h1>
                        </th>
                    </tr>
                    <tr class="header-table">
                        <th style="background-color: white;font-weight:bold" class="center">
                            FASILITAS
                        </th>
                        <th style="background-color: white;" class="center">
                            LOKASI
                        </th>
                        <th rowspan="2" style="background-color: white;">
                            TANGGAL : {{ $tanggalWo }}
                        </th>
                    </tr>
                    <tr class="header-table">
                        <th style="background-color: white;">
                            MECHANICHAL & AIRPORT EQUIPMENT
                            <br>UNIT SANITATION FACILITY</br>
                        </th>

                        <th style="background-color: white;">
                            BANDARA SOEKARNO HATTA
                        </th>
                    </tr>

                    <tr>
                        <td style="vertical-align: baseline;">
                            <table class="my-table">
                                <tr>
                                    <td colspan="4" style="background-color: yellow">INCINERATOR NOMER 4</td>
                                </tr>
                                <tr style="background-color: chocolate">
                                    <td rowspan="2" style="width: 2%">NO</td>
                                    <td rowspan="2">URAIAN PERALATAN</td>
                                    <td colspan="2" style="width: 3%">KONDISI</td>
                                </tr>
                                <tr style="background-color: chocolate">
                                    <td>BAIK</td>
                                    <td>TROUBLE</td>
                                </tr>
                                @php
                                    $roman = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII'];
                                    $number = 0;
                                    $number2 = 1;
                                    $prevGroup = null;
                                @endphp
                                @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                    @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 4')
                                        @if ($prevGroup != $formSntChecklistPerawatanIncinerator456Bulanan->group)
                                            <tr class="my-table" style="background-color: rgb(206, 247, 255)2)">
                                                <td>
                                                    {{ $roman[$number] }}
                                                </td>
                                                <td style="text-align: left" colspan="3">
                                                    {{ $formSntChecklistPerawatanIncinerator456Bulanan->group }}</td>
                                            </tr>
                                            @php
                                                $prevGroup = $formSntChecklistPerawatanIncinerator456Bulanan->group;
                                                $number++;
                                                $number2 = 1;
                                            @endphp
                                        @endif
                                        @if ($key == 8 || $key == 9 || $key == 10 || $key == 11)
                                            <tr>
                                                <td></td>
                                                <td>{{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                </td>
                                                <td style="text-align:center; padding: 5px;"><span
                                                        style="font-family: DejaVu Sans, sans-serif; font-size: 10px">{{ $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="text-align:center; padding: 5px;"><span
                                                        style="font-family: DejaVu Sans, sans-serif; font-size: 10px">{{ $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? '✔' : '' }}</span>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>{{ $number2 }}</td>
                                                <td>{{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                </td>
                                                <td style="text-align:center; padding: 5px;"><span
                                                        style="font-family: DejaVu Sans, sans-serif; font-size: 10px">{{ $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="text-align:center; padding: 5px;"><span
                                                        style="font-family: DejaVu Sans, sans-serif; font-size: 10px">{{ $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? '✔' : '' }}</span>
                                                </td>
                                            </tr>
                                            @php
                                                $number2++;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach

                            </table>
                        </td>

                        <td style="vertical-align: baseline;">
                            <table class="my-table">
                                <tr>
                                    <td colspan="4" style="background-color: yellow">INCINERATOR NOMER 5</td>
                                </tr>
                                <tr style="background-color: chocolate">
                                    <td rowspan="2" style="width: 2%">NO</td>
                                    <td rowspan="2">URAIAN PERALATAN</td>
                                    <td colspan="2" style="width: 3%">KONDISI</td>
                                </tr>
                                <tr style="background-color: chocolate">
                                    <td>BAIK</td>
                                    <td>TROUBLE</td>
                                </tr>
                                @php
                                    $roman = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII'];
                                    $number = 0;
                                    $number2 = 1;
                                    $prevGroup = null;
                                @endphp
                                @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                    @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 5')
                                        @if ($prevGroup != $formSntChecklistPerawatanIncinerator456Bulanan->group)
                                            <tr class="my-table" style="background-color: rgb(206, 247, 255)2)">
                                                <td>
                                                    {{ $roman[$number] }}
                                                </td>
                                                <td style="text-align: left" colspan="3">
                                                    {{ $formSntChecklistPerawatanIncinerator456Bulanan->group }}</td>
                                            </tr>
                                            @php
                                                $prevGroup = $formSntChecklistPerawatanIncinerator456Bulanan->group;
                                                $number++;
                                                $number2 = 1;
                                            @endphp
                                        @endif
                                        @if ($key == 41 || $key == 42 || $key == 49)
                                            <tr>
                                                <td></td>
                                                <td>{{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                </td>
                                                <td style="text-align:center; padding: 5px;"><span
                                                        style="font-family: DejaVu Sans, sans-serif; font-size: 10px">{{ $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="text-align:center; padding: 5px;"><span
                                                        style="font-family: DejaVu Sans, sans-serif; font-size: 10px">{{ $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? '✔' : '' }}</span>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>{{ $number2 }}</td>
                                                <td>{{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                </td>
                                                <td style="text-align:center; padding: 5px;"><span
                                                        style="font-family: DejaVu Sans, sans-serif; font-size: 10px">{{ $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="text-align:center; padding: 5px;"><span
                                                        style="font-family: DejaVu Sans, sans-serif; font-size: 10px">{{ $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? '✔' : '' }}</span>
                                                </td>
                                            </tr>
                                            @php
                                                $number2++;
                                            @endphp
                                        @endif
                                        @if ($key == 63)
                                        @for ($i = 0; $i < 2; $i++)
                                                <tr>
                                                    <td height="13"></td>
                                                    <td>
                                                    </td>
                                                    <td style="text-align:center; padding: 5px;"></td>
                                                    <td style="text-align:center; padding: 5px;"></td>
                                                </tr>
                                            @endfor
                                    @endif
                                    @endif
                                @endforeach
                            </table>
                        </td>

                        <td style="vertical-align: baseline;">
                            <table class="my-table">
                                <tr>
                                    <td colspan="4" style="background-color: yellow">INCINERATOR NOMER 6</td>
                                </tr>
                                <tr style="background-color: chocolate">
                                    <td rowspan="2" style="width: 2%">NO</td>
                                    <td rowspan="2">URAIAN PERALATAN</td>
                                    <td colspan="2" style="width: 3%">KONDISI</td>
                                </tr>
                                <tr style="background-color: chocolate">
                                    <td>BAIK</td>
                                    <td>TROUBLE</td>
                                </tr>
                                @php
                                    $roman = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII'];
                                    $number = 0;
                                    $number2 = 1;
                                    $prevGroup = null;
                                @endphp
                                @foreach ($formSntChecklistPerawatanIncinerator456Bulanans as $key => $formSntChecklistPerawatanIncinerator456Bulanan)
                                    @if ($formSntChecklistPerawatanIncinerator456Bulanan->incinerator == 'INCINERATOR NOMER 6')
                                        @if ($prevGroup != $formSntChecklistPerawatanIncinerator456Bulanan->group)
                                            <tr class="my-table" style="background-color: rgb(206, 247, 255)2)">
                                                <td>
                                                    {{ $roman[$number] }}
                                                </td>
                                                <td style="text-align: left" colspan="3">
                                                    {{ $formSntChecklistPerawatanIncinerator456Bulanan->group }}</td>
                                            </tr>
                                            @php
                                                $prevGroup = $formSntChecklistPerawatanIncinerator456Bulanan->group;
                                                $number++;
                                                $number2 = 1;
                                            @endphp
                                        @endif
                                        @if ($key == 72 || $key == 73 || $key == 80)
                                            <tr>
                                                <td></td>
                                                <td>{{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                </td>
                                                <td style="text-align:center; padding: 5px;"><span
                                                        style="font-family: DejaVu Sans, sans-serif; font-size: 10px">{{ $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="text-align:center; padding: 5px;"><span
                                                        style="font-family: DejaVu Sans, sans-serif; font-size: 10px">{{ $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? '✔' : '' }}</span>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>{{ $number2 }}</td>
                                                <td>{{ $formSntChecklistPerawatanIncinerator456Bulanan->nama_peralatan }}
                                                </td>
                                                <td style="text-align:center; padding: 5px;"><span
                                                        style="font-family: DejaVu Sans, sans-serif; font-size: 10px">{{ $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'BAIK' ? '✔' : '' }}</span>
                                                </td>
                                                <td style="text-align:center; padding: 5px;"><span
                                                        style="font-family: DejaVu Sans, sans-serif; font-size: 10px">{{ $formSntChecklistPerawatanIncinerator456Bulanan->kondisi == 'TROUBLE' ? '✔' : '' }}</span>
                                                </td>
                                            </tr>
                                            @php
                                                $number2++;
                                            @endphp
                                        @endif
                                        @if ($key == 94)
                                            @for ($i = 0; $i < 2; $i++)
                                                <tr>
                                                    <td height="13"></td>
                                                    <td>
                                                    </td>
                                                    <td style="text-align:center; padding: 5px;"></td>
                                                    <td style="text-align:center; padding: 5px;"></td>
                                                </tr>
                                            @endfor
                                        @endif
                                    @endif
                                @endforeach
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td>CATATAN :</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="3" height="40" style="vertical-align: baseline;text-align:left">
                            {!! $formSntChecklistPerawatanIncinerator456Bulanan->catatan !!}</td>
                    </tr>
                </table>

                <table class="table-borderless">
                    <tr>
                        <td>PT. Angkasa Pura II (Persero)</td>
                        <td>OS KOSAMI</td>
                        <td>PT.NAURA DINAMIKA NUSANTARA</td>
                    </tr>
                    <tr>
                        <td class="row-white" colspan="3" style="height: 20px">
                        </td>
                    </tr>
                    <tr height="60">
                        <td>(_____________________)</td>
                        <td>(_____________________)</td>
                        <td>(_____________________)</td>
                    </tr>
                </table>
            </div>

        </div>
        <div style="clear: both"></div>
    </div>






</body>

</html>
