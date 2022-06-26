@extends('sitelayout.master')

@section('content')
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($authors as $author)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <!-- Product image-->
                        <img class="card-img-top" src="{{ asset("storage/images/author/$author->photo") }}"
                            alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $author->name }}</h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    @for ($i = 0; $i < $author->rate; $i++)
                                        <div class="bi-star-fill"></div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <!-- Product actions-->
                    </div>
                </div>
            @endforeach
           
        </div>
    </div>
    <div class="container">
        <div class="text-center">
            {{ $authors->links() }}
        </div>
    </div>
    </div>
</section>
@stop
