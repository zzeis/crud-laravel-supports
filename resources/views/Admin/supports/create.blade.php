@extends('admin.layouts.app')

@section('title', 'Criar novo Tópico')

@section('header')
    <h1 class="text-lg text-black-500">Nova duvida</h1>
@endsection

@section('content')

   
    <form method="POST" action="{{ route('supports.store') }}">
        {{-- <input type="text" name="_token" value="{{ csrf_token()}}"> --}}
        @include('admin.supports.partials.form')

    </form>
@endsection
