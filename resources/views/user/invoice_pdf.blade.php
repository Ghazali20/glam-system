<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice - {{ $invoice->invoice_number }}</title>
    <style>
        /* Pengaturan Dasar Layout */
        @page { margin: 0; }
        body {
            font-family: 'Helvetica', sans-serif;
            margin: 0;
            padding: 45px;
            color: #1c1917;
            background-color: #ffffff;
            line-height: 1.5;
        }

        /* Header & Branding */
        .header { text-align: center; margin-bottom: 35px; }
        .brand {
            font-size: 30px;
            font-weight: bold;
            color: #e11d48;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .subtitle {
            font-size: 10px;
            color: #78716c;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        /* Informasi Invoice */
        .info-section {
            width: 100%;
            margin-top: 30px;
            border-top: 1px solid #f5f5f4;
            padding-top: 25px;
            margin-bottom: 30px;
        }
        .info-table { width: 100%; }
        .info-table td { vertical-align: top; font-size: 12px; }
        .label { color: #e11d48; font-weight: bold; margin-bottom: 5px; display: block; }

        /* Tabel Detail Layanan */
        .details-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .details-table th {
            background-color: #fff1f2;
            color: #e11d48;
            padding: 12px 15px;
            text-align: left;
            font-size: 11px;
            text-transform: uppercase;
            border-bottom: 2px solid #fb7185;
        }
        .details-table td {
            padding: 15px;
            border-bottom: 1px solid #f5f5f4;
            font-size: 13px;
        }

        /* Badge Status */
        .badge {
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .paid { background-color: #dcfce7; color: #166534; }
        .unpaid { background-color: #fee2e2; color: #991b1b; }

        /* Total Pembayaran */
        .total-box {
            margin-top: 25px;
            text-align: right;
        }
        .total-label { font-size: 12px; color: #78716c; }
        .total-amount {
            font-size: 22px;
            font-weight: bold;
            color: #e11d48;
            margin-top: 5px;
        }

        /* Footer */
        .footer {
            position: fixed;
            bottom: 40px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            color: #a8a29e;
            padding: 0 45px;
        }
        .footer-line { border-top: 1px solid #f5f5f4; margin-bottom: 15px; }
        .payment-box { margin-top: 25px; padding: 15px; background: #fff7f8; border: 1px solid #ffe4e6; }
        .payment-box strong { color: #be123c; font-size: 11px; text-transform: uppercase; }
        .payment-box p { margin: 5px 0 0; font-size: 11px; color: #57534e; }
    </style>
</head>
<body>
    <div class="header">
        <div class="brand">Glam By Ramdiah</div>
        <div class="subtitle">Modern Glamour & Luxury Service</div>
    </div>

    <div class="info-section">
        <table class="info-table">
            <tr>
                <td width="50%">
                    <span class="label">PELANGGAN</span>
                    <strong>{{ $invoice->booking->customer_name }}</strong><br>
                    {{ $invoice->booking->whatsapp }}
                </td>
                <td width="50%" style="text-align: right;">
                    <span class="label">DETAIL TAGIHAN</span>
                    No: {{ $invoice->invoice_number }}<br>
                    Tanggal: {{ now()->format('d M Y') }}<br>
                    Status: <span class="badge {{ $invoice->payment_status }}">{{ strtoupper($invoice->payment_status) }}</span>
                </td>
            </tr>
        </table>
    </div>

    <table class="details-table">
        <thead>
            <tr>
                <th>Deskripsi Layanan</th>
                <th style="text-align: right;">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <strong>{{ $invoice->booking->service->name }}</strong><br>
                    <span style="color: #78716c; font-size: 11px;">Luxury Makeup & Hairdo Professional Service</span>
                </td>
                <td style="text-align: right;">Rp {{ number_format($invoice->total_amount, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="total-box">
        <div class="total-label">Total Pembayaran</div>
        <div class="total-amount">Rp {{ number_format($invoice->total_amount, 0, ',', '.') }}</div>
    </div>

    @if($invoice->payment_status !== 'paid' && $paymentSetting->is_active)
        <div class="payment-box">
            <strong>Instruksi Pembayaran</strong>
            <p>{{ $paymentSetting->payment_instructions }}</p>
            @foreach($paymentSetting->activeBankAccounts() as $account)
                <p><strong style="text-transform:none;color:#1c1917">{{ $account['bank_name'] }}</strong> — {{ $account['account_number'] }} a/n {{ $account['account_holder'] }}</p>
            @endforeach
            @if($paymentSetting->qris_image_path)
                <p>QRIS tersedia pada halaman Riwayat Pesanan atau dapat diminta melalui WhatsApp admin.</p>
            @endif
        </div>
    @endif

    <div class="footer">
        <div class="footer-line"></div>
        <p>Terima kasih telah mempercayai Glam By Ramdiah untuk hari spesial Anda. ✨</p>
        <p>Info persiapan akan kami kirimkan kembali <strong>2 hari sebelum hari H</strong> melalui WhatsApp.</p>
        <p><strong>www.glambyramdiah.com</strong></p>
    </div>
</body>
</html>