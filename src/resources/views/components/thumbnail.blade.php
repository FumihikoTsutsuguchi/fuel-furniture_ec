@php
    if ($type === 'shops') {
        $path = 'storage/shops/';
    }
    if ($type === 'products') {
        $path = 'storage/product/';
    }
@endphp

<div>
    @if (empty($filename))
        <img src="{{ asset('images/no_image.jpg') }}" alt="NO IMAGE">
    @else
        <img src="{{ asset($path . $filename) }}" alt="">
    @endif
</div>
