@extends('sitelayout.master')

@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($books as $book)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            @if ($book->type == 'purchasable')
                                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                    Sale
                                </div>
                            @endif
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ asset("storage/images/author/$book->photo") }}"
                                alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $book->name }}</h5>
                                    <p>{{ $book->authors->name }}</p>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        @for ($i = 0; $i < $book->rate; $i++)
                                            <div class="bi-star-fill"></div>
                                        @endfor
                                    </div>
                                    <!-- Product price-->
                                    {{-- <span class="text-muted text-decoration-line-through">$20.00</span> --}}
                                    {{ $book->price }}
                                </div>
                            </div>
                            <!-- Product actions-->
                            @if ($book->type == 'purchasable')
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    {{-- <div class="text-center"><a class="btn btn-danger"
                                            href="{{ route('add.to.cart', $book->id) }}">Add to
                                            cart</a>
                                    </div> --}}
                                    <div class="text-center"><a class="btn btn-danger" book_id="{{ $book->id }}"
                                            id="add_btn">Add to
                                            cart</a>
                                    </div>
                                </div>
                            @else
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-dark" href="#">
                                            Notify me when purchase is available
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Popular Item</h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                $40.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="container">
            <div class="text-center">
                {{ $books->links() }}
            </div>
        </div>
        </div>
    </section>
@section('scripts')
    <script>
        $(document).on('click', '#add_btn', function(e) {
            e.preventDefault();
            var book_id = $(this).attr('book_id');
            $.ajax({
                type: 'post',
                url: "{{ route('add.cart') }}",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': book_id
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });
    </script>
@stop
@stop
