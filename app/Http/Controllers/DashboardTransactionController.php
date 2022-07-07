<?php

namespace App\Http\Controllers;

use App\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardTransactionController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //relasi dalam relasi (model1.model2)
        $sellTransaction = TransactionDetail::with(['transaction.user','product.galleries'])
                        ->whereHas('product', function($product){
                            $product->where('users_id', Auth::user()->id);
                        })->get();

        //relasi dalam relasi (model1.model2)
        $buyTransaction = TransactionDetail::with(['transaction.user','product.galleries'])
                        ->whereHas('transaction', function($transaction){
                            $transaction->where('users_id', Auth::user()->id);
                        })->get();

        return view('pages.dashboard-transactions', [
            'sellTransaction' => $sellTransaction,
            'buyTransaction' => $buyTransaction
        ]);
    }

    //detail
    public function details(Request $request, $id)
    {
        $transaction = TransactionDetail::with(['transaction.user','product.galleries'])
                        ->findOrFail($id);

        return view('pages.dashboard-transactions-details', [
            'transaction' => $transaction
        ]);
    }

    //update bagian resinya
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = TransactionDetail::findOrFail($id);

        $item->update($data);

        return redirect()->route('dashboard-transaction-detail', $id);
    }
}
