<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function listProducts()
    {
        return view('admin.owner-list-products');
    }

    public function detailProducts($id)
    {
        $product = Product::where('id', $id)->first();
        return view('admin.detail-products', compact('product'));
    }

    public function listUsersProduct($id)
    {
        $product = Product::where('id',$id)->first();
        return view('admin.owner-list-users-product',compact('product'));
    }

    public function pdfStream($no_transactions)
    {
        $transaction = Transaction::where('no_transactions', $no_transactions)->first();

        $createdAt = Carbon::parse($transaction->created_at);

        if ($createdAt->day < 10) {
            $targetDate = Carbon::create($createdAt->year, $createdAt->month, 10, 0, 0, 0);
        } elseif ($createdAt->day > 25) {
            $targetDate = Carbon::create($createdAt->year, $createdAt->month, 10, 0, 0, 0)->addMonth();
        } else {
            $targetDate = Carbon::create($createdAt->year, $createdAt->month, 25, 0, 0, 0);
        }

        $dateStartClass = $targetDate->format('Y-m-d');

        $pdfname = $no_transactions . '.pdf';
        $pdf = PDF::loadView('admin.pdf.create-pdf', compact('transaction','dateStartClass'));

        return $pdf->stream();
    }

}
