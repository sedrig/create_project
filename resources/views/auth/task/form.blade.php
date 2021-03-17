@extends('auth.layouts.master')

@isset($tasky)
    @section('title', 'Редагувати задачу' . $tasky->name)
    @else
    @section('title', 'Створити задачу')
    @endisset



    @section('content')
        <div class="col-md-12">

            @isset($tasky)
                <h1>@lang('main.edit') <b>{{ $tasky->name }}</b></h1>
            @else
                <h1>@lang('main.add_task')</h1>
            @endisset
            <form method="POST" enctype="multipart/form-data" @isset($tasky) action="{{ route('task.update', $tasky->id) }}"
            @else action="{{ route('task.store') }}" @endisset>
            <div>
                @isset($tasky)
                    @method('PUT')
                @endisset
                @csrf

                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">@lang('main.name_task'): </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="name" id="name"
                            value="@isset($tasky){{ $tasky->name }} @endisset">
                    </div>
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
                <br>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">@lang('main.status_task'): </label>
                    <div class="col-sm-6">
                        <select name="status_id" id="statust_id" class="form-control">
                            @foreach ($status as $stat)
                                <option value="{{ $stat->id }}" @isset($tasky) @if ($tasky->status_id == $stat->id) selected @endif
                                @endisset>{{ $stat->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('status_id')
                    {{ $message }}
                @enderror
            </div>

            <div class="input-group row">

                <div class="col-sm-6">
                    <input type="hidden" class="form-control" name="project_id" id="name" value="{{ $id }}">

                </div>
            </div>
            <br>
            <br>
            <div class="input-group row">
                <label for="image" class="col-sm-2 col-form-label">@lang('main.picture'): </label>
                <div class="col-sm-10">
                    <label class="btn btn-default btn-file">
                        @lang('main.upload') <input type="file" style="display: none;" name="image" id="image">
                    </label>
                </div>

            </div>
            <br>
            <br>
            <button class="btn btn-success">@lang('main.save')</button>
        </div>
    </form>
</div>
@endsection
