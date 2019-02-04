@extends('front.layouts.main')

@section('content')
    {{ Menu::events() }}

    <h1>My events</h1>


    <ul>
        {{ $events->links() }}

        @foreach($events as $event)
            <h2><a href="{{ route('event-admin.events.edit', $event->idSlug()) }}">{{ $event->name }}</a></h2>
            {{ $event->timespan() }}
            {{ $event->location }}
        @endforeach

        {{ $events->links() }}
    </ul>
@endsection