<form id="villas-order" method="post" action="<?php echo $linkPrefix; ?>/catalog/find">
   <input type="hidden" name="a" value="<?php echo isset($_GET['a'])? $_GET['a'] : 1; ?>" id="person-count">
   <input type="hidden" name="c" value="<?php echo isset($_GET['c'])? $_GET['c'] : 1; ?>" id="children-count">
   <input type="hidden" name="from" value="<?php echo isset($_GET['from'])? $_GET['from'] : 1; ?>" id="filter-from">
   <input type="hidden" name="to" value="<?php echo isset($_GET['to'])? $_GET['to'] : 1; ?>" id="filter-to">

   <div class="col-sm-3 col-md-3 col-xs-3">
      <input type="text" autocomplete="off" id="datepicker3" class="calendar">
   </div>
   <div class="col-sm-3 col-md-3 col-xs-3">
      <input type="text" autocomplete="off" id="datepicker4" class="calendar">
   </div>
</form>
