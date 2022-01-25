@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <form class="form-inline" style="float: right">
                    <div class="form-group mr-1">
                        <a class="btn btn-outline-danger" href="{{ route('admin.orders.index', ) }}" style="border-radius: 50px"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </form>
                <h2>Ubah Alamat</h2>

                @if (count($errors))
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <br />

                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Dusun, RT/RW, Nama Jalan</label>
                            <input type="text" class="form-control" name="address" placeholder="Dusun, RT/RW, Nama Jalan" value="{{ $order->address }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Desa / Kelurahan</label>
                            <input type="text" class="form-control" name="address_line2" placeholder="Desa / Kelurahan" value="{{ $order->address_line2 }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Kecamatan</label>
                            <input type="text" class="form-control" name="district" placeholder="Kecamatan" value="{{ $order->district }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Kota / Kab</label>
                            <input type="text" class="form-control" name="city"  value="{{ $order->city }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Provinsi</label>
                            <input type="text" class="form-control" name="province" value="{{ $order->province }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>No. Telp</label>
                            <input type="number" class="form-control" name="phone_number" value="{{ $order->phone_number }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Kode Pos</label>
                            <input type="number" class="form-control" name="zip_code" value="{{ $order->zip_code }}">
                        </div>
                    </div>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="border-radius: 100px">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
