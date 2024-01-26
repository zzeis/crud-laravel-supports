<h1>Dúvida {{$support->id}}</h1>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif
<form method="POST" action="{{route('supports.update',$support->id)}}">
    {{-- <input type="text" name="_token" value="{{ csrf_token()}}"> --}}
    @csrf()
    @method('put')
    <input type="text" placeholder="assunto" name="subject" value="{{$support->subject}}">
    <textarea name="body" cols="30" rows="5" placeholder="descricao">{{$support->body}}</textarea>
    <button type="submit">Enviar</button>
</form>