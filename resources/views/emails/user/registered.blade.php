@component('mail::message')
    # Olá {{$user->name}}

    Sua conta foi criada com sucesso!!

    @component('mail::button', ['url' => ''])
        Clique aqui para ativar
    @endcomponent

    Muito obrigado,<br>
    {{ config('app.name') }}
@endcomponent
