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
            padding: 10px;
            font-size: 12px;
            /* Set the desired height for table cells */
            overflow: hidden;
            /* Prevent content from overflowing */
            white-space: nowrap;
            /* Prevent line breaks */
        }

        tr:first-child{
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

        .title-table tr td {
            border: 1px solid black;
            text-align: center;
            vertical-align: middle;
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
                            <img style="margin:10px; width: 150px; text-align:left; display:inline;"
                                src="{{ public_path('img/AP2.png') }}" alt="">
                        </td>
                        <td style=" width: 60%; text-align:center;">
                            FORM CHECKLIST HARIAN PANEL PS 2
                        </td>
                    </tr>
                </table>
                {{-- <img style="width: 120px; text-align:left; display:inline; margin-right:80px"
                    src="{{ public_path('img/AP2.png') ?? '' }}" alt="">
                <h1 style="font-size: 18px; display:inline; margin-right:200px; ">FORM CHECKLIST HARIAN PANEL PS 2
                </h1> --}}
            </div>
        </div>
        @php
            $number1 = 1;
            $number2 = 1;
            $number3 = 1;
            $number4 = 1;
            $number5 = 1;
        @endphp
        <div class="body">
            <div class="table">
                <table class="my-table">
                    <tr class="row-title">
                        <th style="">NO</th>
                        <th>CUBICLE</th>
                        <th>LOCAL</th>
                        <th>REMOTE</th>
                        <th>POSISI DS</th>
                        <th>POSISI CB</th>
                        <th>CB SPRING</th>
                        <th>TEGANGAN (KV)</th>
                        <th>ARUS (A)</th>
                        <th>COS PHI</th>
                        <th>FREKUENSI</th>
                        <th>DAYA (KW)</th>
                        <th>KETERANGAN</th>
                    </tr>
                    <tr>
                        <td class="row-white" style="font-size: 15px;" colspan="13">EXT GH 126</td>
                    </tr>
                    @foreach ($formPs1PanelHarianEXT as $ext)
                        <tr class="row-white">
                            <td>{{ $number1++ }}</td>
                            <td>{{ $ext->cubicle ?? '' }}</td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $ext->local ? '✔' : '' }}</span>
                            </td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $ext->remote ? '✔' : '' }}</span>
                            </td>
                            <td>{{ $ext->posisi_ds ?? '' }}</td>
                            <td>{{ $ext->posisi_cb ?? '' }}</td>
                            <td>{{ $ext->cb_spring ?? '' }}</td>
                            <td>{{ $ext->tegangan ?? '' }}</td>
                            <td>{{ $ext->arus ?? '' }}</td>
                            <td>{{ $ext->cos_phi ?? '' }}</td>
                            <td>{{ $ext->frekuensi ?? '' }}</td>
                            <td>{{ $ext->daya ?? '' }}</td>
                            <td>{{ $ext->keterangan ?? '' }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="row-white" style="font-size: 15px;" colspan="13">ER 2A</td>
                    </tr>
                    @foreach ($formPs1PanelHarianER2A as $er2a)
                        <tr class="row-white">
                            <td>{{ $number2++ ?? '' }}</td>
                            <td>{{ $er2a->cubicle ?? '' }}</td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $er2a->local == true ? '✔' : '' }}</span>
                            </td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $er2a->remote == true ? '✔' : '' }}</span>
                            </td>
                            <td>{{ $er2a->posisi_ds ?? '' }}</td>
                            <td>{{ $er2a->posisi_cb ?? '' }}</td>
                            <td>{{ $er2a->cb_spring ?? '' }}</td>
                            <td>{{ $er2a->tegangan ?? '' }}</td>
                            <td>{{ $er2a->arus ?? '' }}</td>
                            <td>{{ $er2a->cos_phi ?? '' }}</td>
                            <td>{{ $er2a->frekuensi ?? '' }}</td>
                            <td>{{ $er2a->daya ?? '' }}</td>
                            <td>{{ $er2a->keterangan ?? '' }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    {{-- <div class="content page-break">
        <div class="body">
            <div class="table">
                <table class="my-table">
                    <tr class="row-title">
                        <th>NO</th>
                        <th>CUBICLE</th>
                        <th>LOCAL</th>
                        <th>REMOTE</th>
                        <th>POSISI DS</th>
                        <th>POSISI CB</th>
                        <th>CB SPRING</th>
                        <th>TEGANGAN (KV)</th>
                        <th>ARUS (A)</th>
                        <th>COS PHI</th>
                        <th>FREKUENSI</th>
                        <th>DAYA (KW)</th>
                        <th>KETERANGAN</th>
                    </tr>
                    <tr>
                        <td class="row-white" style="font-size: 15px;" colspan="13">ER 2B</td>
                    </tr>
                    @for ($i = 16; $i < 32; $i++)
                        <tr class="row-white">
                            <td>{{ $number2++ ?? '' }}</td>
                            <td>{{ $formPs1PanelHarians[$i]->cubicle ?? '' }}</td>
                            <td><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formPs1PanelHarians[$i]->local == true ? '✔' : '' }}</span></td>
                            <td><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formPs1PanelHarians[$i]->remote == true ? '✔' : '' }}</span></td>
                            <td>{{ $formPs1PanelHarians[$i]->posisi_ds ?? '' }}</td>
                            <td>{{ $formPs1PanelHarians[$i]->posisi_cb ?? '' }}</td>
                            <td>{{ $formPs1PanelHarians[$i]->cb_spring ?? '' }}</td>
                            <td>{{ $formPs1PanelHarians[$i]->tegangan ?? '' }}</td>
                            <td>{{ $formPs1PanelHarians[$i]->arus ?? '' }}</td>
                            <td>{{ $formPs1PanelHarians[$i]->cos_phi ?? '' }}</td>
                            <td>{{ $formPs1PanelHarians[$i]->frekuensi ?? '' }}</td>
                            <td>{{ $formPs1PanelHarians[$i]->daya ?? '' }}</td>
                            <td>{{ $formPs1PanelHarians[$i]->keterangan ?? '' }}</td>
                        </tr>
                    @endfor
                </table>
            </div>
        </div>
    </div> --}}

    <div class="content">
        <div class="body">
            <div class="table">
                <table class="my-table">
                    <tr class="row-title">
                        <th>NO</th>
                        <th>CUBICLE</th>
                        <th>LOCAL</th>
                        <th>REMOTE</th>
                        <th>POSISI DS</th>
                        <th>POSISI CB</th>
                        <th>CB SPRING</th>
                        <th>TEGANGAN (KV)</th>
                        <th>ARUS (A)</th>
                        <th>COS PHI</th>
                        <th>FREKUENSI</th>
                        <th>DAYA (KW)</th>
                        <th>KETERANGAN</th>
                    </tr>
                    <tr>
                        <td class="row-white" style="font-size: 15px;" colspan="13">ER 2B</td>
                    </tr>
                    @foreach ($formPs1PanelHarianER2B as $er2b)
                        <tr class="row-white">
                            <td>{{ $number3++ ?? '' }}</td>
                            <td>{{ $er2b->cubicle ?? '' }}</td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ ($er2b->local ?? false) == true ? '✔' : '' }}</span>
                            </td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ ($er2b->remote ?? false) == true ? '✔' : '' }}</span>
                            </td>
                            <td>{{ $er2b->posisi_ds ?? '' }}</td>
                            <td>{{ $er2b->posisi_cb ?? '' }}</td>
                            <td>{{ $er2b->cb_spring ?? '' }}</td>
                            <td>{{ $er2b->tegangan ?? '' }}</td>
                            <td>{{ $er2b->arus ?? '' }}</td>
                            <td>{{ $er2b->cos_phi ?? '' }}</td>
                            <td>{{ $er2b->frekuensi ?? '' }}</td>
                            <td>{{ $er2b->daya ?? '' }}</td>
                            <td>{{ $er2b->keterangan ?? '' }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="row-white" style="font-size: 15px;" colspan="13">ER 1B</td>
                    </tr>
                    @foreach ($formPs1PanelHarianER1B as $er1b)
                        <tr class="row-white">
                            <td>{{ $number4++ ?? '' }}</td>
                            <td>{{ $er1b->cubicle ?? '' }}</td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ ($er1b->local ?? false) == true ? '✔' : '' }}</span>
                            </td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ ($er1b->remote ?? false) == true ? '✔' : '' }}</span>
                            </td>
                            <td>{{ $er1b->posisi_ds ?? '' }}</td>
                            <td>{{ $er1b->posisi_cb ?? '' }}</td>
                            <td>{{ $er1b->cb_spring ?? '' }}</td>
                            <td>{{ $er1b->tegangan ?? '' }}</td>
                            <td>{{ $er1b->arus ?? '' }}</td>
                            <td>{{ $er1b->cos_phi ?? '' }}</td>
                            <td>{{ $er1b->frekuensi ?? '' }}</td>
                            <td>{{ $er1b->daya ?? '' }}</td>
                            <td>{{ $er1b->keterangan ?? '' }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="row-white" style="font-size: 15px;" colspan="13">PANEL MV GENSET</td>
                    </tr>
                    @foreach ($formPs1PanelHarianPanel as $panel)
                        <tr class="row-white">
                            <td>{{ $number5++ ?? '' }}</td>
                            <td>{{ $panel->cubicle ?? '' }}</td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ ($panel->local ?? false) == true ? '✔' : '' }}</span>
                            </td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ ($panel->remote ?? false) == true ? '✔' : '' }}</span>
                            </td>
                            <td>{{ $panel->posisi_ds ?? '' }}</td>
                            <td>{{ $panel->posisi_cb ?? '' }}</td>
                            <td>{{ $panel->cb_spring ?? '' }}</td>
                            <td>{{ $panel->tegangan ?? '' }}</td>
                            <td>{{ $panel->arus ?? '' }}</td>
                            <td>{{ $panel->cos_phi ?? '' }}</td>
                            <td>{{ $panel->frekuensi ?? '' }}</td>
                            <td>{{ $panel->daya ?? '' }}</td>
                            <td>{{ $panel->keterangan ?? '' }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
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

    {{-- <div class="content">
        <div class="body">
            <div class="table">
                <table class="my-table">
                    <tr class="row-title">
                        <th>NO</th>
                        <th>CUBICLE</th>
                        <th>LOCAL</th>
                        <th>REMOTE</th>
                        <th>POSISI DS</th>
                        <th>POSISI CB</th>
                        <th>CB SPRING</th>
                        <th>TEGANGAN (KV)</th>
                        <th>ARUS (A)</th>
                        <th>COS PHI</th>
                        <th>FREKUENSI</th>
                        <th>DAYA (KW)</th>
                        <th>KETERANGAN</th>
                    </tr>
                    <tr>
                        <td class="row-white" style="font-size: 15px;" colspan="13">PANEL MV GENSET</td>
                    </tr>
                    @for ($i = 48; $i < 56; $i++)
                        <tr class="row-white">
                            <td>{{ $number5++ ?? '' }}</td>
                            <td>{{ $formPs1PanelHarians[$i]->cubicle ?? '' }}</td>
                            <td><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formPs1PanelHarians[$i]->local == true ? '✔' : '' }}</span></td>
                            <td><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formPs1PanelHarians[$i]->remote == true ? '✔' : '' }}</span></td>
                            <td>{{ $formPs1PanelHarians[$i]->posisi_ds ?? '' }}</td>
                            <td>{{ $formPs1PanelHarians[$i]->posisi_cb ?? '' }}</td>
                            <td>{{ $formPs1PanelHarians[$i]->cb_spring ?? '' }}</td>
                            <td>{{ $formPs1PanelHarians[$i]->tegangan ?? '' }}</td>
                            <td>{{ $formPs1PanelHarians[$i]->arus ?? '' }}</td>
                            <td>{{ $formPs1PanelHarians[$i]->cos_phi ?? '' }}</td>
                            <td>{{ $formPs1PanelHarians[$i]->frekuensi ?? '' }}</td>
                            <td>{{ $formPs1PanelHarians[$i]->daya ?? '' }}</td>
                            <td>{{ $formPs1PanelHarians[$i]->keterangan ?? '' }}</td>
                        </tr>
                    @endfor
                    <tr>
                        <td class="row-white" colspan="13"
                            style="text-align:left;vertical-align: start;height: 50px;">Catatan :</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="ttd-left">
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
            <img src="{{ public_path('img/user-technicals/paraf/' . ($user_technicals->paraf ?? 'none.png')) }}" width="100px" style="display: block">
            <p><span>____________________</span></p>
        </div>
        <div style="clear: both"></div>
    </div> --}}
</body>

</html>
