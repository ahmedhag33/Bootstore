@extends('adminlayout.master')

@section('content')

    <div class="container-fluid">
        <div class="container">
            <a href="{{ route('publisher.create') }}" class="link-primary">{{ __('showpage.CreateNew') }}</a>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">{{ __('showpage.id') }}</th>
                        <th scope="col">{{ __('showpage.name') }}</th>
                        <th scope="col">{{ __('showpage.photo') }}</th>
                        <th scope="col">{{ __('showpage.edit') }}</th>
                        <th scope="col">{{ __('showpage.delete') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($publishers as $publisher)
                        <tr>
                            <th scope="row">{{ $publisher->id }}</th>
                            <td>{{ $publisher->name }}</td>
                            <td><img style="width: 90px; height: 90px;"
                                    src="{{ asset("storage/images/publisher/$publisher->photo") }}">
                            <td>
                                <div class="form-group">
                                    <a href="{{ url('adminpanel/book/publisher/' . $publisher->id . '/edit') }}"
                                        class="btn btn-primary mb-2">{{ __('showpage.edit') }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <form action=" {{ route('publisher.destroy', $publisher->id) }}" method="post">
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
