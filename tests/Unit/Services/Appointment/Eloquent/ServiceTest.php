<?php
namespace Tests\Unit\Services\Appointment\Eloquent;

use App\Contracts\Appointment\Deletable;
use App\Models\Appointment;
use App\Services\Appointment\Eloquent\Service;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Unit\Services\Appointment\CommumTests;
use Tests\Unit\Services\Helper;

class ServiceTest extends TestCase
{
    use DatabaseTransactions, Helper, CommumTests;

    protected $service;

    protected $appointment;

    public function setUp()
    {
        parent::setUp();

        $this->appointment = new Appointment;

        $this->service = new Service($this->appointment);
    }

    /**
     * @test
     * @return void
     */
    public function it_creates_a_new_appointment()
    {
        $doctor = $this->createDoctor(1)->first();

        $appointment = $this->service->create([
            'doctor_id'    => $doctor->id,
            'patient_name' => 'Denis Alustau',
        ]);

        $this->assertEquals(1, $this->appointment->count());

        $this->assertArrayHasKey('id', $appointment);

        $this->assertInstanceOf(Appointment::class, $appointment);
    }

    /**
     * @test
     */
    public function it_implements_deletable()
    {
        $this->assertInstanceOf(Deletable::class, $this->service);
    }
}
