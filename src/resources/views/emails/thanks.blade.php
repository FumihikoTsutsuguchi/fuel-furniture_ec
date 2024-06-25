<p class="mb-4">{{ $user->name }} 様</p>

<p class="mb-4">下記のご注文ありがとうございました。</p>

商品内容
<?php
$total = 0;
?>

@foreach($products as $product)
<ul class="mb-4">
  <li>商品名: {{ $product['name'] }}</li>
  <li>商品金額: {{ number_format($product['price'])}}円</li>
  <li>商品数: {{ $product['quantity'] }}</li>
  <li>小計: {{ number_format($product['price'] * $product['quantity']) }}円</li>
</ul>
<?php $total += $product['price'] * $product['quantity']; ?>
@endforeach

<p>合計金額: {{ number_format($total) }}円</p>


<p>お客様情報</p>
<ul>
    <li>住所(配送先) :{{ $user->address }}</li>
    <li>電話番号 :{{ $user->tel }}</li>
</ul>
