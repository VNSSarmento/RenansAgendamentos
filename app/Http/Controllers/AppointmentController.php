<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class AppointmentController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $agendamentosAtivos = Appointment::where('user_id', $userId)->where('status', 'active')->count();
        $totalHistorico = Appointment::where('user_id', $userId)->count();
        $proximoAgendamento = Appointment::with('slot')->where('user_id', $userId)->where('status', 'active')->first();

        return view('dashboard', compact('agendamentosAtivos', 'totalHistorico', 'proximoAgendamento'));
    }

    public function create()
    {
        $availableSlots = Slot::where('is_available', true)
            ->whereDate('start_time', '>=', date('Y-m-d'))
            ->orderBy('start_time', 'asc')
            ->get()
            ->map(function($slot) {
                return [
                    'id' => $slot->id,
                    'data' => date('Y-m-d', strtotime($slot->start_time)),
                    'hora' => date('H:i', strtotime($slot->start_time)),
                ];
            });

        return view('appointments.create', compact('availableSlots'));
    }

    public function store(Request $request)
    {
        $request->validate(['slot_id' => 'required|exists:slots,id']);
        $slot = Slot::findOrFail($request->slot_id);
        
        Appointment::create([
            'user_id' => Auth::id(),
            'slot_id' => $slot->id,
            'status' => 'active',
        ]);

        $slot->update(['is_available' => false]);
        return redirect()->route('dashboard')->with('success', 'Agendamento realizado!');
    }

    public function myAppointments()
    {
        $appointments = Appointment::with('slot')->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('appointments.list', compact('appointments'));
    }

    public function cancel($id)
    {
        $appointment = Appointment::with('slot')->where('user_id', Auth::id())->findOrFail($id);
        $appointment->slot->update(['is_available' => true]);
        $appointment->status = 'canceled';
        $appointment->save();
        return redirect()->route('appointments.list')->with('success', 'Cancelado!');
    }

    public function downloadPdf($id)
    {
        $appointment = Appointment::with(['slot', 'user'])->where('user_id', Auth::id())->findOrFail($id);
        $pdf = Pdf::loadView('appointments.pdf', compact('appointment'));
        return $pdf->download('comprovante.pdf');
    }
}