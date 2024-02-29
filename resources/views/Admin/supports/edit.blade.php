<h1>Dúvida {{ $support->id }}</h1>
<x-alert />
<form method="POST" action="{{ route('supports.update', $support->id) }}">
    {{-- <input type="text" name="_token" value="{{ csrf_token()}}"> --}}
    @method('put')
    @include('admin.supports.partials.form', ['support' => $support])
</form>
