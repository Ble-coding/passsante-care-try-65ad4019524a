@extends('layouts.app')
@section('title')
    {{ __('messages.visitor.visitor') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-7">
            <h1 class="mb-0 me-1">{{ __('messages.visitor.visitor_details') }}</h1>
            <div class="text-end mt-4 mt-md-0">
                <a href="{{ route('assistants.visiteurs.edit', $visiteur->id) }}">
                    <button type="button" class="btn btn-primary me-4">{{ __('messages.common.edit') }}</button>
                </a>
                <a href="{{ url()->previous() }}">
                    <button type="button" class="btn btn-outline-primary float-end">{{ __('messages.common.back') }}</button>
                </a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xxl-5 col-12">
                            <div class="d-sm-flex align-items-center mb-5 mb-xxl-0 text-center text-sm-start">
                                <div class="image image-circle image-lg-small">
                                    <img src="{{ $visiteur->profile_image }}" alt="user">
                                </div>
                                <div class="ms-0 ms-md-10 mt-5 mt-sm-0  ">
                                    <span class="text-success mb-2 d-block">{{ $visiteur->role_name }}</span>
                                    <h2>{{ $visiteur->nom }} {{ $visiteur->prenom }}</h2>
                                    <a href="{{ $visiteur->contact }}" class="text-gray-600 text-decoration-none fs-4">
                                        {{ !empty($visiteur->contact) ? '+' . $visiteur->contact : __('messages.common.n/a') }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7 col-12">
                            <div class="row justify-content-center">
                                <div class="col-md-4 col-sm-6 col-12 mb-6 mb-md-0">
                                    <div class="border rounded-10 p-5 h-100">
                                        {{-- <h2 class="text-primary mb-3">{{ $doctorDetailData['totalAppointmentCount'] }}</h2> --}}
                                        <h2 class="text-primary mb-3">209</h2>
                                        <h3 class="fs-5 fw-light text-gray-600 mb-0">
                                            {{ __('messages.doctor_dashboard.total_appointments') }}</h3>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 mb-6 mb-md-0">
                                    <div class="border rounded-10 p-5 h-100">
                                        {{-- <h2 class="text-primary mb-3">{{ $doctorDetailData['todayAppointmentCount'] }}</h2> --}}
                                        <h2 class="text-primary mb-3">16</h2>
                                        <h3 class="fs-5 fw-light text-gray-600 mb-0">
                                            {{ __('messages.patient_dashboard.today_appointments') }}</h3>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="border rounded-10 p-5 h-100">
                                        {{-- <h2 class="text-primary mb-3">{{ $doctorDetailData['upcomingAppointmentCount'] }} --}}
                                        <h2 class="text-primary mb-3">2
                                        </h2>
                                        <h3 class="fs-5 fw-light text-gray-600 mb-0">
                                            {{ __('messages.patient_dashboard.upcoming_appointments') }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- cards pour les informations brefs --}}
                   
                </div>
            </div>

            <div class="mt-7 overflow-hidden">
                <ul class="nav nav-tabs mb-sm-7 mb-5 pb-1 overflow-auto flex-nowrap text-nowrap" id="myTab"
                    role="tablist">
                    <li class="nav-item position-relative me-7 mb-3" role="presentation">
                        <button class="nav-link active p-0" id="overview-tab" data-bs-toggle="tab"
                            data-bs-target="#overview" type="button" role="tab" aria-controls="overview"
                            aria-selected="true">
                            {{ __('messages.common.overview') }}
                        </button>
                    </li>
                    <li class="nav-item position-relative me-7 mb-3" role="presentation">
                        <button class="nav-link p-0" id="appointments-tab" data-bs-toggle="tab"
                                data-bs-target="#appointments"
                                type="button" role="tab" aria-controls="appointments" aria-selected="false">
                            {{ __('messages.visitor.visiteur_historique')  }}
                        </button>
                    </li>
                </ul>

                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                <div class="row">
                                    @include('visiteurs.show_fields')

                                </div>
                            </div>
                            <div class="tab-pane fade" id="appointments" role="tabpanel" aria-labelledby="appointments-tab">
                                {{-- <livewire:doctor-appointment-table :doctorId="$visiteur->id" /> --}}
                                <livewire:visiteurhistorique-table :visiteurId="$visiteur->id" />
            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
