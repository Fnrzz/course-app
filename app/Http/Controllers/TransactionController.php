<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    public function detailTransactions($no_transactions)
    {
        $transaction = Transaction::where('no_transactions', $no_transactions)->first();
        return view('home.detail-transaction', compact('transaction'));
    }

    public function sendTransactions($no_transactions)
    {
        $transaction = Transaction::where('no_transactions', $no_transactions)->first();

        $transaction->payment->update([
            'status' => 'Terverifikasi'
        ]);

        $createdAt = Carbon::parse($transaction->created_at);

        if ($createdAt->day < 10) {
            $targetDate = Carbon::create($createdAt->year, $createdAt->month, 10, 0, 0, 0);
        } elseif ($createdAt->day > 25) {
            $targetDate = Carbon::create($createdAt->year, $createdAt->month, 10, 0, 0, 0)->addMonth();
        } else {
            $targetDate = Carbon::create($createdAt->year, $createdAt->month, 25, 0, 0, 0);
        }

        $dateStartClass = $targetDate->format('Y-m-d');

        $data = [
            'email' => $transaction->user->email,
            'no_transaction' => $transaction->no_transactions,
            'user_name' => $transaction->user->first_name . ' ' . $transaction->user->last_name,
            'product_name' => $transaction->product->name,
            'course_name' => $transaction->product->courses->name,
            'subscribe_name' => $transaction->subscribe->name,
            'price' => $transaction->subscribe->price,
            'created_at' => $transaction->created_at,
            'dateStartClass' => $dateStartClass
        ];

        $pdfname = $no_transactions . '.pdf';
        $pdf = PDF::loadView('admin.pdf.create-pdf', compact('transaction','dateStartClass'));


        Mail::send('admin.email.create-email', $data, function ($message) use ($data, $pdf, $pdfname) {
            $message->to($data['email'], $data['email'])
                ->subject('Verifikasi Pembayaran Go-Course')
                ->attachData($pdf->output(), $pdfname);
        });

        return back();
    }
}
