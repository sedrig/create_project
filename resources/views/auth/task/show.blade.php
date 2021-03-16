@extends('auth.layouts.master')

@section('title', 'Категория ' . $task->name)

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
                    <td>{{ $task->id }}</td>
                </tr>
                <tr>
                    <td>Назва завдання</td>
                    <td>{{ $task->name }}</td>
                </tr>
                <tr>
                    <td>Статус проекту</td>
                    <td>{{ $task->status->name }}</td>
                </tr>
                <tr>
                    <td>Назва проекту</td>
                    <td>{{ $task->project->name }}</td>
                </tr>
                <tr>
                    <td>Завантажена картинка</td>

                    <td><img src="{{ Storage::url($task->image) }}" height="240px"></td>
                    <td><a class="btn btn-success" type="button" href="{{ route('download', $task->id) }}">Завантажити
                            картинку</a></td>
                </tr>
                <tr>
                    <td>Створений</td>
                    <td>{{ $task->created_at }}</td>
                </tr>
                <tr>
                    <td>Оновлений</td>
                    <td>{{ $task->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
