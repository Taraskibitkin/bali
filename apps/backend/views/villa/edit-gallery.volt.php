<form method="post" enctype="multipart/form-data">

   <table width="100%">
      <tr>
         <td align="left"><?php echo $this->tag->linkTo(array("/admin/villa/showVillas", "Back")) ?></td>
      </tr>
   </table>

   <h2>Edit galleries</h2>
   <br>

   <table class="create-table table table-bordered">

      <tr>
         <td align="right">
            <label for="room_gallery">Villa Gallery</label>
         </td>
         <td align="left">
            <?php if ($this->length($gallery)) { ?>
               <?php foreach ($gallery as $pic) { ?>
                  <img class="pic-preview" src="/uploads/images/villas/<?php echo $pic; ?>">
               <?php } ?>
            <?php } ?>

            <div id="villa-gallery">
               <input class="btn" type="file" name="galleryImg">
            </div>
            <button class="btn" id="add-more-pic">+</button>
         </td>
      </tr>

      <tr>
         <td></td>
         <td><input type="submit" value="Save" class="btn-primary btn"></td>
      </tr>
   </table>

</form>
