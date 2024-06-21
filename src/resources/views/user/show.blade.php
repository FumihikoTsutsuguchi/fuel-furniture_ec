<x-app-layout>
    <div class="c-wrapper">
        <div class="p-product">
            <div class="p-product__img">
                <div class="swiper product-slider">
                    <div class="swiper-wrapper">
                        @foreach ([$product->imageFirst, $product->imageSecond, $product->imageThird, $product->imageFourth] as $image)
                            @if ($image && $image->filename !== null)
                                <div class="swiper-slide">
                                    <img src="{{ asset('https://cf.fuel-furniture.com/products/' . $image->filename) }}"
                                        alt="">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="swiper product-slider__thumbnail">
                    <div class="swiper-wrapper">
                        @foreach ([$product->imageFirst, $product->imageSecond, $product->imageThird, $product->imageFourth] as $image)
                            @if ($image && $image->filename !== null)
                                <div class="swiper-slide">
                                    <img src="{{ asset('https://cf.fuel-furniture.com/products/' . $image->filename) }}"
                                        alt="">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="p-product__meta">
                <p class="p-product__meta-category">{{ $product->category->name }}
                </p>
                <h2 class="p-product__meta-heading">{{ $product->name }}</h2>
                <p class="p-product__meta-text">{{ $product->information }}</p>
                <form action="{{ route('user.cart.add') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="p-product__meta-send">
                        <div class="p-product__meta-send-price">
                            <p>{{ number_format($product->price) }}円</p>
                            <span>[税込]</span>
                        </div>
                        <div class="p-product__meta-send-volume">
                            <div class="p-product__meta-send-volume-input">
                                <label for="quantity"></label>
                                <input type="number" name="quantity" id="quantity"
                                    class="rounded border appearance-none border-gray-300" value="1"
                                    min="1">
                            </div>
                            <button
                                class="c-button__cart">カートに入れる</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
