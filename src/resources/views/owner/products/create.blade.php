<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">
                <form method="post" action="{{ route('owner.products.store') }}">
                    @csrf
                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="p-2">
                            <div class="relative">
                                <label for="shop_id" class="leading-7 text-sm text-black">販売する店舗</label><span
                                    class="text-xs ml-2 text-red-500">※必須</span>
                                <select id="shop_id"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    name="shop_id">
                                    @foreach ($shops as $shop)
                                        <option value="{{ $shop->id }}">
                                            {{ $shop->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="relative">
                                <label for="category" class="leading-7 text-sm text-black">カテゴリ</label><span
                                    class="text-xs ml-2 text-red-500">※必須</span>
                                <select id="category"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    name="category">
                                    @foreach ($categories as $category)
                                        <optgroup label="{{ $category->name }}">
                                            @foreach ($category->secondary as $secondary)
                                                <option value="{{ $secondary->id }}">
                                                    {{ $secondary->name }}
                                                </option>
                                            @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-black">商品名</label><span
                                    class="text-xs ml-2 text-red-500">※必須</span>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" requierd
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="relative">
                                <label for="information" class="leading-7 text-sm text-black">商品情報</label><span
                                    class="text-xs ml-2 text-red-500">※必須</span>
                                <textarea id="information" name="information" cols="30" rows="10" requierd
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $shop->information }}</textarea>
                                <x-input-error :messages="$errors->get('information')" class="mt-2" />
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="relative">
                                <label for="price" class="leading-7 text-sm text-black">価格</label><span
                                    class="text-xs ml-2 text-red-500">※必須</span>
                                <input type="number" id="price" name="price" value="{{ old('price') }}" requierd
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="relative">
                                <label for="quantity" class="leading-7 text-sm text-black">初期在庫数</label><span
                                    class="text-xs ml-2 text-red-500">※必須</span>
                                <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 mb-8">
                            <div class="relative">
                                <label for="sort_order" class="leading-7 text-sm text-black">表示順</label>
                                <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order') }}"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 mb-8">
                            <div class="relative">
                                <label for="shipping_time" class="leading-7 text-sm text-black">発送までの期間</label>
                                <input type="number" id="shipping_time" name="shipping_time"
                                    value="{{ old('shipping_time') }}"
                                    class="bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <span>日</span><span class="text-xs ml-2 text-red-500">※必須</span>
                            </div>
                        </div>
                        <x-select-image :images="$images" name="image1" />
                        <x-select-image :images="$images" name="image2" />
                        <x-select-image :images="$images" name="image3" />
                        <x-select-image :images="$images" name="image4" />
                        <div class="p-2">
                            <div class="relative flex">
                                <div class="mr-5">
                                    <input type="radio" name="is_selling" value="1" class="mr-1" checked>販売中
                                </div>
                                <div>
                                    <input type="radio" name="is_selling" value="0" class="mr-1">停止中
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 text-center">
                        <button type="button" onclick="location.href='{{ route('owner.products.index') }}'"
                            class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                        <button type="submit"
                            class="text-white bg-blue-500 border-0 py-2 px-8 ml-3 focus:outline-none hover:bg-blue-600 rounded text-lg">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        'use strict'
        const images = document.querySelectorAll('.image')
        images.forEach(image => {
            image.addEventListener('click', function(e) {
                const imageName = e.target.dataset.id.substr(0, 6)
                const imageId = e.target.dataset.id.replace(imageName + '_', '')
                const imageFile = e.target.dataset.file
                const imagePath = 'https://cf.fuel-furniture.com/products/'
                const modal = e.target.dataset.modal

                document.getElementById(imageName + '_thumbnail').src = imagePath + imageFile
                document.getElementById(imageName + '_hidden').value = imageId
                document.getElementById(imageName + '_thumbnail').parentElement.classList.add('c-product-image');
                MicroModal.close(modal);
            })
        })
    </script>
</x-app-layout>
