@extends('layout.dashboard')
@section('title_page_web', 'Categoria')
@section('title_view', 'Categoria Page')

@section('content')

    <div class="mb-4">
        <a href="{{ route('categoria.create') }}" class="btn" style="background: #96CEB4;">Nuevo registro <i
                class="fas fa-folder-plus"></i></a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria['id'] }}</td>
                    <td>{{ $categoria['nombre'] }}</td>
                    <td>{{ $categoria['descripcion'] }}</td>
                    <td>
                        @if ($categoria['estado'] == 1)
                            <span class="badge badge-success">Activo</span>
                        @else
                            <span class="badge badge-warning">Inactivo</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('categoria.edit', $categoria['id']) }}" class="btn mr-1"
                                style="background: #96CEB4;"><i class="fas fa-edit "></i></a>

                            
                                <form action="{{ route('categoria.destroy', $categoria['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn ml-1" style="background: #96CEB4;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
