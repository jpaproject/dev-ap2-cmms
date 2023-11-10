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
            padding: 8px;
            width: 100px;
            font-size: 8px;
            /* Set the desired height for table cells */
            overflow: hidden;
            /* Prevent content from overflowing */
            white-space: nowrap;
            /* Prevent line breaks */
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
            background-color: #dddddd;
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
                        <td style=" width: 20%; text-align:center;">
                            <img style="margin:10px;width: 150px; text-align:left; display:inline;"
                                src="{{ public_path('img/AP2.png') }}" alt="">
                        </td>
                        <td style=" width: 60%; text-align:center;">
                            FORM CHECKLIST PH AOCC 
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="body">
            <div class="table">
                <table style="table-layout: fixed;">
                    <thead>
                        <tr>
                            <th style="width: 3%">NO</th>
                            <th style="width: 7%">MODUL</th>
                            <th style="width: 7%">POSISI CB</th>
                            <th style="width: 7%">CB SPRING</th>
                            <th style="width: 7%">LOCAL<br>REMOTE</th>
                            <th style="width: 7%">MODE<br>KONTROL<br>MODUL</th>
                            <th style="width: 7%">MODE<br>KONTROL<br>SCADA</th>
                            <th style="width: 15%" colspan="3">TEGANGAN (V)</th>
                            <th style="width: 15%" colspan="3">ARUS (A)</th>
                            <th style="width: 15%" colspan="3">DAYA (KW)</th>
                            <th style="width: 10%">KETERANGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="17" style="font-size:12px; font-weight:bold; background-color: #dddddd">PANEL LVMDP</td>
                        </tr>
                        @foreach ($panelLvmdps as $panelLvmdpKey => $panelLvmdp)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $panelLvmdp->modul }}</td>
                                <td @if($datas->panelLvmdps[$panelLvmdpKey]['posisi_cb'] === null) style="background-color: #a8a8a8" @endif>{{ $panelLvmdp->posisi_cb }}</td>
                                <td @if($datas->panelLvmdps[$panelLvmdpKey]['cb_spring'] === null) style="background-color: #a8a8a8" @endif>{{ $panelLvmdp->cb_spring }}</td>
                                <td @if($datas->panelLvmdps[$panelLvmdpKey]['local_remote'] === null) style="background-color: #a8a8a8" @endif>{{ $panelLvmdp->local_remote }}</td>
                                <td @if($datas->panelLvmdps[$panelLvmdpKey]['mode_kontrol_modul'] === null) style="background-color: #a8a8a8" @endif>{{ $panelLvmdp->mode_kontrol_modul }}</td>
                                <td @if($datas->panelLvmdps[$panelLvmdpKey]['mode_kontrol_scada'] === null) style="background-color: #a8a8a8" @endif>{{ $panelLvmdp->mode_kontrol_scada }}</td>

                                {{-- Tegangan --}}
                                <td @if($datas->panelLvmdps[$panelLvmdpKey]['tegangan_v_1'] === null) style="background-color: #a8a8a8" @endif>{{ $panelLvmdp->tegangan_v_1 }}</td>
                                <td @if($datas->panelLvmdps[$panelLvmdpKey]['tegangan_v_2'] === null) style="background-color: #a8a8a8" @endif>{{ $panelLvmdp->tegangan_v_2 }}</td>
                                <td @if($datas->panelLvmdps[$panelLvmdpKey]['tegangan_v_3'] === null) style="background-color: #a8a8a8" @endif>{{ $panelLvmdp->tegangan_v_3 }}</td>

                                {{-- Arus --}}
                                <td @if($datas->panelLvmdps[$panelLvmdpKey]['arus_1'] === null) style="background-color: #a8a8a8" @endif>{{ $panelLvmdp->arus_1 }}</td>
                                <td @if($datas->panelLvmdps[$panelLvmdpKey]['arus_2'] === null) style="background-color: #a8a8a8" @endif>{{ $panelLvmdp->arus_1 }}</td>
                                <td @if($datas->panelLvmdps[$panelLvmdpKey]['arus_3'] === null) style="background-color: #a8a8a8" @endif>{{ $panelLvmdp->arus_2 }}</td>

                                {{-- Daya --}}
                                <td @if($datas->panelLvmdps[$panelLvmdpKey]['daya_1'] === null) style="background-color: #a8a8a8" @endif>{{ $panelLvmdp->daya_1 }}</td>
                                <td @if($datas->panelLvmdps[$panelLvmdpKey]['daya_2'] === null) style="background-color: #a8a8a8" @endif>{{ $panelLvmdp->daya_2 }}</td>
                                <td @if($datas->panelLvmdps[$panelLvmdpKey]['daya_3'] === null) style="background-color: #a8a8a8" @endif>{{ $panelLvmdp->daya_3 }}</td>

                                <td>{{ $panelLvmdp->keterangan }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="17" style="font-size:12px; font-weight:bold; background-color: #dddddd">PANEL ACTS - GENSET</td>
                        </tr>
                        @foreach ($panelActsGensets as $panelActsGensetKey=> $panelActsGenset)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $panelActsGenset->modul }}</td>
                                <td @if($datas->panelActsGensets[$panelActsGensetKey]['posisi_cb'] === null) style="background-color: #a8a8a8" @endif>{{ $panelActsGenset->posisi_cb }}</td>
                                <td @if($datas->panelActsGensets[$panelActsGensetKey]['cb_spring'] === null) style="background-color: #a8a8a8" @endif>{{ $panelActsGenset->cb_spring }}</td>
                                <td @if($datas->panelActsGensets[$panelActsGensetKey]['local_remote'] === null) style="background-color: #a8a8a8" @endif>{{ $panelActsGenset->local_remote }}</td>
                                <td @if($datas->panelActsGensets[$panelActsGensetKey]['mode_kontrol_modul'] === null) style="background-color: #a8a8a8" @endif>{{ $panelActsGenset->mode_kontrol_modul }}</td>
                                <td @if($datas->panelActsGensets[$panelActsGensetKey]['mode_kontrol_scada'] === null) style="background-color: #a8a8a8" @endif>{{ $panelActsGenset->mode_kontrol_scada }}</td>

                                {{-- Tegangan --}}
                                <td @if($datas->panelActsGensets[$panelActsGensetKey]['tegangan_v_1'] === null) style="background-color: #a8a8a8" @endif>{{ $panelActsGenset->tegangan_v_1 }}</td>
                                <td @if($datas->panelActsGensets[$panelActsGensetKey]['tegangan_v_2'] === null) style="background-color: #a8a8a8" @endif>{{ $panelActsGenset->tegangan_v_2 }}</td>
                                <td @if($datas->panelActsGensets[$panelActsGensetKey]['tegangan_v_2'] === null) style="background-color: #a8a8a8" @endif>{{ $panelActsGenset->tegangan_v_3 }}</td>

                                {{-- Arus --}}
                                <td @if($datas->panelActsGensets[$panelActsGensetKey]['arus_1'] === null) style="background-color: #a8a8a8" @endif>{{ $panelActsGenset->arus_1 }}</td>
                                <td @if($datas->panelActsGensets[$panelActsGensetKey]['arus_2'] === null) style="background-color: #a8a8a8" @endif>{{ $panelActsGenset->arus_1 }}</td>
                                <td @if($datas->panelActsGensets[$panelActsGensetKey]['arus_3'] === null) style="background-color: #a8a8a8" @endif>{{ $panelActsGenset->arus_2 }}</td>

                                {{-- Daya --}}
                                <td @if($datas->panelActsGensets[$panelActsGensetKey]['daya_1'] === null) style="background-color: #a8a8a8" @endif>{{ $panelActsGenset->daya_1 }}</td>
                                <td @if($datas->panelActsGensets[$panelActsGensetKey]['daya_2'] === null) style="background-color: #a8a8a8" @endif>{{ $panelActsGenset->daya_2 }}</td>
                                <td @if($datas->panelActsGensets[$panelActsGensetKey]['daya_3'] === null) style="background-color: #a8a8a8" @endif>{{ $panelActsGenset->daya_3 }}</td>

                                <td>{{ $panelLvmdp->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="body">
            <div class="table">
                <table style="table-layout: fixed;">
                    <thead>
                        <tr>
                            <td style="font-size:12px; font-weight:bold; background-color: #dddddd" colspan="17">ACTS</td>
                        </tr>
                        <tr>
                            <td style="width: 3%">NO</td>
                            <td style="width: 7%">MODUL</td>
                            <td style="width: 7%">NORMAL SOURCE</td>
                            <td style="width: 7%">TEGANGAN</td>
                            <td style="width: 7%">TRANSFER SWITCH</td>
                            <td style="width: 59%; background-color: #dddddd"" colspan="9"></td>
                            <td style="width: 10%" colspan="3">KETERANGAN</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($acts as $act)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $act->modul }}</td>
                            <td>{{ $act->normal_source }}</td>
                            <td>{{ $act->tegangan }}</td>
                            <td>{{ $act->transfer_switch }}</td>
                            <td style="background-color: #a8a8a8"></td>
                            <td style="background-color: #a8a8a8"></td>
                            <td style="background-color: #a8a8a8"></td>
                            <td style="background-color: #a8a8a8"></td>
                            <td style="background-color: #a8a8a8"></td>
                            <td style="background-color: #a8a8a8"></td>
                            <td style="background-color: #a8a8a8"></td>
                            <td style="background-color: #a8a8a8"></td>
                            <td style="background-color: #a8a8a8"></td>
                            <td colspan="3">{{ $act->keterangan }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                    </tbody>
                </table>
                <table style="table-layout: fixed;">
                    <thead>
                        <tr>
                            <td style="font-size:12px; font-weight:bold; background-color: #dddddd" colspan="17">MAIN DISTRIBUTION PANEL</td>
                        </tr>
                        <tr>
                            <td style="width: 3%">NO</td>
                            <td style="width: 7%">MODUL</td>
                            <td style="width: 7%">POSISI MCCB</td>
                            <td style="width: 77%; background-color: #dddddd" colspan="11"></td>
                            <td style="width: 10%" colspan="3">KETERANGAN</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mainDistributionPanels as $mainDistributionPanel)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mainDistributionPanel->modul }}</td>
                            <td>{{ $mainDistributionPanel->posisi_mccb }}</td>
                            <td style="background-color: #a8a8a8" colspan="11"></td>
                            <td colspan="3">{{ $mainDistributionPanel->keterangan }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                    </tbody>
                </table>
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
    </div>




</body>

</html>
