@extends('layouts.app')
@section('title')
    {{__('messages.visitor.visitor')}}
@endsection
@section('content') 
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            <livewire:visiteur-table/>
        </div>
    </div>
@endsection
 