@extends('auth.layouts.master')

@section('title', 'Категории')

@section('content')
    <div class="col-md-12">
        <h1>@lang('main.projects')</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        @lang('main.name')
                    </th>
                    <th>
                        @lang('main.actions')
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
                                        href="{{ route('project.show', $project) }}">@lang('main.open')</a>
                                    <a class="btn btn-warning" type="button"
                                        href="{{ route('project.edit', $project) }}">@lang('main.edit')</a>
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-danger" type="submit" value="@lang('main.delete')">
                                    <a class="btn btn-success" type="button"
                                        href="{{ route('with_project', $project) }}">@lang('main.task_list')</a>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        {{ $projects->links() }}
        <a class="btn btn-success" type="button" href="{{ route('project.create') }}">@lang('main.add_project')</a>
    </div>
@endsection
