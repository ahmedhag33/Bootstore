@extends('adminlayout.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="container">
            <h1>{{ __('Forms.Create_Product_Catgory') }}</h1>
            <br>
            <form method="post" action="{{ route('publisher.update', $publishers->id) }}">
                @method('PUT')
                @csrf
        </div>
        <div class="form-group ">
            <input type="text" class="form-control" value="{{ $publishers->name_en }}" name="name_en"
                placeholder="{{ __('Forms.Name_English') }}">
        </div>
        <br>
        <div class="form-group">
            <input type="text" value="{{ $publishers->name_ar }}" class=" form-control" name="name_ar"
                placeholder="{{ __('Forms.Name_Arabic') }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">{{ __('Forms.save') }}</button>
        </form>
    </div>
    </div>
@stop
