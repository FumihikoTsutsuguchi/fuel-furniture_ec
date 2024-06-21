<div class="c-wrapper">
    <div class="c-footer">
        <div class="c-footer__logo">
            <img src="" class="" />
        </div>
        <nav class="c-footer__nav">
            <ul class="c-footer__nav-list">
                <li><a href="{{ route('user.items.index') }}">Top</a></li>
                <li><a href="{{ route('user.cart.index') }}">Cart</a></li>
                <li><a href="{{ route('user.items.index') }}">プライバシーポリシー</a></li>
                <li><a href="{{ route('user.items.index') }}">利用規約</a></li>

                @if (Auth::user())
                <li><a href="{{ route('user.profile.edit') }}">プロフィール</a></li>
                @endif

            </ul>
            <ul class="c-footer__nav-list-sns">
                <li>
                    <a href="https://www.instagram.com/pankunlife/" target="__blank">
                        <img src="{{ asset('images/Instagram_Glyph_Black.png') }}" alt="" width="22">
                        <span>Instagram (FUEL-Furniture)</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/fuel_outgoing/" target="__blank">
                        <img src="{{ asset('images/Instagram_Glyph_Black.png') }}" alt="" width="22">
                        <span>Instagram (FUEL)</span>
                    </a>
                </li>
            </ul>
            <div class="c-footer__copyright">&copy; Fuel-Furniture</div>
        </nav>
    </div>
</div>
