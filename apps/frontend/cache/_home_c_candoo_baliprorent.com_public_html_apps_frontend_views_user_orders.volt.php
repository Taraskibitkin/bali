<div class="panel panel-default col-xs-12">
  <div class="panel-heading">
    <h2 class="title text-center">Список и состояние заказов</h2>
  </div>
  <div class="panel-body">
    <div>
      <div class="container">
        <ul class="nav nav-pills col-xs-12" role="tablist" id="orders">
          
          <li role="presentation" class="active">
            <a href="#order_item_2" aria-controls="order_item_2" role="tab" data-toggle="tab">Ваши бронирования</a>
          </li>
          
          <li role="presentation">
            <a href="#order_item_3" aria-controls="order_item_3" role="tab" data-toggle="tab">Избранное</a>
          </li>
          
        </ul>
      </div>

      <div class="tab-content col-xs-12">
        
        <div role="tabpanel" class="tab-pane active" id="order_item_2">
          <div class="col-sm-12 col-md-12 col-xs-12 no-padding main-info">
            <div class="main-content">
              <div class="container">
                <div class="filter-panel"></div>


                
                <?php if ($this->length($orderVillas)) { ?>

                  <?php foreach ($orderVillas as $villaFav) { ?>

                     <div class="col-sm-6 col-md-4 col-xs-6 home-container fav-villa">
                        <div>
                           <span class="fav-delete" data-id="<?php echo $villaFav->id; ?>">X</span>
                           <img class="home" src="<?php echo $this->url->getStatic('uploads/images/villas/') . $villaFav->main_img; ?>" />
                           <div class="black-tip col-md-12 col-sm-12 col-xs-12">
                              <div class="ovf-a on-hover-tip">
                                 <h4 class="text-center"><?php echo $villaFav->room_short_title; ?></h4>
                                 <a href="<?php echo $linkPrefix; ?>/catalog/villa/<?php echo $villaFav->id; ?>" class="book-it">Book now</a>
                                 <hr class="clear">
                              </div>
                              <hr class="clear" />
                              <div class="col-md-6 col-sm-6 col-xs-6 text-left">
                                 <span><?php echo $villaFav->room_name; ?></span>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                 <span>$ <?php echo $villaFav->room_price; ?></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  <?php } ?>
                <?php } else { ?>

                  <h3><?php echo $t->_('no_ord'); ?> </h3>
                <?php } ?>

                <hr class="clear">

              </div>
            </div>
          </div>
        </div>
        

        
        <div role="tabpanel" class="tab-pane" id="order_item_3">
          <div class="col-sm-12 col-md-12 col-xs-12 no-padding main-info">
            <div class="main-content">
              <div class="container">
                <div class="filter-panel"></div>

                <?php if ($this->length($favouriteVillas)) { ?>
                  <?php foreach ($favouriteVillas as $villaFav) { ?>

                    <div class="col-sm-6 col-md-4 col-xs-6 home-container fav-villa">
                      <div>
                        <span class="fav-delete" data-id="<?php echo $villaFav->id; ?>">X</span>
                        <img class="home" src="<?php echo $this->url->getStatic('uploads/images/villas/') . $villaFav->main_img; ?>" />
                        <div class="black-tip col-md-12 col-sm-12 col-xs-12">
                          <div class="ovf-a on-hover-tip">
                            <h4 class="text-center"><?php echo $villaFav->room_short_title; ?></h4>
                            <a href="<?php echo $linkPrefix; ?>/catalog/villa/<?php echo $villaFav->id; ?>" class="book-it">Book now</a>
                            <hr class="clear">
                          </div>
                          <hr class="clear" />
                          <div class="col-md-6 col-sm-6 col-xs-6 text-left">
                            <span><?php echo $villaFav->room_name; ?></span>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                            <span>$ <?php echo $villaFav->room_price; ?></span>
                          </div>
                        </div>
                      </div>
                    </div>


                  <?php } ?>

                <?php } else { ?>

                    <h3><?php echo $t->_('no_fav'); ?> </h3>

                <?php } ?>


                <hr class="clear">
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>