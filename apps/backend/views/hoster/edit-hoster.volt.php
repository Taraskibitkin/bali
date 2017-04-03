<form action="<?php echo $actionForm; ?>" method="post" enctype="multipart/form-data">

   <table width="100%">
      <tr>
         <td align="left"><?php echo $this->tag->linkTo(array("/admin/hoster/showHosters", "Back")) ?></td>
      </tr>
   </table>

   <h2><?php echo $actionTitle; ?></h2>

   <table class="create-table">
      <tr>
         <td align="right">
            <label for="main_img">Hoster photo</label>
         </td>
         <td align="left">

            <?php if (isset($hosterInfo->hoster_photo)) { ?>
               <img width="170" heigth="100" src="/uploads/images/hosters/<?php echo $hosterInfo->hoster_photo; ?>"/>
               <input class="form-control" type="file" name="hoster_photo">

            <?php } else { ?>
               <input type="file" class="form-control" name="hoster_photo">

            <?php } ?>
         </td>
      </tr>
      <tr>
         <td><input type="hidden" name="id" value="<?php echo $hosterInfo->id; ?>"></td>
         <td><input type="submit" class="btn-primary btn" value="Save"></td>
      </tr>
   </table>
</form>
