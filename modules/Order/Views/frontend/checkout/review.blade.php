<div class="order-box">
    <h3>{{__('Your Order')}}</h3>
    <table>
        <thead>
        <tr>
            <th><strong>{{__('Product')}}</strong></th>
            <th width="20%"><strong>{{__('Subtotal')}}</strong></th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $cartItem)
            @php
                $currency = $cartItem->meta['currency'] ?? 'inr';
                $currencySymbols = ['inr' => '₹', 'usd' => '$', 'eur' => '€'];
                $symbol = $currencySymbols[$currency] ?? '₹';
            @endphp
        <tr class="cart-item">
            <td class="product-name">
                {{$cartItem->name}}
                x {{$cartItem->qty}}
                @if(!empty($cartItem->meta['package']))
                    <div class="mt-3">{{__('Package: ')}} {{package_key_to_name($cartItem->meta['package'])}} ({{ $symbol }}){{ number_format($cartItem->price, 2) }}</div>
                @endif
                @if(!empty($cartItem->meta['extra_prices']))
                    <div class="mt-3"><strong>{{__("Extra Prices:")}}</strong></div>
                    <ul class="list-unstyled mt-2">
                        @foreach($cartItem->meta['extra_prices'] as $extra_price)
                        <li>{{$extra_price['name'] ?? '0'}} : {{ $symbol }}{{ number_format(['extra_prices'] ?? 0) }})</li>
                        @endforeach
                    </ul>
                @endif
            </td>
            <td class="product-total">{{ $symbol }}{{ number_format($cartItem->subtotal, 2) }}</td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr class="order-total">
            <td>{{__('Total')}}</td>

            <td>
                <span class="amount">{{ $symbol }} {{ number_format(\Modules\Order\Helpers\CartManager::total(), 2) }}</span>
            </td>
        </tr>
        </tfoot>
    </table>
</div>
