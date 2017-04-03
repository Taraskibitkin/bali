<div class="container text-center" ng-app="registrationForm" ng-controller="regFormCtrl">

   <?php echo $this->partial('partial/enter-via-social'); ?>


   <form action="<?php echo $linkPrefix; ?>/user/registration" method="post" name="regForm" novalidate="novalidate"
         class="form-horizontal col-sm-6 col-sm-offset-3" enctype="multipart/form-data">

      <div class="form-group">
         <label class="col-sm-3 control-label"><?php echo $t->_('imya'); ?></label>

         <div class="col-sm-9">
            <?php echo $form->render('reg_name', array('ng-pattern' => '/^[A-Za-zА-Яа-яЁё ]+$/', 'ng-minlength' => '2', 'ng-model' => 'mName', 'required' => 'required', 'class' => 'form-control', 'placeholder' => $t->_('vvedite') . ' ' . $t->_('eimya'))); ?>
         </div>
      </div>


      <div class="form-group">

         <label class="col-sm-3 control-label"><?php echo $t->_('familiya'); ?></label>

         <div class="col-sm-9">
            <?php echo $form->render('reg_sourname', array('ng-pattern' => '/^[A-Za-zА-Яа-яЁё ]+$/', 'ng-minlength' => '2', 'ng-model' => 'mSourname', 'required' => 'required', 'class' => 'form-control', 'placeholder' => $t->_('vvedite') . ' ' . $t->_('familiu'))); ?>
         </div>
      </div>


      <div class="form-group">
         <?php echo $form->label('reg_email', array('class' => 'col-sm-3 control-label')); ?>
         <div class="col-sm-9">
            <input ng-model="mEmail" name="reg_email" ng-minlength="5"
                   placeholder="<?php echo $t->_('vvedite') . ' ' . $t->_('email'); ?>" type="email" class="form-control"
                   required="required">
         </div>
      </div>


      <div class="form-group">
         <label class="col-sm-3 control-label"><?php echo $t->_('parol'); ?></label>

         <div class="col-sm-9">
            <?php echo $form->render('reg_password', array('ng-minlength' => '6', 'ng-model' => 'mParol', 'class' => 'form-control', 'required' => 'required', 'placeholder' => $t->_('vvedite') . ' ' . $t->_('parol'))); ?>
         </div>
      </div>

      <div class="form-group">
         <label class="col-sm-3 control-label"><?php echo $t->_('povtor parol'); ?></label>

         <div class="col-sm-9">
            <?php echo $form->render('reg_pass_rep', array('match' => 'mParol', 'ng-minlength' => '6', 'name' => 'reg_pass_rep', 'ng-model' => 'mRepParol', 'class' => 'form-control', 'required' => 'required', 'placeholder' => $t->_('vvedite') . ' ' . $t->_('parol'))); ?>
            <div ng-show="registrationForm.mRepParol.$error.mismatch">
               <span class="msg-error">Email and Confirm Email must match.</span>
            </div>
         </div>
      </div>


      <div class="form-group">
         <label class="col-sm-3 control-label"><?php echo $t->_('upload photo'); ?></label>

         <div class="col-sm-9">
            <input type="file" name="reg_user_photo">
         </div>
      </div>





      <div class="form-group" id="select_register">
         <div class="col-xs-12">
            <p class="col-sm-3"><?php echo $t->_('mybday'); ?></p>

            <div class="col-sm-9">
               <div class="select_main col-xs-3">
                  <p></p>
                  <select name="reg_b_day" class="select-birth-date">

                     <option selected="selected" value="1">1</option>

                     <?php foreach (range(2, 31) as $num) { ?>
                        <option value="<?php echo $num; ?>"><?php echo $num; ?></option>
                     <?php } ?>

                  </select>
               </div>
               <div class="select_main col-xs-6">
                  <p></p>
                  <select class="select-birth-date" name="reg_b_month">
                     
                     <option selected="selected" value="1"> <?php echo $t->_('m1'); ?></option>
                     <option value="2">  <?php echo $t->_('m2'); ?>  </option>
                     <option value="3">  <?php echo $t->_('m3'); ?>  </option>
                     <option value="4">  <?php echo $t->_('m4'); ?>  </option>
                     <option value="5">  <?php echo $t->_('m5'); ?>  </option>
                     <option value="6">  <?php echo $t->_('m6'); ?>  </option>
                     <option value="7">  <?php echo $t->_('m7'); ?>  </option>
                     <option value="8">  <?php echo $t->_('m8'); ?>  </option>
                     <option value="9">  <?php echo $t->_('m9'); ?>  </option>
                     <option value="10"> <?php echo $t->_('m10'); ?> </option>
                     <option value="11"> <?php echo $t->_('m11'); ?> </option>
                     <option value="12"> <?php echo $t->_('m12'); ?> </option>
                  </select>
               </div>

               <div class="select_main col-xs-3">
                  <p></p>
                  <select class="select-birth-date" name="reg_b_year">
                     
                     <option selected="selected" value="1960">1960</option>

                     <?php foreach (range(1961, 2007) as $num) { ?>
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

            <button type="submit" class="user-submit-form btn btn-default col-xs-12"> <?php echo $t->_('zaregistr'); ?> </button>
         </div>
      </div>

   </form>
</div>