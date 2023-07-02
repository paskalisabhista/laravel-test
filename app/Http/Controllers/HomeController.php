<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Query untuk menampilkan semua pesanan di dalam web
        $transactions = DB::table('transaction')
    ->join('details', 'transaction.id', '=', 'details.transaction_id')
    ->join('product', 'details.product_id', '=', 'product.id')
    ->join('users', 'transaction.user_id', '=', 'users.id')
    ->select('transaction.id', 'users.name', 'transaction.transaction_totalprice', 'product.product_name', 'details.qty')
    ->get();

        return view('HomePage', compact("transactions"));
    }
}
