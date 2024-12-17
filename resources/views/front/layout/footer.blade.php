@php
    $setting = getSetting();
@endphp
<footer id="footer" class="footer dark-background">



    <div class="copyright">
        <div class="container text-center">
            <p>
                {{$setting->copyright ?? ''}}
            </p>


        </div>
    </div>

</footer>
