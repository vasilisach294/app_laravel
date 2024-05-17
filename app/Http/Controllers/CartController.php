<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\User;

class CartController extends Controller
{
    public function show()
    {
        $user = auth()->user();

        return view('cart', compact('user'));
    }

    public function update(Request $request)
    {
        try {
            $user = auth()->user();
    
            if (!$user) {
                return redirect()->route('login');
            }
    
            $user->addToCart($request->product_id);
    
            return redirect()->route('cart.show');
    } 
        catch (\Exception $e) {
    return back()->withError('Не удалось добавить продукт в корзину');
    }
}
}