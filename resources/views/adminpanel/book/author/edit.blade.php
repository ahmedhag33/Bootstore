@extends('adminlayout.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="container">
            <h1>{{ __('Forms.Create_Product_Catgory') }}</h1>
            <br>
            <form method="post" action="{{ route('author.update', $authors->id) }}">
                @method('PUT')
                @csrf
        </div>
        <div class="form-group ">
            <input type="text" class="form-control" value="{{ $authors->rate }}" name="rate"
                placeholder="{{ __('showpage.rate') }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">{{ __('Forms.save') }}</button>
        </form>
    </div>
    </div>
@stop
