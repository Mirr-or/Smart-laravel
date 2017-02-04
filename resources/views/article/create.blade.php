@extends('layouts.app')

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    @else
        <p class="alert alert-success">Успешно опубликовано!</p>
    @endif

    {{ Form::open(['route' => 'news.store']) }}
        @include('article.form', ['btnText' => 'Создать'])
    {{ Form::close() }}
@endsection