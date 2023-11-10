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

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
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
    {{-- form-ps2-panel-lv-harian-backup.blade.php --}}
    <div class="content">
        <div class="header">
            <div class="title">
                <table style="padding:20px 20px 0px 20px;" class="title-table">
                    <tr style="background-color: white;">
                        <td style=" width: 20%; text-align:center;">
                            <img style="margin:10px;width: 150px; text-align:left; display:inline;"
                                src="{{ public_path('img/AP2.png') }}" alt="">
                        </td>
                        <td style=" width: 60%; text-align:center; font-size: 24px">
                            FORM CHECKLIST HARIAN PANEL LV MPS 2
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        {{-- <div class="header">
            <div class="title">
                <img style="width: 120px; text-align:left; display:inline; margin-right:40px"
                    src="{{ public_path('img/AP2.png') }}" alt="">
                <h1 style="font-size: 18px; display:inline; margin-right:150px; ">FORM CHECKLIST HARIAN PANEL LV MPS 2
                </h1>
            </div>
        </div> --}}
        <div class="body">
            <div class="table">
                <table class="my-table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>CUBICLE</th>
                            <th>PERALATAN</th>
                            <th>MEREK</th>
                            <th>TIPE</th>
                            <th>POSISI BREAKER</th>
                            <th>KETERANGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($incoming1s as $incoming1)
                            <tr>
                                @if ($loop->first)
                                    <td rowspan="{{ $loop->count }}">{{ $loop->iteration }}</td>
                                    <td rowspan="{{ $loop->count }}">{{ $incoming1->cubicle }}</td>
                                @endif
                                <td>{{ $incoming1->peralatan }}</td>
                                <td>{{ $incoming1->merek }}</td>
                                <td>{{ $incoming1->tipe }}</td>
                                <td>{{ $incoming1->posisi_breaker }}</td>
                                <td>{{ $incoming1->keterangan }}</td>
                            </tr>
                        @endforeach
                        @foreach ($rak1s as $rak1)
                            <tr>
                                @if ($loop->first)
                                    <td rowspan="{{ $loop->count }}">{{ $loop->iteration }}</td>
                                    <td rowspan="{{ $loop->count }}">{{ $rak1->cubicle }}</td>
                                @endif
                                <td>{{ $rak1->peralatan }}</td>
                                <td>{{ $rak1->merek }}</td>
                                <td>{{ $rak1->tipe }}</td>
                                <td>{{ $rak1->posisi_breaker }}</td>
                                <td>{{ $rak1->keterangan }}</td>
                            </tr>
                        @endforeach
                        @foreach ($rak2s as $rak2)
                            <tr>
                                @if ($loop->first)
                                    <td rowspan="{{ $loop->count }}">{{ $loop->iteration }}</td>
                                    <td rowspan="{{ $loop->count }}">{{ $rak2->cubicle }}</td>
                                @endif
                                <td>{{ $rak2->peralatan }}</td>
                                <td>{{ $rak2->merek }}</td>
                                <td>{{ $rak2->tipe }}</td>
                                <td>{{ $rak2->posisi_breaker }}</td>
                                <td>{{ $rak2->keterangan }}</td>
                            </tr>
                        @endforeach
                        @foreach ($couplers as $coupler)
                            <tr>
                                @if ($loop->first)
                                    <td rowspan="{{ $loop->count }}">{{ $loop->iteration }}</td>
                                    <td rowspan="{{ $loop->count }}">{{ $coupler->cubicle }}</td>
                                @endif
                                <td>{{ $coupler->peralatan }}</td>
                                <td>{{ $coupler->merek }}</td>
                                <td>{{ $coupler->tipe }}</td>
                                <td>{{ $coupler->posisi_breaker }}</td>
                                <td>{{ $coupler->keterangan }}</td>
                            </tr>
                        @endforeach
                        @foreach ($incoming2s as $incoming2)
                            <tr>
                                @if ($loop->first)
                                    <td rowspan="{{ $loop->count }}">{{ $loop->iteration }}</td>
                                    <td rowspan="{{ $loop->count }}">{{ $incoming2->cubicle }}</td>
                                @endif
                                <td>{{ $incoming2->peralatan }}</td>
                                <td>{{ $incoming2->merek }}</td>
                                <td>{{ $incoming2->tipe }}</td>
                                <td>{{ $incoming2->posisi_breaker }}</td>
                                <td>{{ $incoming2->keterangan }}</td>
                            </tr>
                        @endforeach
                        @foreach ($rak3s as $rak3)
                            <tr>
                                @if ($loop->first)
                                    <td rowspan="{{ $loop->count }}">{{ $loop->iteration }}</td>
                                    <td rowspan="{{ $loop->count }}">{{ $rak3->cubicle }}</td>
                                @endif
                                <td>{{ $rak3->peralatan }}</td>
                                <td>{{ $rak3->merek }}</td>
                                <td>{{ $rak3->tipe }}</td>
                                <td>{{ $rak3->posisi_breaker }}</td>
                                <td>{{ $rak3->keterangan }}</td>
                            </tr>
                        @endforeach
                        @foreach ($rak4s as $rak4)
                            <tr>
                                @if ($loop->first)
                                    <td rowspan="{{ $loop->count }}">{{ $loop->iteration }}</td>
                                    <td rowspan="{{ $loop->count }}">{{ $rak4->cubicle }}</td>
                                @endif
                                <td>{{ $rak4->peralatan }}</td>
                                <td>{{ $rak4->merek }}</td>
                                <td>{{ $rak4->tipe }}</td>
                                <td>{{ $rak4->posisi_breaker }}</td>
                                <td>{{ $rak4->keterangan }}</td>
                            </tr>
                        @endforeach
                        @foreach ($panelOutGoingAoccs as $panelOutGoingAocc)
                            <tr>
                                @if ($loop->first)
                                    <td rowspan="{{ $loop->count }}">{{ $loop->iteration }}</td>
                                    <td rowspan="{{ $loop->count }}">{{ $panelOutGoingAocc->cubicle }}</td>
                                @endif
                                <td>{{ $panelOutGoingAocc->peralatan }}</td>
                                <td>{{ $panelOutGoingAocc->merek }}</td>
                                <td>{{ $panelOutGoingAocc->tipe }}</td>
                                <td>{{ $panelOutGoingAocc->posisi_breaker }}</td>
                                <td>{{ $panelOutGoingAocc->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="catatan" width="100">
                <p style="font-size:10px">CATATAN :</p>
                {!! nl2br($incoming1s[0]->catatan) !!}
            </div>
            {{-- <div class="ttd-left">
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
            <div style="clear: both"></div> --}}
        </div>
    </div>
</body>

</html>
