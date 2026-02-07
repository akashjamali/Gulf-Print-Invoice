<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $invoiceNumber }}</title>
    <style>
        @page {
            margin: 0;
            size: A4;
        }
        body {
            font-family: 'Helvetica', sans-serif;
            color: #1a1a1a;
            margin: 0;
            padding: 0;
            background: #fff;
            line-height: 1.4;
        }
        .header-bar {
            height: 40px;
            background-color: #2a2e6e;
            position: relative;
        }
        .header-angle {
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            width: 35%;
            background-color: #cbd5e1;
            transform: skew(-30deg);
            transform-origin: top right;
        }
        .header-text {
            position: absolute;
            right: 40px;
            top: 4px;
            font-size: 24px;
            font-weight: 900;
            color: #2a2e6e;
            text-transform: uppercase;
            letter-spacing: 3px;
        }
        .content {
            padding: 25px 40px;
        }
        .brand-section {
            margin-bottom: 20px;
        }
        .company-name {
            font-size: 48px;
            font-weight: 900;
            color: #2a2e6e;
            margin: 0;
            line-height: 0.9;
            text-transform: lowercase;
        }
        .slogan {
            font-size: 11px;
            font-weight: bold;
            color: #2a2e6e;
            letter-spacing: 2px;
            margin-top: 4px;
            text-transform: uppercase;
            opacity: 0.9;
        }
        .info-container {
            float: right;
            margin-top: -65px;
            text-align: right;
        }
        .info-item {
            display: inline-block;
            background: #f1f5f9;
            border-radius: 12px;
            padding: 4px 12px;
            margin-left: 8px;
            border: 1px solid #e2e8f0;
        }
        .info-label {
            font-size: 9px;
            font-weight: 900;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-right: 4px;
        }
        .info-value {
            font-size: 11px;
            font-weight: bold;
            color: #1e293b;
        }
        .client-section {
            margin-top: 35px;
            margin-bottom: 25px;
            width: 100%;
        }
        .client-box {
            border-bottom: 1.5px solid #e2e8f0;
            padding-bottom: 4px;
            margin-bottom: 12px;
        }
        .client-label {
            font-size: 13px;
            font-weight: 900;
            color: #2a2e6e;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-block;
            width: 80px;
        }
        .client-value {
            font-size: 14px;
            font-weight: bold;
            color: #334155;
        }
        .table-wrapper {
            border: 1.5px solid #2a2e6e;
            border-radius: 16px;
            overflow: hidden;
            margin-top: 10px;
            min-height: 450px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background: #fff;
            color: #2a2e6e;
            font-size: 13px;
            font-weight: 900;
            padding: 12px 8px;
            border-bottom: 1.5px solid #2a2e6e;
            border-right: 1.5px solid #2a2e6e;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        th:last-child { border-right: 0; }
        td {
            padding: 12px 10px;
            border-right: 1.5px solid #2a2e6e;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: top;
            font-size: 12px;
            color: #334155;
        }
        td:last-child { border-right: 0; }
        .description-cell { font-weight: 500; line-height: 1.5; color: #1e293b; }
        .sno-cell, .qty-cell, .price-cell, .total-cell { text-align: center; font-weight: bold; }
        
        .totals-section {
            margin-top: 15px;
            float: right;
            width: 250px;
        }
        .total-row {
            padding: 4px 0;
            border-bottom: 1px solid #f1f5f9;
        }
        .total-label {
            font-size: 11px;
            font-weight: 900;
            text-transform: uppercase;
            color: #64748b;
        }
        .total-value {
            float: right;
            font-size: 13px;
            font-weight: bold;
            color: #1e293b;
        }
        .grand-total {
            background: #2a2e6e;
            color: #fff;
            padding: 8px 12px;
            border-radius: 8px;
            margin-top: 5px;
        }
        .grand-total .total-label { color: #cbd5e1; }
        .grand-total .total-value { color: #fff; font-size: 16px; }

        .signature-area {
            margin-top: 40px;
            position: relative;
        }
        .sign-box {
            float: left;
            width: 150px;
            border-top: 1px solid #e2e8f0;
            padding-top: 5px;
            margin-top: 80px;
            font-size: 10px;
            font-weight: 900;
            text-transform: uppercase;
            color: #94a3b8;
            text-align: center;
        }
        .stamp-container {
            float: right;
            width: 180px;
            height: 180px;
            position: relative;
            margin-top: -30px;
        }
        .stamp-image {
            width: 100%;
            height: auto;
            opacity: 0.85;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #2a2e6e;
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }
        .footer-top {
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1px;
            margin-bottom: 8px;
            color: #cbd5e1;
        }
        .footer-bottom {
            font-size: 11px;
            font-weight: bold;
        }
        .footer-item {
            margin: 0 10px;
            display: inline-block;
        }
        .icon {
            display: inline-block;
            vertical-align: middle;
            margin-right: 4px;
        }
        .clear { clear: both; }
    </style>
</head>
<body>
    <div class="header-bar">
        <div class="header-angle"></div>
        <div class="header-text">Invoice</div>
    </div>

    <div class="content">
        <div class="brand-section">
            <h1 class="company-name">{{ $company['name'] }}</h1>
            <div class="slogan">{{ $company['slogan'] }}</div>
        </div>

        <div class="info-container">
            <div class="info-item">
                <span class="info-label">Ref ID:</span>
                <span class="info-value">#{{ $invoiceNumber }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Dated:</span>
                <span class="info-value">{{ $date }}</span>
            </div>
        </div>

        <div class="client-section">
            <div class="client-box">
                <span class="client-label">Entity</span>
                <span class="client-value">{{ $clientName }}</span>
            </div>
            <div class="client-box">
                <span class="client-label">Mailing</span>
                <span class="client-value">{{ $clientAddress }}</span>
            </div>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th style="width: 50px;">Slot</th>
                        <th>Specifications & Deliverables</th>
                        <th style="width: 60px;">Qty</th>
                        <th style="width: 90px;">Rate</th>
                        <th style="width: 120px;">Net Value ({{ $currency }})</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $index => $item)
                    <tr>
                        <td class="sno-cell">{{ $item['sNo'] }}</td>
                        <td class="description-cell">{!! nl2br(e($item['description'])) !!}</td>
                        <td class="qty-cell">{{ $item['quantity'] }}</td>
                        <td class="price-cell">{{ $item['price'] }}</td>
                        <td class="total-cell">{{ number_format($item['total'], 2) }}</td>
                    </tr>
                    @endforeach
                    @for($i = count($items); $i < 5; $i++)
                    <tr>
                        <td style="height: 40px;"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>

        <div class="totals-section">
            <div class="total-row">
                <span class="total-label">Subtotal</span>
                <span class="total-value">{{ number_format($subtotal, 2) }} {{ $currency }}</span>
            </div>
            <div class="total-row">
                <span class="total-label">VAT Base</span>
                <span class="total-value">{{ number_format($tax, 2) }} {{ $currency }}</span>
            </div>
            <div class="grand-total">
                <span class="total-label">Final Valuation</span>
                <span class="total-value">{{ number_format($total, 2) }} {{ $currency }}</span>
            </div>
        </div>

        <div class="clear"></div>

        <div class="signature-area">
            <div class="sign-box">Received Authentication</div>
            <div class="stamp-container">
                <img src="{{ public_path('images/stamp.png') }}" class="stamp-image">
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <div class="footer">
        <div class="footer-top">
            <span class="footer-item">{{ $company['email'] }}</span>
            <span class="footer-item">|</span>
            <span class="footer-item">{{ $company['website'] }}</span>
            <span class="footer-item">|</span>
            <span class="footer-item">{{ $company['address'] }}</span>
        </div>
        <div class="footer-bottom">
            <span class="footer-item">WhatsApp: {{ $company['whatsapp'] }}</span>
            <span class="footer-item">Call: {{ $company['phone_landline'] }}</span>
            <span class="footer-item">PO/BOX: {{ $company['pobox'] }}</span>
            <span class="footer-item">Insta: {{ $company['instagram'] }}</span>
        </div>
    </div>
</body>
</html>
