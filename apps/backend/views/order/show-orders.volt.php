<br>
<h2>Order management</h2>

<div>
   <?php echo $this->flash->output(); ?>
</div>
<?php $timeFormat = 'd-m-Y'; ?>

Today: <?php echo date( $timeFormat, time() ); ?>

<table class="table table-striped table-bordered">
   <tr>
      <td>User</td>
      <td>Villa</td>
      <td>From</td>
      <td>To</td>
      <td>Price</td>
      <td>Total</td>
      <td>Delete</td>
   </tr>

   <?php foreach ($orders as $order) { ?>
      <tr class="<?php echo ($order->is_payed == 1 ? 'success' : 'danger'); ?>">
         <?php $user = $users[$order->user_id]; ?>
         <?php $villa = $villas[$order->villa_id]; ?>
         <td>
            <img class="user-order-ava" src="<?php echo $user['user_photo']; ?> "/>

            <div class="user-order-block">
               <?php echo $user['name']; ?>
               <?php echo $user['sourname']; ?> <br>
               <?php echo $user['email']; ?> <br>
               <?php echo $user['phone']; ?>
            </div>
         </td>
         <td>
            <img class="user-order-ava" src="<?php echo SITE_URL ?>/uploads/images/villas/<?php echo $villa['main_img']; ?>"/>

            <div>
               <?php echo $villa['room_name']; ?>
            </div>
         </td>
         <?php $timeFormat = 'd-m-Y'; ?>
         <td><?php echo $time1 = date( $timeFormat, $order->ordered_from ); ?></td>
         <td><?php echo $time2 = date( $timeFormat, $order->ordered_to ); ?></td>
         <td><?php echo $villa['room_price']; ?>$</td>
         <td>
            <?php
            $datetime1 = new DateTime( $time1 );
            $datetime2 = new DateTime( $time2 );
            $interval = $datetime1->diff($datetime2);
            echo $interval->format('%a days') . ' * ' . $villa['room_price'] . '$' .
                  ' = ' . ( $interval->format('%a') * $villa['room_price'] ) . '$';

            ?>
         </td>
         <td>
            <a href="/admin/order/delete/<?php echo $order->id; ?>">
               <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </a>
         </td>
      </tr>
   <?php } ?>
</table>

<script src="http://momentjs.com/downloads/moment.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.min.css">
