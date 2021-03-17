@extends('auth.layouts.master')

@section('title', 'Задача ' . $task->name)

@section('content')
    <div class="col-md-12">
        <h1>@lang('main.task') </h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>
                        @lang('main.field')
                    </th>
                    <th>
                        @lang('main.value')
                    </th>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>{{ $task->id }}</td>
                </tr>
                <tr>
                    <td>@lang('main.name_task')</td>
                    <td>{{ $task->name }}</td>
                </tr>
                <tr>
                    <td>@lang('main.status_task')</td>
                    <td>{{ $task->status->name }}</td>
                </tr>
                <tr>
                    <td>@lang('main.name_project')</td>
                    <td>{{ $task->project->name }}</td>
                </tr>
                <tr>
                    <td>@lang('main.download_picture')</td>

                    <td><img src="{{ Storage::url($task->image) }}" height="240px"></td>
                    <td><a class="btn btn-success" type="button"
                            href="{{ route('download', $task->id) }}">@lang('main.download')</a></td>
                </tr>
                <tr>
                    <td>@lang('main.generated')</td>
                    <td>{{ $task->created_at }}</td>
                </tr>
                <tr>
                    <td>@lang('main.updated')</td>
                    <td>{{ $task->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
