<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Enrollment;

class PaymentController extends Controller
{
    public function indexs()
    {
        $payments = Payment::with('enrollments')->get();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $enrollments = Enrollment::all();
        return view('payments.create', compact('enrollments'));
    }

    public function store(Request $request)
    {
        // Validate to ensure payment_date is present and correct
        $validated = $request->validate([
            'payment_no'    => 'required',
            'enrollment_id' => 'required|exists:enrollments,id',
            'amount'        => 'required|numeric',
            'payment_date'  => 'required|date',
            'method'        => 'required|string',
            'remarks'       => 'nullable|string',
        ]);

        Payment::create($validated);
        return redirect('payments')->with('success', 'Payment Added successfully.');
    }

    public function show($id)
    {
        $payment = Payment::with('enrollment')->findOrFail($id);
        return view('payments.show', compact('payment'));
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $enrollments = Enrollment::all();
        return view('payments.edit', compact('payment', 'enrollments'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'payment_no'    => 'required',
            'enrollment_id' => 'required|exists:enrollments,id',
            'amount'        => 'required|numeric',
            'payment_date'  => 'required|date',
            'method'        => 'required|string',
            'remarks'       => 'nullable|string',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update($validated);
        return redirect('payments')->with('success', 'Payment Updated successfully.');
    }

    public function destroy($id)
    {
        Payment::destroy($id);
        return redirect('payments')->with('success', 'Payment Deleted successfully.');
    }
}