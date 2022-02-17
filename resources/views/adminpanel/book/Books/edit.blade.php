@extends('adminlayout.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="container">
            <h1>{{ __('Forms.Create_Product_Catgory') }}</h1>
            <br>
            <form method="post" action="            {{ route('adminpanel.book.books.update', $books[0]->id) }}
                        " enctype="multipart/form-data">
                @csrf
                <br>
                <div class="form-group ">
                    <input type="text" value="{{ $books[0]->name }}" class="form-control" name="name" placeholder="Name">
                    @error('name')
                        <small class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <br>
                <div class="form-group ">
                    <textarea type="text" class="form-control" name="desc"
                        placeholder="Describe">                                                                                                                                      {{ $books[0]->desc }}                                                                                                                                </textarea>
                    @error('desc')
                        <small class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <br>
                <div class="form-group ">
                    <input type="text" value="{{ $books[0]->rate }}" class="form-control" name="rate" placeholder="Rate">
                    @error('Rate')
                        <small class="text-muted">{{ $message }}</small>
                    @enderror
                </div>
                <br>
                @if ($books[0]->type == 'purchasable')
                    <div class="form-group ">
                        <input type="number" value="{{ $books[0]->price }}" class="form-control" name="price"
                            placeholder="Price">
                        @error('price')
                            <small class="text-muted">{{ $message }}</small>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group ">
                        <input type="number" value="{{ $books[0]->discount }}" value="0" class="form-control"
                            name="discount" placeholder="Discount">
                        @error('discount')
                            <small class="text-muted">{{ $message }}</small>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group ">
                        <input type="number" value="{{ $books[0]->new_price }}" class="form-control" name="new_price"
                            placeholder="New Price">
                        @error('new_price')
                            <small class="text-muted">{{ $message }}</small>
                        @enderror
                    </div>
                    <br>
                @endif
                <select class="form-select" name="category_id" aria-label="Default select example">
                    <option value="{{ $books[0]->category_id }}" selected>{{ $books[0]->categorys->name }}</option>
                    {{-- {{ $books[0]->categorys->name }} --}}
                    @foreach ($categorys as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <br>
                <select class="form-select" name="publisher_id" aria-label="Default select example">
                    <option value="{{ $books[0]->publisher_id }}" selected>{{ $books[0]->publishers->name }}</option>
                    @foreach ($publishers as $publisher)
                        <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                    @endforeach
                </select>
                <br>
                <select class="form-select" name="author_id" aria-label="Default select example">
                    <option value="{{ $books[0]->author_id }}" selected>{{ $books[0]->authors->name }}</option>
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
