@php

    if ($name === 'color') {
        $modal = 'modal-color';
    }

    $cColor = $currentColor ?? '';
    $cId = $currentId ?? '';

@endphp

<label for="{{ $name }}" class="leading-7 text-sm text-black">カラー</label>
<div class="modal micromodal-slide" id="{{ $modal }}" aria-hidden="true">
    <div class="modal__overlay z-50" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="{{ $modal }}-title">
            <header class="modal__header">
                <h2 class="text-xl text-gray-700" id="{{ $modal }}-title">
                    ファイルを選択してください
                </h2>
                <button type="button" class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content" id="{{ $modal }}-content">
                <div class="flex flex-wrap">
                    @foreach ($colors as $color)
                        <div class="w-1/4 p-2 md:p-4">
                            <div class="c-product-image">
                                <img class="image" data-id="{{ $name }}_{{ $color->id }}" data-directory="colors" data-color="{{ $color->name }}"
                                    data-file="{{ $color->filename }}" data-path="{{ asset('storage/products/') }}"
                                    data-modal="{{ $modal }}"
                                    src="{{ asset('https://cf.fuel-furniture.com/colors/' . $color->filename) }}">
                                <div class="text-gray-700">{{ $color->name }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </main>
            <footer class="modal__footer">
                <button type="button" class="modal__btn" data-micromodal-close aria-label="閉じる">閉じる</button>
            </footer>
        </div>
    </div>
</div>


<div class="flex justify-between items-center mb-5">
    <a class="py-2 px-4 bg-gray-300 rounded" data-micromodal-trigger="{{ $modal }}" href='javascript:;'>画像ファイル選択</a>
    <div class="{{ $cColor ? 'c-product-image' : '' }}">
        <img id="{{ $name }}_thumbnail" src="{{ $cColor ? asset('https://cf.fuel-furniture.com/colors/' . $cColor) : '' }}">
        <span id="{{ $name }}_title"></span>
    </div>
</div>
<input id="{{ $name }}_hidden" type="hidden" name="{{ $name }}" value="{{ $cId }}">
