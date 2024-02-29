<h1>Nova duvida</h1>
<x-alert />
<form method="POST" action="{{ route('supports.store') }}">
    {{-- <input type="text" name="_token" value="{{ csrf_token()}}"> --}}
    @include('admin.supports.partials.form')

</form>
