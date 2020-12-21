@component('mail::message')
# Salut {{$name}}


@component('mail::panel')
 Bienvenue sur le plateforme SMT: Voici votre code de confirmation : <?php  echo $kod ?>
@endcomponent


Mesi,<br>
{{ config('app.name') }}
@endcomponent
