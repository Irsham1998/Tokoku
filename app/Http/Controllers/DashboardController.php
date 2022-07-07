<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//panggil model
use App\TransactionDetail;
use App\User;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //relasi dalam relasi (model1.model2)
        $transaction = TransactionDetail::with(['transaction.user','product.galleries'])
                        ->whereHas('product', function($product){
                            $product->where('users_id', Auth::user()->id);
                        });
        $revenue = $transaction->get()->reduce(function($carry, $item){
            return $carry + $item->price;
        });

        $customer = User::count();

        return view('pages.dashboard', [
            'transaction_count' => $transaction->count(),
            'transaction_data' => $transaction->get(),
            'revenue' => $revenue,
            'customer' => $customer
        ]);
    }
}
