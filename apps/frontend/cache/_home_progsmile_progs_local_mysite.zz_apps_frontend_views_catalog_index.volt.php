<div class="col-sm-12 col-md-12 col-xs-12 no-padding main-info">
  <div class="main-content">
    <div class="container">
      <div class="filter-panel"></div>
      <h2 class="text-center title"><?php echo $t->_('s nami prosto'); ?> </h2>

      <?php foreach ($villas->items as $villa) { ?>

        <?php echo $this->partial('partial/villa-chunk'); ?>

      <?php } ?>
      
      <hr class="clear">

      <div class="pagination-container">
        <ul class="pagination pagination-lg">

          <?php if (!isset($is_paged)) { ?>
          
            <li><a href=<?php echo $this->linkPrefix; ?>"/catalog/page/<?php echo $villas->before; ?>">Previous&nbsp;&nbsp;&nbsp;«</a></li>
            
            <?php foreach ($range as $i) { ?>
            
              <li><a class="<?php echo ($villas->current == $i ? 'active' : ''); ?>" href="/catalog/page/<?php echo $i; ?>"><?php echo $i; ?></a></li>
            
            <?php } ?>
            
            <li><a href=<?php echo $this->linkPrefix; ?>"/catalog/page/<?php echo $villas->next; ?>">»&nbsp;&nbsp;&nbsp;Next</a></li>
          
          <?php } ?>
          
        </ul>
      </div>
    </div>
  </div>
</div>