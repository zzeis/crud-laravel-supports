<x-mail::message>
# Suporte Respondido 

Assunto do suporte {{$reply->support_id}} foi respondido com <b>{{$reply->content}}</b>

<x-mail::button :url="route('replies.index',$reply->support_id)">
Ver
</x-mail::button>

Obrigado,<br>
{{ config('app.name') }}
</x-mail::message>
