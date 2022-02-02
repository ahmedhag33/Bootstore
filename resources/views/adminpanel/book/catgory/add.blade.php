@extends('adminlayout.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="container">
            <h1>{{ __('Forms.Create_Product_Catgory') }}</h1>
            <br>
            <form method="POST" action="{{ route('adminpanel.book.catgory.create') }}">
                @csrf
                <div class="form-group ">
                    <input type="text" class="form-control" name="name_en" placeholder="{{ __('Forms.Name_English') }}">
                    @error('name_en')
                        <small class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <br>
                <div class="form-group">
                    <input type="text" class="form-control" name="name_ar" placeholder="{{ __('Forms.Name_Arabic') }}">
                    @error('name_ar')
                        <small class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary">{{ __('Forms.save') }}</button>
            </form>
        </div>
    </div>
@stop
