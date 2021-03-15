@extends('auth.layouts.master')

@section('title', 'Категория ' . $project->name)

@section('content')
    <div class="col-md-12">
        <h1>Проект </h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>
                        Поле
                    </th>
                    <th>
                        Значення
                    </th>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>{{ $project->id }}</td>
                </tr>
                <tr>
                    <td>Назва</td>
                    <td>{{ $project->name }}</td>
                </tr>
                <tr>
                    <td>Створений</td>
                    <td>{{ $project->created_at }}</td>
                </tr>
                <tr>
                    <td>Оновлений</td>
                    <td>{{ $project->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
