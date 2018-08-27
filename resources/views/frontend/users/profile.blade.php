@extends('frontend.layouts.app')

@section('title')
{{auth()->user()->name}}'s Profile  | {{ app_name() }}
@stop


@section('content')

<div class="page-header page-header-small" filter-color="orange">
    <div class="page-header-image" data-parallax="true" style="background-image: url('{{asset('img/cover-01.jpg')}}');">
    </div>
    <div class="container">
        <div class="content-center">
            <div class="photo-container">
                <img src="{{asset('photos/avatars/'.auth()->user()->avatar)}}" alt="{{auth()->user()->name}}">
            </div>
            <h3 class="title">{{auth()->user()->name}}</h3>
            <p class="category">{{auth()->user()->email}}</p>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="button-container">
            <a href="{{ route('frontend.users.profileEdit') }}" class="btn btn-primary btn-round btn-lg">Edit Profile</a>
            <a href="#" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="" data-original-title="Follow me on Twitter">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="" data-original-title="Follow me on Instagram">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
        <h3 class="title">About me</h3>
        <h5 class="description">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in magna pharetra, varius nisi id, porta augue. Sed lobortis non enim vel cursus. Duis et massa vitae justo cursus finibus. In hac habitasse platea dictumst. Duis laoreet condimentum magna a tincidunt. Nullam in molestie nibh. Fusce lectus ipsum, feugiat non scelerisque bibendum, rutrum id sapien.
        </h5>
    </div>
</div>

@endsection
