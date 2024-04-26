<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposal</title>
</head>

<body>
    <style>
        #logo {
            float: left;
        }

        #title {
            float: right;
        }

        #body {
            clear: both;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

    </style>

    <div id="header">
        <div id="logo">
            <img src="{{ url('/output-onlinepngtools.png') }}" alt="Osky Studio Logo" width="150">
        </div>
        {{-- Proposal align right --}}
        <div id="title">
            <h1>Proposal</h1>
        </div>

    </div>

    <div id="body">
        <table border="0" width="100%">
            <tr valign="top" align="left">
                <td width="70%"></td>
                <td align="right">Referensi</td>
                <td>: {{ $proposal->no_proposal }}</td>
            </tr>

            <tr>
                <td></td>
                <td align="right">Tanggal</td>
                <td>: {{ Date('d/m/Y', strtotime($proposal->date)) }}</td>
            </tr>
            <tr>
                <td></td>
                <td align="right">Status</td>
                <td>: {{ $proposal->status }}</td>
            </tr>
        </table>
        <br>
        <table border="0" width="100%">
            <tr>
                <td>
                    <table border="0" width="100%">
                        <tr>
                            <td colspan="2">Info Perusahaan</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>PT Sky Studio Kreatif</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Telp: 081284456715</td>
                        </tr>
                        <tr>
                            <td colspan="2">Email: info@oskystudio.com</td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table border="0" width="100%">
                        <tr>
                            <td colspan="2">Order Dari</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">{{ $proposal->name }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">{{ $proposal->email }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Telp: {{ $proposal->phone }}</td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>
        <br><br><br>

        {{-- table detail --}}
        <table border="0" width="100%" cellspacing="0" style="border-collapse: collapse;">
            <thead style="background-color: #545455;color:white;">
                <tr>
                <th class="text-left">No</th>
                <th>Deskripsi</th>
                <th>Qty</th>
                <th class="text-right">Harga</th>
                <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                @foreach ($proposal_details as $pd)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}.</td>
                        <td>{{ $pd->nama_pekerjaan }}</td>
                        <td class="text-center">{{ $pd->qty }}</td>
                        <td class="text-right">{{ number_format($pd->harga, 0, ',', '.') }}</td>
                        <td class="text-right">{{ number_format($pd->qty * $pd->harga, 0, ',', '.') }}</td>                        
                    </tr>                    
                    @php
                        $total += $pd->qty * $pd->harga;
                    @endphp
                @endforeach
                <tr>                    
                    <td colspan="5" style="color:white">1</td>
                </tr>
                <tr>
                    <td colspan="5" style="color:white">1</td>
                </tr><tr>
                    <td colspan="5" style="color:white">1</td>
                </tr><tr>
                    <td colspan="5" style="color:rgb(90, 87, 87)"><hr></td>
                </tr>
            </tbody>
            <tfoot style="padding-top: 10px;">
                <tr>
                    <td colspan="4" align="right">Total</td>
                    <td class="text-right"> {{ number_format($total, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>

        {{-- Remaks --}}
        <br><br>
        <table border="0" width="60%">
            <tr>
                <td colspan="2">Remarks</td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    @if($proposal->remarks)
                        {!! nl2br($proposal->remarks) !!}
                    @else
                        Pembayaran hanya dilakukan di<br>
                        BCA 4958744585 A/n Sky Studio Kreatif PT
                    @endif
                </td>
            </tr>
        </table>
        {{-- s&k --}}
        <br><br>
        <table border="0" width="60%">
            <tr>
                <td colspan="2">Syarat & Ketentuan</td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    @if($proposal->syarat)
                        {!! nl2br($proposal->syarat) !!}
                    @else
                        1. Harga belum termasuk PPN 10%<br>
                        2. Pembayaran 50% di muka, 50% setelah pekerjaan selesai<br>
                        3. Garansi 1 tahun
                    @endif
                </td>
            </tr>

        </table>
    </div>

</body>

</html>
