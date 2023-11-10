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
            padding-right: 20px;
            padding-left: 20px;

        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            vertical-align: middle;
            padding: 0;
            width: 60px;
            /* Set the desired height for table cells */
            overflow: hidden;
            /* Prevent content from overflowing */
            white-space: nowrap;
            /* Prevent line breaks */
            font-size: 8px;
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
        .vertical-text {
    writing-mode: vertical-rl; /* Menulis dari atas ke bawah (vertikal) dari kanan ke kiri */
    transform: rotate(-90deg); /* Memutar teks sejauh 180 derajat (agar berhadapan dengan tabel) */
    white-space: nowrap; /* Mencegah teks memotong dan tetap dalam satu baris */
}
    </style>
</head>

<body>
    <div class="body">
        <table class="sub-header table">
            <tr>
                <td style="font-size:16px; text-align:left; width:20%; font-weight: bold ">
                    <h1>ANGKASA PURA SOLUSI [APS - Teknik] </h1><br>
                    <h1>UPS & CONVERTER </h1>
                </td>
                <td style="text-align: left; width: 60%"></td>
                <td>
                    <table class="my-table">
                        <tr style="background-color: cyan">
                            <td colspan="2">Hari/Tgl : {{ $tanggal_hari }}, {{ $tanggalWo }}</td>

                        </tr>
                        <tr style="background-color: orange">
                            <td>Shift</td>
                            <td>Pagi Siang</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align:left; font-family: DejaVu Sans, sans-serif;">
                    DATA PENGUKURAN PERALATAN UPS & RECTIFIER / Menggunakan alat ukur ( √ ) / Data dari monitor display
                    unit ( √ )
                </td>
            </tr>
        </table>
    </div>
    @php
        $count = count($formUpsPengukuranPeralatanEnamBulanans);
    @endphp

    <div class="body">
        <div class="table"></div>
        <table class="my-table table">
            <tr>
                <td colspan="2" rowspan="3" style="background-color: rgb(154, 117, 117); width:15%">Pengukuran</td>
                <td colspan="10" style="background-color: rgb(213, 196, 62); width:50%">Lokasi / Peralatan UPS &
                    Rectifier</td>
                <td rowspan="3" style="background-color:  rgb(154, 117, 117); width:5%">Satuan</td>
            </tr>
            @php
                $prevGardu = null;
            @endphp

                
                    <tr style="width: 50px">
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        {{-- @if ($prevGardu !==$formUpsPengukuranPeralatanEnamBulanan->nama_gardu) --}}
                            <td style="width: 50px">
                            {{ $formUpsPengukuranPeralatanEnamBulanan->nama_gardu }}</td>
                        {{-- @endif --}}
                        
            
                        {{-- @php
                        $prevGardu = $formUpsPengukuranPeralatanEnamBulanan->nama_gardu;
                        @endphp --}}
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                    </tr>
                    <tr style="width: 50px">
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td style="width: 50px">
                            {{ $formUpsPengukuranPeralatanEnamBulanan->merk_ups }}</td>
                            
                        @endforeach   
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 -$count; $i++)
                                <td style="width: 50px">
                                    
                            </td>
                            @endfor
                        @endif
                    </tr>
                    <tr style="background-color: rgb(213, 196, 62);"">
                        <td colspan="2" >
                            kapasitas input
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->shift }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>
                        </td>  
                    </tr>
                    {{-- tegangan input --}}
                    <tr>
                        <td  rowspan="3">
                            Teg.Input
                        </td>
                        <td>
                            V L1 - N/L1 - L2
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->input_v_l1_n }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>
                            Vac
                        </td>
                    </tr>
                    <tr>
                        <td>
                            V L2 - N/L2 - L3
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->input_v_l2_n }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>
                            Vac
                        </td>
                    </tr>
                    <tr>
                        <td>
                            V L3 - N/L1 - L3
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->input_v_l3_n }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>
                            Vac
                        </td>
                    </tr>

                    {{-- ARUS INPUT --}}
                    <tr>
                        <td  rowspan="3">
                            Arus Input
                        </td>
                        <td>
                            I L1
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->input_i_l1 }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>
                            A
                        </td>
                    </tr>
                    <tr>
                        <td>
                            I L23
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->input_i_l2 }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>
                            A
                        </td>
                    </tr>
                    <tr>
                        <td>
                            I L3
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->input_i_l3 }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>
                            A
                        </td>
                    </tr>

                    {{-- FREQ INPUT --}}
                    <tr style="background-color: rgb(213, 196, 62);"">
                        <td colspan="2" >
                            Freq Input
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->freq_input }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>
                            Hz
                        </td>  
                    </tr>

                    {{-- TEGANGAN BATTERY --}}
                    <tr>
                        <td  rowspan="6">
                            Teg. Battery
                        </td>
                        <td>
                            Teg Floating
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->teg_floating }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>
                            Vdc
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Teg Rata2 percell
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->teg_rata2_percell }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>Vdc
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Teg Tot Batt
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->teg_tot_batt }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>
                            Vdc
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Teg otonomi
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->teg_otonomi }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>
                            Vdc
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Arus Discharge
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->arus_discharge }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>
                            A
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Arus Bhorcarge
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->arus_bhoscarge }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>
                            A
                        </td>
                    </tr>

                    {{-- TEGANGAN OUTPUT --}}
                    <tr>
                        <td  rowspan="6">
                            Teg Output
                        </td>
                        <td>
                            V L1 - N / L1 - L2
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->output_i_l1 }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>Vac
                        </td>
                    </tr>
                    <tr>
                        <td>
                            V L2 - N / L2 - L3
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->output_i_l2 }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>Vac
                        </td>
                    </tr>
                    <tr>
                        <td>
                            V L3 - N / L1 - L3
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->output_i_l3 }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>Vac
                        </td>
                    </tr>
                    <tr>
                        <td>
                            V L1 - G
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->v_l1 }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>Vac
                        </td>
d                  </tr>
                    <tr>
                        <td>
                            V L2 - G
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->v_l2 }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>Vac
                        </td>
d                  </tr>
                    <tr>
                        <td>
                            V L3 - G
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->v_l3 }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>Vac
                        </td>
                    </tr>

                    <tr style="background-color: rgb(213, 196, 62);"">
                        <td colspan="2" >
                            Freq Output
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->freq_output }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>Hz
                        </td>  
                    </tr>

                    {{-- ARUS OUTPUT --}}
                    <tr>
                        <td  rowspan="6">
                            Arus Output
                        </td>
                        <td>
                            I L1
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->output_i_l1 }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>A
                        </td>
d                  </tr>
                    <tr>
                        <td>
                            I L2
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->output_i_l2 }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>A
                        </td>
                    </tr>
                    <tr>
                        <td>
                            I L3
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->output_i_l3 }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>A
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Load Persen (%)
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->load_persen }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>%
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Load Per Phase
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->load_perphase }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>kVA
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Total Load
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->total_load }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>kVA
                        </td>
                    </tr>

                    <tr>
                        <td  rowspan="3">
                            TEMPERATUR
                        </td>
                        <td>
                            Temp Ruang
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->temp_ruang }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>°C
                        </td></tr>
                    <tr>
                        <td>
                            Temp Unit/Alat
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->temp_unit }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>°C
                        </td></tr>
                    <tr>
                        <td>
                            Temp Battery
                        </td>
                        @foreach ($formUpsPengukuranPeralatanEnamBulanans as $key => $formUpsPengukuranPeralatanEnamBulanan)
                        <td>
                            {{ $formUpsPengukuranPeralatanEnamBulanan->temp_battery }}</td>
                            
                        @endforeach
                        @if ($count < 10)
                            @for ($i = 0; $i < 10 - $count; $i++)
                                <td style="width: 50px">

                            </td>
                            @endfor
                        @endif
                        <td>
                        °C
                        </td></tr>

                    <tr>
                        <td colspan="13">CATATAN</td>
                    </tr>

                    <tr>

                        <td style="text-align :left ;vertical-align: baseline" colspan="13" height="80"><br></br>{!! $formUpsPengukuranPeralatanEnamBulanan->catatan !!}</td>
                    </tr>


        </table>
    </div>

</body>

</html>
