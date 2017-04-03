<form action="<?php echo $actionForm; ?>" method="post" enctype="multipart/form-data">

   <table width="100%">
      <tr>
         <td align="left"><?php echo $this->tag->linkTo(array("/admin/villa/showVillas", "Back")) ?></td>
      </tr>
   </table>

   <h2>Edit Services</h2>
   <br>

   <table class="create-table table table-bordered">

      
      <tr>
         <input type="hidden" id="villaID" value="<?php echo $villaID; ?>">
         <td align="left">
            <label>All Services</label>
            <?php foreach ($allServices as $service) { ?>
               <p class="service control-span"><?php echo $service->service_title; ?>
                  <img src="<?php echo SITE_URL ?>/images/room/glif-icons/<?php echo $service->service_logo; ?>">
                  <span class="add-service green" data-id="<?php echo $service->id; ?>">+</span>
               </p>
            <?php } ?>
         </td>

         <td align="left">
            <label>Villa Services</label>

            <div id="service-container">

               <?php foreach ($services as $service) { ?>
                  <p class="service control-span"><?php echo $service->service_title; ?>
                     <img src="<?php echo SITE_URL ?>/images/room/glif-icons/<?php echo $service->service_logo; ?>">
                     <span class="remove-service red" data-id="<?php echo $service->id; ?>">X</span>
                  </p>
               <?php } ?>
            </div>
         </td>
      </tr>


      
      <tr>
         <td align="left">
            <label>All Housing</label>

            <?php foreach ($allHousing as $option) { ?>

               <p class="options control-span"><?php echo $option->option_title; ?>:
                  <span class="add-option green" data-id="<?php echo $option->id; ?>">+</span>
               </p>

            <?php } ?>
         </td>

         <td align="left">
            <label>Villa Housing</label>

            <div id="housing-container" >
               <?php foreach ($housing as $option) { ?>

                  <p class="control-span"><?php echo $option->option_title; ?>: <input type="text" value="<?php echo $option->option_value; ?>">
                     <button data-id="<?php echo $option->id; ?>" class="update-housing">ok</button>
                     <span class="remove-option red" data-id="<?php echo $option->id; ?>">X</span>
                  </p>

               <?php } ?>
            </div>
         </td>
      </tr>
   </table>
</form>
