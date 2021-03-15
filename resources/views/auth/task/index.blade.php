@extends('auth.layouts.master')

@section('title', 'Завдання')

@section('content')
    <div class="col-md-12">
        <h1>Завдання</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Назва
                    </th>
                    <th>
                        Дії
                    </th>
                </tr>
                @foreach ($query as $tasks)
                    <tr>
                        <td>{{ $tasks->id }}</td>

                        <td>{{ $tasks->name }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <form action="{{ route('task.destroy', $tasks) }}" method="post">
                                    <a class="btn btn-success" type="button"
                                        href="{{ route('task.show', $tasks) }}">Відкрити</a>
                                    <a class="btn btn-warning" type="button"
                                        href="{{ route('task.edit', $tasks) }}">Редагувати</a>
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-danger" type="submit" value="Видалити">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        {{ $query->links() }}
        <a class="btn btn-success" type="button" href="{{ route('task.create') }}">Додати завдання</a>
    </div>
@endsection
