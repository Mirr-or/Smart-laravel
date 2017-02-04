@extends('layouts.app')

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    @endif
    
    {{ Form::model($article, ['route' => ['news.update', 'article' => $article->slug], 'method' => 'put']) }}
    @include('article.form', ['btnText' => 'Обновить'])
    {{ Form::close() }}
@endsection

