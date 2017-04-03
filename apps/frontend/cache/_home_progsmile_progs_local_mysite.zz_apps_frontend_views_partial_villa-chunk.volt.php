<div class="col-sm-6 col-md-4 col-xs-6 home-container">
  <div>
    <img class="home" src="<?php echo $this->url->getStatic('uploads/images/villas/' . $villa->main_img); ?>" />
    <div class="black-tip col-md-12 col-sm-12 col-xs-12">
      <div class="ovf-a on-hover-tip">
        <h4 class="text-center"><?php echo $villa->room_short_title; ?></h4>
        <a href="<?php echo $linkPrefix; ?>/catalog/villa/<?php echo $villa->id; ?>" class="book-it"><?php echo $t->_('book-now'); ?></a>
        <hr class="clear">
        <div class="col-md-6 col-sm-6 col-xs-6 text-left">
          
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6 text-right">
          <span><?php echo $t->_('status'); ?>:<span> <?php echo $t->_('opened'); ?> </span></span>
        </div>
      </div>
      <hr class="clear" />
      <div class="col-md-6 col-sm-6 col-xs-6 text-left">
        <span><?php echo $villa->room_name; ?></span>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6 text-right">
        <span>$<?php echo $villa->room_price; ?></span>
      </div>
    </div>
  </div>
</div>