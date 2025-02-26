@extends('layouts.app')
@section('title')
    {{ __('messages.assistant_session.assistant_session_details') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.assistant_session.assistant_session_details') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('assistant-sessions.index') }}"
                   class="btn btn-primary form-btn float-right">@lang('crud.back')</a>
            </div>
        </div>
        @include('stisla-templates::common.errors')
        <div class="section-body">
            <div class="card"> 
                <div class="card-body">
                    @include('assistants_sessions.show_fields')
                </div>
            </div>
        </div>
    </section>
@endsection

