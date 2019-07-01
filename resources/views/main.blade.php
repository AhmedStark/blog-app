@extends("apptemplate")
@section("content")




<feed-page

@if(Sentinel::getUser() !== null)

    @if(Sentinel::getUser()->inRole("admin"))
        admin
    @endif

@endif


@if(session('snackbar')!==null)
    snackbar-passed-content="{{session('snackbar')}}"
    snackbar-status
@endif

:posts="{{json_encode($posts)}}"
></feed-page>

@endSection