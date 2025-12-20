<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #004AAD 0%, #28769A 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #f9f9f9;
            padding: 30px;
            border: 1px solid #e0e0e0;
        }
        .field {
            margin-bottom: 20px;
            padding: 15px;
            background: white;
            border-left: 4px solid #004AAD;
            border-radius: 5px;
        }
        .field-label {
            font-weight: bold;
            color: #004AAD;
            margin-bottom: 5px;
        }
        .field-value {
            color: #555;
        }
        .message-box {
            background: white;
            padding: 20px;
            border-radius: 5px;
            border: 1px solid #e0e0e0;
            margin-top: 10px;
        }
        .footer {
            background: #f0f9ff;
            padding: 20px;
            text-align: center;
            border-radius: 0 0 10px 10px;
            color: #666;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: #004AAD;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 style="margin: 0;">📩 Pesan Baru dari Website</h1>
        <p style="margin: 10px 0 0 0; opacity: 0.9;">CV. Bumi Tirta Wisata</p>
    </div>

    <div class="content">
        <p style="font-size: 16px; margin-bottom: 25px;">Anda menerima pesan baru dari formulir kontak website:</p>

        <div class="field">
            <div class="field-label">👤 Nama:</div>
            <div class="field-value">{{ $contactMessage->name }}</div>
        </div>

        <div class="field">
            <div class="field-label">📧 Email:</div>
            <div class="field-value">{{ $contactMessage->email }}</div>
        </div>

        <div class="field">
            <div class="field-label">📱 Nomor Telepon:</div>
            <div class="field-value">{{ $contactMessage->phone }}</div>
        </div>

        <div class="field">
            <div class="field-label">💬 Pesan:</div>
            <div class="message-box">
                {{ $contactMessage->message }}
            </div>
        </div>

        <div style="text-align: center;">
            <a href="{{ url('/admin/messages/' . $contactMessage->id) }}" class="btn">
                Lihat di Admin Panel
            </a>
        </div>
    </div>

    <div class="footer">
        <p style="margin: 0;">Email ini dikirim otomatis dari sistem website.</p>
        <p style="margin: 5px 0 0 0;">Diterima pada: {{ $contactMessage->created_at->format('d F Y, H:i') }} WIB</p>
    </div>
</body>
</html>
