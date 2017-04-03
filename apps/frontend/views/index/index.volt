{% set indexPage = 'index' %}
<div class="head-part homemenu">
   <div class="container">
      <header>
         <img src="{{ static_url('images/baliprorent-logo.png') }}" class="logo"/>
      </header>
      <nav class="navbar navbar-default navbar-main" style="background:transparent !important;">
         <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed toggle-main" data-toggle="collapse"
                       data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

               <ul class="nav navbar-nav menu-font menu-font">

                  {{ partial('partial/menu-li') }}

               </ul>

               {{ partial("partial/check-auth") }}

            </div>
         </div>
      </nav>
      <div class="main-title">
         <h1 class="text-center">{{ t._('feel like at home') }} </h1>
         <h4 class="text-center">{{ t._('when you away') }} </h4>
      </div>
   </div>
   <form id="find-villas" method="get" action="{{ linkPrefix }}/catalog/find">
      <div class='search-panel'>
         <div class="container">
            <div class="col-sm-12 col-md-12 col-xs-12">
               <div class="col-xs-12 col-sm-3 col-md-3">
                  <span class="label">{{ t._('check in') }}</span>
                  <input type="text" id="datepicker" autocomplete="off" class="calendar"></div>
               <div class="col-xs-12 col-sm-3 col-md-3">
                  <span class="label">{{ t._('check out') }}</span>
                  <input type="text" id="datepicker2" autocomplete="off" class="calendar"></div>
               <div class="col-xs-12 col-sm-2 col-md-2">
                  <span class="label">{{ t._('adults') }}</span>
                  <div class="count1 count-form">
                     <span id='number1' class="number"><?php echo isset($_GET['a'])? $_GET['a'] : 1; ?></span>

                     <div id="plus1" class="plus"></div>
                     <div id="minus1" class="minus"></div>
                  </div>
               </div>
               <div class="col-xs-12 col-sm-2 col-md-2">
                  <span class="label">{{ t._('kids') }}</span>
                  <div class="count2 count-form">
                     <span id='number2' class="number"><?php echo isset($_GET['c'])? $_GET['c'] : 1; ?></span>

                     <div id="plus2" class="plus"></div>
                     <div id="minus2" class="minus minus-child"></div>
                  </div>
               </div>
               <div class="col-sm-2 col-sm-offset-0 col-md-2 col-xs-6 col-xs-offset-3">
                  <span class="label hidden-xs">SEARCH</span>
                  <button type="submit" class="btn btn-primary">{{ t._('search') }}</button>
               </div>
            </div>
         </div>
      </div>
      <input type="hidden" name="a" value="<?php echo isset($_GET['a'])? $_GET['a'] : 1; ?>" id="person-count">
      <input type="hidden" name="c" value="<?php echo isset($_GET['c'])? $_GET['c'] : 1; ?>" id="children-count">
      <input type="hidden" name="from" value="<?php echo isset($_GET['from'])? $_GET['from'] : 1; ?>" id="filter-from">
      <input type="hidden" name="to" value="<?php echo isset($_GET['to'])? $_GET['to'] : 1; ?>" id="filter-to">

   </form>
</div>

<div class="col-sm-12 col-md-12 col-xs-12 no-padding">
   <div class="main-first">
      <div class="container">
         <h2 class="text-center title">{{ t._('s nami prosto') }}</h2>

         <div class="col-sm-3 col-md-3 col-xs-6">
            <img src="{{ static_url('images/easy-with-us1.png') }}">

            <p class="text-center">{{ t._('choose-vila') }} </p>
         </div>
         <div class="col-sm-3 col-md-3 col-xs-6">
            <img src="{{ static_url('images/easy-with-us2.png') }}">

            <p class="text-center">{{ t._('bron-villa') }} </p>
         </div>
         <div class="col-sm-3 col-md-3 col-xs-6">
            <img src="{{ static_url('images/easy-with-us3.png') }}">

            <p class="text-center">{{ t._('oplati-villa') }} </p>
         </div>
         <div class="col-sm-3 col-md-3 col-xs-6">
            <img src="{{ static_url('images/easy-with-us4.png') }}">

            <p class="text-center">{{ t._('priejaiteotduhaite') }} </p>
         </div>
      </div>
   </div>
   <div class="main-second">
      <div class="container">
         <h2 class="text-center title">{{ t._('open-world') }} </h2>

         <div class="col-sm-8 col-md-8 col-xs-12">
            <a href="{{ linkPrefix }}/catalog/findRegion/1">
               <img src="{{ static_url('images/open-world1.jpg') }}" class="main-photo">
               <span class="text"><span>{{ t._('nusa-duv') }}</span></span>
            </a>
         </div>
         <div class="col-sm-4 col-md-4 col-xs-6">
            <a href="{{ linkPrefix }}/catalog/findRegion/2">
               <img src="{{ static_url('images/open-world2.jpg') }}" class="main-photo">
               <span class="text"><span>{{ t._('djumbaran') }}</span></span>
            </a>
         </div>
         <div class="col-sm-4 col-md-4 col-xs-6">
            <a href="{{ linkPrefix }}/catalog/findRegion/3">
               <img src="{{ static_url('images/open-world3.jpg') }}" class="main-photo">
               <span class="text"><span>{{ t._('ubud') }}</span></span>
            </a>
         </div>
         <div class="col-sm-8 col-md-8 col-xs-12">
            <a href="{{ linkPrefix }}/catalog/findRegion/4">
               <img src="{{ static_url('images/open-world4.jpg') }}" class="main-photo">
               <span class="text"><span>{{ t._('legian-kuta-semiak') }}</span></span>
            </a>
         </div>

         <div class="col-sm-12 col-md-12 col-xs-12 vacation-logo">
            <div class="col-sm-3 col-md-3 col-xs-6">
               <img class="img-responsive" src="{{ static_url('images/vacation-logo1.png') }}">
            </div>
            <div class="col-sm-3 col-md-3 col-xs-6">
               <img class="img-responsive" src="{{ static_url('images/vacation-logo2.png') }}">
            </div>
            <div class="col-sm-3 col-md-3 col-xs-6">
               <img class="img-responsive" src="{{ static_url('images/vacation-logo3.png') }}">
            </div>
            <div class="col-sm-3 col-md-3 col-xs-6">
               <img class="img-responsive" src="{{ static_url('images/vacation-logo4.png') }}">
            </div>
         </div>
      </div>
   </div>
</div>
