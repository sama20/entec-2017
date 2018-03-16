<?php

namespace App\Http\Controllers;


use App\Contracts\Doctor\Listable;
use App\Models\Doctor;
use App\Http\Requests\DoctorStoreRequest;
use App\Http\Requests\DoctorUpdateRequest;
use Illuminate\Support\Facades\Session;

class DoctorController extends Controller
{
    public function index(Listable $lister)
    {
        $doctors = $lister->all();

        return view('doctor.index', compact('doctors'));
    }

    public function create()
    {
        return view('doctor.create');
    }

    public function store(DoctorStoreRequest $request)
    {
        Doctor::create($request->all());

        Session::flash('flash_messenger', [
            'type'    => 'success',
            'message' => 'Doctor has been created'
        ]);

        return redirect()->route('doctors.index');
    }

    public function edit(Doctor $doctor)
    {
        return view('doctor.edit', compact('doctor'));
    }

    public function update($doctor, DoctorUpdateRequest $request)
    {
        $doctor = Doctor::find($doctor);

        $doctor->update($request->all());

        Session::flash('flash_messenger', [
            'type'    => 'success',
            'message' => 'Doctor has been updated'
        ]);

        return redirect()->route('doctor.edit', ['doctor' => $doctor->id]);
    }

    public function delete($doctor)
    {
        $doctor = Doctor::find($doctor);

        $doctor->appointments()->delete();

        $doctor->delete();

        Session::flash('flash_messenger', [
            'type'    => 'success',
            'message' => 'Doctor has been removed'
        ]);

        return redirect()->route('doctors.index');
    }

    public function appointments(Doctor $doctor)
    {
        return view('doctor.appointments', compact('doctor'));
    }
}
