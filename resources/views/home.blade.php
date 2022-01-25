@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="jumbotron jumbotron-image shadow"
                    style="background-image: url(https://letstalk-tech.s3.amazonaws.com/wp-content/uploads/2015/11/iPhone-6-cases-roundup-banner-1500x600.jpg); height: 85vh;">
                    <h1 class="mb-4 text-dark" style="text-align: center">
                        <b>Special Offer</b>
                    </h1>
                    <h4 class="mb-4" style="text-align: center">
                        ON MOBILE PHONE <br>
                        UP TO 40% Discount OFF
                    </h4>
                    <center><a href="{{ route('products.index') }}" class="btn btn-dark">Check Our Catalogue</a></center>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
