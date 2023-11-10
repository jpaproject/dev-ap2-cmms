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
            font-size: 15px;
            font-weight: 700;
            text-align: center;
        }

        .body {
            margin-top: 10px;
            margin-bottom: 10px;
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

        .table td,
        th {
            border: 1px solid #000000;
            text-align: center;
            vertical-align: middle;
            padding: 5px;
            width: 100px;
            font-size: 10px;
            /* Set the desired height for table cells */
            overflow: hidden;
            /* Prevent content from overflowing */
            white-space: nowrap;
            /* Prevent line breaks */
        }

        tr:first-child {
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
        }

        .title-table tr td {
            border: 1px solid black;
            text-align: center;
            vertical-align: middle;
        }

        .catatan {
            margin: 20px;
            padding: 5px;
            height: 100px;
            border: 1px solid black;
            text-size: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="content page-break">
        <div class="header">
            <div class="title">
                <table style="padding:20px 20px 0px 20px;" class="title-table">
                    <tr style="background-color: white;">
                        <td style=" width: 20%; text-align:center;" rowspan="2">
                            <img style="margin:10px;width: 150px; text-align:left; display:inline;"
                                src="{{ public_path('img/AP2.png') }}" alt="">
                        </td>
                        <td style=" width: 60%; text-align:center;">
                            PEMELIHARAAN 2 MINGGUAN
                        </td>
                    </tr>
                    <tr style="background-color: white;">
                        <td>MEDIUM VOLTAGE CUBICLE ( PANEL TM ) PS1</td>
                    </tr>
                </table>
                {{-- <img style="width: 120px; text-align:left; display:inline; margin-right:330px"
                    src="{{ public_path('img/AP2.png') }}" alt="">
                <h1 style="font-size: 18px; display:inline; margin-right:450px; ">PEMELIHARAAN 2 MINGGUAN</h1>
                <h1 style="font-size: 18px; text-align:center">MEDIUM VOLTAGE CUBICLE ( PANEL TM ) PS1</h1> --}}
            </div>
        </div>
        <div class="body">
            <div class="table">
                <h1 style="font-size: 18px; font-weight:bold">PANEL SYNCHRON</h1>
                <table style="table-layout: fixed;">
                    <tr>
                        <th style="width: 3%">No</th>
                        <th style="width: 10%">Asset</th>
                        <th style="width: 7%">Lampu Indikator</th>
                        <th style="width: 7%">Gas SF6</th>
                        <th style="width: 7%">Posisi CB</th>
                        <th style="width: 7%">Indikator Spring CB</th>
                        <th style="width: 7%">Tegangan</th>
                        <th style="width: 7%">Frekwensi</th>
                        <th style="width: 7%">Arus</th>
                        <th style="width: 7%">Power Factor</th>
                        <th style="width: 7%">Relay Proteksi</th>
                        <th style="width: 7%">Tegangan Kontrol</th>
                        <th style="width: 7%">MCB/Fuse kontrol</th>
                        <th style="width: 10%">KETERANGAN</th>
                    </tr>
                    @foreach ($panelSynchrons as $key => $panelSynchron)
                        <tr>
                            <td class="center">{{ $loop->iteration }}</td>
                            <td class="center">{{ $panelSynchron->asset_name }}</td>
                            <td class="center">{{ $panelSynchron->lampu_indikator }}</td>
                            <td class="center">{{ $panelSynchron->gas_sf6 }}</td>
                            <td class="center">{{ $panelSynchron->posisi_cb }}</td>
                            <td class="center">{{ $panelSynchron->indikator_spring_cb }}</td>
                            <td class="center">{{ $panelSynchron->tegangan }}</td>
                            <td class="center">{{ $panelSynchron->frequency }}</td>
                            <td class="center">{{ $panelSynchron->arus }}</td>
                            <td class="center">{{ $panelSynchron->power_factor }}</td>
                            <td class="center">{{ $panelSynchron->relay_proteksi }}</td>
                            <td class="center">{{ $panelSynchron->tegangan_kontrol }}</td>
                            <td class="center">{{ $panelSynchron->mcb_fuse_kontrol }}</td>
                            <td class="center">{{ $panelSynchron->keterangan }}</td>
                        </tr>
                    @endforeach
                </table> 
            </div>
            <div class="table">
                <h1 style="font-size: 18px; font-weight:bold">ER1B</h1>
                <table style="table-layout: fixed;">
                    <tr>
                        <th style="width: 3%">No</th>
                        <th style="width: 10%">Asset</th>
                        <th style="width: 7%">Lampu Indikator</th>
                        <th style="width: 7%">Gas SF6</th>
                        <th style="width: 7%">Posisi CB</th>
                        <th style="width: 7%">Indikator Spring CB</th>
                        <th style="width: 7%">Tegangan</th>
                        <th style="width: 7%">Frekwensi</th>
                        <th style="width: 7%">Arus</th>
                        <th style="width: 7%">Power Factor</th>
                        <th style="width: 7%">Relay Proteksi</th>
                        <th style="width: 7%">Tegangan Kontrol</th>
                        <th style="width: 7%">MCB/Fuse kontrol</th>
                        <th style="width: 10%">KETERANGAN</th>
                    </tr>
                    @foreach ($er1bs as $key => $er1b)
                        <tr>
                            <td class="center">{{ $loop->iteration }}</td>
                            <td class="center">{{ $er1b->asset_name }}</td>
                            <td class="center">{{ $er1b->lampu_indikator }}</td>
                            <td class="center">{{ $er1b->gas_sf6 }}</td>
                            <td class="center">{{ $er1b->posisi_cb }}</td>
                            <td class="center">{{ $er1b->indikator_spring_cb }}</td>
                            <td class="center">{{ $er1b->tegangan }}</td>
                            <td class="center">{{ $er1b->frequency }}</td>
                            <td class="center">{{ $er1b->arus }}</td>
                            <td class="center">{{ $er1b->power_factor }}</td>
                            <td class="center">{{ $er1b->relay_proteksi }}</td>
                            <td class="center">{{ $er1b->tegangan_kontrol }}</td>
                            <td class="center">{{ $er1b->mcb_fuse_kontrol }}</td>
                            <td class="center">{{ $er1b->keterangan }}</td>
                        </tr>
                    @endforeach
                </table> 
            </div>
        </div>

    </div>
    <div class="content page-break">
        <div class="body">
            <div class="table">
                <h1 style="font-size: 18px; font-weight:bold">ER7</h1>
                <table style="table-layout: fixed;">
                    <tr>
                        <th style="width: 3%">No</th>
                        <th style="width: 10%">Asset</th>
                        <th style="width: 7%">Lampu Indikator</th>
                        <th style="width: 7%">Gas SF6</th>
                        <th style="width: 7%">Posisi CB</th>
                        <th style="width: 7%">Indikator Spring CB</th>
                        <th style="width: 7%">Tegangan</th>
                        <th style="width: 7%">Frekwensi</th>
                        <th style="width: 7%">Arus</th>
                        <th style="width: 7%">Power Factor</th>
                        <th style="width: 7%">Relay Proteksi</th>
                        <th style="width: 7%">Tegangan Kontrol</th>
                        <th style="width: 7%">MCB/Fuse kontrol</th>
                        <th style="width: 10%">KETERANGAN</th>
                    </tr>
                    @foreach ($er7s as $key => $er7)
                        <tr>
                            <td class="center">{{ $loop->iteration }}</td>
                            <td class="center">{{ $er7->asset_name }}</td>
                            <td class="center">{{ $er7->lampu_indikator }}</td>
                            <td class="center">{{ $er7->gas_sf6 }}</td>
                            <td class="center">{{ $er7->posisi_cb }}</td>
                            <td class="center">{{ $er7->indikator_spring_cb }}</td>
                            <td class="center">{{ $er7->tegangan }}</td>
                            <td class="center">{{ $er7->frequency }}</td>
                            <td class="center">{{ $er7->arus }}</td>
                            <td class="center">{{ $er7->power_factor }}</td>
                            <td class="center">{{ $er7->relay_proteksi }}</td>
                            <td class="center">{{ $er7->tegangan_kontrol }}</td>
                            <td class="center">{{ $er7->mcb_fuse_kontrol }}</td>
                            <td class="center">{{ $er7->keterangan }}</td>
                        </tr>
                    @endforeach
                </table> 
            </div>
            <div class="table">
                <h1 style="font-size: 18px; font-weight:bold">ER2B</h1>
                <table style="table-layout: fixed;">
                    <tr>
                        <th style="width: 3%">No</th>
                        <th style="width: 10%">Asset</th>
                        <th style="width: 7%">Lampu Indikator</th>
                        <th style="width: 7%">Gas SF6</th>
                        <th style="width: 7%">Posisi CB</th>
                        <th style="width: 7%">Indikator Spring CB</th>
                        <th style="width: 7%">Tegangan</th>
                        <th style="width: 7%">Frekwensi</th>
                        <th style="width: 7%">Arus</th>
                        <th style="width: 7%">Power Factor</th>
                        <th style="width: 7%">Relay Proteksi</th>
                        <th style="width: 7%">Tegangan Kontrol</th>
                        <th style="width: 7%">MCB/Fuse kontrol</th>
                        <th style="width: 10%">KETERANGAN</th>
                    </tr>
                    @foreach ($er6s as $key => $er6)
                        <tr>
                            <td class="center">{{ $loop->iteration }}</td>
                            <td class="center">{{ $er6->asset_name }}</td>
                            <td class="center">{{ $er6->lampu_indikator }}</td>
                            <td class="center">{{ $er6->gas_sf6 }}</td>
                            <td class="center">{{ $er6->posisi_cb }}</td>
                            <td class="center">{{ $er6->indikator_spring_cb }}</td>
                            <td class="center">{{ $er6->tegangan }}</td>
                            <td class="center">{{ $er6->frequency }}</td>
                            <td class="center">{{ $er6->arus }}</td>
                            <td class="center">{{ $er6->power_factor }}</td>
                            <td class="center">{{ $er6->relay_proteksi }}</td>
                            <td class="center">{{ $er6->tegangan_kontrol }}</td>
                            <td class="center">{{ $er6->mcb_fuse_kontrol }}</td>
                            <td class="center">{{ $er6->keterangan }}</td>
                        </tr>
                    @endforeach
                </table> 
            </div>
        </div>
    </div>
    <div class="content page-break">
        <div class="body">
            <div class="table">
                <h1 style="font-size: 18px; font-weight:bold">ER7</h1>
                <table style="table-layout: fixed;">
                    <tr>
                        <th style="width: 3%">No</th>
                        <th style="width: 10%">Asset</th>
                        <th style="width: 7%">Lampu Indikator</th>
                        <th style="width: 7%">Gas SF6</th>
                        <th style="width: 7%">Posisi CB</th>
                        <th style="width: 7%">Indikator Spring CB</th>
                        <th style="width: 7%">Tegangan</th>
                        <th style="width: 7%">Frekwensi</th>
                        <th style="width: 7%">Arus</th>
                        <th style="width: 7%">Power Factor</th>
                        <th style="width: 7%">Relay Proteksi</th>
                        <th style="width: 7%">Tegangan Kontrol</th>
                        <th style="width: 7%">MCB/Fuse kontrol</th>
                        <th style="width: 10%">KETERANGAN</th>
                    </tr>
                    @foreach ($er2as as $key => $er2a)
                        <tr>
                            <td class="center">{{ $loop->iteration }}</td>
                            <td class="center">{{ $er2a->asset_name }}</td>
                            <td class="center">{{ $er2a->lampu_indikator }}</td>
                            <td class="center">{{ $er2a->gas_sf6 }}</td>
                            <td class="center">{{ $er2a->posisi_cb }}</td>
                            <td class="center">{{ $er2a->indikator_spring_cb }}</td>
                            <td class="center">{{ $er2a->tegangan }}</td>
                            <td class="center">{{ $er2a->frequency }}</td>
                            <td class="center">{{ $er2a->arus }}</td>
                            <td class="center">{{ $er2a->power_factor }}</td>
                            <td class="center">{{ $er2a->relay_proteksi }}</td>
                            <td class="center">{{ $er2a->tegangan_kontrol }}</td>
                            <td class="center">{{ $er2a->mcb_fuse_kontrol }}</td>
                            <td class="center">{{ $er2a->keterangan }}</td>
                        </tr>
                    @endforeach
                </table> 
            </div>
            <div class="table">
                <h1 style="font-size: 18px; font-weight:bold">ER2B</h1>
                <table style="table-layout: fixed;">
                    <tr>
                        <th style="width: 3%">No</th>
                        <th style="width: 10%">Asset</th>
                        <th style="width: 7%">Lampu Indikator</th>
                        <th style="width: 7%">Gas SF6</th>
                        <th style="width: 7%">Posisi CB</th>
                        <th style="width: 7%">Indikator Spring CB</th>
                        <th style="width: 7%">Tegangan</th>
                        <th style="width: 7%">Frekwensi</th>
                        <th style="width: 7%">Arus</th>
                        <th style="width: 7%">Power Factor</th>
                        <th style="width: 7%">Relay Proteksi</th>
                        <th style="width: 7%">Tegangan Kontrol</th>
                        <th style="width: 7%">MCB/Fuse kontrol</th>
                        <th style="width: 10%">KETERANGAN</th>
                    </tr>
                    @foreach ($er2bs as $key => $er2b)
                        <tr>
                            <td class="center">{{ $loop->iteration }}</td>
                            <td class="center">{{ $er2b->asset_name }}</td>
                            <td class="center">{{ $er2b->lampu_indikator }}</td>
                            <td class="center">{{ $er2b->gas_sf6 }}</td>
                            <td class="center">{{ $er2b->posisi_cb }}</td>
                            <td class="center">{{ $er2b->indikator_spring_cb }}</td>
                            <td class="center">{{ $er2b->tegangan }}</td>
                            <td class="center">{{ $er2b->frequency }}</td>
                            <td class="center">{{ $er2b->arus }}</td>
                            <td class="center">{{ $er2b->power_factor }}</td>
                            <td class="center">{{ $er2b->relay_proteksi }}</td>
                            <td class="center">{{ $er2b->tegangan_kontrol }}</td>
                            <td class="center">{{ $er2b->mcb_fuse_kontrol }}</td>
                            <td class="center">{{ $er2b->keterangan }}</td>
                        </tr>
                    @endforeach
                </table> 
            </div>
        </div>
    </div>
    <div class="catatan" width="100">
        <p style="font-size:10px">CATATAN :</p>
        {!! nl2br($panelSynchrons[0]->catatan) !!}
    </div>
    {{-- <div class="content"> --}}
    {{-- <div class="ttd-left">
            <p><span class="bold">Supervisor</span></p>
            <p><span class="bold">Power Station 1</span></p>
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
        <div style="clear: both"></div> --}}
    </div>
</body>

</html>
