@extends('templates.layout')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="name" class="block text-gray-700">Product Name</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <div>
            <label for="description" class="block text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>{{ $product->description }}</textarea>
        </div>
        <div>
            <label for="price" class="block text-gray-700">Price</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ $product->price }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <div>
            <label for="stock" class="block text-gray-700">Stock</label>
            <input type="number" name="stock" id="stock" value="{{ $product->stock }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <div class="mt-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update Product</button>
        </div>
    </form>
@endsection
