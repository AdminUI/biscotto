<style>
    .float {
        position: fixed;
        bottom: 5px;
        left: 5px;
        background-color: {{ config('biscotto.button_background_colour') }};
        color: {{ config('biscotto.button_colour') }};
        border: 2px solid white;
        padding: 1px;
        border-radius: 9px;
        text-align: center;
    }

    .my-float {
        margin-left: auto;
        margin-right: auto;
    }

</style>

<script>
    function onCookiePopup(params) {
        let setting = document.querySelector('#cookie_popup');
        setting.style.opacity = "1";
    }

    function offCookiePopup(params) {
        let setting = document.querySelector('#cookie_popup');
        setting.style.opacity = "{{ config('biscotto.biscotto_opacity') }}";
    }

    function enableCookie() {
        // Find the cookie
        const cookie = document.querySelector('#cookie_popup');
        // Make the cookie visible
        cookie.style.display = "block";
        cookie.style.opacity = "0.2";
    }

    setTimeout(enableCookie, 1000);
</script>

<a href="#" class="float" onclick="showCookie()" onmouseover="onCookiePopup()" onmouseout="offCookiePopup()"
    id="cookie_popup" style="display: none;">
    <div class="my-float">
        <x-biscotto::cookie_icon />
    </div>
</a>
