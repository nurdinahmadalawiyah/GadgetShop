@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row g-0">
            <div class="col-md-9">
                <h2>List Reviews </h2>
            </div>
        </div>

            <div class="form-group">
                <div class="row g-0">
                    @foreach ($reviews as $review)
                    <div class="col-md-6">
                        <div class="card border mb-3" style="border-radius: 10px">
                            <div class="card-header bg-transparent">
                                <a href="" class="btn btn-primary" style="border-radius: 100px"><i
                                        class="fas fa-user-circle"></i> {{ $review->name }} </a>
                                <a href="" class="btn btn-warning" style="border-radius: 100px; marginLeft:10px"><i
                                        class="fas fa-star"></i> {{ $review->rating }}</a>
                            </div>
                            <div class="card-body">
                                <p> {!! $review->description !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
    </div>
@endsection
