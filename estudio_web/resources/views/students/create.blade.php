@extends('layouts.app')

@section('content')
<h1>Nuevo Estudiante</h1>

@if ($errors->any())
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

<form action="{{ route('students.store') }}" method="POST">
  @csrf
  <label>Nombre</label>
  <input type="text" name="name" value="{{ old('name') }}">
  <label>Email</label>
  <input type="email" name="email" value="{{ old('email') }}">
  <label>Edad</label>
  <input type="number" name="age" value="{{ old('age') }}">
  <button type="submit">Guardar</button>
</form>
@endsection