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
                @foreach ($shops as $shop)
                    <a href="{{ route('owner.shops.edit', ['shop' => $shop->id]) }}">
                        <div class="border rounded-md p-2">
                            <div class="mb-4">
                                @if ($shop->is_selling)
                                    <span class="border inline-block p-2 rounded-md bg-blue-500 text-white">販売中</span>
                                @else
                                    <span class="border inline-block p-2 rounded-md bg-red-400 text-white">停止中</span>
                                @endif
                            </div>
                            <div class="text-xl mb-2">
                                {{ $shop->name }}
                            </div>
                            <x-thumbnail :filename="$shop->filename" type="shops" />
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
