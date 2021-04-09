@extends('dashboard.master')
@section('style')
    <!-- summernote - text editor -->
    <link rel="stylesheet" href="{{ asset($publicPath.'/summernote/summernote-bs4.css') }}">
@stop
@section('title', $ticket->title)

@section('main-section')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                        <div class="col-sm-12">
                            <h4>
                                <div class="mb-2">#{{ $department->title }} - {{ __('lang.department_ticket') }}</div>
                                <hr>
                                #{{ $ticket->enquiry_id }} - {{ $ticket->title }}
                            </h4>

                        </div>

            </div>
            <div class="row">
                <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        Details:    {!!clean($ticket->description)!!}
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    @include('includes.flash')
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8">

                    <!-- Timelime example  -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- The time line -->
                            <div class="timeline">
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-red">{{ $ticket->created_at->toDayDateTimeString() }}</span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fa fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time float-right"><i class="fa fa-clock-o"></i> {{ $ticket->created_at->diffForHumans() }}</span>
                                        <h3 class="timeline-header"><a href="javascript:void(0);">{{ $ticket->user->name }}</a> {{ __('lang.sent_you_ticket_for_support') }}</h3>
                                        <div class="timeline-body">
                                            {!! clean($ticket->message) !!}
                                        </div>
                                        <div class="timeline-footer">
                                            @if ($ticket->status === 'pending')
                                                Status: <span class="badge bg-primary text-white">{{ $ticket->status }}</span>
                                            @else
                                                Status: <span class="badge bg-warning text-white">{{ $ticket->status }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-green">{{ __('lang.reply') }}</span>
                                </div>
                                @forelse ($comments as $comment)
                                    <div>
                                        <i class="fa fa-comments bg-yellow"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fas fa-clock"></i> {{ $comment->created_at->toDayDateTimeString() }}</span>
                                            <h3 class="timeline-header"><a href="javascript:void(0);">{{ $comment->user->name }}</a> {{ __('lang.commented_on_your_ticket') }}</h3>
                                            <div class="timeline-body">
                                                {!! clean($comment->comment) !!}
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div>
                                        <div class="timeline-item">
                                            <div class="timeline-body">
                                                {{ __('lang.no_reply_found') }}
                                            </div>
                                        </div>
                                    </div>
                            @endforelse
                            <!-- /.timeline-label -->
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.timeline -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fa fa-pencil"></i> {{ __('lang.reply_ticket') }}</h3>
                                </div>
                                @if($ticket->status == 'pending')
                                    <div class="card-body">
                                        <form role="form" class="m-0" method="POST" action="{{ route('comment.postComment') }}">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="enquiry_id" value="{{ $ticket->id }}">
                                            <textarea class="textarea" name="comment" placeholder="{{ __('lang.place_of_answer') }}" required>{{ clean(old('comment')) }}</textarea>
                                            <div class="form-group">
                                                <label for="title">{{ __('lang.status') }}</label><br>
                                                <div class="form-check-inline">
                                                    <label class="customradio"><span class="radiotextsty">{{ __('lang.open') }}</span>
                                                        <input type="radio" checked="checked" name="status" value="Open" required>
                                                        <span class="checkmark"></span>
                                                    </label>        
                                                    <label class="customradio"><span class="radiotextsty">{{ __("lang.closed") }}</span>
                                                        <input type="radio" name="status" value="Closed" required>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">{{ __('lang.submit_reply') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                @else
                                    <div class="card-body">
                                        {{ __("lang.you_can't_reply_because_ticket_closed") }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="card-text">
                                        Details
                                </div>
                                <table class="table">

                                    <tbody>
                                    <tr>
                                        <th scope="row">Name</th>
                                        <td>{{$ticket->title}}</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">Shop Name</th>
                                        <td>{{$ticket->shop}}</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">Mobile One</th>
                                        <td>{{$ticket->mobileOne}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mobile Two</th>
                                        <td>{{$ticket->mobileTwo}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address</th>
                                        <td>{{$ticket->address}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Region</th>
                                        <td>{{$ticket->region_id}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Area</th>
                                        <td>{{$ticket->area}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Territory</th>
                                        <td>{{$ticket->terrirtory}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Town</th>
                                        <td>{{$ticket->town}}</td>
                                    </tr>  <tr>
                                        <th scope="row">Description</th>
                                        <td> {!!clean($ticket->description)!!}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Call Type</th>
                                        <td>{{$ticket->callType}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Complain Type</th>
                                        <td>{{$ticket->complainType}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Store Type</th>
                                        <td>{{$ticket->storeType}}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>


    </section>

@endsection

@section('js')
    <!-- summernote -->
    <script src="{{ asset($publicPath.'/summernote/summernote-bs4.min.js') }}"></script>
@endsection