@extends('adminlayout.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="container">
            <h1>{{ __('Forms.Create_Product_Catgory') }}</h1>
            <br>
            <form method="POST" action="{{ route('adminpanel.product.product_catgory.update', $productcatgorys->id) }}">
                @csrf
                <div class="form-group ">
                    <input type="text" class="form-control" value="{{ $productcatgorys->name_en }}" name="name_en"
                        placeholder="{{ __('Forms.Name_English') }}">
                </div>
                <br>
                <div class="form-group">
                    <input type="text" value="{{ $productcatgorys->name_ar }}" class=" form-control" name="name_ar"
                        placeholder="{{ __('Forms.Name_Arabic') }}">
                </div>
                <br>
                <div class="form-group">
                    <textarea rows="4" cols="50" name="desc_en"
                        placeholder=" {{ __('Forms.Describe_English') }}">{{ $productcatgorys->desc_en }}</textarea>
                </div>
                <br>
                <div class="form-group">
                    <textarea rows="4" cols="50" name="desc_ar"
                        placeholder="{{ __('Forms.Describe_Arabic') }}">{{ $productcatgorys->desc_ar }}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">{{ __('Forms.save') }}</button>
            </form>
        </div>
    </div>
@stop
