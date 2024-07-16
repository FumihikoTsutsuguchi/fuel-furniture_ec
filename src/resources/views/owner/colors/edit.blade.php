<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">
                <form method="post" action="{{ route('owner.colors.update', ['color' => $color->id]) }}">
                    @csrf
                    @method('put')
                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="p-2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">カラータイトル</label>
                                <input type="text" id="name" name="name" value="{{ $color->name }}"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <x-input-error :messages="$errors->get('color')" class="mt-2" />
                            </div>
                        </div>
                        <div class="p-2 w-1/4 xs:w-1/2">
                            <x-thumbnail :filename="$color->filename" type="colors" />
                        </div>
                        <div class="mt-2">
                            <button type="button" onclick="location.href='{{ route('owner.colors.index') }}'"
                                class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                            <button type="submit"
                                class="text-white bg-blue-500 border-0 py-2 px-8 ml-3 focus:outline-none hover:bg-blue-600 rounded text-lg">更新する</button>
                        </div>
                    </div>
                </form>
                <form id="delete_{{ $color->id }}" method="post" class="mt-10"
                    action="{{ route('owner.colors.destroy', ['color' => $color->id]) }}">
                    @csrf
                    @method('delete')
                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <a href="#" data-id="{{ $color->id }}" onclick="deletePost(this)"
                            class="text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded text-lg inline-block ">カラーを削除する</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除してもいいですか?')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
