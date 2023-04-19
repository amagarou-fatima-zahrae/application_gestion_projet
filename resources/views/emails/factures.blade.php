@component('mail::message')
<p> Dear {{$data['name']}} Merci de votre confiance en notre entreprise. Veuillez trouver ci-joint votre facture .<br> Veuillez effectuer le paiement avant cette date pour éviter les frais de retard.</p>
<p>Merci pour votre entreprise.</p>
<p>Cordialement.</p>
{{ config('app.name') }}
@endcomponent