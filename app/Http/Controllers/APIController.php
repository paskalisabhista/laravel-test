<?php

namespace App\Http\Controllers;

use App\Models\Details;
use App\Models\Product;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class APIController extends Controller
{
    public function login (){
        $email = \request('email');
        $password = \request('password');

        $user = User::where('email', '=', $email)->first();
        if (!$user) {
           return response()->json(['success'=>false, 'message' => 'Login Fail, please check email id']);
        }
        if (!Hash::check($password, $user->password)) {
           return response()->json(['success'=>false, 'message' => 'Login Fail, pls check password']);
        }
        return response()->json(['success'=>true,'message'=>'success', 'data' => $user]);
    }

    public function registerMobile (){
        $user = new User();

        $user->name = \request('name');
        $user->email = \request('email');
        $user->password = Hash::make(\request('password')); //password butuh dihash (enkripsi) agar bisa login diweb

        $user->save();
        return response()->json(['success'=>true,'message'=>'success', 'data' => $user]);
    }

    public function gethargaproduk (){
        $product = Product::limit(3)->get(); //hanya menampilkan top3 list
        
        return response()->json(['data' => $product]);
    }

    public function orderproduk (){
        
        // $transcation = new Transaction();

        // $transcation->user_id = \request('user_id');
        // $transcation->product_id = \request('product_idA');
        // $transcation->id_qty = \request('id_qtyA');
        // $transcation->id_total = \request('id_totalA');
        // $transcation->transaction_totalprice = \request('transaction_totalprice');
        // $transcation->transaction_notification ="";
        // $transcation->transaction_time = 300;
        // $transcation->save();

        
        // $transcation = new Transaction();

        // $transcation->user_id = \request('user_id');
        // $transcation->product_id = \request('product_idB');
        // $transcation->id_qty = \request('id_qtyB');
        // $transcation->id_total = \request('id_totalB');
        // $transcation->transaction_totalprice = \request('transaction_totalprice');
        // $transcation->transaction_notification ="";
        // $transcation->transaction_time = 300;
        // $transcation->save();

        // $transcation = new Transaction();

        // $transcation->user_id = \request('user_id');
        // $transcation->product_id = \request('product_idC');
        // $transcation->id_qty = \request('id_qtyC');
        // $transcation->id_total = \request('id_totalC');
        // $transcation->transaction_totalprice = \request('transaction_totalprice');
        // $transcation->transaction_notification ="";
        // $transcation->transaction_time = 300;
        // $transcation->save();
        // return response()->json(['success'=>true,'message'=>'success']);
        // ====
        // user_id = Profile.id ,
        // product_idA = produkIDA,
        // id_qtyA = countA,
        // id_totalA = totalA,
        // product_idB = produkIDB,
        // id_qtyB = countB,
        // id_totalB = totalB,
        // product_idC = produkIDC,
        // id_qtyC = countC,
        // id_totalC = totalC,
        // transaction_totalprice = total,
        // ===
        $productA = Product::where('id', '=', \request('product_idA'))->first();

        $transcation = new Transaction();
        $transcation ->user_id = \request('user_id');
        $transcation ->transaction_totalprice = \request('transaction_totalprice');
        $transcation->save();

        $detailA = new Details();
        $detailA ->product_id = \request('product_idA');
        $detailA ->transaction_id = $transcation->id;
        $detailA ->qty = \request('id_qtyA');
        $detailA ->total = \request('id_totalA');
        $detailA->save();

        $detailB = new Details();
        $detailB ->product_id = \request('product_idB');
        $detailB ->transaction_id = $transcation->id;
        $detailB ->qty = \request('id_qtyB');
        $detailB ->total = \request('id_totalB');
        $detailB->save();

        $detailC = new Details();
        $detailC ->product_id = \request('product_idC');
        $detailC ->transaction_id= $transcation->id;
        $detailC ->qty = \request('id_qtyC');
        $detailC ->total = \request('id_totalB');
        $detailC->save();

        return response()->json(['success'=>true,'message'=>'success', 'transaction_id'=>$transcation->id]);
    }
    
}

