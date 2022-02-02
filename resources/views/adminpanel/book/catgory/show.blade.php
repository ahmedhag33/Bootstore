@extends('adminlayout.master')

@section('content')

    <div class="container-fluid">
        <div class="container">
            <a href="{{ route('adminpanel.book.catgory.add') }}"
                class="link-primary">{{ __('showpage.CreateNew') }}</a>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">{{ __('showpage.id') }}</th>
                        <th scope="col">{{ __('showpage.name') }}</th>
                        <th scope="col">{{ __('showpage.edit') }}</th>
                        <th scope="col">{{ __('showpage.delete') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productcatgorys as $productcatgory)

                        <tr>
                            <th scope="row">{{ $productcatgory->id }}</th>
                            <td>{{ $productcatgory->name }}</td>
                            <td>
                                <div class="form-group">
                                    <a href="{{ url('adminpanel/book/catgory/edit/' . $productcatgory->id) }}"
                                        class="btn btn-primary mb-2">{{ __('showpage.edit') }}</a>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <a href="{{ url('adminpanel/book/catgory/delete/' . $productcatgory->id) }}"
                                        class="btn btn-primary mb-2">{{ __('showpage.delete') }}</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
