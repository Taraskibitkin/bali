<div class="col-sm-12 col-md-12 col-xs-12 main-info no-padding">
   <div class="main-content">
      <div class="container">
         <div class="ovf-a title-room">
            <div class="col-sm-8 col-md-9 col-lg-10 col-xs-12 text-left">

               <h2 class="text-left">{{ villa.room_name }}
                  {% if session.has('authIdentity') %}
                     <span id="user-add-favourites" data-id="{{ villa.id }}"
                           class="glyphicon glyphicon-star-empty"></span>
                  {% endif %}
               </h2>

            </div>
            <div class="col-sm-4 col-md-3 col-lg-2 col-xs-12">
               <h2>$ {{ villa.room_price }} <span
                        class="small">&nbsp; {{ t._("per-night") }} </span></h2>
            </div>
         </div>

         {% if gallery|length %}

            <div class="col-sm-12 col-md-12 col-xs-12">

               <div class="main-room"
                    style="background-image:url('{{ static_url("/uploads/images/villas/" ~ firstImg) }}')">
               </div>
            </div>

            <div class="col-sm-12 col-md-12 col-xs-12 wrapper-carusel">
               <div id="container">
                  {% for pic_src in gallery %}
                     <img src="{{ static_url("/uploads/images/villas/" ~ pic_src) }}" class="room-photo"/>
                  {% endfor %}
               </div>
               <img id="carouselLeft" src="{{ static_url("images/carusel/leftArr.png") }}" height="50" width="50"
                    alt="Left Arrow"/>
               <img id="carouselRight" src="{{ static_url("images/carusel/rightArr.png") }}" height="50" width="50"
                    alt="Right Arrow"/>
            </div>
         {% endif %}

         <div class="col-sm-12 col-md-12 col-xs-12">
            <p>
               {{ villa.room_desc }}
            </p>


            <div class="payment-block">

               {% if session.get('authIdentity') %}

                  <span class="payment-title">{{ t._('pick days') }}</span><br>

                  {{ partial('partial/inc/form-filter') }}

                  <button class="btn btn-primary" id="check-dates">Check dates</button><br>
                  <span id="order-status"></span>

                  <br>
                  <script id="paypal-script" async="async"
                          src="https://www.paypalobjects.com/js/external/paypal-button.min.js?merchant=Axxe77@mail.ru"
                          data-button="paynow"
                          data-name="{{ villa.room_name }}"
                          data-quantity="0"
                          data-charset="utf-8"
                          data-amount="{{ villa.room_price }}"
                          data-shipping="0"
                          data-tax="0"
                          data-callback="<?php echo SITE_URL; ?>/payment/paypalCallback">
                  </script>
               {% else %}

                  {{ t._('v-please') }}, <a href="{{ linkPrefix }}/user/login">{{ t._('v-login') }}</a>  {{ t._('or') }}
                  <a href="{{ linkPrefix }}/user/registration">{{ t._('v-register') }}</a> {{ t._('make order') }}
               {% endif %}
            </div>

            <div class="col-sm-12 col-md-12 col-xs-12 dbl-border">
               <div class="col-sm-2 col-md-2 col-xs-12 h4">{{ t._('services') }}</div>
               <div class="col-sm-10 col-md-10 col-xs-12">

                  <ul class="servises">
                     {% for serv in services %}
                        <li>
                           <img src="{{ static_url("images/room/glif-icons/" ~ serv.service_logo) }}">&nbsp; {{ t._(serv.service_title) }}
                        </li>
                     {% endfor %}
                  </ul>

               </div>
            </div>
            <div class="col-sm-12 col-md-12 col-xs-12">
               <div class="col-sm-2 col-md-2 col-xs-12 h4 no-padding">{{ t._('housting') }}</div>
               <div class="col-sm-10 col-md-10 col-xs-12">
                  <ul class="housting" lal="<?php echo $this->session->get('lIndex'); ?>">
                     {% for option in housing %}
                        <li>
                           <b>{{ t._(option.option_title) }}:</b>&nbsp;
                           <?php
                              if(strpos($option->option_value, '|') === false){
                                 echo $option->option_value;
                              } else {
                                 echo explode('|',  $option->option_value)[ $this->session->get('lIndex') - 1 ];
                              }
                           ?>
                        </li>
                     {% endfor %}
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

{#<div class="owner-info col-sm-12 col-md-12 col-xs-12 col-sm-12 col-md-12 col-xs-12">#}
   {#<div class="container">#}

      {#<h3> {{ t._('o hozyaine') }} {{ hosterText.hoster_name }} </h3>#}
      {#<hr class="clear">#}
      {#<div class="col-sm-4 col-md-4 col-xs-4">#}
         {#<img src="/uploads/images/hosters/{{ hoster.hoster_photo }}" class="owner-image"/>#}
      {#</div>#}
      {#<div class="col-sm-8 col-md-8 col-xs-8">#}
         {#<p> {{ hosterText.hoster_desc }} </p>#}
      {#</div>#}
   {#</div>#}
{#</div>#}

  {# load map #}
  {{ partial('partial/villa-map') }}

<div class="col-sm-12 col-md-12 col-xs-12 no-padding" id="map">

</div>