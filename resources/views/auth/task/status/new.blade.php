@extends('auth.layouts.master')

@section('title', 'Завдання')

@section('content')
    <div class="col-md-12">
        <h1>Завдання New</h1>
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
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>

                        <td>{{ $task->name }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <form action="{{ route('task.destroy', $task) }}" method="post">
                                    <a class="btn btn-success" type="button"
                                        href="{{ route('task.show', $task, $sid) }}">Відкрити</a>
                                    <a class="btn btn-warning" type="button"
                                        href="{{ route('task_edit', ['pid' => $task->id, 'sid' => $sid]) }}">Редагувати</a>
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
        {{ $tasks->links() }}
        <a class="btn btn-success" type="button" href="{{ route('task_create', $sid) }}">Додати завдання</a>
    </div>
@endsection
