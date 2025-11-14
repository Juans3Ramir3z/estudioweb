@extends('layouts.app')
@section('content')
<h1>Detalle</h1>
<p>Nombre: {{ $student->name }}</p>
<p>Email: {{ $student->email }}</p>
<p>Edad: {{ $student->age }}</p>
<a href="{{ route('students.index') }}">Volver</a>
@endsection