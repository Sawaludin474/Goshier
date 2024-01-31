<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Go Shier</title>
</head>

<body>
    <div class="flex flex-wrap md:flex-nowrap h-screen">
        <div class="bg-white md:border-r md:border-gray-300 max-h-full w:3/5">
            <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6  lg:max-w-7xl lg:px-8 ">
                <div class="flex justify-between mb-4">
                    <a class="px-4 py-2 bg-green-500 text-white rounded btn" href="{{ route('products.create')}}">Add Data</a>
                    <form action="{{{ route('logout')}}}" method="post">
                        @csrf
                        <button class="px-4 py-2 bg-red-500 text-white rounded" type="submit">Sign Out</button>
                    </form>
                </div>
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Goshier</h2>
                
                <div class="mt-6 grid grid-cols-3 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                    @foreach ($product as $food)
                    <div class="group relative" onclick="addToTransaction('{{ $food->id }}', '{{ $food->p_name }}', '{{ $food->price }}')">    
                        <div
                            class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-50">
                            <img src="{{ asset('storage/' . $food->image) }}" width="100PX" alt="{{$food->image}}"
                                alt="Front of men&#039;s Basic Tee in black."
                                class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <a href="#" class="text-sm font-medium text-gray-900">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $food->p_name}}
                                    </a>
                                </h3>
                            </div>
                                <p class="text-sm font-medium text-gray-900">Rp.{{$food->price}}</p>
                            </div>
                    </div>
                    @endforeach
                    <!-- More products... -->
                </div>
            </div>
        </div>
        <!-- Column 2: Contains some text -->
        <div class="w-full md:w-2/5">
            <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="border-b border-gray-300 mx-auto">
                    <h2 class="text-2xl font-bold tracking-tight text-center mb-10 text-gray-900">Order List</h2>
                    <div class="mb-4">
                        <table class="table-fixed w-full" id="orderTable">
                            <tbody>
                                <!-- Rows will be added here -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex justify-between mb-4">
                    <h1 class="text-2xl tracking-tight text-gray-900">Total: </h1>
                    <h1 class="text-2xl tracking-tight text-gray-900">Rp. </h1>
                </div>
            </div>
            
            <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="text-2xl font-bold tracking-tight text-center mb-10 text-gray-900">Payment Method</h2>
                <form class="grid grid-cols-4 gap-4 justify-between mb-4">
                    <label class="flex justify-center items-center space-x-2">
                        <input type="radio" name="number" value="01" class="hidden peer" id="num1" />
                        <span class="px-2 py-1 border w-20 border-blue-500 text-blue-500 rounded cursor-pointer peer-checked:bg-blue-600 peer-checked:text-white text-center">Tunai</span>
                    </label>
                    <label class="flex justify-center items-center space-x-2">
                        <input type="radio" name="number" value="02" class="hidden peer" id="num2" />
                        <span class="px-2 py-1 border w-20 border-blue-500 text-blue-500 rounded cursor-pointer peer-checked:bg-blue-500 peer-checked:text-white text-center">OVO</span>
                    </label>
                    <label class="flex justify-center items-center space-x-2">
                        <input type="radio" name="number" value="03" class="hidden peer" id="num3" />
                        <span class="px-2 py-1 border w-20 border-blue-500 text-blue-500 rounded cursor-pointer peer-checked:bg-blue-500 peer-checked:text-white text-center">GOPAY</span>
                    </label>
                    <label class="flex justify-center items-center space-x-2">
                        <input type="radio" name="number" value="04" class="hidden peer" id="num4" />
                        <span class="px-2 py-1 border w-20 border-blue-500 text-blue-500 rounded cursor-pointer peer-checked:bg-blue-500 peer-checked:text-white text-center">DANA</span>
                    </label>
                    <label class="flex justify-center items-center space-x-2">
                        <input type="radio" name="number" value="05" class="hidden peer" id="num5" />
                        <span class="px-2 py-1 border w-20 border-blue-500 text-blue-500 rounded cursor-pointer peer-checked:bg-blue-500 peer-checked:text-white text-center">BCA</span>
                    </label>
                    <label class="flex justify-center items-center space-x-2">
                        <input type="radio" name="number" value="06" class="hidden peer" id="num6" />
                        <span class="px-2 py-1 border w-20 border-blue-500 text-blue-500 rounded cursor-pointer peer-checked:bg-blue-500 peer-checked:text-white text-center">JAK ONE</span>
                    </label>
                    <label class="flex justify-center items-center space-x-2">
                        <input type="radio" name="number" value="07" class="hidden peer" id="num7" />
                        <span class="px-2 py-1 border w-20 border-blue-500 text-blue-500 rounded cursor-pointer peer-checked:bg-blue-500 peer-checked:text-white text-center">BRI</span>
                    </label>
                    <label class="flex justify-center items-center space-x-2">
                        <input type="radio" name="number" value="08" class="hidden peer" id="num8" />
                        <span class="px-2 py-1 border w-20 border-blue-500 text-blue-500 rounded cursor-pointer peer-checked:bg-blue-500 peer-checked:text-white text-center">MANDIRI</span>
                    </label>
                    
                    <button type="submit" class="btn btn-"></button>
                </form>
            </div>

            
        </div>

    </div>

    <script>
        let productCount = 0;
        
        function decrementQuantity(productId, price) {
            let row = document.getElementById('product-' + productId);
            let qtyCell = row.cells[2];
            let totalCell = row.cells[4];
            let qty = parseInt(qtyCell.innerHTML);
            if (qty > 1) {
                qty--;
                qtyCell.innerHTML = qty;
                totalCell.innerHTML = 'Rp.' + (qty * price);
            }
        }
    
        function removeProduct(productId) {
            let row = document.getElementById('product-' + productId);
            row.parentNode.removeChild(row);
            // Optional: Update productCount or any other necessary logic after removal
        }
    
        function addToTransaction(productId, name, price) {
            const table = document.getElementById("orderTable").getElementsByTagName('tbody')[0];
            
            let existingRow = document.getElementById('product-' + productId);
            if (existingRow) {
                let qtyCell = existingRow.cells[2];
                let totalCell = existingRow.cells[4];
                let qty = parseInt(qtyCell.innerHTML) + 1;
                qtyCell.innerHTML = qty;
                totalCell.innerHTML = 'Rp.' + (qty * price);
            } else {
                productCount++;
                let row = table.insertRow();
                row.id = 'product-' + productId;
                row.insertCell(0).innerHTML = productCount;
                row.insertCell(1).innerHTML = name;
                row.insertCell(2).innerHTML = '1'; // default quantity
                row.insertCell(3).innerHTML = 'Rp.' + price;
                row.insertCell(4).innerHTML = 'Rp.' + price;
    
                // Add - and X buttons
                let actions = `
                    <button onclick="decrementQuantity('${productId}', ${price})">-</button>
                    <button class="text-right" onclick="removeProduct('${productId}')">X</button>
                `;
                row.insertCell(5).innerHTML = actions;
            }
        }
    </script>
</body>

</html>
