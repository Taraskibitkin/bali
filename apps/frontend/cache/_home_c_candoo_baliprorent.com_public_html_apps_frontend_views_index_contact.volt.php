<div class="col-sm-12 col-md-12 col-xs-12 main-info no-padding">
   <div class="main-content">
      <div class="container contacts">
        <div class="col-xs-12 col-lg-6">
            <h1 class="col-xs-12"> <?php echo $t->_('pc_contact'); ?> </h1>
            <div class="col-lg-12">
               <h3>
                  <?php echo $t->_('pc_1'); ?>
               </h3>

               <form class="form-contact-us form-horizontal" method="post">
                  <div class="form-group">
                     <label for="inputName" class="col-sm-2 control-label"><?php echo $t->_('pc_name'); ?></label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" name="user_name" id="inputName" placeholder="<?php echo $t->_('pc_name'); ?>"></div>
                  </div>
                  <div class="form-group">
                     <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                     <div class="col-sm-10">
                        <input type="email" class="form-control"  name="user_email" id="inputEmail3" placeholder="Email"></div>
                  </div>
                  <div class="form-group">
                     <label for="inputPhone" class="col-sm-2 control-label"><?php echo $t->_('pc_phone'); ?></label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" name="user_phone" id="inputPhone" placeholder="<?php echo $t->_('pc_phone'); ?>"></div>
                  </div>
                  <div class="form-group">
                     <label for="inputCountry" class="col-sm-2 control-label"><?php echo $t->_('pc_country'); ?></label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" name="user_country" id="inputCountry" placeholder="<?php echo $t->_('pc_country'); ?>"></div>
                  </div>
                  <div class="form-group">
                     <label for="inputComment" class="col-sm-2 control-label"><?php echo $t->_('pc_comment'); ?></label>
                     <div class="col-sm-10">
                        <textarea type="text" class="form-control" name="user_comment" id="inputComment" placeholder="<?php echo $t->_('pc_comment'); ?>"></textarea>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default"><?php echo $t->_('pc_send'); ?></button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="col-xs-12 col-sm-6 col-lg-6"><img class="img-responsive center-block" src="/images/contact-us.jpeg" alt="contacts"></div>
         <div class="col-xs-12 col-sm-6 contacts-on-contacts text-center">
            <p class="lead">BaliProRent</p>
            <p class="lead">Tel: +79856988871</p>
            <p class="lead">BaliProRent@gmail.com</p>
         </div>
         <div class="clearfix"></div>
         <?php echo $this->flash->Output(); ?>
      </div>
   </div>
</div>
