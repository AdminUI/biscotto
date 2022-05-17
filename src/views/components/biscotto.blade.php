<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .cookie-container {
        position: fixed;
        z-index: 999999;
        left: 0;
        bottom: 0;
        right: 0;
    }

    .cookie-card {
        padding: 0.5rem 1.2rem;
        background-color: #fff;
        text-align: center;
        border-top: 1px solid rgba(0, 0, 0, 0.4);
        box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
    }

    .cookie-card h3 {
        font-size: 21px;
        padding: 0.5rem 1rem;
    }

    .cookie-card .cookie-message {
        margin-bottom: 1rem;
    }

    .cookie-card p {
        font-size: 14px;
        color: rgba(0, 0, 0, .8);
        padding-bottom: 20px;
    }

    .cookie-buttons {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        margin-bottom: 1rem;
    }

    .cookie-btn {
        padding: .75rem 1.5rem;
        border-radius: 4px;
        border: 1px solid #7C4970;
        outline: none;
        background: transparent;
        font-weight: bold;
        color: #7C4970;
        cursor: pointer;
        transition: .2s ease-in-out;
    }

    .bg {
        background-color: #FC8490;
        color: #FAFBFB;
        border-color: #FC8490;
        box-shadow: 5px 5px 15px -6px #D48EA6;
    }

    .bg:hover,
    .cookie-btn:hover {
        /*   box-shadow: 6px 8px 5px -7px #FC8490; */
        color: #FAFBFB;
        border-color: #fa7885;
        background-color: #fa7885;
    }

    .setting .header {
        display: flex;
        align-items: center;
    }

    .biscotto__switches {
        display: flex;
        justify-content: space-evenly;
        margin-top: 20px;
        gap: 20px;
    }

    .biscotto__switch {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }

    .biscotto__switch--label {
        font-size: 14px;
        margin-right: 0.5rem;
        font-weight: bold;
    }

    .biscotto__switch--input {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 30px;
    }

    .biscotto__switch--input input {
        width: 0;
        height: 0;
        opacity: 0;
    }

    .biscotto-rounded {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #ccc;
        border-radius: 50px;
        transition: .2s ease-in-out;
    }

    .biscotto-rounded::before {
        content: "";
        position: absolute;
        width: 25px;
        height: 25px;
        /*   margin:3px; */
        background-color: #fff;
        border-radius: 50%;
        left: 3px;
        bottom: 2.2px;
        transition: inherit;
    }

    .biscotto__switch--input input:checked+.biscotto-rounded {
        background-color: #81D9CD;
    }

    .biscotto__switch--input input:focus+.biscotto-rounded {
        box-shadow: 0 0 1px #2196F3;
    }

    .biscotto__switch--input input:checked+.biscotto-rounded:before {
        -webkit-transform: translateX(30px);
        -ms-transform: translateX(30px);
        transform: translateX(30px);
    }

    .setting .actions {
        margin-top: 20px;
        padding-top: 10px;
        padding-right: 20px;
        background: #FAFBFB;
        display: flex;
        gap: 20px;
        justify-content: flex-end;
    }

</style>

{{ $slot }}

<div class="cookie-container" id="cookie-plugin" style="display: none;">
    <div class="cookie-card main">
        <h3 style="color: black">{{ __('biscotto.allow_cookie') }}</h3>
        <div class="cookie-message">{!! __('biscotto.cookie_message') !!}</div>
        <div class="cookie-buttons">
            <button class="cookie-btn" onclick="showCookieSettings()">{{ __('biscotto.customise') }}</button>
            <button class="cookie-btn bg" onclick="acceptCookie(true)">{{ __('biscotto.allow_all') }}</button>
        </div>
    </div>
    <div class="cookie-card setting" style="display:none" id="cookie-settings">
        <div class="header">
            <button onclick="showCookieSettings()">
                <img src="https://s2.svgbox.net/octicons.svg?ic=arrow-left&color=000" width="32" height="32">
            </button>
            <h3 style="color: black">{{ __('biscotto.preference_message') }}</h3>
        </div>
        <div class="biscotto__switches">
            <div class="biscotto__switch">
                <div class="biscotto__switch--label" style="color: black">{{ __('biscotto.necessary') }}</div>
                <label class="biscotto__switch--input">
                    <input type="checkbox" id="cookie-necessary" disabled checked>
                    <span class="biscotto-rounded"></span>
                </label>
            </div>
            <div class="biscotto__switch">
                <div class="biscotto__switch--label" style="color: black">{{ __('biscotto.functional') }}</div>
                <label class="biscotto__switch--input">
                    <input type="checkbox" id="cookie-functional">
                    <span class="biscotto-rounded"></span>
                </label>
            </div>
            <div class="biscotto__switch">
                <div class="biscotto__switch--label" style="color: black">{{ __('biscotto.statistics') }}</div>
                <label class="biscotto__switch--input">
                    <input type="checkbox" id="cookie-statistics">
                    <span class="biscotto-rounded"></span>
                </label>
            </div>
            <div class="biscotto__switch">
                <div class="biscotto__switch--label" style="color: black">{{ __('biscotto.marketing') }}</div>
                <label class="biscotto__switch--input">
                    <input type="checkbox" id="cookie-marketing">
                    <span class="biscotto-rounded"></span>
                </label>
            </div>
        </div>
        <div class="actions">
            <a href="{{ config('biscotto.biscotto_link') ?? 'Missing config' }}"
                class="cookie-btn bg">{{ __('biscotto.policy') }}</a>
            <button class="cookie-btn bg" onclick="acceptCookie()">{{ __('biscotto.save') }}</button>
        </div>
    </div>
</div>

{{-- Add the cookie activator --}}
<x-biscotto::cookie_activator />

<script>
    // Required variables
    let cookieStorageName = 'cookie_status';

    // Display the cookie settings
    function showCookieSettings() {
        let setting = document.querySelector('#cookie-settings');
        const display = setting.style.display === "none" ? "block" : "none";
        setting.style.display = display;
    }
    /**
     * Userfull Storage fuctions BEGIN 🍪🍪🍪🍪🍪
     * */

    /**
     * Add the item to the browser storage
     * @param mixed key
     * @param mixed data
     *
     */
    function addItemStorage(key, data) {
        window.localStorage.setItem(key, data);
    }

    /**
     * Retrive item from the storage
     *
     * @param mixed key
     *
     */
    function getItemStorage(key) {
        return window.localStorage.getItem(key)
    }

    /**
     * Remove the key from the storage
     *
     * @param mixed key
     *
     */
    function revomeItemStorage(key) {
        window.localStorage.removeItem(key);
    }

    /**
     * Clear all the storage data
     * @param mixed key
     *
     */
    function killStorage(key) {
        window.localStorage.clear();
    }
    /**
     * Userfull Storage functions END 🍪🍪🍪🍪🍪
     * */


    /**
     * Return all available cookies for the website
     *
     * @return object [cookies]
     */
    function getPageCookies() {

        // cookie is a string containing a semicolon-separated list, this split puts it into an array
        const cookieArr = document.cookie.split(";");

        // This object will hold all of the key value pairs
        const cookieObj = cookieArr.reduce((acc, curr) => {
            const [key, value] = curr.trim().split("=");
            acc[key] = value;
            return acc;
        }, {});
        return cookieObj;
    }


    /**
     * Delete cookie based on the name
     *
     * @param mixed name // cookie to delete
     *
     */
    function deleteCookie(name) {
        document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }


    /**
     * Display or hide the cookie settings – Used in cookie_activator.blade.php
     *
     */
    function showCookie() {
        let setting = document.querySelector('#cookie-plugin');
        const display = setting.style.display === "none" ? "block" : "none";
        setting.style.display = display;
    }


    /**
     * When the user accepts the cookie settings
     *
     * @param bool enableAll // if true all the cookies are enable
     *
     */
    function acceptCookie(enableAll = false) {
        let setting = document.querySelector('#cookie-plugin');
        setting.style.display = "none";

        // Check which item the user wants to enable or disable
        let functional = document.querySelector('#cookie-functional');
        let statistics = document.querySelector('#cookie-statistics');
        let marketing = document.querySelector('#cookie-marketing');

        // Array that contains the options the customer select
        const cookieOptions = [{
            'necessary': true
        }];

        // Functional
        if (enableAll) {
            ["functional", "statistics", "marketing"].forEach(section => {
                cookieOptions.push({
                    [section]: true
                });
            })
        } else {
            cookieOptions.push({
                'functional': functional.checked === true
            });
            cookieOptions.push({
                'statistics': statistics.checked === true
            });
            cookieOptions.push({
                'marketing': marketing.checked === true
            });
        }

        // The storage varaible that will make the user save the option if the cookie is enable
        addItemStorage(cookieStorageName, true);
        // The variable that will store the user options
        addItemStorage('cookieOptions', JSON.stringify(cookieOptions));
        // Run the script to enable or disable the cookies
        scriptEnableDisable();
        // Delete all the cookies based on the customer actions
        cookieKill();

        setInitialState();
    }

    // This fuction is all once the user accept the cookie policy and on load if is accepted
    const cookieFunctional = JSON.parse('@json(config('biscotto.cookie_functional'))');
    const cookieStatistics = JSON.parse('@json(config('biscotto.cookie_statistics'))');
    const cookieMarketing = JSON.parse('@json(config('biscotto.cookie_marketing'))');

    /**
     * This fuction will loop through all the cookie options and disable the cookies based on the config file
     */
    function cookieKill() {
        // Get all the cookie conserned by the user
        for (const [key, value] of Object.entries(JSON.parse(getItemStorage('cookieOptions')))) {
            for (const [cookieKey, cookie] of Object.entries(value)) {
                switch (cookieKey) {
                    case 'functional':
                        cookieKillLoop(cookie, cookieFunctional);
                        break;
                    case 'statistics':
                        cookieKillLoop(cookie, cookieStatistics);
                        break;
                    case 'marketing':
                        cookieKillLoop(cookie, cookieMarketing);
                        break;
                }
            }
        }
    }

    /**
     * @param mixed cookie // true or false is the one the user has allowed or not
     * @param mixed array // the cookie array list we goin to make expire
     *
     */
    function cookieKillLoop(cookie, array) {
        if (cookie == false) {
            // Loop the config variable to remove the cookies
            array.forEach(element => {
                deleteCookie(element);
            });
        }
    }

    // This fuction is all once the user accept the cookie policy and on load if is accepted
    const cookieIdFunctional = '{{ config('biscotto.script_cookie_functional') }}';
    const cookieIdStatistics = '{{ config('biscotto.script_cookie_statistics') }}';
    const cookieIdMarketing = '{{ config('biscotto.script_cookie_marketing') }}';

    // This function will loop through the DOM and based on the biscotto config file will disable or enable scripts
    function scriptEnableDisable() {
        // Loop the user selected options stored in the local storage
        for (const value of Object.values(JSON.parse(getItemStorage('cookieOptions')))) {
            // Get all the cookie conserned options
            for (const [cookieKey, cookie] of Object.entries(value)) {

                // Now check the option we try to check
                // Note that you need to the add ID in the script or iframe you want to enable or disable
                switch (cookieKey) {
                    // If is functional will disable or enable the scripts
                    case 'functional':
                        enableOrDisableScripts(cookieIdFunctional, cookie);
                        break;
                        // If is statistics will disable or enable the scripts
                    case 'statistics':
                        enableOrDisableScripts(cookieIdStatistics, cookie);
                        break;
                        // If is marketing will disable or enable the scripts
                    case 'marketing':
                        enableOrDisableScripts(cookieIdMarketing, cookie);
                        break;
                }
            }
        }
    }

    /**
     * Find on the page the cookies with the tag that need to be disabled or enabled
     * @param mixed cookieId
     * @param mixed enable
     *
     */
    function enableOrDisableScripts(cookieId, enable) {
        // List scripts to enable or disable
        const scriptList = document.querySelectorAll("#" + cookieId);
        // If the user option is true means that will enable the script
        if (enable == true) {
            scriptList.forEach(element => {
                if (element.getAttribute('data-src')) {
                    element.setAttribute('src', element.getAttribute('data-src'));
                    element.removeAttribute('data-src');
                }
            });
        } else {
            // Disable the scripts case use change his mind
            scriptList.forEach(element => {
                if (element.getAttribute('src')) {
                    element.setAttribute('data-src', element.getAttribute('src'));
                    element.removeAttribute('src');
                }
            });
        }
    }

    function setInitialState() {
        const inputs = {
            necessary: document.querySelector('#cookie-necessary'),
            functional: document.querySelector('#cookie-functional'),
            statistics: document.querySelector('#cookie-statistics'),
            marketing: document.querySelector('#cookie-marketing')
        }

        const items = JSON.parse(getItemStorage("cookieOptions"));

        items.forEach((item) => {
            const [key, status] = Object.entries(item)[0];
            inputs[key].checked = status;
        })
    }


    // If debug is enable will display all the available cookies on the site
    const biscottoDebug = '{{ config('biscotto.biscotto_debug') }}';

    // On page fuly loaded
    window.addEventListener('DOMContentLoaded', function() {
        // If the cookie is accepted will hide on load
        const setting = document.querySelector('#cookie-plugin');

        if (getItemStorage(cookieStorageName)) {
            setting.style.display = "none";
            scriptEnableDisable();
            cookieKill();
        } else {
            // If the cookie is not accepted will show on load
            setting.style.display = "block";
        }

        setInitialState();

        if (biscottoDebug == 'true') {
            console.log('Site Available Cookies', getPageCookies());
        }
    });
</script>
