@component('mail::message')
<p>Променен статус на поръчката: <strong>{{ $order->status }}</strong></p>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: center;">
        <div style="width: 80%;">
        <div style="display: flex; flex-wrap: wrap; justify-content: space-between; padding: 12px 16px; margin: 16px 0;">
                <div style="display: flex; flex-wrap: wrap; justify-content: space-around; width: 100%;">  <div style="text-align: center; margin: 8px;">  <span>Order Number<br>
                            <strong style="color: #212529;">#{{ $order->id }}</strong>
                        </span>
                    </div>
                    <div style="text-align: center; margin: 8px;"> <span>Date<br>
                            <strong style="color: #212529;">{{ $order->created_at->format('Y-m-d') }}</strong>
                        </span>
                    </div>
                    <div style="text-align: center; margin: 8px;"> <span>Email<br>
                            <strong style="color: #212529;">{{ $customer->email }}</strong>
                        </span>
                    </div>
                    <div style="text-align: center; margin: 8px;"> <span>Total<br>
                            <strong style="color: #212529;">{{ $order['amount'] }} BGN</strong>
                        </span>
                    </div>
                    <div style="text-align: center; margin: 8px;"> <span>Payment Method<br>
                            <strong style="color: #212529;">Paid</strong>
                        </span>
                    </div>
                </div>
            </div>
            <div style="border-width: 3px; border-radius: 0; border-color: #dee2e6; margin-bottom: 16px; border-style: solid;  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                <div style="padding: 20px;">
                    <table style="width: 100%; border-collapse: collapse; margin-bottom: 0;">
                        <tbody>
                            <tr>
                                <td style="border-top: 0;">
                                    <strong style="color: #212529;">Product</strong>
                                </td>
                                <td style="border-top: 0; text-align: center;">
                                    <strong style="color: #212529;">Quantity</strong>
                                </td>
                                <td style="border-top: 0;">
                                </td>
                            </tr>
                            @foreach($order->products as $product)
                            <tr>
                                <td>
                                    <strong style="display: block; color: #212529; line-height: 1; font-weight: 600;">{{ $product->name }}</strong>
                                </td>
                                <td style="text-align: center;">
                                    <strong style="display: block; color: #212529; line-height: 1; font-weight: 600;"><span style="margin-right: 4px;">x{{ $product->pivot->quantity }}</span></strong>
                                </td>
                                <td style="text-align: right; vertical-align: top;">
                                    <span style="font-weight: 500; color: #6c757d;">{{ number_format(($product->pivot->price), 2) }} BGN</span>
                                </td>
                            </tr>
                            @endforeach
                            <tr style="border-top: 1px solid #dee2e6;">
                                <td colspan="2" style="border-top: 0;">
                                    <strong style="color: #212529;">Subtotal</strong>
                                </td>
                                <td style="border-top: 0; text-align: right;">
                                    <strong style="color: #212529;"><span style="font-weight: 500;">{{ $order->amount }} BGN</span></strong>
                                </td>
                            </tr>
                            <tr style="border-top: 1px solid #dee2e6;">
                                <td colspan="2" style="border-top: 0;">
                                    <strong style="color: #212529;">Shipping</strong>
                                </td>
                                <td style="border-top: 0; text-align: right;">
                                    <strong style="color: #212529;"><span style="font-weight: 500;">Free Shipping</span></strong>
                                </td>
                            </tr>
                            <tr style="border-top: 1px solid #dee2e6;">
                                <td colspan="2">
                                    <strong style="color: #212529; font-size: 1.25rem;">Total</strong>
                                </td>
                                <td style="text-align: right;">
                                    <strong style="color: #212529;"><span style="font-size: 1.5rem; color: #212529;">{{ $order->amount }} BGN</span></strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="display: flex; flex-wrap: wrap; padding-top: 12px;">
                <div style="width: 50%; margin-bottom: 16px;">
                    <h2 style="color: #212529; font-weight: 600; font-size: 1.5rem; margin-bottom: 4px;">Billing Address</h2>
                    <ul style="list-style: none; padding: 0; margin: 0; font-size: 1rem;">
                        <li style="margin-bottom: 0;">{{ $customer->first_name . ' ' . $customer->last_name }}</li>
                        <li style="margin-bottom: 0;">{{ $customer->address->line1 ? ', ' : ' ' }}{{ $customer->address->country }}</li>
                        <li style="margin-bottom: 0;">{{ $customer->address->city }}, {{ $customer->address->postcode }}</li>
                        <li style="margin-bottom: 0;">{{ $customer->phone }}</li>
                        <li style="margin-top: 12px; margin-bottom: 0;">{{ $customer->email }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
Thanks,<br>
{{ config('app.name') }}
@endcomponent