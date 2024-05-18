<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品の詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="md:flex md:justify-around">
                        <div class="md:w-1/2">
                            <x-thumbnail filename="{{ $product->imageFirst->filename ?? '' }}" type="products" />
                        </div>
                        <div class="md:w-1/2 ml-4">
                            <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ $product->category->name }}
                            </h2>
                            <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $product->name }}</h1>
                            <p class="leading-relaxed">{{ $product->information }}</p>
                            <div class="flex justify-around items-center mt-10">
                                <div>
                                    <span class="title-font font-medium text-2xl text-gray-900">{{ number_format($product->price) }}</span><span class="text-sm">円(税込)</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="relative">
                                        {{-- <select name="quantity" type="number"
                                            class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 text-base pl-3 pr-10">
                                            <option>SM</option>
                                            <option>M</option>
                                            <option>L</option>
                                            <option>XL</option>
                                        </select> --}}
                                        <label for="quantity">数量</label>
                                        <input type="number" name="quantity" id="quantity" class="rounded border appearance-none border-gray-300" value="0" min="0">
                                    </div>
                                    <button
                                        class="text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded ml-4">カートに入れる</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
