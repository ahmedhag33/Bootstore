@extends('adminlayout.master')

@section('content')

    <div class="container-fluid">
        <div class="container">
            <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    {{ __('showpage.CreateNew') }}
                </button>
                <div class="dropdown-menu">
                    @foreach ($types as $key => $value)
                        <a class="dropdown-item"
                            href="{{ route('adminpanel.book.books.create', $key) }}">{{ $value }}</a>
                    @endforeach
                </div>
            </div>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">{{ __('showpage.id') }}</th>
                        <th scope="col">{{ __('showpage.name') }}</th>
                        <th scope="col">Category</th>
                        <th scope="col">Publisher</th>
                        <th scope="col">Author</th>
                        <th scope="col">Type</th>
                        <th scope="col">{{ __('showpage.desc') }}</th>
                        <th scope="col">{{ __('showpage.rate') }}</th>
                        <th scope="col">{{ __('showpage.photo') }}</th>
                        <th scope="col">File</th>
                        <th scope="col">Price</th>
                        <th scope="col">discount</th>
                        <th scope="col">New Price</th>
                        <th scope="col">{{ __('showpage.edit') }}</th>
                        <th scope="col">{{ __('showpage.delete') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <th scope="row">{{ $book->id }}</th>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->categorys->name }}</td>
                            <td>{{ $book->publishers->name }}</td>
                            <td>{{ $book->authors->name }}</td>
                            <td>{{ $book->type }}</td>
                            <td>{{ $book->desc }}</td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="ratings">
                                        @for ($i = 0; $i < $book->rate; $i++)
                                            <i class="fa fa-star rating-color"></i>
                                        @endfor
                                    </div>
                                </div>
                            </td>
                            <td><img style="width: 90px; height: 90px;"
                                    src="{{ asset("storage/images/author/$book->photo") }}">
                            </td>
                            <td><embed src="{{ asset("storage/pdf/$book->file") }}" frameborder="0" width="100%"
                                    height="100px">
                            </td>
                            <td>{{ $book->price }}</td>
                            <td>{{ $book->discount }}</td>
                            <td>{{ $book->new_price }}</td>
                            <td>
                                <div class="form-group">
                                    <a href="{{ url('adminpanel/book/books/edit/' . $book->id) }}"
                                        class="btn btn-primary mb-2">{{ __('showpage.edit') }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <form action=" {{ route('adminpanel.book.books.destroy', $book->id) }}"
                                        method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-primary mb-2"
                                            type="submit">{{ __('showpage.delete') }}</button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
