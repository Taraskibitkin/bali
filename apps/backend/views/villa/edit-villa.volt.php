<form action="<?php echo $actionForm; ?>" method="post" enctype="multipart/form-data">
   <table width="100%">
      <tr>
         <td align="left"><?php echo $this->tag->linkTo(array("/admin/villa/showVillas", "Back")) ?></td>
      </tr>
   </table>

   <h2><?php echo $actionTitle; ?></h2>
   <br>

   <?php echo $this->flash->Output(); ?>

   <table class="create-table table table-bordered">
      <tr>
         <td align="right">
            <label for="room_price">Villa Price</label>
         </td>
         <td align="left">
            <input type="text" class="form-control" name="room_price" value="<?php echo $villaInfo->room_price; ?>">
         </td>
      </tr>
      <tr>
         <td align="right">
            <label for="main_img">Main Img</label>
         </td>
         <td align="left">

            <?php if (isset($villaInfo->main_img)) { ?>
               <img width="170" heigth="100" src="/uploads/images/villas/<?php echo $villaInfo->main_img; ?>"/>
               <input type="file" name="main_img">

            <?php } else { ?>
               <input type="file" name="main_img">

            <?php } ?>
         </td>
      </tr>
      <tr>
         <td align="right">
            <label>Select Hoster</label>
         </td>
         <td align="left">
            <select name="hoster_id" class="form-control">

               <?php foreach ($hosters as $hoster) { ?>

                  <option value="<?php echo $hoster->hoster_id; ?>" <?php echo ($hoster->hoster_id == $villaInfo->hoster_id ? 'selected' : ''); ?>>
                     <?php echo $hoster->hoster_id; ?> - <?php echo $hoster->hoster_name; ?></option>
               <?php } ?>
            </select>
         </td>
      </tr>

      <tr>
         <td align="right">
            <label>Select Region</label>
         </td>
         <td align="left">
            <select name="region_id" class="form-control">

               <?php foreach ($regions as $region) { ?>

                  <option value="<?php echo $region->id; ?>" <?php echo ($region->id == $villaInfo->region_id ? 'selected' : ''); ?> ><?php echo $region->title; ?> </option>

               <?php } ?>

            </select>
         </td>
      </tr>


      <tr>
         <td align="right">
            <label for="room_google_map">Google Map</label>
         </td>
         <td align="left">
            <input type="text" class="form-control" name="room_google_map" value="<?php echo $villaInfo->room_google_map; ?>">
         </td>
      </tr>
      <tr>
         <td align="right">
            <label for="google_map_title">Google Map Title</label>
         </td>
         <td align="left">
            <input type="text" class="form-control" name="google_map_title" value="<?php echo $villaInfo->google_map_title; ?>">
         </td>
      </tr>
      <tr>
         <td><input type="hidden" name="id" value="<?php echo $villaInfo->id; ?>"></td>
         <td> <input type="submit" value="Save" class="btn-primary btn"></td>
      </tr>
   </table>

</form>
