@extends('auth.layouts.master')

@section('title', 'Категории')

@section('content')
    <div class="col-md-12">
        <h1>@lang('main.users')</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        @lang('main.name_us')
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        @lang('main.administration')
                    </th>
                    <th>
                        @lang('main.generated')
                    </th>
                    <th>
                        @lang('main.updated')
                    </th>
                </tr>
                @foreach ($query as $value)
                    <tr>
                        <td>{{ $value->id }}</td>

                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->status_user($value->id) }}</td>
                        <td>{{ $value->created_at }}</td>
                        <td>{{ $value->updated_at }}</td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        {{ $query->links() }}

    </div>
@endsection
