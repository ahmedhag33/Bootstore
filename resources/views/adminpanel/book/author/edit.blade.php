@extends('adminlayout.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="container">
            <h1>{{ __('Forms.Create_Product_Catgory') }}</h1>
            <br>
            <form method="post" action="{{ route('author.update', $authors->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Photo</label>
                    <div class="col-sm-10">
                        <img src="{{ asset("storage/images/author/$authors->photo ") }}" width="150">
                        <br>
                        <input type="file" name="photo" class="form-control">
                    </div>
                </div>
                <br>
                <div class="form-group ">
                    <input type="text" class="form-control" value="{{ $authors->name_en }}" name="name_en"
                        placeholder="{{ __('Forms.Name_English') }}">
                    @error('name_en')
                        <small class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <br>
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $authors->name_ar }}" name="name_ar"
                        placeholder="{{ __('Forms.Name_Arabic') }}">
                    @error('name_ar')
                        <small class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <br>
                <div class="form-group ">
                    <textarea type="text" class="form-control" name="desc_en"
                        placeholder="{{ __('Forms.Describe_English') }}">
                                                {{ $authors->desc_en }}
                                            </textarea>
                    @error('desc_en')
                        <small class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <br>
                <div class="form-group ">
                    <textarea class="form-control" name="desc_ar" placeholder="{{ __('Forms.Describe_Arabic') }}">
                                               {{ $authors->desc_ar }}
                                            </textarea>
                    @error('desc_ar')
                        <small class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <br>
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
