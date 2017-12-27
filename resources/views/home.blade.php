@extends('layouts.app')

@section('content')
<div class="container with-nav text-black">
    <h1 class="text-center">
        Recent Messages
    </h1>
    @if ($messages->count() > 0)
        @foreach ($messages as $i => $message)
            @php $offset = $i + 1; @endphp
            @if (($offset % 3) === 0)
            <div class="row">
            @endif
            <div class="col-md-4">
                <div class="panel panel-grey">
                    <div class="panel-heading">
                        Message from 
                        <a href="mailto:{{ $message->email }}">
                            {{ $message->name }}
                        </a>
                    </div>
    
                    <div class="panel-body">
                        @if (!empty($message->number))
                            You can call them at: <a href="tel:{{ preg_replace('/[^0-9]/', '', $message->number) }}">{{ $message->number }}</a>
                            <br/>
                        @endif
                        {{ $message->message }}
                    </div>
                </div>
            </div>
            @if (($offset % 3) === 0)
            </div>
            @endif
        @endforeach
        <div class="col-md-12 text-center">
            {!! $messages->links() !!}
        </div>
    @else 
        <div class="col-md-8 col-md-offset-2 text-center">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    There are no existing messages.
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
