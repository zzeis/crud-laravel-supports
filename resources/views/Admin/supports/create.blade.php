<h1>Nova duvida</h1>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif
<form method="POST" action="{{ route('supports.store') }}">
    {{-- <input type="text" name="_token" value="{{ csrf_token()}}"> --}}
    @csrf()
    <input type="text" placeholder="assunto" name="subject" value="{{old('subject')}}">
    <textarea name="body" cols="30" rows="5" placeholder="descricao">{{old('body')}}</textarea>
    <button type="submit">Enviar</button>
</form>
