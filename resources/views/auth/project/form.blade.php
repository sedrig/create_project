@extends('auth.layouts.master')

@isset($projecty)
    @section('title', 'Редагувати проект' . $projecty->name)
    @else
    @section('title', 'Створити проект')
    @endisset



    @section('content')
        <div class="col-md-12">

            @isset($projecty)
                <h1>@lang('main.edit_project')<b>{{ $projecty->name }}</b></h1>
            @else
                <h1>@lang('main.add_project')</h1>
            @endisset
            <form method="POST" enctype="multipart/form-data" @isset($projecty)
            action="{{ route('project.update', $projecty->id) }}" @else action="{{ route('project.store') }}" @endisset>
            <div>
                @isset($projecty)
                    @method('PUT')
                @endisset
                @csrf

                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">@lang('main.name'): </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="name" id="name"
                            value="@isset($projecty){{ $projecty->name }} @endisset">
                    </div>
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
                <br>
                <br>
                <button class="btn btn-success">@lang('main.save')</button>
            </div>
        </form>
    </div>
@endsection
