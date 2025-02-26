<?php

namespace App\Listeners;

use App\Models\AppointmentAssistant;
use App\Models\AppointmentGoogleCalendar;
use App\Models\GoogleCalendarIntegration;
use App\Models\UserGoogleAppointment;
use App\Repositories\GoogleCalendarRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HandleCreatedGoogleAppointmentAssistant
{
    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $forPatient = $event->forPatient;
        $appointmentId = $event->appointmentID;

        if ($forPatient) {
            $this->createGoogleEventForPatient($appointmentId);
        } else {
            $this->createGoogleEventForDoctor($appointmentId);
        }
    }

    /**
     * @param  Request  $request
     */
    public function createGoogleEventForPatient($appointmentId)
    {
        $appointment = AppointmentAssistant::with('patient.user', 'assistant.user')->find($appointmentId);
        $patientGoogleCalendarConnected = GoogleCalendarIntegration::whereUserId($appointment->patient->user->id)
            ->exists();

        if ($patientGoogleCalendarConnected) {
            /** @var GoogleCalendarRepository $repo */
            $repo = App::make(GoogleCalendarRepository::class);

            $calendarLists = AppointmentGoogleCalendar::whereUserId($appointment->patient->user->id)
                ->pluck('google_calendar_id')->toArray();

            $fullName = $appointment->assistant->user->full_name;
            $meta['name'] = 'Appointment with Assistant: '.$fullName;
            $meta['description'] = 'Appointment with '.$fullName.' For '.$appointment->services->name;
            $meta['lists'] = $calendarLists;

            $accessToken = $repo->getAccessToken($appointment->patient->user);
            $results = $repo->store($appointment, $accessToken, $meta);
            foreach ($results as $result) {
                UserGoogleAppointment::create([
                    'user_id' => $appointment->patient->user->id,
                    'appointment_id' => $appointment->id,
                    'google_calendar_id' => $result['google_calendar_id'],
                    'google_event_id' => $result['id'],
                ]);
            }
        }

        return true;
    }
    

    /**
     * @param  Request  $request
     * @return bool|JsonResponse
     */
    public function createGoogleEventForDoctor($appointmentId)
    {
        $appointment = AppointmentAssistant::with('patient.user', 'assistant.user')->find($appointmentId);
        $doctorGoogleCalendarConnected = GoogleCalendarIntegration::whereUserId($appointment->assistant->user->id)
            ->exists();

        if ($doctorGoogleCalendarConnected) {
            /** @var GoogleCalendarRepository $repo */
            $repo = App::make(GoogleCalendarRepository::class);

            $calendarLists = AppointmentGoogleCalendar::whereUserId($appointment->assistant->user->id)
                ->pluck('google_calendar_id')
                ->toArray();

            $fullName = $appointment->patient->user->full_name;
            $meta['name'] = 'Appointment with Patient: '.$fullName;
            $meta['description'] = 'Appointment with '.$fullName.' For '.$appointment->services->name;
            $meta['lists'] = $calendarLists;

            $accessToken = $repo->getAccessToken($appointment->assistant->user);
            $doctorResults = $repo->store($appointment, $accessToken, $meta);
            foreach ($doctorResults as $result) {
                UserGoogleAppointment::create([
                    'user_id' => $appointment->assistant->user->id,
                    'appointment_id' => $appointment->id,
                    'google_calendar_id' => $result['google_calendar_id'],
                    'google_event_id' => $result['id'],
                ]);
            }
        }

        return true;
    }













    public function createGoogleEventForPatientAndAssistant($appointmentId)
    {
        $appointment = AppointmentAssistant::with('patient.user', 'assistant.user')->find($appointmentId);
        $patientGoogleCalendarConnected = GoogleCalendarIntegration::whereUserId($appointment->patient->user->id)
            ->exists();

        if ($patientGoogleCalendarConnected) {
            /** @var GoogleCalendarRepository $repo */
            $repo = App::make(GoogleCalendarRepository::class);

            $calendarLists = AppointmentGoogleCalendar::whereUserId($appointment->patient->user->id)
                ->pluck('google_calendar_id')->toArray();

            $fullName = $appointment->assistant->user->full_name;
            $meta['name'] = 'Appointment with Assistant: '.$fullName;
            $meta['description'] = 'Appointment with '.$fullName.' For '.$appointment->services->name;
            $meta['lists'] = $calendarLists;

            $accessToken = $repo->getAccessToken($appointment->patient->user);
            $results = $repo->store($appointment, $accessToken, $meta);
            foreach ($results as $result) {
                UserGoogleAppointment::create([
                    'user_id' => $appointment->patient->user->id,
                    'appointment_id' => $appointment->id,
                    'google_calendar_id' => $result['google_calendar_id'],
                    'google_event_id' => $result['id'],
                ]);
            }
        }

        return true;
    }





}
