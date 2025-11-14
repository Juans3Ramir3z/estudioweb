@extends('layouts.app')

@section('content')

<h1>Lista de Estudiantes</h1>

<a href="{{ route('students.create') }}">Nuevo Estudiante</a>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<table>
<thead>
<tr>
    <th>Nombre</th>
    <th>Email</th>
    <th>Edad</th>
    <th>Acciones</th>
</tr>
</thead>

<tbody>
@foreach($students as $s)
<tr>
  <td>{{ $s->name }}</td>
  <td>{{ $s->email }}</td>
  <td>{{ $s->age }}</td>
  <td>
    <a href="{{ route('students.show', $s->id) }}">Ver</a>
    <a href="{{ route('students.edit', $s->id) }}">Editar</a>

    <form action="{{ route('students.destroy', $s->id) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Eliminar?')">Eliminar</button>
    </form>
  </td>
</tr>
@endforeach
</tbody>
</table>

@endsection