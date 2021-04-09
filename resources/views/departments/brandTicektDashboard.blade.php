<div class="card-body table-responsive">
    <table  class="table table-bordered table-striped table-hover text-center">
        <thead>
        <tr>
            <th>{{ __('lang.sl_no') }}</th>
            <th>{{ __('lang.department') }}</th>
            <th>{{ __('lang.case') }}</th>
            <th>{{ __('lang.tickets') }}</th>
            <th>{{ __('lang.knowledge') }}</th>
        </tr>
         </thead>

        <tbody>
        @php($i=1)

        @foreach($departments as $brand)
                <tr  >
                        <td>{{$i++ }}</td>
                    <td>{{ $brand->title }}</td>
                    <td class="font-weight-bold " style="font-size: 1rem;"><a href="{{route('departmentCases', $brand->id)}}">{{ $brand->enquiry->count() }}</a></td>
                    <td class="font-weight-bold" style="font-size: 1rem;"><a href="{{route('departmentTickets', $brand->id)}}">{{ $brand->ticket->count() }}</a> </td>
                    <td class="font-weight-bold" style="font-size: 1rem;"><a href="{{ route('Knowledge.categoryPost', $brand->id)}}"> {{ $brand->knowledgeBase->count() }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>




