@if(! Session::has('error'))
    @if ($message = Session::get('success'))
        @push('page-scripts')
            <script>
                showSuccessNotification('{{ $message }}');
            </script>
        @endpush
    @endif
@endif

@if ($message = Session::get('error'))
    @push('page-scripts')
        <script>
            showErrorNotification('{{ $message }}');
        </script>
    @endpush
@endif

@if ($message = Session::get('warning'))
    @push('page-scripts')
        <script>
            showWarningNotification('{{ $message }}');
        </script>
    @endpush
@endif

@if ($message = Session::get('info'))
    @push('page-scripts')
        <script>
            showInfoNotification('{{ $message }}');
        </script>
    @endpush
@endif

