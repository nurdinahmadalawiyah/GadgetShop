@extends('layouts.app')

@section('content')
    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item"><a href="/products">List Product</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail {{ $product->name }}</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="cold col-md">
                <form>
                    <div class="card mb-3" style="border-radius: 10px">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ $product->image_url() }}" width="100%" style=" margin: auto; padding: 20px;"
                                    class="img-fluid rounded-start" alt="{{ $product->name }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="row g-0">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <h2><strong>{{ $product->name }}</h2></strong>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group mr-1">
                                                <a class="btn btn-outline-danger" href="{{ route('favorites.add', ['id' => $product['id']]) }}"
                                                    style="border-radius: 100px; float: right"><i
                                                        class="fas fa-heart"></i> Favorite</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        @if ($rating == 1 || $rating < 2)
                                            <i class="fas fa-star" style="color: orange"></i>
                                            <i class="far fa-star" style="color: orange"></i>
                                            <i class="far fa-star" style="color: orange"></i>
                                            <i class="far fa-star" style="color: orange"></i>
                                            <i class="far fa-star" style="color: orange"></i>
                                        @elseif($rating == 2 || $rating < 3)
                                            <i class="fas fa-star" style="color: orange"></i>
                                            <i class="fas fa-star" style="color: orange"></i>
                                            <i class="far fa-star" style="color: orange"></i>
                                            <i class="far fa-star" style="color: orange"></i>
                                            <i class="far fa-star" style="color: orange"></i>
                                            @elseif($rating == 3 || $rating < 4)
                                                <i class="fas fa-star" style="color: orange"></i>
                                                <i class="fas fa-star" style="color: orange"></i>
                                                <i class="fas fa-star" style="color: orange"></i>
                                                <i class="far fa-star" style="color: orange"></i>
                                                <i class="far fa-star" style="color: orange"></i>
                                                @elseif($rating == 4 || $rating < 5)
                                                    <i class="fas fa-star" style="color: orange"></i>
                                                    <i class="fas fa-star" style="color: orange"></i>
                                                    <i class="fas fa-star" style="color: orange"></i>
                                                    <i class="fas fa-star" style="color: orange"></i>
                                                    <i class="far fa-star" style="color: orange"></i>
                                                    @else
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                        <i class="fas fa-star" style="color: orange"></i>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <h3> Rp. {{ number_format($product->price) }} </h3>
                                    </div>
                                    <div class="form-group">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('products.show', ['id' => $product['id']]) }}"
                                            class="social-button btn btn-primary btn-sm" target="_blank"><i
                                                class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('products.show', ['id' => $product['id']]) }}"
                                            class="social-button btn btn-info btn-sm" target="_blank"><i
                                                class="fab fa-twitter"></i>
                                        </a>
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('products.show', ['id' => $product['id']]) }}&amp;title=my share text&amp;summary=dit is de linkedin summary"
                                            class="social-button btn btn-info btn-sm" target="_blank"><i
                                                class="fab fa-linkedin-in"></i>
                                        </a>
                                        <a href="https://wa.me/?text={{ route('products.show', ['id' => $product['id']]) }}"
                                            class="social-button btn btn-success btn-sm" target="_blank"><i
                                                class="fab fa-whatsapp"></i>
                                        </a>
                                    </div>
                                    <div class="form-group">
                                        <div class="mt-4">
                                            <div class="card border mb-3" style="border-radius: 10px">
                                                <div class="card-header bg-transparent">
                                                    <ul class="nav nav-pills card-header-pills">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" href="#description" role="tab"
                                                                data-toggle="tab" style="border-radius: 100px">Deskripsi</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="card-body">
                                                    <div role="tabpanel" class="tab-pane fade in active show"
                                                        id="description">
                                                        {!! $product->description !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{ route('carts.add', ['id' => $product['id']]) }}"
                                                class="btn btn-warning btn-lg" style="border-radius: 100px"><i
                                                    class="fas fa-shopping-cart"></i>
                                                Beli</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3" style="border-radius: 10px">
                        <div class="row g-0">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <div class="row g-0">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <h4><strong>Review</h4></strong>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                                <a href="{{ route('admin.reviews.index') }}" class="link-primary">Lihat Reviews lainnya...</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row g-0">
                                            @foreach ($review as $item)
                                            <div class="col-md-6">
                                                <div class="card border mb-3" style="border-radius: 10px">
                                                    <div class="card-header bg-transparent">
                                                        <a href="#" class="btn btn-primary" style="border-radius: 100px"><i
                                                                class="fas fa-user-circle"></i> {{ $item->name }} </a>
                                                        <a href="#" class="btn btn-warning" style="border-radius: 100px; marginLeft:10px"><i
                                                                class="fas fa-star"></i> {{ $item->rating }}</a>
                                                    </div>
                                                    <div class="card-body">
                                                        <p> {!! $item->description !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @if (Auth::check())
                                    <div class="form-group">
                                        <a href="{{ route('products.create') }}"
                                            class="btn btn-success" style="border-radius: 100px"><i
                                                class="fas fa-edit"></i>
                                            Tulis Review</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
