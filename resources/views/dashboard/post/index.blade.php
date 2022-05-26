@extends('dashboard.layout')

@section('content')

    <a href="{{ route("post.create") }}">Crear</a>

    <table>
        <thead>
            <tr>
            <th>Título</th> 
            <th>Categoría</th> 
            <th>Posted</th> 
            <th>Acciones</th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $p)
                <tr>
                    <td>{{ $p->title }}</td> 
                    <td>{{ $p->category->title }}</td> 
                    <td>{{ $p->posted }}</td> 
                    <td>
                        <a href="{{ route("post.edit", $p) }}">Editar</a>
                        <a href="{{ route("post.show", $p) }}">Ver</a>
                        <form action="{{ route("post.destroy", $p) }}" method="POST">
                            @method("DELETE")
                            @csrf
                            <button type="submit">Eliminar</button>
                        </form>
                    </td> 
                </tr>
            @endforeach
        </tbody>
    </table>

{{ $posts->links() }}

@endsection