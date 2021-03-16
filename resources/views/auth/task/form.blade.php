@extends('auth.layouts.master')

@isset($tasky)
    @section('title', 'Редактировать категорию' . $tasky->name)
    @else
    @section('title', 'Создать категорию')
    @endisset



    @section('content')
        <div class="col-md-12">

            @isset($tasky)
                <h1>Редагувати завдання <b>{{ $tasky->name }}</b></h1>
            @else
                <h1>Додати завдання</h1>
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
                    <label for="name" class="col-sm-2 col-form-label">Назва: </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="name" id="name"
                            value="@isset($tasky){{ $tasky->name }} @endisset">
                    </div>
                </div>
                <br>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Статус завдання: </label>
                    <div class="col-sm-6">
                        <select name="status_id" id="statust_id" class="form-control">
                            @foreach ($status as $stat)
                                <option value="{{ $stat->id }}" @isset($task) @if ($task->category_id == $task->id) selected @endif
                                @endisset>{{ $stat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="input-group row">

                <div class="col-sm-6">
                    <input type="hidden" class="form-control" name="project_id" id="name" value="{{ $id }}">

                </div>
            </div>
            <br>
            <br>
            <div class="input-group row">
                <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                <div class="col-sm-10">
                    <label class="btn btn-default btn-file">
                        Загрузить <input type="file" style="display: none;" name="image" id="image">
                    </label>
                </div>
            </div>
            <br>
            <br>
            <button class="btn btn-success">Зберігти</button>
        </div>
    </form>
</div>
@endsection
