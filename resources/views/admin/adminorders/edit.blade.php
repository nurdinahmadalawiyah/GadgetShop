@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <form class="form-inline" style="float: right">
                    <div class="form-group mr-1">
                        <a class="btn btn-outline-danger" href="{{ route('admin.adminorders.index') }}" style="border-radius: 50px"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </form>
                <h2>Proses Order</h2>

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

                <form action="{{ route('admin.adminorders.edit', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Dusun, RT/RW, Nama Jalan</label>
                            <input type="text" class="form-control" name="address"  value="{{ $order->address }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Desa / Kelurahan</label>
                            <input type="text" class="form-control" name="address_line2" value="{{ $order->address_line2 }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Kecamatan</label>
                            <input type="text" class="form-control" name="district"  value="{{ $order->district }}">
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
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" name="status" value="{{ $order->status }}">
                    </div>
                    <button type="submit" class="btn btn-primary" style="border-radius: 100px">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
