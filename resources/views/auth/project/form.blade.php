@extends('auth.layouts.master')

@isset($projecty)
    @section('title', 'Редактировать категорию' . $projecty->name)
    @else
    @section('title', 'Создать категорию')
    @endisset



    @section('content')
        <div class="col-md-12">

            @isset($projecty)
                <h1>Редагувати проект <b>{{ $projecty->name }}</b></h1>
            @else
                <h1>Додати проект</h1>
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
                    <label for="name" class="col-sm-2 col-form-label">Назва: </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="name" id="name"
                            value="@isset($projecty){{ $projecty->name }} @endisset">
                    </div>
                </div>
                <br>
                <br>
                <button class="btn btn-success">Зберігти</button>
            </div>
        </form>
    </div>
@endsection
