@extends('layout.main')

@section('title')

@stop

@section('head')

@stop

@section('content')
<div class="bg-white padding page-content" style="padding-top:10%;">
        <div>
            <h1 class="text-center">
                Your payment was not completed.<br />
                <small>
                    Either the transaction was cancelled by user or a server-side error terminated the transaction.<br /><br />
                    Please click <a href="{{ route('get-registration') }}">here</a> to start over.
                </small>
            </h1>
        </div>
    </div>

@stop

@section('script')
@stop

