<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            期限切れオーナー 一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-2 mx-auto">
                        <x-flash-message status="session('status')" />
                        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            <table class="table-auto w-full whitespace-no-wrap">
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
                                            期限が切れた日</th>
                                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 bg-gray-100"
                                            style="text-align: left">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expiredOwners as $owner)
                                        <tr>
                                            <td class="px-4 py-3">{{ $owner->name }}</td>
                                            <td class="px-4 py-3">{{ $owner->email }}</td>
                                            <td class="px-4 py-3">{{ $owner->deleted_at->diffForHumans() }}</td>
                                            <td class="px-4 py-3 text-right">
                                                <form id="delete_{{ $owner->id }}" method="post" class="flex"
                                                    action="{{ route('admin.expired-owners.destroy', ['owner' => $owner->id]) }}">
                                                    @csrf
                                                    <a href="#" data-id="{{ $owner->id }}"
                                                        onclick="deletePost(this)"
                                                        class="text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded text-lg inline-block ml-1">完全に削除</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
