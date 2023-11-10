
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
        }

        .no {
            border-top: none;
            border-bottom: none;
            border-right: 1px solid black;
            border-left: 1px solid black;
            text-align: center;

        }

        .header-table th {
            font-weight: bold;
            border: 1px solid black;
        }

        .title-table tr td {
            border: 1px solid black;
        }

        table tr td {
            border: none;
        }

        .border {
            border: 1px solid black;
            text-align: center;
        }

        .hide {
            border-top: none;
            border-bottom: none;
        }

        .br {
            border: 1px solid black;
            border-radius: 20px;
            margin: 20px;

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
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="body">
            <div class="table">
                <table>
                    <tr class="header-table">
                        <th rowspan="2" style="width: 30%"><img style="width: 150px; text-align:right; display:inline;"
                                src="{{ public_path('img/AP2.png') }}" alt=""></th>
                        <th  class="center">
                            <h1>Laporan Kegiatan</h1>
                        </th>
                        <th class="center" style="width: 20%"><img
                                style="width: 150px; text-align:center; display:inline;"
                                ><h1>BANDARA INTERNASIONAL <br> SOEKARNO HATTA </h1> </th>
                    <tr class="header-table">
                        <th style="background-color: white;" class="center">
                            DINAS UPS & CONVERTER
                        </th >
                        <th style="background-color: white;" class="center">
                        Hari/Tgl  :  {{ $tanggal_hari }}, {{ $tanggalWo }} (PS)
                        </th>
                    </tr>
                </table>
                @foreach($workOrders as $key => $workOrder)
                <table class="my-table" style="table-layout:fixed">
                    <tr >
                        <td class="center" style="width: 5%">NO</td>
                        <td style="width: 15%" class="center">NAMA PERALATAN</td>
                        <td  colspan="2" class="center">{{ $workOrder->asset->name ?? '' }}</td>
                        <td class="center" colspan="4">DOKUMENTASI</td>
                    </tr>
                    <tr style="background-color: white;" class="center">
                <td rowspan="4" class="center">{{ $loop->iteration }}</td>
                        <td class="center">LOKASI</td>
                        <td colspan="2" class="center">{{ $workOrder->asset->location->name ?? '' }}</td>
                        <td class="center" style="width: 17%" rowspan="4"><img style="width: 100px;height:150px; text-align:right; display:inline;"
                                src="{{ public_path('img/work-orders/'.($workOrder->images[0]->name ?? 'noimage.jpg'))  }}" alt=""></td>
                        <td class="center" style="width: 17%" rowspan="4"><img style="width: 100px;height:150px; text-align:right; display:inline;"
                                src="{{ public_path('img/work-orders/'.($workOrder->images[1]->name ?? 'noimage.jpg'))  }}" alt=""></td>
                        <td class="center" style="width: 17%" rowspan="4"><img style="width: 100px;height:150px; text-align:right; display:inline;"
                                src="{{ public_path('img/work-orders/'.($workOrder->images[2]->name ?? 'noimage.jpg'))  }}" alt=""></td>
                        <td class="center" style="width: 17%" rowspan="4"><img style="width: 100px;height:150px; text-align:right; display:inline;"
                                src="{{ public_path('img/work-orders/'.($workOrder->images[3]->name ?? 'noimage.jpg'))  }}" alt=""></td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="center">JAM</td>
                        <td class="center">MULAI</td>
                        <td class="center">SELESAI</td>
                    </tr>
                    <tr class="center" style="background-color: white;" class="center">
                        <td class="center">{{ $workOrder->created_at->format('H:i') }}</td>
                        <td class="center">{{ $workOrder->updated_at->format('H:i') }}</td>
                    </tr>
                    <tr class="center">
                        <td colspan="3" class="center">{{ $workOrder->name ?? '' }}</td>
                    </tr>
                </table>
             @endforeach
            </div>
        </div>
        <div style="clear: both"></div>
    </div>






</body>

</html>
