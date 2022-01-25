@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Favorite</li>
        </ol>
    </nav>
    
    <h1>List Favorite</h1>
    <div class="card" style="padding-left: 10px; padding-right: 10px; border-radius: 10px">
        <table id="favorite" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Product</th>
                    <th style="width:40%">Price</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody>

                <?php $total = 0 ?>

                @if(session('favorite'))
                @foreach (session('favorite') as $id => $product)

                <?php $total += $product['price'] * $product['quantity'] ?>

                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ route('products.image', ['imageName' => $product['image_url']]) }}" width="75" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h5 class="nomargin">{{ $product['name'] }}</h5>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">Rp. {{ number_format($product['price']) }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm mt-2 remove-from-favorite" data-id="{{ $id }}"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
                @endif

            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <a href="{{ url('/products') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Lanjutkan Belanja</a>
                    </td>
                    <td colspan="2" class="hidden-xs"></td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".remove-from-favorite").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ route('favorites.remove') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    });

</script>
@endsection