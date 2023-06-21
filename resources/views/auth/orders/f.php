  <!--                  @foreach ($skus as $sku)
                            <tr>
                                <td>
                                    <a href="{{ route('sku', [$sku->product->category->code, $sku->product->code, $sku]) }}">
                                        <img height="56px"
                                             src="{{ Storage::url($sku->product->image) }}">
                                        {{ $sku->product->name }}
                                    </a>
                                </td>
                                <td><span class="badge"> {{ $sku->pivot->count }}</span></td>
                                <td>{{ $sku->pivot->price }} {{ $order->currency->symbol }}</td>
                                <td>{{ $sku->pivot->price * $sku->pivot->count }} {{ $order->currency->symbol }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">Общая стоимость:</td>
                            <td>{{ $order->sum }}
                                 {{ $order->currency->symbol }}</td>
                        </tr>
                        @if($order->hasCoupon())
                            <tr>
                                <td colspan="3">Был использован купон:</td>
                                <td><a href="{{ route('coupons.show', $order->coupon) }}">{{ $order->coupon->code }}</a></td>
                            </tr>
                        @endif-->
