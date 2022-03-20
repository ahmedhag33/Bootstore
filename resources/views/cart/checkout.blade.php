@extends('sitelayout.master')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            @if (count((array) session('cart')) >= 1)
                <div class="form-group row">
                    <form>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Frist Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Frist Name">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Address">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Phone">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Payment Type</option>
                                <option value="1">Credit card</option>
                                <option value="2">Cash on Delivery</option>
                            </select>
                        </div>
                </div>
                </form>
            @else
                <section class="py-5">
                    <div class="container px-4 px-lg-5 mt-5">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            No Carts Adding yet
                        </div>
                    </div>
                </section>
            @endif
        </div>
    </section>
@stop
