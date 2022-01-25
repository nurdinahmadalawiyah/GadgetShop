@extends('layouts.app')

@section('content')
    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">List Product</li>
            </ol>
        </nav>

        <div class="row g-0">
            <div class="col-md-9">
                <h1>List Products</h1>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select id="order_field" class="custom-select mr-sm-2">
                        <option value="" disabled selected > Urutkan </option>
                        <option value="best_seller">Best Seller</option>
                        <option value="terbaik">Terbaik</option>
                        <option value="termurah">Termurah</option>
                        <option value="termahal">Termahal</option>
                        <option value="terbaru">Terbaru</option>
                    </select>
                </div>
            </div>
        </div>

        <div id="product-list">
            @foreach ($products as $idx => $product)
                @if ($idx == 0 || $idx % 4 == 0)
                    <div class="row mt-4">
                @endif

                <div class="col-md-3">
                    <div class="card-sl">
                        <div class="card-image" style="padding: 10px;">
                            <a href="{{ route('products.show', ['id' => $product->id]) }}"><img src="{{ route('products.image', ['imageName' => $product->image_url]) }}"
                                href="{{ route('products.show', ['id' => $product->id]) }}"class="card-img-top"></a>
                        </div>
                        <div class="card-heading">
                            <a href="{{ route('products.show', ['id' => $product->id]) }}" style="text-decoration:none; color: black;">
                                {{ $product->name }}
                            </a>
                        </div>
                        <div class="card-text-description">
                            {!! $product->description !!}
                        </div>
                        <div class="card-text">
                            <h5><strong>Rp. {{ number_format($product->price) }}</strong></h5>
                        </div>
                        <a href="{{ route('carts.add', ['id' => $product->id]) }}" class="card-button"><i
                                class="fas fa-shopping-cart"> Beli</i></a>
                    </div>
                </div>

                @if ($idx == 0 && $idx % 4 == 3)
        </div>
        @endif
        @endforeach
    </div>
    </div>

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#order_field').change(function() {
                window.location.href = 'products/?order_by=' + $(this).val();
            });
        });
    </script>
@endsection
