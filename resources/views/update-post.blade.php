@extends("apptemplate")
@section("content")
@if(session('response')!==null)
    <create-post-form response="{{session('response')}}" update :post="{{json_encode($post)}}" >
        <div slot="content">

        @if ($errors->any())
            <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif

        </div>
    </create-post-form>

@else
    <create-post-form update :post="{{json_encode($post)}}" >
        <div slot="content">

        @if ($errors->any())
            <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif

        </div>
    </create-post-form>
@endif

@endSection
