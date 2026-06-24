<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf; // 1. Import the Facade here

class ReportController extends Controller
{
    public function pdf($pid)
    {
        $payment = Payment::find($pid);
        if (!$payment) { return "Payment not found"; }

        $print = "<div style='margin:20px; padding:20px;'>";
        $print .= "<div align='center'><h1>Payment Receipt</h1></div>";
        $print .= "<hr/>";
        $print .= "<p>Receipt No : <b>" . $pid . "</b></p>";
        $print .= "<p>Enrollment No : <b>" . ($payment->enrollment?->enroll_no) . "</b></p>";
        $print .= "<p>Date : <b>" . ($payment->payment_date) . "</b></p>";
        $print .= "<p>Method : <b>" . ($payment->method) . "</b></p>";
        $print .= "<p>Remarks : <b>" . ($payment->remarks ?? 'No remarks') . "</b></p>";
        $print .= "<p>Student Name : <b>" . ($payment->enrollment?->student?->name) . "</b></p>";
        $print .= "<hr/>";
        $print .= "<table style='width:100%; border-collapse: collapse;' border='1'>";
        $print .= "<tr><th>Description</th><th>Amount</th></tr>";
        $print .= "<tr><td>" . ($payment->enrollment?->batch?->name) . "</td><td>$" . ($payment->amount) . "</td></tr>";
        $print .= "</table>";
        $print .= "<hr/>";
        
        $user = Auth::user();
        $print .= "<span>Printed By : <b>" . ($user->name ?? 'Mr.Chom Bunthoeun') . "</b></span><br>";
        $print .= "<span>Printed Date : <b>" . date('Y-m-d') . "</b></span>";
        $print .= "</div>";

        $pdf = Pdf::loadHTML($print);
        
        return $pdf->stream('payment.pdf');
    }
}