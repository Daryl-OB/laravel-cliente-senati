@extends('layout.dashboard')
@section('title_page_web', 'Cliente')
@section('title_view', 'Cliente Page')

@section('content')
    <div class="mb-4">
        <a href="{{ route('cliente.create') }}" class="btn" style="background: #96CEB4;">Nuevo registro <i
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
                <th>DNI</th>
                <th>Nombre completo</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente['id'] }}</td>
                    <td>{{ $cliente['dni'] }}</td>
                    <td>{{ $cliente['nombre'] }} {{ $cliente['ap_paterno'] }} {{$cliente['ap_materno'] }}</td>
                    <td>{{ $cliente['telefono'] }}</td>
                    <td>{{ $cliente['direccion'] }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('cliente.edit', $cliente['id']) }}" class="btn mr-1"
                                style="background: #96CEB4;"><i class="fas fa-edit "></i></a>

                            <form action="{{ route('cliente.destroy', $cliente['id']) }}" method="POST">
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
