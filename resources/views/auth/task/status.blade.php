@extends('auth.layouts.master')

@section('title', 'Статус')

@section('content')
    @foreach ($status as $item)
        <br>
        <div class="btn-group" role="group">
            <a class="btn btn-success" type="button"
                href="{{ route('status_project', ['pid' => $item->id, 'sid' => $id]) }}">{{ $item->name }}</a>

        </div>
    @endforeach


@endsection
