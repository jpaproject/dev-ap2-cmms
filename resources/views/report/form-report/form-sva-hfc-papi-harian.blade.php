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
            border: 1px solid #dddddd;
            text-align: left;
            padding: 7px;
            font-size: 10px;
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
            text-align: center;
        }

        .center {
            text-align: center;
            vertical-align: middle;
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
        }

        .table-borderless {
            padding-right: 20px;
            padding-left: 20px;
            background-color: white;
        }

        .table-borderless th,
        .table-borderless td {
            border: none;
        }
    </style>
</head>

<body>
    <div class="content">
        <table class="table-borderless" style="margin-top:50px; text-align:center">
            <tr style=" background-color: white; text-decoration:underline">
                <td colspan="9" style="text-decoration:underline;text-align:center">
                    <h1 style="font-size: 18px;text-align:center;text-decoration:underline">
                        HASIL FLIGHT CALIBRATION PAPI
                    </h1>
                </td>
            </tr>
            <tr style=" background-color: white;">
                <td colspan="2" style="text-align: left">
                    RUNWAY SELATAN
                </td>
                <td colspan="4" style="text-align: left">
                    Hari : {{ $hari }}
                </td>
                <td colspan="3"style="text-align: left">
                    Tanggal : {{ $tanggal }}
                </td>
            </tr>
        </table>
        <table class="my-table" style="text-align:center">
            <tr style=" background-color: rgb(86, 159, 212);text-align:center">
                <td rowspan="2" style="width: 5%">NO</td>
                <td rowspan="2">Facility Inspected</td>
                <td colspan="4">Glide Slope Angle</td>
                <td>Calculate check On Slope</td>
                <td rowspan="2">Remark</td>
                <td rowspan="2">Next Calibration</td>
            </tr>
            <tr style=" background-color: rgb(86, 159, 212);text-align:center">
                <td>A</td>
                <td>B</td>
                <td>C</td>
                <td>D</td>
                <td>LEFT</td>
            </tr>

            @php
                $number = 1;
            @endphp

            @foreach ($formSvaHFCPapiHarians as $key => $formSvaHFCPapiHarian)
                @if ($key == 0 || $key == 3)
                    @if ($key == 0)
                        <tr >
                            <td rowspan="6">{{ $number }}</td>
                            <td rowspan="6">{{ $formSvaHFCPapiHarian->Fi }}</td>
                            <td style=" background-color: rgb(198, 193, 193);" colspan="5">STANDARD (ILS)</td>
                            <td rowspan="6">{{ $formSvaHFCPapiHarians[5]->current_calibration }}</td>
                            <td rowspan="6">{{ $formSvaHFCPapiHarians[5]->next_calibration }}</td>
                        </tr>
                        <tr style=" background-color: white;">
                            <td>{{ $formSvaHFCPapiHarian->glide_a_derajat }}°{{ $formSvaHFCPapiHarian->glide_a_menit }}'
                            </td>
                            <td>{{ $formSvaHFCPapiHarian->glide_b_derajat }}°{{ $formSvaHFCPapiHarian->glide_b_menit }}'
                            </td>
                            <td>{{ $formSvaHFCPapiHarian->glide_c_derajat }}°{{ $formSvaHFCPapiHarian->glide_c_menit }}'
                            </td>
                            <td>{{ $formSvaHFCPapiHarian->glide_d_derajat }}°{{ $formSvaHFCPapiHarian->glide_d_menit }}'
                            </td>
                            <td>{{ $formSvaHFCPapiHarian->ccos }}</td>
                            
                        </tr>
                    @else
                        <tr >
                            <td rowspan="6">{{ $number + 1 }}</td>
                            <td rowspan="6">{{ $formSvaHFCPapiHarian->Fi }}</td>
                            <td style=" background-color: rgb(198, 193, 193);" colspan="5">STANDARD (ILS)</td>
                            <td rowspan="6">{{ $formSvaHFCPapiHarians[5]->current_calibration }}</td>
                            <td rowspan="6">{{ $formSvaHFCPapiHarians[5]->next_calibration }}</td>
                        </tr>
                        <tr style=" background-color: white;">
                            <td>{{ $formSvaHFCPapiHarian->glide_a_derajat }}°{{ $formSvaHFCPapiHarian->glide_a_menit }}'
                            </td>
                            <td>{{ $formSvaHFCPapiHarian->glide_b_derajat }}°{{ $formSvaHFCPapiHarian->glide_b_menit }}'
                            </td>
                            <td>{{ $formSvaHFCPapiHarian->glide_c_derajat }}°{{ $formSvaHFCPapiHarian->glide_c_menit }}'
                            </td>
                            <td>{{ $formSvaHFCPapiHarian->glide_d_derajat }}°{{ $formSvaHFCPapiHarian->glide_d_menit }}'
                            </td>
                            <td>{{ $formSvaHFCPapiHarian->ccos }}</td>
                            
                        </tr>
                    @endif
                @elseif($key == 1 || $key == 4)
                    <tr style=" background-color: rgb(198, 193, 193);">
                        <td colspan="5">FLIGHT CALIBRATION RESULT</td>
                    </tr>
                    <tr style=" background-color: white;">
                        <td>{{ $formSvaHFCPapiHarian->glide_a_derajat }}°{{ $formSvaHFCPapiHarian->glide_a_menit }}'
                        </td>
                        <td>{{ $formSvaHFCPapiHarian->glide_b_derajat }}°{{ $formSvaHFCPapiHarian->glide_b_menit }}'
                        </td>
                        <td>{{ $formSvaHFCPapiHarian->glide_c_derajat }}°{{ $formSvaHFCPapiHarian->glide_c_menit }}'
                        </td>
                        <td>{{ $formSvaHFCPapiHarian->glide_d_derajat }}°{{ $formSvaHFCPapiHarian->glide_d_menit }}'
                        </td>
                        <td>{{ $formSvaHFCPapiHarian->ccos }}</td>
                    </tr>
                @else
                    <tr style=" background-color: rgb(198, 193, 193);">
                        <td colspan="5">GROUND CALIBRATION RESULT</td>
                    </tr>
                    <tr style=" background-color: white;">
                        <td>{{ $formSvaHFCPapiHarian->glide_a_derajat }}°{{ $formSvaHFCPapiHarian->glide_a_menit }}'
                        </td>
                        <td>{{ $formSvaHFCPapiHarian->glide_b_derajat }}°{{ $formSvaHFCPapiHarian->glide_b_menit }}'
                        </td>
                        <td>{{ $formSvaHFCPapiHarian->glide_c_derajat }}°{{ $formSvaHFCPapiHarian->glide_c_menit }}'
                        </td>
                        <td>{{ $formSvaHFCPapiHarian->glide_d_derajat }}°{{ $formSvaHFCPapiHarian->glide_d_menit }}'
                        </td>
                        <td>{{ $formSvaHFCPapiHarian->ccos }}</td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
    <table border="0px" class="table-borderless" style="padding: 20px">
        <td>
            <table border="0px" class="table-borderless" style="padding: 20px">
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
                            <td style="text-align: center">No Data group 1</td>
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
                            <td style="text-align: center">No Data group 2</td>
                        </tr>
                    @endforelse
                </table>
            </td>
            </tr>
        </table>

        <div style="clear: both"></div>







</body>

</html>
