@extends('user.layout.master')

@section('title', 'Home Page')


@section('content')
    <!-- Main Section Start -->

    <div class="">
        <div class="cover-image">
            <a href="#">
                <div class="text animate__animated animate__fadeIn">
                    <h4>ဆရာကြီး လယ်တွင်းသားစောချစ်</h4>
                    <h5>၏</h5>
                    <i>
                        <h1>ပန်းမြိုင်လယ်မှ ဥယာဥ်မှူး</h1>
                    </i>
                </div>
                <div class="cover-book animate__animated animate__fadeIn">
                    <img src="{{ asset('storage/image/ပန်းမြိုင်လယ်မှ ဥယာဥ်မှူး.jpeg') }}" class="img-thumbnail">
                </div>
            </a>
        </div>
    </div>

    <section class="menu row mt-3">
        <div class="col-6 offset-3 text-center shadow-sm menu-box">
            <ul class="row list-unstyled mt-3">
                <li class="col menu-item {{ Request::is('user/homePage') ? 'active' : '' }}">
                    <a href="{{ route('user#home') }}">All</a>
                </li>
                @foreach ($category as $c)
                    <li class="col menu-item {{ Request::is('user/filter/' . $c->id) ? 'active' : '' }}">
                        <a href="{{ route('user#filter', $c->id) }}" class="menu-text">{{ $c->name }}</a>
                    </li>
                @endforeach

            </ul>
        </div>
    </section>
    <!-- Books Section Start -->
    <div class="row mt-5">
        <div class="col-8 offset-2">
            <div class="main-box row text-center">
                @if (count($data) != 0)
                    @foreach ($data as $b)
                        <div class="item-box col-lg-3 col-md-4 col-sm-6 mb-5 shadow py-3 rounded" data-aos="fade-up">
                            <a href="{{ route('user#detailsBook', $b->id) }}" class="text-decoration-none text-dark ">
                                <div class="">
                                    <img src="{{ asset('storage/' . $b->image) }}" class="img-thumbnail">
                                    <div class="book-info mt-2 mb-sm-5 ">
                                        <h4 class="text-warning my-3">{{ $b->author }}</h4>
                                        <p class="text-warning ">{{ $b->name }}</p>

                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <h1 class="text-center text-danger mt-5">There is no {{ request('key') }} here!</h1>
                @endif

            </div>
        </div>
    </div>
    <!-- Books Section End -->
@endsection
