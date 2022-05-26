@extends('dashboard.layout')

@section('content')

    <h1>Actualizar Post: {{ $post->title }}</h1>
        
    @include('dashboard.fragment._errors-form')

    <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        @include('dashboard.post._form', ['task' => "edit"])

    </form>

@endsection