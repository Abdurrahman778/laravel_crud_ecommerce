@extends('templates.layout')

@section('content')
    <div class="container mx-auto mt-10">
        <div class="sm:flex shadow-md my-10">
            <!-- Cart Items Section -->
            <div class="w-full sm:w-3/4 bg-white px-10 py-10">
                <div class="flex justify-between border-b pb-8">
                    <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                    <h2 class="font-semibold text-2xl">{{ count($cart) }} Items</h2>
                </div>

                @if (session('success'))
                    <div class="relative items-center w-full px-5 py-12">
                        <div class="p-6 border-l-4 border-green-500 -6 rounded-r-xl bg-green-50">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <div class="text-sm text-green-600">
                                        <p>{{ session('success') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Cart Items -->
                @if (count($cart) > 0)
                    @foreach ($cart as $id => $item)
                        <div class="md:flex items-stretch py-8 md:py-10 lg:py-8 border-t border-gray-50">
                            <div class="md:w-4/12 2xl:w-1/4 w-full">
                                <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="h-full object-center object-cover md:block hidden" />
                                <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="md:hidden w-full h-full object-center object-cover" />
                            </div>
                            <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
                                <p class="text-xs leading-3 text-gray-800 md:pt-0 pt-4">{{ $item['sku'] ?? 'N/A' }}</p>
                                <div class="flex items-center justify-between w-full">
                                    <p class="text-base font-black leading-none text-gray-800">{{ $item['name'] }}</p>

                                    <!-- Quantity Edit Buttons -->
                                    <div class="flex items-center mt-1">
                                        <!-- Decrease Quantity -->
                                        <button class="text-gray-500 focus:outline-none focus:text-gray-600" onclick="updateQuantity('{{ $id }}', 'decrease')">
                                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </button>

                                        <!-- Quantity Display -->
                                        <span class="text-gray-700 text-lg mx-2" id="quantity-{{ $id }}">{{ $item['quantity'] }}</span>

                                        <!-- Increase Quantity -->
                                        <button class="text-gray-500 focus:outline-none focus:text-gray-600" onclick="updateQuantity('{{ $id }}', 'increase')">
                                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pt-5">
                                    <div class="flex items-center">
                                        <p class="text-xs leading-3 underline text-gray-800 cursor-pointer">Add to favorites</p>
                                        <a href="{{ route('cart.remove', $id) }}" class="text-xs leading-3 underline text-red-500 pl-5 cursor-pointer">Remove</a>
                                    </div>
                                    <p class="text-base font-black leading-none text-gray-800">Rp.<span id="price-{{ $id }}">{{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }}</span></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Your cart is empty.</p>
                @endif

                <a href="{{ route('products.index') }}" class="flex font-semibold text-indigo-600 text-sm mt-10">
                    <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                        <path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/>
                    </svg>
                    Continue Shopping
                </a>
            </div>

            <!-- Order Summary -->
            <div id="summary" class="w-full sm:w-1/4 md:w-1/2 px-8 py-10">
                <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
                <div class="flex justify-between mt-10 mb-5">
                    <span class="font-semibold text-sm uppercase">Items {{ count($cart) }}</span>
                    <span class="font-semibold text-sm">Rp. <span id="total-cost">{{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)), 2, ',', '.')}}</span></span>
                </div>
                <div class="border-t mt-8">
                    <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                        <span>Total cost</span>
                        <span>Rp. <span id="grand-total">{{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)), 2, ',', '.')}}</span></span>
                    </div>
                    <button class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Checkout</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateQuantity(itemId, action) {
            let quantityElement = document.getElementById('quantity-' + itemId);
            let priceElement = document.getElementById('price-' + itemId);
            let totalCostElement = document.getElementById('total-cost');
            let grandTotalElement = document.getElementById('grand-total');

            let quantity = parseInt(quantityElement.innerText);
            let pricePerItem = parseFloat(priceElement.innerText) / quantity;

            if (action === 'increase') {
                quantity++;
            } else if (action === 'decrease' && quantity > 1) {
                quantity--;
            }

            // Update quantity
            quantityElement.innerText = quantity;

            // Update price for the item
            priceElement.innerText = (pricePerItem * quantity).toFixed(2);

            // Recalculate total cost
            let newTotalCost = Array.from(document.querySelectorAll('[id^="price-"]'))
                .reduce((sum, el) => sum + parseFloat(el.innerText), 0);
            totalCostElement.innerText = newTotalCost.toFixed(2);

            // Update grand total (including shipping)
            grandTotalElement.innerText = (newTotalCost).toFixed(2);
        }
    </script>
@endsection