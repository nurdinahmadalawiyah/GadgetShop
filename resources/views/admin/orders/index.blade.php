@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">List Pesanan</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col">
            <h2>List Pesanan</h2>
            <br>
            <div class="card" style="padding-left: 10px; padding-right: 10px; border-radius: 10px">
                <div class="table-responsive">
                    <table class="table table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Harga Total</th>
                                <th>Status</th>
                                <th>No. Telp</th>
                                <th>Kode Pos</th>
                                <th>Alamat Pengiriman</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order['id'] }}</td>
                                    <td>Rp. {{ number_format($order['total_price']) }}</td>
                                    <td>{{ $order['status'] }}</td>
                                    <td>{{ $order['phone_number'] }}</td>
                                    <td>{{ $order['zip_code'] }}</td>
                                    <td>{{ $order['address'] }}, {{ $order['address_line2'] }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{ route('admin.orders.show', $order->id) }}"><i class="fas fa-eye"></i> Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
