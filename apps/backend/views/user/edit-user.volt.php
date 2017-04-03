<form method="post" enctype="multipart/form-data">

    <table width="100%">
        <tr>
            <td align="left"><?php echo $this->tag->linkTo(array("/admin/user/showUsers", "Back")) ?></td>
        </tr>
    </table>

    <h2><?php echo $actionTitle; ?></h2>

    <table class="create-table">

       <tr>
          <td align="right">
             <label for="name">Name</label>
          </td>
          <td align="left">
             <input type="text" value="<?php echo $userInfo->name; ?>" class="form-control" name="name">
          </td>
       </tr>


       <tr>
          <td align="right">
             <label for="sourname">Sourname</label>
          </td>
          <td align="left">
             <input type="text" value="<?php echo $userInfo->sourname; ?>" class="form-control" name="sourname">
          </td>
       </tr>


       <tr>
          <td align="right">
             <label for="email">Email</label>
          </td>
          <td align="left">
             <input type="text" value="<?php echo $userInfo->email; ?>" class="form-control" name="email">
          </td>
       </tr>

       <tr>
          <td align="right">
             <label for="birth_date">Password</label>
          </td>
          <td align="left">
             <input type="text" value="" placeholder="more than 5 chars" class="form-control" name="password">
          </td>
       </tr>

       <tr>
          <td align="right">
             <label for="birth_date">Birth date</label>
          </td>
          <td align="left">
             <input type="text" value="<?php echo $userInfo->birth_date; ?>" placeholder="YYYY-MM-DD" class="form-control" name="birth_date">
          </td>
       </tr>


       <tr>
          <td align="right">
             <label for="phone">Phone</label>
          </td>
          <td align="left">
             <input type="text" value="<?php echo $userInfo->phone; ?>" class="form-control" name="phone">
          </td>
       </tr>


       <tr>
          <td align="right">
             <label for="living_place">Living place</label>
          </td>
          <td align="left">
             <input type="text" value="<?php echo $userInfo->living_place; ?>" class="form-control" name="living_place">
          </td>
       </tr>


       <tr>
          <td align="right">
             <label for="languages">Languages</label>
          </td>
          <td align="left">
             <input type="text" value="<?php echo $userInfo->languages; ?>" class="form-control" name="languages">
          </td>
       </tr>

        <tr>
            <td><input type="hidden" name="id" value="<?php echo $userInfo->id; ?>"></td>
            <td><input type="submit" class="btn-primary btn" value="Save"></td>
        </tr>
    </table>
</form>
