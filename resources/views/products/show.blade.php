@extends('templates.layout')

@section('content')
    <div class="md:flex md:items-center">
        <div class="w-full h-64 md:w-1/2 lg:h-96">
            <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
        </div>
        <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
            <h3 class="text-gray-700 uppercase text-lg">{{ $product->name }}</h3>
            <span class="text-gray-500 mt-3">Rp. {{ number_format( $product->price, 2, '.', ',') }}</span><br>
            <span class="text-gray-500 mt-3">{{ $product->description }}</span>
            <hr class="my-3">
            <div class="mt-2">
                <label class="text-gray-700 text-sm" for="count">{{$product->stock}}</label>
                <div class="flex flex-col items-start mt-1">
                    <span class="text-gray-500 mt-3">Product Stock</span><br>
                    <span class="text-gray-700 text-lg mx-2">20</span>
                </div>
            </div>
            <div class="flex mt-6">
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="me-2">
                    @csrf
                    <button type="submit" class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 flex">
                        <svg class="h-5 w-5 me-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        Add to Cart
                    </button>
                </form>
                <div class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 flex">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                      </svg>                  
                    <a href="{{ route('products.index') }}" class="ms-3">Back to Products</a>
                </div>
            </div>
        </div>
    </div>
@endsection
