@extends('dashboard.master')
@section('title', __('lang.notifications'))
@section('main-section')

<div class="container-fluid">
    <h4 class="page-title">{{ __('lang.all_notifications') }}</h4>
    <div class="card">
        <div class="card-body">
            <ul class="list-group list-group-flush">
              @forelse($notifications as $notification)
              <div class="border-top">
                <a href="{{ route('ticket.show', $notification->ticket_code) }}"> 
                  <li class="list-group-item">{{ $notification->title }} <br>
                    <small>{{ __('lang.department') }} : {{ $notification->department }}, {{ __('lang.received_at') }} :{{ $notification->created_at->diffForHumans() }}</small>
                  </li>
                </a>
              </div>
              @empty
                <div class="border-top">
                  {{ __('lang.notification_empty') }}
                </div>
              @endforelse
            </ul>

            <div class="mt-3">
                {{ $notifications->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
