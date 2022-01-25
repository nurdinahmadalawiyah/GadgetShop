@extends('layouts.admin')

@section('content')
<div class="container col-md-10">
    <div class="row justify-content-center">
        <div class="col">
            <br>
            <h2>Product</h2>
            <div class="row g-0">
                <div class="col-md-9">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary"><i class="fas fa-plus-square"></i> Tambah Produk</a>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select id="order_field" class="custom-select mr-sm-2">
                            <option value="" disabled selected> Urutkan </option>
                            <option value="best_seller">Best Seller</option>
                            <option value="terbaik">Terbaik</option>
                            <option value="termurah">Termurah</option>
                            <option value="termahal">Termahal</option>
                            <option value="terbaru">Terbaru</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card" style="padding-right: 10px; padding-left: 10px;">
                <div class="table-responsive">
                    <table class="table table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Created at</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>Rp. {{ number_format($product->price) }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        {{-- <img src="{{ $product->image_url() }}" width="75px">   --}}
                                        <img src="{{ route('products.image', ['imageName' => $product->image_url]) }}" width="75px"> 
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{ route('admin.products.edit', $product->id) }}"><i class="fas fa-edit"></i> Edit</a>
                                        <a class="btn btn-sm btn-success" href="{{ route('admin.products.show', $product->id) }}"><i class="fas fa-eye"></i> Show</a>
                                        <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')"> <i class="fas fa-trash-alt"></i> Delete</button>
                                        </form>
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

   <!-- Jquery -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script type="text/javascript">
       $(document).ready(function(){
           $('#order_field').change(function() {
            window.location.href = 'products/?order_by=' + $(this).val();
           });
       });
   </script>
@endsection