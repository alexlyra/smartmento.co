@component('mail::message')
@switch($status)
@case('approved')
# Parabéns mentor {!! $user->full_name !!}!!


Seu registro em nossa plataforma foi aprovado e agora você é um mentor SmartMentor!

Você poderá ser encontrado nos desafios buscados pelos mentorados, os que mais se aproximem com o que entregou solução pela nossa plataforma!
@break
@case('unapproved')
# Olá mentor {!! $user->full_name !!}!!


Seu registro em nossa plataforma foi reprovado por enquanto, mas você pode tentar atualizar seu perfil e tentar novamente!
@break        
@endswitch

Atensiosamente,<br>
Guru
@endcomponent
