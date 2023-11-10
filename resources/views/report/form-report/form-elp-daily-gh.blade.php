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
            margin-top: 0;
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
            text-align: center;
            vertical-align: middle;
            padding: 2px;
            width: 100px;
            /* Set the desired height for table cells */
            overflow: hidden;
            /* Prevent content from overflowing */
            white-space: nowrap;
            /* Prevent line breaks */
            font-size: 10px;
            text-align: center
        }

        .catatan td,
        th {
            border: 1px solid #000000;
            text-align: center;
            vertical-align: middle;
            padding: 2px;
            width: 100px;
            /* Set the desired height for table cells */
            overflow: auto;
            /* Prevent content from overflowing */
            white-space: normal;
            /* Prevent line breaks */
            font-size: 10px;
            text-align: center
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

        .float-left {
            margin: 20px 0 0 10%;
            text-align: left;
            width: 30%;
            float: left;
            font-size: 15px;
        }

        .float-right {
            margin: 20px 0 0 0px;
            text-align: left;
            width: 70%;
            float: right;
            font-size: 15px;
        }

        .ttd-left {
            margin: 20px 0 0 20px;
            text-align: center;
            width: 40%;
            float: left;
            font-size: 15px;
        }

        .ttd-right {
            margin: 20px 0 0 20px;
            text-align: center;
            width: 40%;
            float: right;
            font-size: 15px;
        }

        .table-left {
            text-align: center;
            width: 50%;
            float: left;
            font-size: 15px;
        }

        .table-right {
            text-align: center;
            width: 50%;
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

        .g1 {
            width: 50%;
            text-align: left;
            display: inline;
        }

        .g2 {
            width: 50%;
            text-align: left;
            display: inline;
            position: absolute;
            left: 30%;
        }

        .sub-header,
        .sub-header td,
        .sub-header th {
            border: none;
            /* Menghilangkan batas sel */
        }

        table,
        th,
        td {
            border: 1px solid black;
            /* Set border to black color */
        }

        .bold {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="header">
            <div class="title">
                <h1 class="bold" style="font-size: 18px;">CHEKLIST PERALATAN HARIAN </h1>
                <h1 class="bold" style="font-size: 18px;">ELECTRICAL PROTECTION</h1>
            </div>
            {{-- <table class="sub-header">
                    <tr>
                        <td style="text-align:right; width:20%">No. Pekerjaan :</td>
                        <td style="text-align: left; width: 80%"></td>
                    </tr>
                    <tr>
                        <td style="text-align:right; width:20%">Hari :</td>
                        <td style="text-align: left; width: 80%">{{ $tanggal_hari }}</td>
                    </tr>
                    <tr>
                        <td style="text-align:right; width:20%">Tanggal : </td>
                        <td style="text-align: left; width: 80%">{{ date("d-m-Y", strtotime($work_order->date_generate)) }}</td>
                    </tr>
                </table> --}}
        </div>
        <div class="body">

            <div class="table">

                <div class="row">
                    {{-- GH 126 EXT --}}
                    <table style="table-layout: fixed;">
                        <tr>
                            <td style="text-align:center" colspan="6">GH 126 EXT</td>
                        </tr>
                        <tr>
                            <td rowspan="2">NO</td>
                            <td rowspan="2">PANEL</td>
                            <td>SIPROTEC</td>
                            <td>SIPROTEC</td>
                            <td>SIPROTEC</td>
                            <td rowspan="2">FO</td>
                        </tr>
                        <tr>
                            <td>7SD8051</td>
                            <td>7SJ8041</td>
                            <td>7RW801</td>
                        </tr>

                        @foreach ($gh126Exts as $gh126Ext)
                            <tr>
                                @php
                                    $panelGh126Ext = $gh126Ext->panel ?? '';
                                @endphp
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $panelGh126Ext }}</td>
                                <td
                                    style="{{ $gh_126_exts[$panelGh126Ext][0] == false ? 'background-color:#9ea0a3' : '' }}">
                                    {{ $gh126Ext->q1_a ?? '' }}</td>
                                <td
                                    style="{{ $gh_126_exts[$panelGh126Ext][1] == false ? 'background-color:#9ea0a3' : '' }}">
                                    {{ $gh126Ext->q2_a ?? '' }}</td>
                                <td
                                    style="{{ $gh_126_exts[$panelGh126Ext][2] == false ? 'background-color:#9ea0a3' : '' }}">
                                    {{ $gh126Ext->q3_a ?? '' }}</td>
                                <td
                                    style="{{ $gh_126_exts[$panelGh126Ext][3] == false ? 'background-color:#9ea0a3' : '' }}">
                                    {{ $gh126Ext->q4_a ?? '' }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="row">
                    <table style="table-layout: fixed; width : 100%">
                        <tr>
                            <td>GH 127</td>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    {{-- GH 127 --}}
                    <div class="table-left">
                        <table style="table-layout: fixed; width : 100%;">
                            <tr>
                                <td style="text-align:center" colspan="6">ER1</td>
                            </tr>
                            <tr>
                                <td rowspan="2">NO</td>
                                <td rowspan="2">PANEL</td>
                                <td>SIPROTEC</td>
                                <td>SIPROTEC</td>
                                <td>SIPROTEC</td>
                                <td rowspan="2">FO</td>
                            </tr>
                            <tr>
                                <td>7SD8051</td>
                                <td>7SJ8041</td>
                                <td>7RW801</td>
                            </tr>
                            @php
                                $iterationTempGh127Er2 = $gh127Er1s->count()+1;
                            @endphp
                            @foreach ($gh127Er1s as $gh127Er1)
                                <tr>
                                    {{-- ER2A --}}
                                    @php
                                        $panelGh127Er1 = $gh127Er1->panel ?? '';
                                    @endphp
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $panelGh127Er1 }}</td>
                                    <td
                                        style="{{ $gh_127_er1s[$panelGh127Er1][0] == false ? 'background-color:#9ea0a3' : '' }}">
                                        {{ $gh127Er1->q1_a ?? '' }}</td>
                                    <td
                                        style="{{ $gh_127_er1s[$panelGh127Er1][1] == false ? 'background-color:#9ea0a3' : '' }}">
                                        {{ $gh127Er1->q2_a ?? '' }}</td>
                                    <td
                                        style="{{ $gh_127_er1s[$panelGh127Er1][2] == false ? 'background-color:#9ea0a3' : '' }}">
                                        {{ $gh127Er1->q3_a ?? '' }}</td>
                                    <td
                                        style="{{ $gh_127_er1s[$panelGh127Er1][3] == false ? 'background-color:#9ea0a3' : '' }}">
                                        {{ $gh127Er1->q4_a ?? '' }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="table-right">
                        <table style="table-layout: fixed; width : 100%">
                            <tr>
                                <td style="text-align:center" colspan="6">ER2</td>
                            </tr>
                            <tr>
                                <td rowspan="2">NO</td>
                                <td rowspan="2">PANEL</td>
                                <td>SIPROTEC</td>
                                <td>SIPROTEC</td>
                                <td>SIPROTEC</td>
                                <td rowspan="2">FO</td>
                            </tr>
                            <tr>
                                <td>7SD8051</td>
                                <td>7SJ8041</td>
                                <td>7RW801</td>
                            </tr>
                            @foreach ($gh127Er2s as $gh127Er2)
                                <tr>
                                    {{-- ER2A --}}
                                    @php
                                        $panelGh127Er2 = $gh127Er2->panel ?? '';
                                    @endphp
                                    <td>{{ $iterationTempGh127Er2++ }}</td>
                                    <td>{{ $panelGh127Er2 }}</td>
                                    <td
                                        style="{{ $gh_127_er2s[$panelGh127Er2][0] == false ? 'background-color:#9ea0a3' : '' }}">
                                        {{ $gh127Er2->q1_a ?? '' }}</td>
                                    <td
                                        style="{{ $gh_127_er2s[$panelGh127Er2][1] == false ? 'background-color:#9ea0a3' : '' }}">
                                        {{ $gh127Er2->q2_a ?? '' }}</td>
                                    <td
                                        style="{{ $gh_127_er2s[$panelGh127Er2][2] == false ? 'background-color:#9ea0a3' : '' }}">
                                        {{ $gh127Er2->q3_a ?? '' }}</td>
                                    <td
                                        style="{{ $gh_127_er2s[$panelGh127Er2][3] == false ? 'background-color:#9ea0a3' : '' }}">
                                        {{ $gh127Er2->q4_a ?? '' }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div style="clear: both"></div>
                </div>

                <div class="row">
                    <table style="table-layout: fixed; width : 100%">
                        <tr>
                            <td>GH 128</td>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <div class="table-left">
                        {{-- GH 128 --}}
                        <table style="table-layout: fixed; width : 100%">
                            <tr>
                                <td style="text-align:center" colspan="6">ER1</td>
                            </tr>
                            <tr>
                                <td rowspan="2">NO</td>
                                <td rowspan="2">PANEL</td>
                                <td>SIPROTEC</td>
                                <td>SIPROTEC</td>
                                <td>SIPROTEC</td>
                                <td rowspan="2">FO</td>
                            </tr>
                            <tr>
                                <td>7SD8051</td>
                                <td>7SJ8041</td>
                                <td>7RW801</td>
                            </tr>
                            @foreach ($gh128Er1s as $gh128Er1)
                                <tr>
                                    {{-- ER2A --}}
                                    @php
                                        $panelGh128Er1 = $gh128Er1->panel ?? '';
                                    @endphp
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $panelGh128Er1 }}</td>
                                    <td
                                        style="{{ $gh_128_er1s[$panelGh128Er1][0] == false ? 'background-color:#9ea0a3' : '' }}">
                                        {{ $gh128Er1->q1_a ?? '' }}</td>
                                    <td
                                        style="{{ $gh_128_er1s[$panelGh128Er1][1] == false ? 'background-color:#9ea0a3' : '' }}">
                                        {{ $gh128Er1->q2_a ?? '' }}</td>
                                    <td
                                        style="{{ $gh_128_er1s[$panelGh128Er1][2] == false ? 'background-color:#9ea0a3' : '' }}">
                                        {{ $gh128Er1->q3_a ?? '' }}</td>
                                    <td
                                        style="{{ $gh_128_er1s[$panelGh128Er1][3] == false ? 'background-color:#9ea0a3' : '' }}">
                                        {{ $gh128Er1->q4_a ?? '' }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="table-right">
                        <table style="table-layout: fixed; width : 100%">
                            <tr>
                                <td style="text-align:center" colspan="6">ER2</td>
                            </tr>
                            <tr>
                                <td rowspan="2">NO</td>
                                <td rowspan="2">PANEL</td>
                                <td>SIPROTEC</td>
                                <td>SIPROTEC</td>
                                <td>SIPROTEC</td>
                                <td rowspan="2">FO</td>
                            </tr>
                            <tr>
                                <td>7SD8051</td>
                                <td>7SJ8041</td>
                                <td>7RW801</td>
                            </tr>
                            @foreach ($gh128Er2s as $gh128Er2)
                                <tr>
                                    {{-- ER2A --}}
                                    @php
                                        $panelGh128Er2 = $gh128Er2->panel ?? '';
                                    @endphp
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $panelGh128Er2 }}</td>
                                    <td
                                        style="{{ $gh_128_er2s[$panelGh128Er2][0] == false ? 'background-color:#9ea0a3' : '' }}">
                                        {{ $gh128Er2->q1_a ?? '' }}</td>
                                    <td
                                        style="{{ $gh_128_er2s[$panelGh128Er2][1] == false ? 'background-color:#9ea0a3' : '' }}">
                                        {{ $gh128Er2->q2_a ?? '' }}</td>
                                    <td
                                        style="{{ $gh_128_er2s[$panelGh128Er2][2] == false ? 'background-color:#9ea0a3' : '' }}">
                                        {{ $gh128Er2->q3_a ?? '' }}</td>
                                    <td
                                        style="{{ $gh_128_er2s[$panelGh128Er2][3] == false ? 'background-color:#9ea0a3' : '' }}">
                                        {{ $gh128Er2->q4_a ?? '' }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div style="clear: both"></div>
                    <table class="catatan" style="width: 100%">
                        <tr>
                            <td height="10"></td>
                        </tr>
                        <tr>
                            <td style="table-layout: fixed; text-align:left; vertical-align:auto ; padding:10px;" height="100">{!! nl2br($gh126Exts[0]->catatan) !!}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="ttd-left">
            <p><span class="bold">Mengetahui,</span></p>
            <p><span class="bold">Pengawas PTO</span></p>
            @if ($approve !== null)
                <img src="{{ public_path('img/users/ttd/' . ($approve->ttd ?? 'none.png')) }}" width="100px"
                    style="display: block">
            @endif
            <p><span>____________________</span></p>
        </div>
        <div class="ttd-right">
            <p><span class="bold">Tanggerang</span></p>
            <p><span class="bold">Petugas Pencatat</span></p>
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
