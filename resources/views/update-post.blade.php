@extends("apptemplate")
@section("content")
@if(session('response')!==null)
    <create-post-form response="{{session('response')}}" update :post="{{json_encode($post)}}" ></create-post-form>

@else
    <create-post-form update :post="{{json_encode($post)}}" ></create-post-form>
@endif

@endSection
