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


        td,
        th {
            border: 1px solid white;
            text-align: left;
            padding: 2px;
            font-size: 10px;
        }

        tr:nth-child(even) {
            background-color: white;
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
        }

        .my-table {
            padding-right: 20px;
            padding-left: 20px;
        }

        .my-table tr td {
            text-align: center;
            border-left: 1px solid black;
            /* Set the left border of cells */
            border-right: 1px solid black;
            /* Set the right border of cells */
            border-top: 1px solid black;
            /* Set the top border of cells */
            border-bottom: 1px solid black;
            /* Set the bottom border of cells */
            vertical-align: middle;
            font-size: 8px;
            padding: 0;
        }

        .my-table th {
            border-right: 1px solid black;
            border-bottom: 1px solid black;
            vertical-align: middle;
            font-size: 10px
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
    <div class="content">
        <table class="table-borderless" style="margin-top:20px; text-align:center">
            <tr style=" background-color: white; ">
                <td colspan="17" style=";text-align:center">
                    <h1 style="font-size: 18px;text-align:center;">
                        Data dan Kondisi Peralatan Constant Current Regulator (CCR)
                    </h1>
                </td>
            </tr>
            <tr style=" background-color: white; ">
                <td colspan="17" style=";text-align:center">
                    <h1 style="font-size: 18px;text-align:center;">
                        Runway Selatan Bandara Soekarno-Hatta
                    </h1>
                </td>
            </tr>
            <tr style=" background-color: white;">
                <td colspan="17" style="text-align: left; font-size:10px">
                    Substation T3
                </td>
            </tr>
        </table>
        <table class="my-table" style="text-align:center">
            <tr style="text-align:center">
                <td rowspan="2" style="width: 2%">NO CCR</td>
                <td rowspan="2" style="width: 15%">Peralatan</td>
                <td rowspan="2"style="width: 7%">Merk</td>
                <td rowspan="2"style="width: 7%">Tipe</td>
                <td rowspan="2"style="width: 10%">Kapasitas</td>
                <td rowspan="2"style="width: 7%">Tahun Pemasangan</td>
                <td rowspan="2">Input Voltage</td>
                <td rowspan="2">Output Voltage</td>
                <td rowspan="2">Running Hours</td>
                <td rowspan="2">Ampere in Step 5</td>
                <td rowspan="2">Suhu Trafo</td>
                <td colspan="5">Meter Reading (local)</td>
                <td colspan="2">Tahanan Isolasi</td>
            </tr>
            <tr style="background-color:white text-align:center">
                <td>Step 1</td>
                <td>Step 2</td>
                <td>Step 2</td>
                <td>Step 4</td>
                <td>Step 5</td>
                <td>C-G Test</td>
                <td>C-C Test</td>
            </tr>
            @foreach ($formSvaConstantCurrentRegulations as $key => $formSvaConstantCurrentRegulation)
                @if ($formSvaConstantCurrentRegulation->substation == 'Substation T3')
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <th>{{ $formSvaConstantCurrentRegulation->peralatan }}</th>
                        <td>{{ $formSvaConstantCurrentRegulation->merk }}</td>
                        <td>{{ $formSvaConstantCurrentRegulation->tipe }}</td>
                        <td>{{ $formSvaConstantCurrentRegulation->kapasitas }}</td>
                        <td>{{ $formSvaConstantCurrentRegulation->tahun_pemasangan }}</td>
                        <td>{{ $formSvaConstantCurrentRegulation->supply_voltage }} VAC</td>
                        <td>{{ $formSvaConstantCurrentRegulation->system_remote }} VAC</td>
                        <td>{{ $formSvaConstantCurrentRegulation->running_hours }} H</td>
                        <td>{{ $formSvaConstantCurrentRegulation->ampere }} A</td>
                        <td>{{ $formSvaConstantCurrentRegulation->suhu_trafo }} °C</td>
                        <td>{{ $formSvaConstantCurrentRegulation->step1 }} A</td>
                        <td>{{ $formSvaConstantCurrentRegulation->step2 }} A</td>
                        <td>{{ $formSvaConstantCurrentRegulation->step3 }} A</td>
                        <td>{{ $formSvaConstantCurrentRegulation->step4 }} A</td>
                        <td>{{ $formSvaConstantCurrentRegulation->step5 }} A</td>
                        <td style="font-family: DejaVu Sans, sans-serif;">{{ $formSvaConstantCurrentRegulation->cg }} Ω
                        </td>
                        <td style="font-family: DejaVu Sans, sans-serif;">{{ $formSvaConstantCurrentRegulation->cc }} Ω
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>

        <table class="table-borderless" style="margin-top:5px; text-align:center">

            <tr style=" background-color: white;">
                <td colspan="17" style="text-align: left;font-size:10px">
                    Substation T4
                </td>
            </tr>
        </table>
        <table class="my-table" style="text-align:center">
            <tr style="text-align:center">
                <td rowspan="2" style="width: 2%">NO CCR</td>
                <td rowspan="2" style="width: 15%">Peralatan</td>
                <td rowspan="2"style="width: 7%">Merk</td>
                <td rowspan="2"style="width: 7%">Tipe</td>
                <td rowspan="2"style="width: 10%">Kapasitas</td>
                <td rowspan="2"style="width: 7%">Tahun Pemasangan</td>
                <td rowspan="2">Input Voltage</td>
                <td rowspan="2">Output Voltage</td>
                <td rowspan="2">Running Hours</td>
                <td rowspan="2">Ampere in Step 5</td>
                <td rowspan="2">Suhu Trafo</td>
                <td colspan="5">Meter Reading (local)</td>
                <td colspan="2">Tahanan Isolasi</td>
            </tr>
            <tr style="background-color:white text-align:center">
                <td>Step 1</td>
                <td>Step 2</td>
                <td>Step 2</td>
                <td>Step 4</td>
                <td>Step 5</td>
                <td>C-G Test</td>
                <td>C-C Test</td>
            </tr>
            @foreach ($formSvaConstantCurrentRegulations as $key => $formSvaConstantCurrentRegulation)
                @if ($formSvaConstantCurrentRegulation->substation == 'Substation T4')
                    <tr style=" background-color: white; text-align:left">
                        <td>{{ $loop->iteration }}</td>
                        <th>{{ $formSvaConstantCurrentRegulation->peralatan }}</th>
                        <td>{{ $formSvaConstantCurrentRegulation->merk }}</td>
                        <td>{{ $formSvaConstantCurrentRegulation->tipe }}</td>
                        <td>{{ $formSvaConstantCurrentRegulation->kapasitas }}</td>
                        <td>{{ $formSvaConstantCurrentRegulation->tahun_pemasangan }}</td>
                        <td>{{ $formSvaConstantCurrentRegulation->supply_voltage }} VAC</td>
                        <td>{{ $formSvaConstantCurrentRegulation->system_remote }} VAC</td>
                        <td>{{ $formSvaConstantCurrentRegulation->running_hours }} H</td>
                        <td>{{ $formSvaConstantCurrentRegulation->ampere }} A</td>
                        <td>{{ $formSvaConstantCurrentRegulation->suhu_trafo }} °C</td>
                        <td>{{ $formSvaConstantCurrentRegulation->step1 }} A</td>
                        <td>{{ $formSvaConstantCurrentRegulation->step2 }} A</td>
                        <td>{{ $formSvaConstantCurrentRegulation->step3 }} A</td>
                        <td>{{ $formSvaConstantCurrentRegulation->step4 }} A</td>
                        <td>{{ $formSvaConstantCurrentRegulation->step5 }} A</td>
                        <td style="font-family: DejaVu Sans, sans-serif;">{{ $formSvaConstantCurrentRegulation->cg }} Ω
                        </td>
                        <td style="font-family: DejaVu Sans, sans-serif;">{{ $formSvaConstantCurrentRegulation->cc }} Ω
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>

        <table class="table-borderless" style="margin-top:5px; text-align:center">

            <tr style=" background-color: white;">
                <td colspan="17" style="text-align: left;font-size:10px">
                    Substation T5
                </td>
            </tr>
        </table>
        <table class="my-table" style="text-align:center">
            <tr style="text-align:center">
                <td rowspan="2" style="width: 2%">NO CCR</td>
                <td rowspan="2" style="width: 15%">Peralatan</td>
                <td rowspan="2"style="width: 7%">Merk</td>
                <td rowspan="2"style="width: 7%">Tipe</td>
                <td rowspan="2"style="width: 10%">Kapasitas</td>
                <td rowspan="2"style="width: 7%">Tahun Pemasangan</td>
                <td rowspan="2">Input Voltage</td>
                <td rowspan="2">Output Voltage</td>
                <td rowspan="2">Running Hours</td>
                <td rowspan="2">Ampere in Step 5</td>
                <td rowspan="2">Suhu Trafo</td>
                <td colspan="5">Meter Reading (local)</td>
                <td colspan="2">Tahanan Isolasi</td>
            </tr>
            <tr style="background-color:white text-align:center">
                <td>Step 1</td>
                <td>Step 2</td>
                <td>Step 2</td>
                <td>Step 4</td>
                <td>Step 5</td>
                <td>C-G Test</td>
                <td>C-C Test</td>
            </tr>
            @foreach ($formSvaConstantCurrentRegulations as $key => $formSvaConstantCurrentRegulation)
                @if ($formSvaConstantCurrentRegulation->substation == 'Substation T5')
                    <tr style=" background-color: white; text-align:left">
                        <td>{{ $loop->iteration }}</td>
                        <th>{{ $formSvaConstantCurrentRegulation->peralatan }}</th>
                        <td>{{ $formSvaConstantCurrentRegulation->merk }}</td>
                        <td>{{ $formSvaConstantCurrentRegulation->tipe }}</td>
                        <td>{{ $formSvaConstantCurrentRegulation->kapasitas }}</td>
                        <td>{{ $formSvaConstantCurrentRegulation->tahun_pemasangan }}</td>
                        <td>{{ $formSvaConstantCurrentRegulation->supply_voltage }} VAC</td>
                        <td>{{ $formSvaConstantCurrentRegulation->system_remote }} VAC</td>
                        <td>{{ $formSvaConstantCurrentRegulation->running_hours }} H</td>
                        <td>{{ $formSvaConstantCurrentRegulation->ampere }} A</td>
                        <td>{{ $formSvaConstantCurrentRegulation->suhu_trafo }} °C</td>
                        <td>{{ $formSvaConstantCurrentRegulation->step1 }} A</td>
                        <td>{{ $formSvaConstantCurrentRegulation->step2 }} A</td>
                        <td>{{ $formSvaConstantCurrentRegulation->step3 }} A</td>
                        <td>{{ $formSvaConstantCurrentRegulation->step4 }} A</td>
                        <td>{{ $formSvaConstantCurrentRegulation->step5 }} A</td>
                        <td style="font-family: DejaVu Sans, sans-serif;">{{ $formSvaConstantCurrentRegulation->cg }} Ω
                        </td>
                        <td style="font-family: DejaVu Sans, sans-serif;">{{ $formSvaConstantCurrentRegulation->cc }} Ω
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>

        <table border="0px" class="table-borderless">
            <tr>
                <td>
                    {{ 'Tanggal : ' }}
                </td>
                <td>{{ $formSvaConstantCurrentRegulations[0]->tanggal }}</td>
                <td>
                    <table>
                        @foreach ($technicalGroups as $technicalGroup)
                            <tr style="background-color: white">
                                <td rowspan="3">{{ $technicalGroup }} : </td>
                            </tr>
                        @break
                    @endforeach
                </table>
            </td>
            <td>
                <table>
                    @forelse ($userTechnicals as  $userTechnical)
                        <tr style="background-color: white">
                            <td style="text-align: left;">{{ $loop->iteration }}. {{ $userTechnical }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td style="text-align: center">No Data Group 1</td>
                        </tr>
                    @endforelse
                </table>
            </td>
            <td>
                <table>
                    @foreach ($technicalGroups as $key => $technicalGroup)
                        @if ($key == 1)
                            <tr style="background-color: white">
                                <td rowspan="3">{{ $technicalGroup }} : </td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </td>
            <td>
                <table>
                    @forelse ($userTechnicals2 as  $userTechnical)
                        <tr style="background-color: white">
                            <td style="text-align: left;">{{ $loop->iteration }}. {{ $userTechnical }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td style="text-align: center">No Data Group 2</td>
                        </tr>
                    @endforelse
                </table>
            </td>
        </tr>
    </table>

    <div style="clear: both"></div>







</body>

</html>
