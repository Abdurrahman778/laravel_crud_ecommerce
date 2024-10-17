@extends('templates.layout')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Create Product</h1>

    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <form action="{{ route('products.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf

            <!-- Product Name and Description Row -->
            <div class="-mx-3 md:flex mb-6">
                <!-- Product Name -->
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name">
                        Product Name
                    </label>
                    <input type="text" name="name" id="name"
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="Enter product name" required>
                </div>
                <!-- Description -->
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="description">
                        Description
                    </label>
                    <textarea name="description" id="description" rows="4"
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="Enter product description" required></textarea>
                </div>
            </div>

            <!-- Price and Stock Row -->
            <div class="-mx-3 md:flex mb-6">
                <!-- Price -->
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="price">
                        Price   
                    </label>
                    <input type="number" step="0.01" name="price" id="price"
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="Enter product price" required>
                </div>
                <!-- Stock -->
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="stock">
                        Stock
                    </label>
                    <input type="number" name="stock" id="stock"
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="Enter stock quantity" required>
                </div>
            </div>

            <!-- Image Upload and Submit Button -->
            <div class="-mx-3 md:flex mb-6">
                <!-- Product Image -->
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="image">
                        Product Image
                    </label>
                    <input type="file" name="image" id="image"
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit"
                    class="rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                    Create Product
                </button>
            </div>
        </form>
    </div>
@endsection
