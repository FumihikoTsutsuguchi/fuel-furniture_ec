@php
    $cloudFrontDomain = 'https://cf.fuel-furniture.com/';

    if ($type === 'shops') {
        $path = 'shops/';
    }
    if ($type === 'products') {
        $path = 'products/';
    }

@endphp

<div class="c-thumbnail">
    @if (empty($filename))
        <img src="{{ asset('images/no_image.jpg') }}" alt="NO IMAGE">
    @else
        <img src="{{ $cloudFrontDomain . $path . $filename }}" alt="">
    @endif
</div>
