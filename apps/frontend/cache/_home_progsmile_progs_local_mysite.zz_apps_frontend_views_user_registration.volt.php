<div class="container text-center">

   <?php echo $this->partial('partial/enter-via-social'); ?>


   <?php echo $this->tag->form(array('user/registration', 'class' => 'form-horizontal col-xs-6 col-xs-offset-3')); ?>

   <div class="form-group">
      <label class="col-xs-3 control-label"><?php echo $t->_('imya'); ?></label>

      <div class="col-xs-9">
         <?php echo $form->render('reg_name', array('class' => 'form-control', 'placeholder' => $t->_('vvedite') . ' ' . $t->_('eimya'))); ?>
      </div>
   </div>


   <div class="form-group">

      <label class="col-xs-3 control-label"><?php echo $t->_('familiya'); ?></label>

      <div class="col-xs-9">
         <?php echo $form->render('reg_sourname', array('class' => 'form-control', 'placeholder' => $t->_('vvedite') . ' ' . $t->_('familiu'))); ?>
      </div>
   </div>


   <div class="form-group">
      <?php echo $form->label('reg_email', array('class' => 'col-xs-3 control-label')); ?>
      <div class="col-xs-9">
         <?php echo $form->render('reg_email', array('class' => 'form-control', 'placeholder' => $t->_('vvedite') . ' ' . $t->_('email'))); ?>
      </div>
   </div>


   <div class="form-group">
      <label class="col-xs-3 control-label"><?php echo $t->_('parol'); ?></label>
      <div class="col-xs-9">
         <?php echo $form->render('reg_password', array('class' => 'form-control', 'placeholder' => $t->_('vvedite') . ' ' . $t->_('parol'))); ?>
      </div>
   </div>

   <div class="form-group">
      <label class="col-xs-3 control-label"><?php echo $t->_('povtor parol'); ?></label>
      <div class="col-xs-9">
         <?php echo $form->render('reg_pass_rep', array('class' => 'form-control', 'placeholder' => $t->_('vvedite') . ' ' . $t->_('parol'))); ?>
      </div>
   </div>

   <div class="form-group" id="select_register">
      <div class="col-xs-12">
         <p class="col-xs-3"><?php echo $t->_('mybday'); ?></p>

         <div class="col-xs-9">
            <div class="select_main col-xs-3">
               <p></p>
               <select name="reg_b_day" class="select-birth-date">
                  <option selected="selected" value=""><?php echo $t->_('m b day'); ?></option>

                  <?php foreach (range(1, 31) as $num) { ?>
                     <option value="1"><?php echo $num; ?></option>
                  <?php } ?>

               </select>
            </div>
            <div class="select_main col-xs-6">
               <p></p>
               <select class="select-birth-date" name="reg_b_month">

                  <option selected="selected" value=""><?php echo $t->_('m b month'); ?></option>
                  <option value="1"> <?php echo $t->_('m1'); ?></option>
                  <option value="2"> <?php echo $t->_('m2'); ?></option>
                  <option value="3"> <?php echo $t->_('m3'); ?></option>
                  <option value="4"> <?php echo $t->_('m4'); ?></option>
                  <option value="5"> <?php echo $t->_('m5'); ?></option>
                  <option value="6"> <?php echo $t->_('m6'); ?></option>
                  <option value="7"> <?php echo $t->_('m7'); ?></option>
                  <option value="8"> <?php echo $t->_('m8'); ?></option>
                  <option value="9"> <?php echo $t->_('m9'); ?></option>
                  <option value="10"><?php echo $t->_('m10'); ?></option>
                  <option value="11"><?php echo $t->_('m11'); ?></option>
                  <option value="12"><?php echo $t->_('m12'); ?></option>

               </select>
            </div>

            <div class="select_main col-xs-3">
               <p></p>
               <select class="select-birth-date" name="reg_b_year">
                  <option selected="selected" value=""><?php echo $t->_('m b year'); ?></option>

                  <?php foreach (range(2007, 1959) as $num) { ?>
                     <option value="<?php echo $num; ?>"><?php echo $num; ?></option>
                  <?php } ?>

               </select>
            </div>
         </div>
      </div>
   </div>

   <div class="form-group">
      <div class="col-xs-12">
         <?php echo $form->render('csrf', array('value' => $this->security->getToken())); ?>

         <p><?php echo $this->flash->output(); ?> </p>

         <button type="submit" class="btn btn-default col-xs-12"> <?php echo $t->_('zaregistr'); ?> </button>
      </div>
   </div>

   </form>
</div>