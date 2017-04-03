<div class="container">
   <div class="col-md-5 col-md-offset-1">
     <h1> <?php echo $t->_('pc_contact'); ?> </h1>
   </div>
</div>
<div class="clearfix"></div>

<div class="singe-page-contact-us">
   <div class="container">
      <div class="col-md-5 col-md-offset-1">
         <h3 class="font-contact">
            <?php echo $t->_('pc_1'); ?>
         </h3>
      </div>
      <div class="col-md-3">
         <img src="<?php echo $this->url->getStatic('images/contact-us.jpeg'); ?>"/>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<div class="contact-form">

   <div class="col-md-5 col-md-offset-1">

      <form class="form-contact-us pull-right" method="post">
         <table>
            <tr>
               <td align="right"><?php echo $t->_('pc_name'); ?></td>
               <td><input class="input-text" type="text" name="user_name"></td>
            </tr>
            <tr>
               <td align="right">Email</td>
               <td><input class="input-text" type="text" name="user_email"></td>
            </tr>
            <tr>
               <td align="right"><?php echo $t->_('pc_phone'); ?></td>
               <td><input class="input-text" type="text" name="user_phone"></td>
            </tr>
            <tr>
               <td align="right"><?php echo $t->_('pc_country'); ?></td>
               <td><input class="input-text" type="text" name="user_country"></td>
            </tr>
            <tr>
               <td></td>
               <td><br><span id="submit-form" class="pull-right" ><?php echo $t->_('pc_send'); ?></span></td>
            </tr>
         </table>
      </form>
   </div>
   <div class="col-md-3 contact-details">
      <h2>BaliProRent</h2>
      <p>Tel: +79856988871</p>
      <p>BaliProRent@gmail.com</p>
      <p>https://www.facebook.com/BaliProRent</p>
   </div>
   <div class="clearfix"></div>
   <div class="container text-center">
         <?php echo $this->flash->output(); ?>
   </div>
</div>
