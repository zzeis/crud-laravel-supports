@extends('admin.layouts.app')

@section('title',"Editar A Dúvida {$support->subject}")

@section('header')
<h1 class="text-lg text-black-500">Dúvida {{ $support->subject }}</h1>
@endsection

@section('content')
<ul>
    <li>Assunto: {{$support->subject}}</li>
    <li>Status: {{$support->status}}</li>
    <li>Descrição: {{$support->body}}</li>
</ul>

<form action="{{route('supports.destroy', $support->id)}}" method="POST">
    @csrf()
    @method('delete')
    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">deletar</button>
</form>

@endsection