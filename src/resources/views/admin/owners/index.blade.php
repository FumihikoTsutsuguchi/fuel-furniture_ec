<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            オーナー 一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-2 mx-auto">
                            <x-flash-message status="info" />
                            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                <div class="mb-4">
                                    <button onclick="location.href='{{ route('admin.owners.create') }}'"
                                        class="text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">新規登録</button>
                                </div>
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
                                                <td class="w-10">
                                                    <input name="plan" type="radio">
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
    </div>

</x-app-layout>
