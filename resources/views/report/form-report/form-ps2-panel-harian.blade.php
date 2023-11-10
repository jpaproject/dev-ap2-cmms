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
            padding: 5px;
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="content page-break">
        <div class="header">
            <div class="title">
                <img style="width: 120px; text-align:left; display:inline; margin-right:80px"
                    src="{{ public_path('img/AP2.png') ?? '' }}" alt="">
                <h1 style="font-size: 18px; display:inline; margin-right:200px; ">FORM CHECKLIST HARIAN PANEL PS 2
                </h1>
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
                        <td class="row-white" style="font-size: 15px;" colspan="13">ER 2A</td>
                    </tr>
                    @for ($i = 0; $i < 16; $i++)
                        <tr class="row-white">
                            <td>{{ $number1++ }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->cubicle ?? '' }}</td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formPs2PanelHarians[$i]->local ? '✔' : '' }}</span>
                            </td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formPs2PanelHarians[$i]->remote ? '✔' : '' }}</span>
                            </td>
                            <td>{{ $formPs2PanelHarians[$i]->posisi_ds ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->posisi_cb ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->cb_spring ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->tegangan ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->arus ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->cos_phi ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->frekuensi ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->daya ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->keterangan ?? '' }}</td>
                        </tr>
                    @endfor
                    <tr>
                        <td class="row-white" style="font-size: 15px;" colspan="13">ER 2B</td>
                    </tr>
                    @for ($i = 16; $i < 32; $i++)
                        <tr class="row-white">
                            <td>{{ $number2++ ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->cubicle ?? '' }}</td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formPs2PanelHarians[$i]->local == true ? '✔' : '' }}</span>
                            </td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formPs2PanelHarians[$i]->remote == true ? '✔' : '' }}</span>
                            </td>
                            <td>{{ $formPs2PanelHarians[$i]->posisi_ds ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->posisi_cb ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->cb_spring ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->tegangan ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->arus ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->cos_phi ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->frekuensi ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->daya ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->keterangan ?? '' }}</td>
                        </tr>
                    @endfor
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
                            <td>{{ $formPs2PanelHarians[$i]->cubicle ?? '' }}</td>
                            <td><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formPs2PanelHarians[$i]->local == true ? '✔' : '' }}</span></td>
                            <td><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formPs2PanelHarians[$i]->remote == true ? '✔' : '' }}</span></td>
                            <td>{{ $formPs2PanelHarians[$i]->posisi_ds ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->posisi_cb ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->cb_spring ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->tegangan ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->arus ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->cos_phi ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->frekuensi ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->daya ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->keterangan ?? '' }}</td>
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
                        <td class="row-white" style="font-size: 15px;" colspan="13">ER 1A</td>
                    </tr>
                    @for ($i = 33; $i < 40; $i++)
                        <tr class="row-white">
                            <td>{{ $number3++ ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->cubicle ?? '' }}</td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ ($formPs2PanelHarians[$i]->local ?? false) == true ? '✔' : '' }}</span>
                            </td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ ($formPs2PanelHarians[$i]->remote ?? false) == true ? '✔' : '' }}</span>
                            </td>
                            <td>{{ $formPs2PanelHarians[$i]->posisi_ds ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->posisi_cb ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->cb_spring ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->tegangan ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->arus ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->cos_phi ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->frekuensi ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->daya ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->keterangan ?? '' }}</td>
                        </tr>
                    @endfor
                    <tr>
                        <td class="row-white" style="font-size: 15px;" colspan="13">ER 1B</td>
                    </tr>
                    @for ($i = 41; $i < 48; $i++)
                        <tr class="row-white">
                            <td>{{ $number4++ ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->cubicle ?? '' }}</td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ ($formPs2PanelHarians[$i]->local ?? false) == true ? '✔' : '' }}</span>
                            </td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ ($formPs2PanelHarians[$i]->remote ?? false) == true ? '✔' : '' }}</span>
                            </td>
                            <td>{{ $formPs2PanelHarians[$i]->posisi_ds ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->posisi_cb ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->cb_spring ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->tegangan ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->arus ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->cos_phi ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->frekuensi ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->daya ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->keterangan ?? '' }}</td>
                        </tr>
                    @endfor
                    <tr>
                        <td class="row-white" style="font-size: 15px;" colspan="13">PANEL MV GENSET</td>
                    </tr>
                    @for ($i = 48; $i < 56; $i++)
                        <tr class="row-white">
                            <td>{{ $number5++ ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->cubicle ?? '' }}</td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ ($formPs2PanelHarians[$i]->local ?? false) == true ? '✔' : '' }}</span>
                            </td>
                            <td><span
                                    style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ ($formPs2PanelHarians[$i]->remote ?? false) == true ? '✔' : '' }}</span>
                            </td>
                            <td>{{ $formPs2PanelHarians[$i]->posisi_ds ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->posisi_cb ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->cb_spring ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->tegangan ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->arus ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->cos_phi ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->frekuensi ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->daya ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->keterangan ?? '' }}</td>
                        </tr>
                    @endfor
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
                            <td>{{ $formPs2PanelHarians[$i]->cubicle ?? '' }}</td>
                            <td><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formPs2PanelHarians[$i]->local == true ? '✔' : '' }}</span></td>
                            <td><span
                                style="font-family: DejaVu Sans, sans-serif; font-size: 20px">{{ $formPs2PanelHarians[$i]->remote == true ? '✔' : '' }}</span></td>
                            <td>{{ $formPs2PanelHarians[$i]->posisi_ds ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->posisi_cb ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->cb_spring ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->tegangan ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->arus ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->cos_phi ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->frekuensi ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->daya ?? '' }}</td>
                            <td>{{ $formPs2PanelHarians[$i]->keterangan ?? '' }}</td>
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
