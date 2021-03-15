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
                        Назва
                    </th>
                    <th>
                        Дії
                    </th>
                </tr>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>

                        <td>{{ $project->name }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <form action="{{ route('project.destroy', $project) }}" method="post">
                                    <a class="btn btn-success" type="button"
                                        href="{{ route('project.show', $project) }}">Відкрити</a>
                                    <a class="btn btn-warning" type="button"
                                        href="{{ route('project.edit', $project) }}">Редагувати</a>
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-danger" type="submit" value="Видалити">
                                    <a class="btn btn-success" type="button"
                                        href="{{ route('with_project', $project) }}">Список
                                        задач</a>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        {{ $projects->links() }}
        <a class="btn btn-success" type="button" href="{{ route('project.create') }}">Додати проект</a>
    </div>
@endsection
