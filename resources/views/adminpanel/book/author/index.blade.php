@extends('adminlayout.master')

@section('content')

    <div class="container-fluid">
        <div class="container">
            <a href="{{ route('author.create') }}" class="link-primary">{{ __('showpage.CreateNew') }}</a>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">{{ __('showpage.id') }}</th>
                        <th scope="col">{{ __('showpage.name') }}</th>
                        <th scope="col">{{ __('showpage.desc') }}</th>
                        <th scope="col">{{ __('showpage.rate') }}</th>
                        <th scope="col">{{ __('showpage.photo') }}</th>
                        <th scope="col">{{ __('showpage.edit') }}</th>
                        <th scope="col">{{ __('showpage.delete') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($authors as $author)
                        <tr>
                            <th scope="row">{{ $author->id }}</th>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->desc }}</td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="ratings">
                                        @for ($i = 0; $i < $author->rate; $i++)
                                            <i class="fa fa-star rating-color"></i>
                                        @endfor
                                    </div>
                                </div>
                            </td>
                            <td><img style="width: 90px; height: 90px;"
                                    src="{{ asset("storage/images/author/$author->photo") }}">
                            <td>
                                <div class="form-group">
                                    <a href="{{ url('adminpanel/book/author/' . $author->id . '/edit') }}"
                                        class="btn btn-primary mb-2">{{ __('showpage.edit') }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <form action=" {{ route('author.destroy', $author->id) }}" method="post">
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
            <div class="container">
                <div class="text-center">
                    {{ $authors->links() }}
                </div>
            </div>
        </div>
    </div>
@stop
