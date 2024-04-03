
@extends('admin.layouts.app')

@section('title',"Editar A Dúvida {$support->subject}")

@section('header')
<h1 class="text-lg text-black-500">Dúvida {{ $support->subject }}</h1>
@endsection

@section('content')
  

<form method="POST" action="{{ route('supports.update', $support->id) }}">
    {{-- <input type="text" name="_token" value="{{ csrf_token()}}"> --}}
    @method('put')
    @include('admin.supports.partials.form', ['support' => $support])
</form>
@endsection
