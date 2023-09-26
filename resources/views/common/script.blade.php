<script src="{{URL::asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('assets/vendor/popper/popper.min.js')}}"></script>
<script src="{{URL::asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
<!-- FontAwesome 5 -->
<script src="{{URL::asset('assets/vendor/fontawesome/js/fontawesome-all.min.js')}}" defer></script>
<!-- Page plugins -->
<script src="{{URL::asset('assets/vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
<script src="{{URL::asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{URL::asset('assets/vendor/input-mask/input-mask.min.js')}}"></script>
<script src="{{URL::asset('assets/vendor/nouislider/js/nouislider.min.js')}}"></script>
<script src="{{URL::asset('assets/vendor/textarea-autosize/textarea-autosize.min.js')}}"></script>
{{--侧边导航栏滚动--}}
<script src="{{URL::asset('assets/vendor/jquery-scrollbar/js/jquery-scrollbar.min.js')}}"></script>
<script src="{{URL::asset('assets/vendor/jquery-scrollLock/jquery-scrollLock.min.js')}}"></script>
<script src="{{URL::asset('assets/vendor/sticky-kit/sticky-kit.min.js')}}"></script>
{{--<script src="{{URL::asset('assets/vendor/clipboard-js/clipboard.min.js')}}"></script>--}}

<!-- Theme JS -->
<script src="{{URL::asset('assets/js/theme.js')}}"></script>
<!-- wow.js -->
<script src="{{URL::asset('assets/js/wow.min.js')}}"></script>
<!-- pjax -->
<script src="{{URL::asset('assets/pjax/jquery.pjax.js')}}"></script>
<script>
    //实例化wow.js
    new WOW().init()
</script>

{{--// 页面js代码--}}
@stack('script')
