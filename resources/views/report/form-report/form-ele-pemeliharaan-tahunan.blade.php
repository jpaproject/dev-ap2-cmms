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
            border: 1px solid #dddddd;
            text-align: left;
            padding: 7px;
            font-size:10px;
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
        .table-data {
            border: 1px solid black;
        }
        .table-data tr td {
            background-color: white;
            text-align: center;
            vertical-align: middle;
        }
        .table-header td{
            font-weight: bold;
        }
        .table-header{
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="content">
        <table style="margin-top:50px; padding:20px; border: none;">
            <tr style=" background-color: white;">
                <td style="border: none; width: 50%;">

                </td>
                <td style="border: none; width: 50%; text-align:right;">
                    <img style="width: 150px; text-align:right; display:inline;"
                        src="{{ public_path('img/AP2.png') }}" alt="">
                </td>
            </tr>
        </table>
        <h1 class="center">PT.ANGKASA PURA II</h1>
        <h1 class="center">ELECTRICAL UTILITY CHEKLIST</h1>
        <h1 class="center">PEMELIHARAAN TAHUNAN</h1>
        <div class="body">
            <div class="table">
                @foreach ( $formElePemeliharaanTahunans as $key => $item )
                    <table style="text-align:center" class="table-data">
                        <tr class="table-header">
                            <td>PENGAWAS AP II</td>
                            <td>SUBSTATION</td>
                            <td>HARI</td>
                            <td>PUKUL</td>
                            <td>TANGGAL</td>
                            <td>BULAN</td>
                            <td>TAHUN</td>
                        </tr>
                        <tr >
                            <td style="height: 50px">{{$item->pengawas}}</td>
                            <td>{{$item->substation}}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->isoFormat('dddd') }}</td>
                            <td>{{date('H:i',strtotime($item->tanggal))}}</td>
                            <td>{{date('d',strtotime($item->tanggal))}}</td>
                            <td>{{date('m',strtotime($item->tanggal))}}</td>
                            <td>{{date('Y',strtotime($item->tanggal))}}</td>
                        </tr>
                    </table>
                    <br>
                    <table style="text-align:center" class="table-data">
                        <tr>
                            <td class="table-header">SDP</td>
                            <td colspan="6">{{$item->sdp}}</td>
                        </tr>
                        <tr>
                            <td class="table-header">TEMP/&deg;c</td>
                            <td colspan="6">{{$item->temp}}</td>
                        </tr>
                        <tr class="table-header">
                            <td colspan="7">PENGUKURAN TAHANAN ISOLASI (1000V)</td>
                        </tr>
                        <tr class="table-header">
                            <td colspan="7">TAHANAN ISOLASI <span
                                            style="font-family: DejaVu Sans, sans-serif; font-size: 12px;widith:50%;">(&#x2126;)</span></td>
                        </tr>
                        <tr class="table-header">
                            <td>RS</td>
                            <td>ST</td>
                            <td>TR</td>
                            <td>RN</td>
                            <td>SN</td>
                            <td>TN</td>
                            <td>NG</td>
                        </tr>
                        <tr>
                            <td style="height: 50px">{{$item->rs}}</td>
                            <td>{{$item->st}}</td>
                            <td>{{$item->tr}}</td>
                            <td>{{$item->rn}}</td>
                            <td>{{$item->sn}}</td>
                            <td>{{$item->tn}}</td>
                            <td>{{$item->ng}}</td>
                        </tr>
                    </table>
                    <br>
                @endforeach
                <table class="table-data">
                    <tr class="table-header">
                        <td>Catatan</td>
                    </tr>
                    <tr>
                        <td style="height: 150px">{{$formElePemeliharaanTahunans[0]->catatan}}</td>
                    </tr>
                </table>
                <br>
                {{-- <table>
                    <tr class="table-hide">
                        <td class="center">Mengetahui <br> ASSISTANT MANAGER ELECTRICAL UTILITY <br> VISUAL AID</td>
                        <td class="center">Penanggung Jawab <br>ELECTRICAL UTILITY SUPERVISOR <br> VISUAL AID</td>
                    </tr>
                </table> --}}
            </div>
        </div>


        <div class="ttd-left">
            <p><span class="bold">Mengetahui</span></p>
            <p><span class="bold">ASSISTANT MANAGER ELECTRICAL UTILITY</span></p>
            <p><span class="bold">VISUAL AID</span></p>
            @if ($approve !== null)
                <img src="{{ public_path('img/users/ttd/' . ($approve->ttd ?? 'none.png')) }}" width="100px"
                    style="display: block">
            @endif
            <p><span>____________________</span></p>
        </div>
        <div class="ttd-right">
            <p><span class="bold">Penanggung Jawab</span></p>
            <p><span class="bold">ELECTRICAL UTILITY SUPERVISOR</span></p>
            <p><span class="bold">VISUAL AID</span></p>
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
