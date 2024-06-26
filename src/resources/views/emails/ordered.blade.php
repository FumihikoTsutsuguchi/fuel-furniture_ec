<p class="mb-4">{{ $product['ownerName']}}様の商品が注文されました。</p>

<div class="mb-4">商品情報<div>
  <ul class="mb-4">
    <li>商品名: {{ $product['name'] }}</li>
    <li>商品金額: {{ number_format($product['price'])}}円</li>
    <li>商品数: {{ $product['quantity'] }}</li>
    <li>合計金額: {{ number_format($product['price'] * $product['quantity']) }}円</li>
  </ul>

<div class="mb-4">購入者情報<div>

<p>{{ $user->name }}様</p>
<ul>
    <li>住所(配送先): {{ $user->address }}</li>
    <li>電話番号: {{ $user->tel }}</li>
</ul>
