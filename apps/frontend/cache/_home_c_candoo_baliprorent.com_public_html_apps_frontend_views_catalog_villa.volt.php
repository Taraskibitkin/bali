<div class="col-sm-12 col-md-12 col-xs-12 main-info no-padding">
   <div class="main-content">
      <div class="container">
         <div class="ovf-a title-room">
            <div class="col-sm-8 col-md-9 col-lg-10 col-xs-12 text-left">

               <h2 class="text-left"><?php echo $villa->room_name; ?>
                  <?php if ($this->session->has('authIdentity')) { ?>
                     <span id="user-add-favourites" data-id="<?php echo $villa->id; ?>"
                           class="glyphicon glyphicon-star-empty"></span>
                  <?php } ?>
               </h2>

            </div>
            <div class="col-sm-4 col-md-3 col-lg-2 col-xs-12">
               <h2>$ <?php echo $villa->room_price; ?> <span
                        class="small">&nbsp; <?php echo $t->_('per-night'); ?> </span></h2>
            </div>
         </div>

         <?php if ($this->length($gallery)) { ?>

            <div class="col-sm-12 col-md-12 col-xs-12">

               <div class="main-room"
                    style="background-image:url('<?php echo $this->url->getStatic('/uploads/images/villas/' . $firstImg); ?>')">
               </div>
            </div>

            <div class="col-sm-12 col-md-12 col-xs-12 wrapper-carusel">
               <div id="container">
                  <?php foreach ($gallery as $pic_src) { ?>
                     <img src="<?php echo $this->url->getStatic('/uploads/images/villas/' . $pic_src); ?>" class="room-photo"/>
                  <?php } ?>
               </div>
               <img id="carouselLeft" src="<?php echo $this->url->getStatic('images/carusel/leftArr.png'); ?>" height="50" width="50"
                    alt="Left Arrow"/>
               <img id="carouselRight" src="<?php echo $this->url->getStatic('images/carusel/rightArr.png'); ?>" height="50" width="50"
                    alt="Right Arrow"/>
            </div>
         <?php } ?>

         <div class="col-sm-12 col-md-12 col-xs-12">
            <p>
               <?php echo $villa->room_desc; ?>
            </p>


            <div class="payment-block">

               <?php if ($this->session->get('authIdentity')) { ?>

                  <span class="payment-title"><?php echo $t->_('pick days'); ?></span><br>

                  <?php echo $this->partial('partial/inc/form-filter'); ?>

                  <button class="btn btn-primary" id="check-dates">Check dates</button><br>
                  <span id="order-status"></span>

                  <br>
                  <script id="paypal-script" async="async"
                          src="https://www.paypalobjects.com/js/external/paypal-button.min.js?merchant=Axxe77@mail.ru"
                          data-button="paynow"
                          data-name="<?php echo $villa->room_name; ?>"
                          data-quantity="0"
                          data-charset="utf-8"
                          data-amount="<?php echo $villa->room_price; ?>"
                          data-shipping="0"
                          data-tax="0"
                          data-callback="<?php echo SITE_URL; ?>/payment/paypalCallback">
                  </script>
               <?php } else { ?>

                  <?php echo $t->_('v-please'); ?>, <a href="<?php echo $linkPrefix; ?>/user/login"><?php echo $t->_('v-login'); ?></a>  <?php echo $t->_('or'); ?>
                  <a href="<?php echo $linkPrefix; ?>/user/registration"><?php echo $t->_('v-register'); ?></a> <?php echo $t->_('make order'); ?>
               <?php } ?>
            </div>

            <div class="col-sm-12 col-md-12 col-xs-12 dbl-border">
               <div class="col-sm-2 col-md-2 col-xs-12 h4"><?php echo $t->_('services'); ?></div>
               <div class="col-sm-10 col-md-10 col-xs-12">

                  <ul class="servises">
                     <?php foreach ($services as $serv) { ?>
                        <li>
                           <img src="<?php echo $this->url->getStatic('images/room/glif-icons/' . $serv->service_logo); ?>">&nbsp; <?php echo $t->_($serv->service_title); ?>
                        </li>
                     <?php } ?>
                  </ul>

               </div>
            </div>
            <div class="col-sm-12 col-md-12 col-xs-12">
               <div class="col-sm-2 col-md-2 col-xs-12 h4 no-padding"><?php echo $t->_('housting'); ?></div>
               <div class="col-sm-10 col-md-10 col-xs-12">
                  <ul class="housting" lal="<?php echo $this->session->get('lIndex'); ?>">
                     <?php foreach ($housing as $option) { ?>
                        <li>
                           <b><?php echo $t->_($option->option_title); ?>:</b>&nbsp;
                           <?php
                              if(strpos($option->option_value, '|') === false){
                                 echo $option->option_value;
                              } else {
                                 echo explode('|',  $option->option_value)[ $this->session->get('lIndex') - 1 ];
                              }
                           ?>
                        </li>
                     <?php } ?>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


   

      
      
      
         
      
      
         
      
   


  
  <?php echo $this->partial('partial/villa-map'); ?>

<div class="col-sm-12 col-md-12 col-xs-12 no-padding" id="map">

</div>