<br>
<h2>User management</h2>
<div class="pull-right">
   <a href="/admin/user/createUser"> <span class="glyphicon glyphicon-plus"></span> Add new User </a>
</div>

<div>
   <?php echo $this->flash->output(); ?>
</div>

<table class="table table-striped table-bordered">
   <tr>
      <td><?php echo ucwords('ID'); ?></td>
      <td><?php echo ucwords('name'); ?></td>
      <td><?php echo ucwords('sourname'); ?></td>
      <td><?php echo ucwords('email'); ?></td>
      <td><?php echo ucwords('phone'); ?></td>
      <td><?php echo ucwords('languages'); ?></td>
      <td><?php echo ucwords('edit'); ?></td>
      <td><?php echo ucwords('delete'); ?></td>
   </tr>

   <?php foreach ($users as $user) { ?>
      <tr>
         <td><?php echo $user->id; ?></td>
         <td><?php echo $user->name; ?></td>
         <td><?php echo $user->sourname; ?></td>
         <td><?php echo $user->email; ?></td>
         <td><?php echo $user->phone; ?></td>
         <td><?php echo $user->languages; ?></td>
         <td>
            <a href="/admin/user/editUser/<?php echo $user->id; ?>">
               <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>
         </td>
         <td>
            <a href="/admin/user/deleteUser/<?php echo $user->id; ?> ">
               <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </a>
         </td>
      </tr>
   <?php } ?>
</table>
