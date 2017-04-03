<form id="find-villas" method="get" action="{{ linkPrefix }}/catalog/find" class='search-panel'>

   <div class="container">
      <div id="find-villas" class="col-sm-12 col-md-12 col-xs-12 search-container">
         <div class="col-sm-3 col-xs-12">
            <input type="text" id="datepicker" class="calendar"></div>
         <div class="col-sm-3 col-xs-12">
            <input type="text" id="datepicker2" class="calendar"></div>
         <div class="col-sm-2 col-xs-12">
            <div class="count1 count-form">
               <span id='number1' class="number"><?php echo isset($_GET['a'])? $_GET['a'] : 1; ?></span>
               <span>{{ t._('adults') }}</span>

               <div id="plus1" class="plus"></div>
               <div id="minus1" class="minus"></div>
            </div>
         </div>
         <div class="col-sm-2 col-xs-12">
            <div class="count2 count-form">
               <span id='number2' class="number"><?php echo isset($_GET['c'])? $_GET['c'] : 1; ?></span>
               <span>{{ t._('kids') }}</span>

               <div id="plus2" class="plus"></div>
               <div id="minus2" class="minus minus-child"></div>
            </div>
         </div>
         <div class="col-sm-2 col-xs-12 text-center">
            <button type="submit" class="btn btn-primary">{{ t._('search') }}</button>
         </div>

         <input type="hidden" name="a" value="<?php echo isset($_GET['a'])? $_GET['a'] : 1; ?>" id="person-count">
         <input type="hidden" name="c" value="<?php echo isset($_GET['c'])? $_GET['c'] : 1; ?>" id="children-count">
         <input type="hidden" name="from" value="<?php echo isset($_GET['from'])? $_GET['from'] : 1; ?>" id="filter-from">
         <input type="hidden" name="to" value="<?php echo isset($_GET['to'])? $_GET['to'] : 1; ?>" id="filter-to">
      </div>
   </div>
</form>
