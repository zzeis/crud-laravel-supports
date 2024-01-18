<h1>Nova duvida</h1>

<form method="POST" action="{{route('supports.store')}}">
    {{-- <input type="text" name="_token" value="{{ csrf_token()}}"> --}}
    @csrf()
    <input type="text" placeholder="assunto" name="subject">
    <textarea name="body" cols="30" rows="5" placeholder="descricao"></textarea>
    <button type="submit">Enviar</button>
</form>