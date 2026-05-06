<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Tailwind CSS Play CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <!-- component -->
<section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-8 mx-auto">
            <div class="mt-6 lg:mt-0 lg:px-2 lg:w-4/5 mx-auto">
                <a class="text-white" href="{{ url('/orders') }}">Orders</a>
                    <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                      @foreach($products as $product)

                        <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                            <img class="object-cover w-full rounded-md h-72 xl:h-80" src="{{ $product->p_image }}" alt="{{ $product->p_name }}">
                            <h4 class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200">{{ $product->p_name }}</h4>
                            <p class="text-blue-500">{{ $product->p_price }}</p>

                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                
                                <button type="submit" class="flex items-center justify-center w-full px-2 py-2 mt-4 font-medium text-white bg-gray-800 rounded-md">
                                    Add to cart
                                </button>
                            </form>
                        </div>

                        @endforeach

                    </div>
                </div>
        </div>
    </section>
</body>
</html>
