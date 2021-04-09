@section('style')
    <!-- data table css -->
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fixedHeader.bootstrap.min.css') }}">
@stop

<div class="card-body table-responsive">
    <table id="data_table"  class="table table-bordered table-striped table-hover dataTable w-100">
        <thead>
        <tr>
            <th>{{ __('lang.id') }}</th>
            <th>{{ __('lang.area') }}</th>
            <th>{{ __('lang.region') }}</th>
            <th>{{ __('lang.created') }}</th>
            <th>{{ __('lang.action') }}</th>
        </tr>
        </thead>

    </table>
</div>

@section('js')
    <!-- dataTables  -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <!-- bootstrap dataTables  -->
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('assets/js/areaDataTable.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
<script src=""></script>
@endsection