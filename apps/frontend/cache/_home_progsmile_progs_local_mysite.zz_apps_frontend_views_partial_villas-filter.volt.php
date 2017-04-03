<div class="container">
  <div class="col-sm-12 col-md-2 col-xs-12 logo-container">
    <a href="<?php echo $linkPrefix; ?>"><img src="<?php echo $this->url->getStatic('images/logo-black.png'); ?>" class="logo"></a>
  </div>
  <div class="col-sm-12 col-md-10 col-xs-12 search-container">
    <form id="find-villas" method="get" action="<?php echo $linkPrefix; ?>/catalog/find">
      <input type="hidden" name="a" value="<?php echo isset($_GET['a'])? $_GET['a'] : 1; ?>" id="person-count">
      <input type="hidden" name="c" value="<?php echo isset($_GET['c'])? $_GET['c'] : 1; ?>" id="children-count">

    <div class="col-sm-3 col-md-3 col-xs-3">
      <input type="text" id="datepicker" class="calendar">
    </div>
    <div class="col-sm-3 col-md-3 col-xs-3">
      <input type="text" id="datepicker2" class="calendar">
    </div>
    <div class="col-sm-2 col-md-2 col-xs-2">
      <div class="count1 count-form">
        <span id='number1' class="number"><?php echo isset($_GET['a'])? $_GET['a'] : 1; ?></span>
        <span><?php echo $t->_('adults'); ?></span>
        <div id="plus1" class="plus"></div>
        <div id="minus1" class="minus"></div>
      </div>
    </div>
    <div class="col-sm-2 col-md-2 col-xs-2">
      <div class="count2 count-form">
        <span id='number2' class="number"><?php echo isset($_GET['c'])? $_GET['c'] : 1; ?></span>
        <span><?php echo $t->_('kids'); ?></span>
        <div id="plus2" class="plus"></div>
        <div id="minus2" class="minus"></div>
      </div>
    </div>
    <div class="col-sm-2 col-md-2 col-xs-2"><button type="submit" class="btn btn-primary"><?php echo $t->_('search'); ?></button></div>
    </form>
  </div>
</div>