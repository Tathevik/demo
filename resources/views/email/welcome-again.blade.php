@component('mail::message')
# Introduction

Please follow the link to verify your email address {{ url(URL::to('register/verify/' . $confirmation_code)) }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
