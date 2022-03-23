@extends('sitelayout.master')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="alert alert-primary" role="alert" id="success_msg" style="display: none">
                Succes Save Data
            </div>
            @if (count((array) session('cart')) >= 1)
                <div class="form-group row">
                    <form method="POST" id="checkoutForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Frist Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="first_name" class="form-control" placeholder="Frist Name">
                                @error('first_name')
                                    <small id="first_name_error" class="text-muted">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                                @error('last_name')
                                    <small id="last_name_error" class="text-muted">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="address" class="form-control" placeholder="Address">
                                @error('address')
                                    <small id="address_error" class="text-muted">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" name="mobile" class="form-control" placeholder="Phone">
                                @error('mobile')
                                    <small id="mobile_error" class="text-muted">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <select class="form-select" name="paymenttype" aria-label="Default select example">
                                <option selected>Payment Type</option>
                                @foreach ($paymenttypes as $paymenttype)
                                    <option value="{{ $paymenttype }}">{{ $paymenttype }}
                                    </option>
                                @endforeach
                            </select>
                            @error('paymenttype')
                                <small id="paymenttype_error" class="text-muted">{{ $message }}</small>
                            @enderror
                        </div><br>
                        <div class="form-group row">
                            <button id="checkout" class="btn btn-primary mb-2">
                                Save</button>
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
@section('scripts')
    <script type="text/javascript">
        $(document).on('click', '#checkout', function(e) {
            e.preventDefault();
            $('#first_name_error').text('');
            $('#last_name_error').text('');
            $('#address_error').text('');
            $('#mobile_error').text('');
            $('#paymenttype_error').text('');
            var formData = new FormData($('#checkoutForm')[0]);
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: '{{ route('cart.store') }}',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    if (data.status == true) {
                        $('#success_msg').show();
                    }
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            });
        });
    </script>
@stop
