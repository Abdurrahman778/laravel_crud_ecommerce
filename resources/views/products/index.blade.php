@extends('templates.layout')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Products</h1>
        <a href="{{ route('products.create') }}" class="rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2">
            Add Product
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($products as $product)
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                    class="w-full h-48 object-cover rounded-md mb-4">
                <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                <p class="text-gray-600 mt-2">{{ Str::limit($product->description, 80) }}</p>
                <p class="text-lg font-bold mt-2">Rp. {{ number_format( $product->price, 2, ',', '.') }}</p>
                <div class="mt-4">
                    <a href="{{ route('products.show', $product->id) }}" class="text-blue-500 hover:underline">View
                        Product</a>
                    <a href="{{ route('products.edit', $product->id) }}"
                        class="ml-4 text-yellow-500 hover:underline">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block ml-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
