<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<!-- component -->
<div class="flex flex-col">
  <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <a class="text-black dark:text-whhite" href="{{ url('/products') }}">Products</a>
        <table class="min-w-full">
          <thead class="bg-white border-b">
            <tr>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                ID
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                product_id
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                product_price
              </th>
               <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                status
              </th>
               <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                error
              </th>
               <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                tran_date
              </th>
               <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                amount
              </th>
               <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                bank_tran_id
              </th>
               <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                card_issuer
              </th>
                 <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                card_brand
              </th>
                 <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                val_id
              </th>
                 <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                card_type
              </th>
            </tr>
          </thead>

          <tbody>
            @foreach($orders as $order)
            <tr class="bg-gray-100 border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order->id }}</td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{ $order->product_id }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{ $order->product_price }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{ $order->status }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{ $order->error }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{ $order->tran_date }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{ $order->amount }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{ $order->bank_tran_id }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{ $order->card_issuer }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{ $order->card_brand }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{ $order->val_id }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{ $order->card_type }}
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</body>

</html>