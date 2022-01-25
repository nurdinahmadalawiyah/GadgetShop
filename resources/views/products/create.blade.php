@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="cold col-md">
            <br>
            <form class="form-inline" style="float: right">
                <div class="form-group mr-1">
                    <a class="btn btn-outline-danger" href="{{ route('products.index',) }}"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
            </form>
            <h2>Tulis Review</h2>
            <br>

            @if(count($errors))
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

            <form action="{{ route('products.review') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="row g-0">
                        <div class="col-md-2">
                            <h6><strong>Rating</strong></h6>
                            <br>
                            <div class="card border mb-3" style="border-radius: 10px">
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="rating" id="rating1" value="5">
                                        <label class="form-check-label" for="rating1">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> 
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="rating" id="rating2" value="4">
                                        <label class="form-check-label" for="rating2">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="rating" id="rating3" value="3">
                                        <label class="form-check-label" for="rating3">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="rating" id="rating4" value="3">
                                        <label class="form-check-label" for="rating4">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="rating" id="rating5" value="1">
                                        <label class="form-check-label" for="rating6">
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>
                                    <h6><strong>Deskripsi</strong></h6>
                                </label>
                                <textarea name="description" class="form-control" id="ckview" rows="3"
                                    placeholder="Deskripsi"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-square"></i>
                        Submit Review</button>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
@endsection
