<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">
                <x-flash-message status="session('status')" />
                <form method="post" action="{{ route('owner.products.update', ['product' => $product->id]) }}">
                    @csrf
                    @method('put')
                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="p-2">
                            <div class="relative">
                                <label for="shop_id" class="leading-7 text-sm text-black">販売する店舗</label><span
                                    class="text-xs ml-2 text-red-500">※必須</span>
                                <select id="shop_id"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    name="shop_id">
                                    @foreach ($shops as $shop)
                                        <option value="{{ $shop->id }}"
                                            {{ $shop->id === $product->shop_id ? 'selected' : '' }}>
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
                                                <option value="{{ $secondary->id }}"
                                                    {{ $secondary->id === $product->secondary_category_id ? 'selected' : '' }}>
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
                                <input type="text" id="name" name="name" value="{{ $product->name }}"
                                    requierd
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="relative">
                                <label for="information" class="leading-7 text-sm text-black">商品情報</label><span
                                    class="text-xs ml-2 text-red-500">※必須</span>
                                <textarea id="information" name="information" cols="30" rows="10" requierd
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $product->information }}</textarea>
                                <x-input-error :messages="$errors->get('information')" class="mt-2" />
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="relative">
                                <label for="price" class="leading-7 text-sm text-black">価格</label><span
                                    class="text-xs ml-2 text-red-500">※必須</span>
                                <input type="number" id="price" name="price" value="{{ $product->price }}"
                                    min="0" requierd
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="relative">
                                <label for="quantity" class="leading-7 text-sm text-black">数量</label><span
                                    class="text-xs ml-2 text-red-500">※必須</span>
                                <input type="number" id="quantity" name="quantity" value="0" min="0"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="relative flex">
                                <div class="mr-5">
                                    <input type="radio" name="type" value="{{ \Constant::PRODUCT_LIST['add'] }}"
                                        class="mr-1" checked>追加
                                </div>
                                <div>
                                    <input type="radio" name="type"
                                        value="{{ \Constant::PRODUCT_LIST['reduce'] }}" class="mr-1">削減
                                </div>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="relative">
                                <label for="current_quantity" class="leading-7 text-sm text-black">現在の在庫数</label>
                                <input type="hidden" id="current_quantity" name="current_quantity"
                                    value="{{ $quantity }}">
                                <div
                                    class="w-full bg-gray-200 rounded text-base outline-none text-gray-700 py-1 px-3 leading-8">
                                    {{ $quantity }}</div>
                            </div>
                        </div>
                        <div class="p-2 mb-8">
                            <div class="relative">
                                <label for="sort_order" class="leading-7 text-sm text-black">表示順</label>
                                <input type="number" id="sort_order" name="sort_order"
                                    value="{{ $product->sort_order }}"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 mb-8">
                            <div class="relative">
                                <label for="shipping_time" class="leading-7 text-sm text-black">発送までの期間</label>
                                <input type="number" id="shipping_time" name="shipping_time"
                                    value="{{ $product->shipping_time }}"
                                    class="bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <span>日</span>
                                <span
                                    class="text-xs ml-2 text-red-500">※必須</span>
                            </div>
                        </div>

                        <x-select-image :images="$images" name="image1" currentId="{{ $product->image1 }}"
                            currentImage="{{ $product->imageFirst->filename ?? '' }}" />
                        <x-select-image :images="$images" name="image2" currentId="{{ $product->image2 }}"
                            currentImage="{{ $product->imageSecond->filename ?? '' }}" />
                        <x-select-image :images="$images" name="image3" currentId="{{ $product->image3 }}"
                            currentImage="{{ $product->imageThird->filename ?? '' }}" />
                        <x-select-image :images="$images" name="image4" currentId="{{ $product->image4 }}"
                            currentImage="{{ $product->imageFourth->filename ?? '' }}" />

                        <div class="p-2">
                            <div class="relative flex">
                                <div class="mr-5">
                                    <input type="radio" name="is_selling" value="1" class="mr-1"
                                        {{ $product->is_selling === 1 ? 'checked' : '' }}>販売中
                                </div>
                                <div>
                                    <input type="radio" name="is_selling" value="0" class="mr-1"
                                        {{ $product->is_selling === 0 ? 'checked' : '' }}>停止中
                                </div>
                            </div>
                        </div>
                        <div class="mt-8">
                            <button type="button" onclick="location.href='{{ route('owner.products.index') }}'"
                                class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                            <button type="submit"
                                class="text-white bg-blue-500 border-0 py-2 px-8 ml-3 focus:outline-none hover:bg-blue-600 rounded text-lg">更新</button>
                        </div>
                    </div>
                </form>
                <form id="delete_{{ $product->id }}" method="post" class="mt-10"
                    action="{{ route('owner.products.destroy', ['product' => $product->id]) }}">
                    @csrf
                    @method('delete')
                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <a href="#" data-id="{{ $product->id }}" onclick="deletePost(this)"
                            class="text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded text-lg inline-block ">商品を削除する</a>
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

        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除してもいいですか?')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
