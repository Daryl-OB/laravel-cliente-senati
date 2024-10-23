@extends('layout.dashboard')

{{-- TITULO DE LA PAGINA WEB --}}
@section('title_page_web', 'TITULO DE LA PAGINA WEB')

{{-- TITULO DE LA VISTA --}}
@section('title_view', 'VISTA CATEGORIA')

{{-- CONTENIDO DE LA PAGINA --}}
@section('content')
    <form action="{{route('categorias.store')}}" method="post">
        @csrf
        <input type="text" name="user_id" value="{{ Session::get('user.id') }}">
        <br>
        <input type="text" name="nombre">
        <br>
        <button type="submit">Crear</button>
    </form>
@endsection()