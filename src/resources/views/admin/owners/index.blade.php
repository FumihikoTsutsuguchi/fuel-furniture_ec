<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            オーナー 一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-2 mx-auto">
                        <x-flash-message status="session('status')" />
                        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            <div class="mb-4">
                                <button onclick="location.href='{{ route('admin.owners.create') }}'"
                                    class="text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">新規登録</button>
                            </div>
                            <table class="table-auto w-full whitespace-no-wrap mb-8">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 bg-gray-100 rounded-tl rounded-bl"
                                            style="text-align: left">
                                            名前</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 bg-gray-100"
                                            style="text-align: left">
                                            メールアドレス</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 bg-gray-100"
                                            style="text-align: left">
                                            作成日</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 bg-gray-100"
                                            style="text-align: left">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($owners as $owner)
                                        <tr>
                                            <td class="px-4 py-3">{{ $owner->name }}</td>
                                            <td class="px-4 py-3">{{ $owner->email }}</td>
                                            <td class="px-4 py-3">{{ $owner->created_at->diffForHumans() }}</td>
                                            <td class="px-4 py-3 text-right">
                                                <form id="delete_{{ $owner->id }}" method="post" class="flex"
                                                    action="{{ route('admin.owners.destroy', ['owner' => $owner->id]) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button"
                                                        onclick="location.href='{{ route('admin.owners.edit', ['owner' => $owner->id]) }}'"
                                                        class="text-white bg-blue-500 border-0 py-2 px-4 ml-3 focus:outline-none hover:bg-blue-600 rounded text-lg">編集</button>
                                                    <a href="#" data-id="{{ $owner->id }}"
                                                        onclick="deletePost(this)"
                                                        class="text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded text-lg inline-block ml-2">削除</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $owners->links() }}
                        </div>
                    </div>
                </section>
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
