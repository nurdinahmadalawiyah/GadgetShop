@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h2>Menambahkan Alamat</h2>

                <br />
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

                <form action="{{ route('admin.orders.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Dusun, RT/RW, Nama Jalan</label>
                            <input type="text" class="form-control" name="address" placeholder="Dusun, RT/RW, Nama Jalan">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Desa / Kelurahan</label>
                            <input type="text" class="form-control" name="address_line2" placeholder="Desa / Kelurahan">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Kecamatan</label>
                            <input type="text" class="form-control" name="district" placeholder="Kecamatan">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Kota / Kab</label>
                            <input type="text" class="form-control" name="city" placeholder="Kota / Kab">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Provinsi</label>
                            <input type="text" class="form-control" name="province" placeholder="Provinsi">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>No. Telp</label>
                            <input type="number" class="form-control" name="phone_number" placeholder="No. Telp">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Kode Pos</label>
                            <input type="number" class="form-control" name="zip_code" placeholder="Kode Pos">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="border-radius: 100px">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
