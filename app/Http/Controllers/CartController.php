<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }
    public function add($id, Request $request)
    {
        // Retrieve the product
        $product = Product::findOrFail($id);

        // Get the current cart from the session or initialize it
        $cart = session()->get('cart', []);

        // Check if the product already exists in the cart
        if(isset($cart[$id])) {
            // Update the quantity if the product is already in the cart
            $cart[$id]['quantity']++;
        } else {
            // Add the product to the cart
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image
            ];
        }

        // Save the updated cart in the session
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Cart created successfully.');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }
}