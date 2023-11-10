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
            font-size: 10px;
            font-weight: 700;
            text-align: center;
        }

        .body {
            /* margin-top: 30px; */
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
            margin: 20px 20px;

        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 7px;
            font-size:15px;
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
            margin: 0px 0 0 50px;
            text-align: center;
            width: 20%;
            float: left;
            font-size: 12px;
        }

        .ttd-left {
            margin: 0px 0 0 0px;
            text-align: center;
            width: 40%;
            float: left;
            font-size: 12px;
        }

        .ttd-right {
            margin: 0px 0 0 50px;
            text-align: center;
            width: 40%;
            float: right;
            font-size: 12px;
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

        .center td{
            text-align: center;
            vertical-align: middle;
        }

        .table-data {
            font-size:10px;
            border:none;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        .table-no {
            border:none;
            border-left: 1px solid black;
        }

        .table-pert            border:none;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        .table-no {
            border:none;
            border-left: 1px solid black;
        }

        .table-pertanyaan {
            border:none;
            border-right: 1px solid black;
        }
        .table-data tr td {
            background-color: white;
            text-align: left;
            vertical-align: middle;
        }
        .table-header td{
            font-weight: bold;
        }
        .table-header{
            font-weight: bold;
            text-align: center;
            border: 1px solid black;
            border-bottom: none;
            font-size: 10px;
            background-color: #5f9ea0;
        }
        .block-check {
            border: 1px solid black;
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="content">
        <table style="margin-top:50px; padding:20px; border: none; padding-bottom: 0px;">
            <tr style=" background-color: white;">
                <td style="border: none; width: 50%;">
                    <p>BIDANG FASILITAS BANDARA</p>
                    <p>DIVISI ENERGY & POWER SUPPLY</p>
                    <p>DINAS GARDU INDUK</p>
                    <p>Tanggal : {{$tanggal}}</p>
                    <p>Pukul : {{$jam}}</p>
                </td>
                <td style="border: none; width: 50%;"></td>
                <td style="border: none; width: 50%;"></td>

            </tr>
        </table>
        <div class="body">
            <div class="table">
                <table class="table-data">
                    <tr>
                        <th class="center table-header" rowspan="3" style="width: 5%; border:1px solid black;">NO</th>
                        <th class="center table-header" rowspan="3" style="width: 30%; border:1px solid black;">Panel</th>
                        <th class="center table-header" colspan="3" style="border:1px solid black;">Tegangan</th>
                        <th class="center table-header" colspan="3" style="border:1px solid black;">Arus</th>
                        <th class="center table-header" colspan="4" style="border:1px solid black;">Daya</th>
                        <th class="center table-header" rowspan="3" style="border:1px solid black;">Frekuensi</th>
                        <th class="center table-header" rowspan="3" style="border:1px solid black;">Cos</th>
                    </tr>
                    <tr>
                        <td class="center table-header" rowspan="2" style="border:1px solid black; background-color:#5f9ea0; text-align: center;">L1</td>
                        <td class="center table-header" rowspan="2" style="border:1px solid black; background-color:#5f9ea0; text-align: center;">L2</td>
                        <td class="center table-header" rowspan="2" style="border:1px solid black; background-color:#5f9ea0; text-align: center;">L3</td>
                        <td class="center table-header" rowspan="2" style="border:1px solid black; background-color:#5f9ea0; text-align: center;">L1</td>
                        <td class="center table-header" rowspan="2" style="border:1px solid black; background-color:#5f9ea0; text-align: center;">L2</td>
                        <td class="center table-header" rowspan="2" style="border:1px solid black; background-color:#5f9ea0; text-align: center;">L3</td>
                        <td class="center table-header" colspan="2" style="border:1px solid black; background-color:#5f9ea0; text-align: center;">MWH</td>
                        <td class="center table-header" colspan="2" style="border:1px solid black; background-color:#5f9ea0; text-align: center;">MVARH</td>
                    </tr>
                    <tr>
                        <td class="center table-header" style="border:1px solid black; background-color:#5f9ea0; text-align: center;">DEL</td>
                        <td class="center table-header" style="border:1px solid black; background-color:#5f9ea0; text-align: center;">REC</td>
                        <td class="center table-header" style="border:1px solid black; background-color:#5f9ea0; text-align: center;">DEL</td>
                        <td class="center table-header" style="border:1px solid black; background-color:#5f9ea0; text-align: center;">REC</td>
                    </tr>
                    @foreach ( $formHmvMeteranHarians as $key => $item )
                            <tr>
                                <td class="center" style="width: 5%; border:1px solid black;">
                                    {{$loop->iteration}}
                                </td>
                                <td style="width: 30%; border:1px solid black;">
                                    {{$item->name}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->tengangan_l1}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->tengangan_l2}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->tengangan_l3}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->arus_l1}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->arus_l2}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->arus_l3}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->daya_mwh_del}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->daya_mwh_rec}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->daya_mvarh_del}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->daya_mvarh_rec}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->frekuensi}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->cos}}
                                </td>
                            </tr>
                    @endforeach
                </table>
                <table class="table-data">
                    <tr>
                        <th class="center table-header" rowspan="2" style="width: 5%; border:1px solid black;">NO</th>
                        <th class="center table-header" rowspan="2" style="width: 30%; border:1px solid black;">Panel</th>
                        <th class="center table-header" colspan="3" style="border:1px solid black;">Tegangan</th>
                        <th class="center table-header" colspan="3" style="border:1px solid black;">Arus</th>
                        <th class="center table-header" rowspan="2" style="border:1px solid black;">Daya Aktif</th>
                        <th class="center table-header" rowspan="2" style="border:1px solid black;">Daya Semu</th>
                        <th class="center table-header" rowspan="2" style="border:1px solid black;">Daya Reaktif</th>
                        <th class="center table-header" rowspan="2" style="border:1px solid black;">Frekuensi</th>
                        <th class="center table-header" rowspan="2" style="border:1px solid black;">Cos</th>
                    </tr>
                    <tr>
                        <td class="center table-header" style="border:1px solid black; background-color:#5f9ea0; text-align: center;">L1</td>
                        <td class="center table-header" style="border:1px solid black; background-color:#5f9ea0; text-align: center;">L2</td>
                        <td class="center table-header" style="border:1px solid black; background-color:#5f9ea0; text-align: center;">L3</td>
                        <td class="center table-header" style="border:1px solid black; background-color:#5f9ea0; text-align: center;">L1</td>
                        <td class="center table-header" style="border:1px solid black; background-color:#5f9ea0; text-align: center;">L2</td>
                        <td class="center table-header" style="border:1px solid black; background-color:#5f9ea0; text-align: center;">L3</td>
                    </tr>
                    @foreach ( $formHmvMeteran2Harians as $key => $item )
                            <tr>
                                <td class="center" style="width: 5%; border:1px solid black;">
                                    {{$loop->iteration + 4}}
                                </td>
                                <td class="center" style="width: 5%; border:1px solid black;">
                                    {{$item->name}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->tengangan_l1}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->tengangan_l2}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->tengangan_l3}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->arus_l1}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->arus_l2}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->arus_l3}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->daya_aktif}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->daya_semu}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->daya_reaktif}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->frekuensi}}
                                </td>
                                <td style="border:1px solid black;">
                                    {{$item->cos}}
                                </td>
                            </tr>
                    @endforeach
                </table>
                <br>
                <table>
                    <tr>
                        <td style="border:none; background-color:white;">ASSISTANT MANAGER OF HIGH & MEDIUM VOLTAGE STATION</td>
                        <td style="border:none; background-color:white;">Tangerang, <br> PETUGAS DINAS</td>
                    </tr>
                    <tr>
                        <td style="border:none; background-color:white;">
                            @if($qrCodeAdmin != "kosong")
                                <img style="width: 80px; vertical-align: bottom; text-align: right;"
                                    src="data:image/png;base64,{{ base64_encode($qrCodeAdmin) }}" alt="QR Code">

                                    <br>
                                    ({{$userNameAdmin}})
                            @endif
                        </td>
                        <td style="border:none; background-color:white;">
                            @if($qrCode != "kosong")
                                <img style="width: 80px; vertical-align: bottom; text-align: right;"
                                    src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code">

                                    <br>
                                    ({{$userName}})
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div style="clear: both"></div>
    </div>

</body>

</html>
