<br>
<h2>Hoster management</h2>
<div class="pull-right">
   <a href="/admin/hoster/createHoster"> <span class="glyphicon glyphicon-plus"></span> Add new Hoster </a>
</div>

<div>
   <?php echo $this->flash->output(); ?>
</div>

<table class="table table-striped table-bordered">
   <tr>
      <td>id</td>
      <td>hoster name</td>
      <td>edit text</td>
      <td>edit</td>
      <td>delete</td>
   </tr>

   <?php foreach ($hosters as $hoster) { ?>
      <tr>
         <td><?php echo $hoster->hoster_id; ?></td>
         <td><?php echo $hoster->hoster_name; ?></td>
         <td><a href="/admin/hoster/editHosterText/<?php echo $hoster->hoster_id; ?>"> <span class="glyphicon glyphicon-pencil"
                                                                                  aria-hidden="true"></span></a></td>
         <td><a href="/admin/hoster/editHoster/<?php echo $hoster->hoster_id; ?>"> <span class="glyphicon glyphicon-pencil"
                                                                              aria-hidden="true"></span></a></td>
         <td><a href="/admin/hoster/deleteHoster/<?php echo $hoster->hoster_id; ?> "> <span class="glyphicon glyphicon-remove"
                                                                                 aria-hidden="true"></span> </a></td>
      </tr>
   <?php } ?>
</table>
