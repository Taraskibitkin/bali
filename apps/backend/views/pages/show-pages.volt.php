<br>
<h2>Page management</h2>
<br>

<div>
   <?php echo $this->flash->output(); ?>
</div>

<table class="table table-striped table-bordered">
   <tr>
      <td>ID</td>
      <td>Slug</td>
      <td>Title</td>
      <td>Edit</td>
      <td>Delete</td>
   </tr>

   <?php foreach ($pages as $page) { ?>
      <tr>
         <td><?php echo $page->id; ?></td>
         <td><?php echo $page->slug; ?></td>
         <td><?php echo $page->title; ?></td>
         <td>
            <a href="/admin/page/edit/<?php echo $page->id; ?>">
               <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>
         </td>
         <td>
            <a href="/admin/page/delete/<?php echo $page->id; ?> ">
               <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </a>
         </td>
      </tr>
   <?php } ?>
</table>
