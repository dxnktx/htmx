@extends('JangKeyte::layout.guest')

@section('main_header')
  @include('TripBooking::layout.partials.header')
@endsection

@section('main_footer')
  @include('TripBooking::layout.partials.footer')
@endsection
<script type="text/javascript" src="{{ asset('assets/js/firework.js') }}"></script>
<script type='text/javascript'>
  //<![CDATA[
  document.write(
    '<div class="tet-2025"><img class="left-2025" id="left-2020" src="{{ asset('assets/images/newyear-left.png') }}"/><img class="right-2025" id="right-2020" src="{{ asset('assets/images/newyear-right.png') }}"/></div><style>#left-2020{width: 130px;left:0;z-index:7;position:fixed;;transition:all 0.3s linear;-moz-transition:all 0.3s linear;-webkit-transition:all 0.3s linear}#right-2020{width: 130px;right:0;z-index:7;position:fixed;;transition:all 0.3s linear;-moz-transition:all 0.3s linear;-webkit-transition:all 0.3s linear}.left-2025{top:0px}.right-2025{top:0px}.text-2025-l{top:50px}.text-2025-r{top:50px}@media screen and (max-width:1024px){.tet-2025{display:none}}@media screen and (max-width:1440px){#shareduyblogs{display:none}}</style>'
    )
  //]]>
</script>
<script>
    //<![CDATA[
    var lastScroll = 0;
    jQuery(document).ready(function($) {
      $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll > lastScroll) {
          $('#right-2020').removeClass('left-2025').addClass('text-2025-l')
          $('#left-2020').removeClass('right-2025').addClass('text-2025-r')
        } else if (scroll < lastScroll) {
          $('#right-2020').addClass('left-2025').removeClass('text-2025-l')
          $('#left-2020').addClass('right-2025').removeClass('text-2025-r')
        }
        lastScroll = scroll;
      })
    })
    //]]>
</script>
