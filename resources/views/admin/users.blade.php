@extends('auth.layouts.master')

@section('title', 'Категории')

@section('content')
    <div class="col-md-12">
        <h1>Проекти</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Ім'я
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Чи це адміністратор
                    </th>
                    <th>
                        Час створення
                    </th>
                    <th>
                        Час оновлення
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
