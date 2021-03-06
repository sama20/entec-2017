<?php
namespace Tests\Unit\Services;


use App\Models\Appointment;
use App\Models\Doctor;

trait Helper
{
    public function createDoctor($quantity = 3)
    {
        return factory(Doctor::class, $quantity)->create();
    }

    public function createAppointment($quantity = 3)
    {
        return factory(Appointment::class, $quantity)->create();
    }
}
