@extends('dashboard.layout')

@section('content')

    <h1>Crear Categoría</h1>
        
    @include('dashboard.fragment._errors-form')

    <form action="{{ route('category.store') }}" method="post">
        @csrf
        
        @include('dashboard.category._form')

    </form>

@endsection