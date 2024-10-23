@extends('layout.dashboard')
@section('title_page_web', 'Promocion')
@section('title_view', 'Promocion Create')

@section('content')

    <div class="mb-4">
        <a href="{{ route('promocion.index') }}" class="btn" style="background: #96CEB4;"><i class="fas fa-arrow-left"></i>
            Regresar</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        <div class="col-6">
            <div class="card pt-2 pb-5 px-4">
                <form action="{{route('promocion.store')}}" method="POST">
                    @csrf
                    <div class="container mt-4">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea id="descripcion" name="descripcion" class="form-control" rows="3" required></textarea>
                        </div>

                        <button type="submit" class="btn" style="background: #96CEB4;"><i class="fas fa-save"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
