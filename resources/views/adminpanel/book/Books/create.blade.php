@extends('adminlayout.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="container">
            <h1>{{ __('Forms.Create_Product_Catgory') }}</h1>
            <br>
            {{-- {{ route('author.store') }} --}}
            <form method="post" action="" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Photo</label>
                    <div class="col-sm-10">
                        <input type="file" name="photo" class="form-control">
                    </div>
                </div>
                <br>
                <div class="form-group ">
                    <input type="text" class="form-control" name="name" placeholder="Name">
                    @error('name')
                        <small class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <br>
                <div class="form-group ">
                    <textarea type="text" class="form-control" name="desc" placeholder="Describe"></textarea>
                    @error('desc')
                        <small class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <br>
                @if ($type == 'downloadable')
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">File</label>
                        <div class="col-sm-10">
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>
                    <br>
                @elseif ($type == 'purchasable')
                    <div class="form-group ">
                        <input type="text" class="form-control" name="price" placeholder="Price">
                        @error('price')
                            <small class="text-muted">{{ $message }}</small>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group ">
                        <input type="text" class="form-control" name="discount" placeholder="Discount">
                        @error('discount')
                            <small class="text-muted">{{ $message }}</small>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group ">
                        <input type="text" class="form-control" name="new_price" placeholder="New Price">
                        @error('discount')
                            <small class="text-muted">{{ $message }}</small>
                        @enderror
                    </div>
                    <br>
                @endif
                <select class="form-select" name="category_id" aria-label="Default select example">
                    <option selected>Category</option>
                    @foreach ($categorys as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <br>
                <select class="form-select" name="publisher_id" aria-label="Default select example">
                    <option selected>Publisher</option>
                    @foreach ($publishers as $publisher)
                        <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                    @endforeach
                </select>
                <br>
                <select class="form-select" name="author_id" aria-label="Default select example">
                    <option selected>Author</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
                <br>
                <button type="submit" class="btn btn-primary">{{ __('Forms.save') }}</button>
            </form>
        </div>
    </div>
@stop
