@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card mb-3" style="border-radius: 10px">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="form-group">
                            <h2>Alamat Pengiriman</h2>
                        </div>
                        <div class="card border mb-3" style="border-radius: 10px">
                            <div class="card-body">
                                <div>
                                    <p>{{ $order->address }}, {{ $order->address_line2 }}, {{ $order->district }},
                                        {{ $order->city }}, {{ $order->province }}, {{ $order->zip_code }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <div class="mt-4">
                            <div class="card border mb-3" style="border-radius: 10px">
                                <div class="card-header bg-primary">
                                    <div class="mt-2">
                                        <h4 class="text-light">Harga Total</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <h3><strong>Rp. {{ number_format($order->total_price) }}</strong></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" style="padding-left: 10px; padding-right: 10px; border-radius: 10px">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <table id="cart" class="table table-hover table-condesed">
                        <thead>
                            <tr>
                                <th style="width:50%">Product</th>
                                <th style="width:10%">Price</th>
                                <th style="width:8%">Quantity</th>
                                <th style="width:22%" class="text-center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($order->orderItems as $orderItem)
                                <tr>
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-3 hidden-xs"><img
                                                    src="{{ route('products.image', ['imageName' => $orderItem->product->image_url]) }}"
                                                    width="100" class="img-responsive" /></div>
                                            <div class="col-sm-9">
                                                <a href="{{ route('products.show', ['id' => $orderItem->product->id]) }}">
                                                    <h4 class="nomargin">{{ $orderItem->product->name }}</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">
                                        Rp. {{ number_format($orderItem->price) }}
                                    </td>
                                    <td data-th="Quantity">
                                        {{ $orderItem->quantity }}
                                    </td>
                                    <td data-th="Subtotal" class="text-center">
                                        Rp. {{ number_format($orderItem->price * $orderItem->quantity) }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
