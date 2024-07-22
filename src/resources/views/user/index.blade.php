<x-app-layout>
    <div class="swiper swiper__mv">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="{{ asset('/images/mv_1.jpg') }}" alt=""><p>FUEL-Furniture</p></div>
            <div class="swiper-slide"><img src="{{ asset('/images/mv_2.jpg') }}" alt=""><p>FUEL-Furniture</p></div>
            <div class="swiper-slide"><img src="{{ asset('/images/mv_3.jpg') }}" alt=""><p>FUEL-Furniture</p></div>
        </div>
        <div class="swiper-pagination"></div>
    </div>


    <div class="p-front c-wrapper">
        <form action="{{ route('user.items.index') }}" method="get">
            <div class="c-search">
                <div class="c-search__keyword">
                    <select name="category">
                        <option value="0" {{ \Request::get('category') === '0' ? 'selected' : '' }}>カテゴリー</option>
                        @foreach ($categories as $category)
                            <optgroup label="{{ $category->name }}">
                                @foreach ($category->secondary as $secondary)
                                    <option value="{{ $secondary->id }}"
                                        {{ \Request::get('category') == $secondary->id ? 'selected' : '' }}>
                                        {{ $secondary->name }}
                                    </option>
                                @endforeach
                        @endforeach
                    </select>
                    <div class="c-search__input">
                        <input name="keyword" class="" placeholder="キーワードを入力">
                        <button class="c-button">検索する</button>
                    </div>
                </div>
                <div class="c-search__sort">
                    <div>
                        <select id="sort" name="sort" class="">
                            <option value="">表示順</option>
                            <option value="{{ \Constant::SORT_ORDER['recommend'] }}"
                                @if (\Request::get('sort') === \Constant::SORT_ORDER['recommend']) selected @endif>おすすめ順
                            </option>
                            <option value="{{ \Constant::SORT_ORDER['higherPrice'] }}"
                                @if (\Request::get('sort') === \Constant::SORT_ORDER['higherPrice']) selected @endif>料金の高い順
                            </option>
                            <option value="{{ \Constant::SORT_ORDER['lowerPrice'] }}"
                                @if (\Request::get('sort') === \Constant::SORT_ORDER['lowerPrice']) selected @endif>料金の安い順
                            </option>
                            <option value="{{ \Constant::SORT_ORDER['later'] }}"
                                @if (\Request::get('sort') === \Constant::SORT_ORDER['later']) selected @endif>新しい順
                            </option>
                            <option value="{{ \Constant::SORT_ORDER['older'] }}"
                                @if (\Request::get('sort') === \Constant::SORT_ORDER['older']) selected @endif>古い順
                            </option>
                        </select>
                    </div>
                    <div>
                        <select id="pagination" name="pagination">
                            <option value="">表示件数</option>
                            <option value="20" @if (\Request::get('pagination') === '20') selected @endif>20件
                            </option>
                            <option value="50" @if (\Request::get('pagination') === '50') selected @endif>50件
                            </option>
                            <option value="100" @if (\Request::get('pagination') === '100') selected @endif>100件
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <div class="p-front__product">
            @foreach ($products as $product)
                <a class="p-front__product-unit" href="{{ route('user.items.show', ['item' => $product->id]) }}">
                    <x-thumbnail filename="{{ $product->filename ?? '' }}" type="products" />
                    <div class="p-front__product-unit-meta">
                        <p class="p-front__product-unit-meta-category">
                            {{ $product->category }}</p>
                        <p class="p-front__product-unit-name">
                            {{ $product->name }}</p>
                        <p class="p-front__product-unit-price">{{ number_format($product->price) }}円<span class="text-sm">[税込]</span>
                        </p>
                    </div>
                </a>
            @endforeach


        </div>
        {{ $products->appends([
            'sort' => \Request::get('sort'),
            'pagination' => \Request::get('pagination'),
        ])->links() }}
    </div>
    <script>
        const select = document.getElementById('sort');
        select.addEventListener('change', function() {
            this.form.submit();
        })

        const paginate = document.getElementById('pagination');
        paginate.addEventListener('change', function() {
            this.form.submit();
        })
    </script>
</x-app-layout>
