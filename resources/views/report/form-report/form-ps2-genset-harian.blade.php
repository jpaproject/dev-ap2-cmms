<!DOCTYPE html>
<html>

<head>
    <title>Report Work Order</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
            padding: 8px;
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
            margin: 20px 0 0 50px;
            text-align: center;
            width: 20%;
            float: left;
            font-size: 12px;
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
            padding: 5px;
        }
    </style>
</head>

<body>
    {{-- Checklist Genset Harian (Control Room & Genset Room) --}}
    <div class="content">
        <div class="header">
            <div class="title">
                <img style="width: 120px; text-align:left; display:inline; margin-right:70px"
                    src="{{ public_path('img/AP2.png') }}" alt="">
                <h1 style="font-size: 18px; display:inline; margin-right:165px; ">FORM CHECKLIST HARIAN GENSET
                </h1>
                {{-- <div style="font-family: DejaVu Sans, sans-serif;">✔</div> --}}
            </div>
        </div>
        <div class="body">
            <div class="table">
                <table class="my-table">
                    <tr class="row-title">
                        <th class="bold" style="width: 5%">A.</th>
                        <th class="bold" colspan="10">CONTROL ROOM</th>
                    </tr>
                    <tr class="row-title">
                        <td style="width: 5%"></td>
                        <td class="bold" colspan="10" style="text-align:center">EPCC (Emergency Panel Contol
                            Cabinet)</td>
                    </tr>
                    <tr class="row-title">
                        <td class="bold" style="width: 5%">I.</td>
                        <td class="bold" style="width: 30%;">PLN INCOMING</td>
                        <td class="bold" colspan="2" style="width: 10%; text-align:center">ER2A.MCA</td>
                        <td class="bold" colspan="2" style="width: 10%; text-align:center">ER2A.MCB</td>
                        <td class="bold" colspan="2" style="width: 10%; text-align:center">ER2B.MCD</td>
                        <td class="bold" colspan="2" style="width: 10%; text-align:center">ER2B.MCE</td>
                        <td class="bold" style="text-align:center">KETERANGAN</td>
                    </tr>
                    <tr class="row-white">
                        <td style="width: 5%"></td>
                        <td style="width: 30%;">DEIF Conctroller</td>
                        <td colspan="2" style="width: 10%; text-align:center">
                            {{ $checklistHarianGensetPs2ControlRoom->er2a_mca }}</td>
                        <td colspan="2" style="width: 10%; text-align:center">
                            {{ $checklistHarianGensetPs2ControlRoom->er2a_mcb }}</td>
                        <td colspan="2" style="width: 10%; text-align:center">
                            {{ $checklistHarianGensetPs2ControlRoom->er2b_mcd }}</td>
                        <td colspan="2" style="width: 10%; text-align:center">
                            {{ $checklistHarianGensetPs2ControlRoom->er2b_mce }}</td>
                        <td style="text-align:center">
                            {{ $checklistHarianGensetPs2ControlRoom->keterangan_pln_incoming }}</td>
                    </tr>
                    <tr class="row-title">
                        <td class="bold" style="width: 5%">II.</td>
                        <td class="bold" style="width: 30%;">GENSET INCOMING</td>
                        <td class="bold" colspan="4" style="text-align:center">ER2A.MCF</td>
                        <td class="bold" colspan="4" style="text-align:center">ER2B.MCG</td>
                        <td class="bold" style="text-align:center">KETERANGAN</td>
                    </tr>
                    <tr class="row-white">
                        <td style="width: 5%"></td>
                        <td style="width: 30%;">Overview Genset</td>
                        <td colspan="4" style="text-align:center">
                            {{ $checklistHarianGensetPs2ControlRoom->er2a_mcf }}</td>
                        <td colspan="4" style="text-align:center">
                            {{ $checklistHarianGensetPs2ControlRoom->er2b_mcg }}</td>
                        <td style="text-align:center">
                            {{ $checklistHarianGensetPs2ControlRoom->keterangan_genset_incoming }}</td>
                    </tr>
                    <tr class="row-title">
                        <td class="bold" style="width: 5%">III.</td>
                        <td class="bold" style="width: 30%;">HMI</td>
                        <td class="bold" style="text-align:center; width: 5%;">GS1</td>
                        <td class="bold" style="text-align:center; width: 5%;">GS2</td>
                        <td class="bold" style="text-align:center; width: 5%;">GS3</td>
                        <td class="bold" style="text-align:center; width: 5%;">GS4</td>
                        <td class="bold" style="text-align:center; width: 5%;">GS5</td>
                        <td class="bold" style="text-align:center; width: 5%;">GS6</td>
                        <td class="bold" style="text-align:center; width: 5%;">GS7</td>
                        <td class="bold" style="text-align:center; width: 5%; background-color: #c4bd97"></td>
                        <td class="bold" style="text-align:center">KETERANGAN</td>
                    </tr>
                    <tr class="row-white">
                        <td style="width: 5%"></td>
                        <td style="width: 30%;">DEIF Conctroller</td>
                        <td style="text-align:center">{{ $checklistHarianGensetPs2ControlRoom->genset1 }}</td>
                        <td style="text-align:center">{{ $checklistHarianGensetPs2ControlRoom->genset2 }}</td>
                        <td style="text-align:center">{{ $checklistHarianGensetPs2ControlRoom->genset3 }}</td>
                        <td style="text-align:center">{{ $checklistHarianGensetPs2ControlRoom->genset4 }}</td>
                        <td style="text-align:center">{{ $checklistHarianGensetPs2ControlRoom->genset5 }}</td>
                        <td style="text-align:center">{{ $checklistHarianGensetPs2ControlRoom->genset6 }}</td>
                        <td style="text-align:center">{{ $checklistHarianGensetPs2ControlRoom->genset7 }}</td>
                        <td style="text-align:center ;background-color: #c4bd97"></td>
                        <td style="text-align:center">{{ $checklistHarianGensetPs2ControlRoom->keterangan_hmi }}</td>
                    </tr>
                    <tr class="row-white">
                        <td style="width: 5%"></td>
                        <td style="width: 30%;">Busbar Active </td>
                        <td class="row-title" colspan="3" style="text-align:center">Busbar A</td>
                        <td style="text-align:center; padding: 5px;"><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $checklistHarianGensetPs2ControlRoom->busbar_a == true ? '✔' : '' }}</span>
                        </td>
                        <td class="row-title" colspan="3" style="text-align:center">Busbar B</td>
                        <td style="text-align:center; padding: 5px;"><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px"">{{ $checklistHarianGensetPs2ControlRoom->busbar_b == true ? '✔' : '' }}</span>
                        </td>
                        <td class="bold" style="text-align:center"></td>
                    </tr>
                    <tr>
                        <td class="row-white" colspan="11" style="height: 5px"></td>
                    </tr>
                    <tr class="row-title">
                        <th class="bold" style="width: 5%">B.</th>
                        <th class="bold" colspan="10">GENSET ROOM</th>
                    </tr>
                    <tr class="row-title">
                        <td style="width: 5%">IV.</td>
                        <td style="width: 30%;">Genset</td>
                        <td style="text-align:center; width: 6%;">GS1</td>
                        <td style="text-align:center; width: 6%;">GS2</td>
                        <td style="text-align:center; width: 6%;">GS3</td>
                        <td style="text-align:center; width: 6%;">GS4</td>
                        <td style="text-align:center; width: 6%;">GS5</td>
                        <td style="text-align:center; width: 6%;">GS6</td>
                        <td style="text-align:center; width: 6%;">GS7</td>
                        <td style="text-align:center; width: 6%; background-color: #c4bd97"></td>
                        <td style="text-align:center">KETERANGAN</td>
                    </tr>
                    @foreach ($gensetRoomLists as $key1 => $gensetRoomList)
                        <tr class="row-white">
                            <td style="width: 5%">{{ $loop->iteration }}</td>
                            <td style="width: 30%;">{{ $gensetRoomList['title'] }}</td>
                            @foreach ($checklistHarianGensetPs2GensetRooms as $key2 => $checklistHarianGensetPs2GensetRoom)
                                @php
                                    $object = 'q' . strval($key1 + 1);
                                @endphp
                                <td style="text-align:center;">
                                    {{ $checklistHarianGensetPs2GensetRoom->$object }}
                                </td>
                            @endforeach
                            <td style="text-align:center; background-color: #c4bd97"></td>
                            <td style="text-align:center">{{ $gensetRoomList['keterangan'] }}</td>
                        </tr>
                    @endforeach
                    <tr class="row-white">
                        <td style="width: 5%">16</td>
                        <td style="width: 30%;">Level BBM Ground Tank</td>
                        <td colspan="8"><span style="margin-right: 19%;">GT 1:
                                {{ $checklistHarianGensetPs2GensetRooms[0]->q16_gt1 }}</span><span
                                style="margin-right: 19%;">GT
                                2: {{ $checklistHarianGensetPs2GensetRooms[0]->q16_gt2 }}</span><span>GT 3:
                                {{ $checklistHarianGensetPs2GensetRooms[0]->q16_gt3 }}</span></td>
                        <td>Liter</td>
                    </tr>
                    <tr class="row-white">
                        <td style="width: 5%">17</td>
                        <td style="width: 30%;">Kondisi Pintu Ruang Genset</td>
                        <td colspan="7" style="text-align: center"><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $checklistHarianGensetPs2GensetRooms[0]->q17 ? '✔' : '' }}</span>
                        </td>
                        <td></td>
                        <td>Tertutup & Terkunci</td>
                    </tr>
                    <tr>
                        <td class="row-white" colspan="11" style="height: 80px; vertical-align: start">Catatan :
                            {!! $checklistGensetPhAocc->catatan ?? '' !!}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="ttd-left">
            <p><span class="bold">Supervisor</span></p>
            <p><span class="bold">Power Station 2</span></p>

            @if ($approve !== null)
                <img src="{{ public_path('img/users/ttd/' . ($approve->ttd ?? 'none.png')) }}" width="100px"
                    style="display: block">
            @endif
            <p><span>____________________</span></p>
        </div>
        <div class="ttd-right">
            <p><span class="bold">Paraf</span></p>
            <p><span class="bold">Technical</span></p>
            @if ($user_technicals !== null)
                <img src="{{ public_path('img/user-technicals/paraf/' . ($user_technicals->paraf ?? 'none.png')) }}"
                    width="100px" style="display: block">
            @endif
            <p><span>____________________</span></p>
        </div>
        <div style="clear: both"></div>
    </div>

</body>

</html>
