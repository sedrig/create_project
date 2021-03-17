@extends('auth.layouts.master')

@section('title', 'Проект ' . $project->name)

@section('content')
    <div class="col-md-12">
        <h1>@lang('main.project')</h1>
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
                    <td>{{ $project->id }}</td>
                </tr>
                <tr>
                    <td>@lang('main.name')</td>
                    <td>{{ $project->name }}</td>
                </tr>
                <tr>
                    <td>@lang('main.generated')</td>
                    <td>{{ $project->created_at }}</td>
                </tr>
                <tr>
                    <td>@lang('main.updated')</td>
                    <td>{{ $project->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
