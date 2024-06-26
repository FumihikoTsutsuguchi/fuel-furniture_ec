<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('owner.shops.update', ['shop' => $shop->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="lg:w-1/2 md:w-2/3 mx-auto">
                            <div class="p-2">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">店名</label><span class="text-xs ml-2 text-red-500">※必須</span>
                                    <input type="text" id="name" name="name" value="{{ $shop->name }}" placeholder="店名を入力してください" requierd
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>
                            <div class="p-2">
                                <div class="relative">
                                    <label for="information" class="leading-7 text-sm text-gray-600">店舗情報</label><span class="text-xs ml-2 text-red-500">※必須</span>
                                    <textarea id="information" name="information" cols="30" rows="10" requierd placeholder="店舗情報を入力してください"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $shop->information }}</textarea>
                                    <x-input-error :messages="$errors->get('information')" class="mt-2" />
                                </div>
                            </div>
                            <div class="p-2 w-1/2">
                                <x-thumbnail :filename="$shop->filename" type="shops"/>
                            </div>
                            <div class="p-2">
                                <div class="relative flex">
                                    <div class="mr-5"><input type="radio" name="is_selling" value="1" class="mr-1" {{ $shop->is_selling === 1 ? 'checked' : ''}}>販売中</div>
                                    <div><input type="radio" name="is_selling" value="0" class="mr-1" {{ $shop->is_selling === 0 ? 'checked' : ''}}>停止中</div>
                                </div>
                            </div>
                            <div class="p-2">
                                <div class="relative">
                                    <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                                    <input type="file" id="image" name="image" accept=".png, .jpeg, .jpg" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 text-center">
                            <button type="button" onclick="location.href='{{ route('owner.shops.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                            <button type="submit" class="text-white bg-blue-500 border-0 py-2 px-8 ml-3 focus:outline-none hover:bg-blue-600 rounded text-lg">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
