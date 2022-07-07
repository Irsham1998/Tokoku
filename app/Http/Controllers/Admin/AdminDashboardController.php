<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//panggil model
use App\User;
use App\Transaction;
use Illuminate\Http\Request;


class AdminDashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customer = User::count();
        $revenue = Transaction::where('transaction_status','SUCCESS')->sum('total_price');
        $transaction = Transaction::count();
        return view('pages.admin.dashboard', [
            'customer' => $customer,
            'revenue' => $revenue,
            'transaction' => $transaction
        ]);
    }
}
