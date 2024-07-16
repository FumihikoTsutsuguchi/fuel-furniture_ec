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
                <div class="mb-4 p-2 md:p-4">
                    <button
                        onclick="location.href='{{ route('owner.colors.create') }}'"class="text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">新規登録</button>
                </div>
                <div class="flex flex-wrap">
                    @foreach ($colors as $color)
                        <div class="w-1/6 p-2 md:p-4 xs:w-1/2">
                            <a href="{{ route('owner.colors.edit', ['color' => $color->id]) }}">
                                <div class="border rounded-md p-2 md:p-4">
                                    <x-thumbnail :filename="$color->filename" type="colors" />
                                    <div class="text-gray-700 mt-2">{{ $color->name }}</div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                {{ $colors->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
