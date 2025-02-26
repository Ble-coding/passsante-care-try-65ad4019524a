@extends('layouts.app')
@section('title')
    {{ __('messages.visit.visit_details') }}
@endsection
@section('header_toolbar')
    <div class="toolbar">
        <div class="container-fluid d-flex flex-stack mb-2">
            <div>
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-3 me-1">@yield('title')</h1>
            </div>
            {{ Form::hidden('no_records_found', __('messages.common.no_records_found'),['id' => 'noRecordsFoundMSG']) }}
            {{ Form::hidden('assistant_login', getLogInUser()->hasRole('assistant'),['id' => 'assistantLogin']) }}
            <div class="d-flex align-items-center py-1 ms-auto">
                <a href="{{getLogInUser()->hasRole('assistant') ? route('assistants.assistances.edit', $assistance->id) : route('assistances.edit', $assistance->id)}}">
                    <button type="button" class="btn btn-primary me-4">{{ __('messages.common.edit') }}</button>
                </a>
                <a href="{{ url()->previous() }}">
                    <button type="button" class="btn btn-outline-primary float-end">{{ __('messages.common.back') }}</button>
                </a>
            </div>
        </div>
        @include('portez_assistance.templates.templates')
    </div>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column livewire-table">
            @include('flash::message')
            @include('layouts.errors')
            <div class="card-title m-0 mt-lg-5">
                <div class="flex-column flex-xl-row">
                    @include('portez_assistance.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection



