<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>E-Commerce App</title>
</head>

<body>
    <header class="bg-white">
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <div class="hidden w-full text-gray-600 md:flex md:items-center">
                </div>
                <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
                    Rahman Commerce
                </div>
                <div class="flex items-center justify-end w-full">
                    <button
                        class="rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2"
                        type="button">
                        Sign In
                    </button>

                    <button
                        class="rounded-md py-2 px-4 border border-transparent text-center text-sm text-slate-800 transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700  active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2"
                        type="button">
                        Sign Up
                    </button>

                    <div class="flex sm:hidden">
                        <button @click="isOpen = !isOpen" type="button"
                            class="text-gray-600 hover:text-gray-500 focus:outline-none focus:text-gray-500"
                            aria-label="toggle menu">
                            <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                                <path fill-rule="evenodd"
                                    d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <nav :class="isOpen ? '' : 'hidden'" class="sm:flex sm:justify-center sm:items-center mt-4">
                <div class="flex flex-col sm:flex-row">
                    <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="/">Home</a>
                    <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0"
                        href="{{ route('products.index') }}">Products</a>
                    <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="{{ route('cart.index') }}">Carts</a>
                    <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Categories</a>
                </div>
            </nav>
        </div>
    </header>
    <div class="container mx-auto py-8">
        @yield('content')
    </div>
</body>

</html>
