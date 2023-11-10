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

        .ttd-left {
            margin: 20px 0 0 50px;
            text-align: center;
            width: 20%;
            float: left;
            font-size: 12px;
        }

        .ttd-right {
            margin: 20px 50px 0 0;
            text-align: center;
            width: 20%;
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

        /* Custom Sizing & Position CSS */
        .w-5 {
            width: 5%;
        }

        .w-10 {
            width: 10%;
        }

        .w-15 {
            width: 15%;
        }

        .w-20 {
            width: 20%;
        }

        .w-25 {
            width: 25%;
        }

        .w-30 {
            width: 30%;
        }

        .w-35 {
            width: 35%;
        }

        .h-5 {
            height: 5%;
        }

        .h-10 {
            height: 10%;
        }

        .h-15 {
            height: 15%;
        }

        .h-20 {
            height: 20%;
        }

        .h-25 {
            height: 25%;
        }

        .h-30 {
            height: 30%;
        }

        .h-35 {
            height: 35%;
        }

        tr.center td {
            text-align: center;
        }

        tr.center td.left {
            text-align: left;
        }

        .p-0 {
            padding: 0px;
        }
    </style>
</head>

<body>
    {{-- Checklist Genset Harian (Control Room & Genset Room) --}}
    <div class="content">
        <div class="header">
            <div class="title">
                <img style="width: 120px; text-align:right; margin-right: 220px; display:inline;"
                    src="{{ public_path('img/AP2.png') }}" alt="">
                <h1 style="font-size: 18px;display:inline; margin-right: 280px;">TASKS REPORT
                </h1>
            </div>
        </div>
        <div class="body">
            <div class="table">
                <table class="my-table">
                    <tbody>
                        <tr class="row-white center">
                            <td rowspan="2" style="width: 5%">NO</td>
                            <td rowspan="2" style="width: 60%"">NAMA TASK</td>
                            <td rowspan="2" style="width: 10%">ESTIMASI WAKTU (MENIT)</td>
                            <td colspan="2" style="width: 25%">DIKERJAKAN</td>
                        </tr>
                        <tr class="center">
                            <td>YA</td>
                            <td>TIDAK</td>
                        </tr>
                        @foreach ($work_order->reportTaskWorkOrders as $task)
                            <tr class="center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $task->task_name }}</td>
                                <td>{{ $task->time_estimate }}</td>
                                <td><span
                                        style="font-family: DejaVu Sans, sans-serif; font-size: 20px;">{{ $task->status == true ? '✔' : '' }}</span>
                                </td>
                                <td><span
                                        style="font-family: DejaVu Sans, sans-serif; font-size: 20px;">{{ $task->status == false ? '✔' : '' }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
