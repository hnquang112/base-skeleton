@extends ('layouts.cms.master')

@push ('styles')
<link rel="stylesheet" type="text/css" href="{{ asset($dir.'/css/elfinder.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset($dir.'/css/theme.css') }}">
@endpush

@push ('scripts')
<script src="{{ asset($dir.'/js/elfinder.min.js') }}"></script>

@if ($locale)
    <script src="{{ asset($dir."/js/i18n/elfinder.$locale.js") }}"></script>
@endif

<script type="text/javascript" charset="utf-8">
    // Documentation for client options:
    // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
    $().ready(function() {
        $('#elfinder').elfinder({
            // set your elFinder options here
            @if ($locale)
                lang: '{{ $locale }}', // locale
            @endif
            customData: {
                _token: '{{ csrf_token() }}'
            },
            resizable: false,
            height: '450px',
            url : '{{ route("elfinder.connector") }}'  // connector URL
        });
    });
</script>
@endpush

@section ('content')
    <div id="elfinder"></div>
@endsection