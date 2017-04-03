<!doctype html>
<html>
<head>
   <meta name="viewport" content="width=device-width">
   <meta charset="UTF-8">
   <title> {{ title }} </title>
   <meta name="description" content="{{ seoDescription }}">
   <link rel="stylesheet" type="text/css" href="{{ static_url("css/styles.css") }}">
   <link rel="stylesheet" type="text/css" href="{{ static_url("css/style.dns.css") }}">
   <link rel="stylesheet" type="text/css" href="{{ static_url("bower_components/bootstrap/dist/css/bootstrap.css") }}">
   <link rel="stylesheet" type="text/css" href="{{ static_url("css/edit_me_only.css") }}">

   <script type="text/javascript" src="{{ static_url("bower_components/jquery/dist/jquery.js") }}"></script>
   <script type="text/javascript" src="{{ static_url("bower_components/bootstrap/dist/js/bootstrap.js") }}"></script>
   <script type="text/javascript" src="{{ static_url("js/main.js") }}"></script>

   <script type="text/javascript" src="{{ static_url('js/click-carousel.min.js')}}"></script>
   <script type="text/javascript" src="{{ static_url('js/click-carousel-main.js')}}"></script>

   <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

   <script src=" http://yastatic.net/jquery-ui/1.11.2/jquery-ui.min.js"></script>
   {# http://code.jquery.com/ui/1.11.4/jquery-ui.js#}
   <script src="http://yastatic.net/angularjs/1.3.16/angular.min.js"></script>
   <script type="text/javascript" src="{{ static_url("js/coffee.dns.js") }}"></script>
   <script type="text/javascript" src="{{ static_url("js/script.dns.js") }}"></script>
   <link rel="shortcut icon" href="{{ static_url("images/favicon.ico") }}" type="image/x-icon">
   <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-69259795-1', 'auto');
	  ga('send', 'pageview');
  </script>

   {{ content() }}

   <hr class="clear">
   <footer>
      <div class="container">
         <div class="col-sm-12 col-md-12 col-xs-12">
            <div class="col-sm-6 col-md-6 col-xs-12">
               <a href="{{ linkPrefix }}"><img src="{{ static_url('images/baliprorent-logo-without-text.png') }}" class="logo" width="110"></a>
            </div>
            <div class="col-sm-6 col-md-6 col-xs-12 pay-sistem">
               <img src="{{ static_url("images/pay-sistem1.png") }}" class="pay-sistem-img">
               <img src="{{ static_url("images/pay-sistem2.png") }}" class="pay-sistem-img">
               <img src="{{ static_url("images/pay-sistem3.png") }}" class="pay-sistem-img">
               <img src="{{ static_url("images/pay-sistem4.png") }}" class="pay-sistem-img">
            </div>
         </div>
         <div class="col-sm-12 col-md-12 col-xs-12 footer-menu">
            <ul class="menu-font">

               <li><a href="{{ linkPrefix }}">{{ t._('homepage') }}</a></li>

               {{ partial('partial/menu-li') }}

               <li><a href="{{ linkPrefix }}/faq">{{ t._('F.A.Q.') }}</a></li>

            </ul>
         </div>
         <div class="col-sm-12 col-md-21 col-xs-12">
            <h4 class="text-center">{{ t._('prisoedinyai') }} </h4>

            <div class="social-block">
               <a href="{{ soc[0] }}" class="one"></a>
               <a href="{{ soc[1] }}" class="two"></a>
               <a href="{{ soc[2] }}" class="three"></a>
               <a href="{{ soc[3] }}" class="four"></a>
               <a href="{{ soc[4] }}" class="fife"></a>
            </div>
            <p class="copyright text-center">
               &copy; 2015 by BaliProRent.
            </p>
         </div>
      </div>
   </footer>
   </body>
</html>
