
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn {{ $order->code }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        

        
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 13px;
            line-height: 1.6;
            color: #333;
            padding: 20px;
        }
        
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #2563eb;
            padding-bottom: 20px;
        }
        
        .company-name {
            font-size: 24px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 5px;
        }
        
        .company-info {
            font-size: 11px;
            color: #666;
            margin-top: 5px;
        }
        
        .invoice-title {
            font-size: 28px;
            font-weight: bold;
            color: #1e40af;
            margin: 20px 0 10px 0;
            text-transform: uppercase;
        }
        
        .invoice-meta {
            display: table;
            width: 100%;
            margin-bottom: 25px;
        }
        
        .invoice-meta-left,
        .invoice-meta-right {
            display: table-cell;
            width: 50%;
            vertical-align: top;
        }
        
        .meta-group {
            margin-bottom: 15px;
        }
        
        .meta-label {
            font-weight: bold;
            color: #1e40af;
            margin-bottom: 5px;
        }
        
        .meta-value {
            color: #333;
        }
        
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
        }
        
        .items-table thead {
            background-color: #2563eb;
            color: white;
        }
        
        .items-table th {
            padding: 12px 8px;
            text-align: left;
            font-weight: bold;
            border: 1px solid #2563eb;
        }
        
        .items-table td {
            padding: 10px 8px;
            border: 1px solid #ddd;
        }
        
        .items-table tbody tr:nth-child(even) {
            background-color: #f8fafc;
        }
        
        .items-table tbody tr:hover {
            background-color: #f1f5f9;
        }
        
        .text-right {
            text-align: right;
        }
        
        .text-center {
            text-align: center;
        }
        
        .summary {
            float: right;
            width: 350px;
            margin-top: 40px;
        }
        
        .summary-row {
            display: table;
            width: 100%;
            padding: 8px 0;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .summary-row.total {
            border-top: 2px solid #2563eb;
            border-bottom: 2px solid #2563eb;
            background-color: #eff6ff;
            font-size: 16px;
            color: #1e40af;
            padding: 12px 0;
        }
        
        .summary-label {
            display: table-cell;
            width: 60%;
            padding-right: 10px;
            margin-top: 20px;
        }
        
        .summary-value {
            display: table-cell;
            width: 40%;
            text-align: right;
        }
        
        .notes {
            clear: both;
            margin-top: 40px;
            padding: 15px;
            background-color: #fffbeb;
            border-left: 4px solid #f59e0b;
            border-radius: 4px;
        }
        
        .notes-title {

            color: #92400e;
            margin-bottom: 5px;
        }
        
        .notes-content {
            color: #78350f;
            font-size: 12px;
        }
        
        .footer {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 2px solid #e5e7eb;
        }
        
        .signatures {
            display: table;
            width: 100%;
            margin-top: 90px;
        }
        
        .signature-box {
            display: table-cell;
            width: 50%;
            text-align: center;
        }
        
        .signature-title {
            margin-top: 50px;

            margin-bottom: 60px;
            color: #1e40af;
        }
        
        .signature-name {
            font-style: italic;
            color: #666;
        }
        
        .thank-you {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #2563eb;
            font-weight: bold;
        }
        
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: bold;
        }
        
        .status-paid {
            background-color: #dcfce7;
            color: #166534;
        }
        
        .status-unpaid {
            background-color: #fee2e2;
            color: #991b1b;
        }
        
        .status-partial {
            background-color: #fef3c7;
            color: #92400e;
        }
        
        @media print {
            body {
                padding: 0;
            }
            
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <!-- Header -->
        <div class="header">
            <div class="company-name">{{ config('invoice.company.name') }}</div>
            <div class="company-info">
                Địa chỉ: {{ config('invoice.company.address') }}<br>
                Điện thoại: {{ config('invoice.company.phone') }} | Email: {{ config('invoice.company.email') }}<br>
                Website: {{ config('invoice.company.website') }}
            </div>
            <div class="invoice-title">HÓA ĐƠN BÁN HÀNG</div>
        </div>

        <!-- Invoice Meta Information -->
        <div class="invoice-meta">
            <div class="invoice-meta-left">
                <div class="meta-group">
                    <div class="meta-label">Mã đơn hàng:</div>
                    <div class="meta-value">{{ $order->code }}</div>
                </div>
                
                <div class="meta-group">
                    <div class="meta-label">Ngày bán:</div>
                    <div class="meta-value">{{ $order->order_date->format('d/m/Y H:i') }}</div>
                </div>
                
                <div class="meta-group">
                    <div class="meta-label">Người bán:</div>
                    <div class="meta-value">{{ $order->creator->name ?? 'N/A' }}</div>
                </div>
            </div>
            
            <div class="invoice-meta-right">
                <div class="meta-group">
                    <div class="meta-label">Khách hàng:</div>
                    <div class="meta-value">{{ $order->customer->name ?? 'Khách vãng lai' }}</div>
                </div>
                
                @if($order->customer)
                <div class="meta-group">
                    <div class="meta-label">Số điện thoại:</div>
                    <div class="meta-value">{{ $order->customer->phone ?? 'N/A' }}</div>
                </div>
                
                @if($order->customer->address)
                <div class="meta-group">
                    <div class="meta-label">Địa chỉ:</div>
                    <div class="meta-value">{{ $order->customer->address }}</div>
                </div>
                @endif
                @endif
                
                <div class="meta-group">
                    <div class="meta-label">Trạng thái:</div>
                    <div class="meta-value">
                        <span class=" ">
                            {{ match($order->payment_status) {
                                'paid' => 'Đã thanh toán',
                                'partial' => 'Thanh toán một phần',
                                'deposit' => 'Đã đặt cọc',
                                'unpaid' => 'Chưa thanh toán',
                                default => $order->payment_status
                            } }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Items Table -->
        <table class="items-table">
            <thead>
                <tr>
                    <th style="width: 5%;">STT</th>
                    <th style="width: 40%;">Sản phẩm</th>
                    <th style="width: 15%;" class="text-center">Đơn vị</th>
                    <th style="width: 10%;" class="text-center">SL</th>
                    <th style="width: 15%;" class="text-right">Đơn giá</th>
                    <th style="width: 15%;" class="text-right">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td class="text-center">{{ $item->product->variant->name ?? 'Cái' }}</td>
                    <td class="text-center">{{ number_format($item->quantity) }}</td>
                    <td class="text-right">{{ number_format($item->unit_price) }} ₫</td>
                    <td class="text-right">{{ number_format($item->total_price) }} ₫</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Summary -->
        <div class="summary">
            <div class="summary-row">
                <div class="summary-label">Tổng tiền hàng:</div>
                <div class="summary-value">{{ number_format($order->total_amount) }} ₫</div>
            </div>
            
            @if($order->discount_amount > 0)
            <div class="summary-row">
                <div class="summary-label">Giảm giá:</div>
                <div class="summary-value">- {{ number_format($order->discount_amount) }} ₫</div>
            </div>
            @endif
            
            <div class="summary-row total">
                <div class="summary-label">Tổng thanh toán:</div>
                <div class="summary-value">{{ number_format($order->grand_total) }} ₫</div>
            </div>
            
            @if($order->paid_amount > 0)
            <div class="summary-row">
                <div class="summary-label">Đã thanh toán:</div>
                <div class="summary-value">{{ number_format($order->paid_amount) }} ₫</div>
            </div>
            @endif
            
            @if($order->deposit_amount > 0)
            <div class="summary-row">
                <div class="summary-label">Tiền đặt cọc:</div>
                <div class="summary-value">{{ number_format($order->deposit_amount) }} ₫</div>
            </div>
            @endif
            
            @if($order->debt_amount > 0)
            <div class="summary-row" style="color: #dc2626;">
                <div class="summary-label">Còn nợ:</div>
                <div class="summary-value">{{ number_format($order->debt_amount) }} ₫</div>
            </div>
            @endif
        </div>

        <!-- Notes -->
        @if($order->notes)
        <div class="notes">
            <div class="notes-title">Ghi chú:</div>
            <div class="notes-content">{{ $order->notes }}</div>
        </div>
        @endif

        <!-- Footer -->
        <div class="footer">
            <!-- Signatures -->
            <div class="signatures">
                <div class="signature-box">
                    <div class="signature-title">Người mua hàng</div>
                    <div class="signature-name">(Ký và ghi rõ họ tên)</div>
                </div>
                
                <div class="signature-box">
                    <div class="signature-title">Người bán hàng</div>
                    <div class="signature-name">(Ký và ghi rõ họ tên)</div>
                </div>
            </div>
            
            <div class="thank-you">
                ★ CẢM ƠN QUÝ KHÁCH ★<br>
                <span style="font-size: 11px; font-weight: normal;">Hẹn gặp lại quý khách!</span>
            </div>
        </div>
    </div>
</body>
</html>