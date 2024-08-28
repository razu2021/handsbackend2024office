@extends('layouts.webmaster')
@section('web_content')
<section class="pagenotfound section-padding">
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 justify-content-center">
            <div class="not_found_page">
                <h1>Oops!</h1>
                <h2>404-Page not Found</h2>
                <button class="btn btn-success p-2 text-white"><a class="text-white p-2" href="{{ url('/') }}">Go Home</a></button>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
