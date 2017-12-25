@component('mail::message')
# You have been contacted!

{{ $message->name }} says,

@component('mail::panel')
{{ $message->message }}
@endcomponent

@if (!empty($message->number))
You can call them at: [{{ $message->number }}](tel:{{ preg_replace('/[^0-9]/', '', $message->number) }})
@endif

You can reply to this message, or you can message them here: [{{ $message->email }}](mailto:{{ $message->email }}?subject=RE:New+message+from+{{ str_replace(' ', '+', config('app.name')) }})

Thanks,<br>
{{ config('app.name') }}
@endcomponent

