<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function index(){
        $apps = Appointment::latest()->paginate(10);
        return view('admin.appointment.index', compact('apps'));
    }

    public function view(int $id){
        $appointment = Appointment::findOrFail($id);
        return view('admin.appointment.view', compact('appointment'));
    }

    public function destroy(Appointment $appointment){
        $appointment->delete();
        return redirect('admin/appointments')->with('message', 'Appointment deleted successfully');
    }
}
