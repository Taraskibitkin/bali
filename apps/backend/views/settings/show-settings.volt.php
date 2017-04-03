<form method="post">

    <h2>Settings</h2>

   <?php echo $this->flash->Output(); ?>

    <table class="create-table">

       <?php foreach ($settings as $option) { ?>
          <tr>
             <td align="right">
                <label for="name"><?php echo $option->title; ?></label>
             </td>
             <td align="left">
                <input type="text" size="100" value="<?php echo $option->value; ?>" class="form-control" name="<?php echo str_replace(' ', '_', $option->title ); ?>">
             </td>
          </tr>
       <?php } ?>

        <tr>
           <td></td>
            <td><input type="submit" class="btn-primary btn" value="Save"></td>
        </tr>
    </table>
</form>
