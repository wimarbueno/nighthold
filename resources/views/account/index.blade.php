@php
    $config = [
        'appName' => config('app.name'),
        'appUrl' => config('app.url'),
        'locale' => str_replace('_', '-', app()->getLocale()),
        'locales' => config('app.locales'),
        'topdonat' => setting('top-donaty.donate_status'),
        'userId' => auth()->user()->role_id,
        'mmotop' => setting('site.mmotop'),
        'logo' => asset(Utils::ImagesLogo('storage/'.setting('site.logo')))
    ];
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" type="image/x-icon" href="https://blzaccount.akamaized.net/static/images/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>const whTooltips = {colorLinks: true, iconizeLinks: true, renameLinks: true};</script>
    <script src="https://wow.zamimg.com/widgets/power.js"></script>
    <title></title>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-M9NHLHV');</script>
    <!-- End Google Tag Manager -->

    <!— Yandex.Metrika counter —>
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(82884523, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/82884523" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!— /Yandex.Metrika counter —>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9NHLHV"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="app"></div>
<div class="loading-overlay hide"></div>
<script>
    window.config = @json($config);
</script>
<script>"use strict";!function(n){var o="/api/error-report";function t(e,r,n){void 0!==r[n]&&(e[n]=r[n])}function a(){var e,r;return{system:function(){var e={};e.clientTimeMillis=Date.now();var r=n.navigator;return t(e,r,"oscpu"),t(e,r,"hardwareConcurrency"),t(e,r,"deviceMemory"),e}(),network:(e={},void 0!==(r=n.navigator.connection)&&(t(e,r,"downlink"),t(e,r,"downlinkMax"),t(e,r,"effectiveType"),t(e,r,"rtt"),t(e,r,"type")),e),browser:function(){var e={};t(e,n&&n.location,"href"),t(e,n,"devicePixelRatio"),t(e,n,"innerHeight"),t(e,n,"innerWidth");var r=n.navigator;return t(e,r,"platform"),t(e,r,"userAgent"),t(e,r,"language"),t(e,r,"cookieEnabled"),e}()}}function e(e,r,n,o,t){var i=function(e,r,n,o,t){return{message:e,source:r,lineno:n,colno:o}}.apply(void 0,arguments);c({environment:a(),error:i}),console.error(t)}function c(e){console.info("An error occurred. Submitting report.");var r=new XMLHttpRequest;r.open("POST",o),r.setRequestHeader("Content-Type","application/json"),r.setRequestHeader("Accept","application/json");var n=document.cookie.match(new RegExp("XSRF-TOKEN=([^;]+)"));n&&n.length&&r.setRequestHeader("X-XSRF-TOKEN",n[1]),r.addEventListener("error",function(e){console.error("An error occurred while sending an error-report. Error: "+e)}),r.send(JSON.stringify(e))}void 0!==n?(n.onerror=e,n.errorReporter={global:e,vue:function(e,r,n){var o=function(e,r,n){return{stack:e.stack}}.apply(void 0,arguments);c({environment:a(),vueError:o}),console.error(e)}},console.debug("Listening for unhandled errors...")):console.error('Unable to bind onError listener as "window" was undefined.')}(window);</script>
<script src="{{ mix('static/js/manifest.js') }}"></script>
<script src="{{ mix('static/js/vendor.js') }}"></script>
<script src="{{ mix('static/js/app.js') }}"></script>
</body>
</html>
