<div class="container text-center">
   <h3 class="panel"><?php echo $t->_('myprofile'); ?></h3>

   <form action="<?php echo $linkPrefix; ?>/user/saveProfile" ng-app="profileForm" method="post" name="profileForm"
         novalidate="novalidate" enctype="multipart/form-data" class="form-horizontal col-xs-6 col-xs-offset-3">

      <div class="form-group" <?php echo $userInfo->id; ?>>
         <label for="inputEmail" class="col-xs-3 control-label"><?php echo $t->_('imya'); ?></label>

         <div class="col-xs-9">
            <?php echo $form->render('u_name', array('ng-pattern' => '/^[A-Za-zА-Яа-яЁё ]+$/', 'ng-minlength' => '2', 'required' => 'required', 'ng-model' => 'pName', 'class' => 'form-control', 'ng-init' => 'pName="' . $userInfo->name . '"', 'value' => $userInfo->name, 'placeholder' => $t->_('vvedite') . ' ' . $t->_('eimya'))); ?>
         </div>
      </div>

      <div class="form-group">
         <label for="inputEmail" class="col-xs-3 control-label"><?php echo $t->_('familiya'); ?></label>

         <div class="col-xs-9">
            <?php echo $form->render('u_sourname', array('ng-pattern' => '/^[A-Za-zА-Яа-яЁё ]+$/', 'required' => 'required', 'ng-minlength' => '2', 'ng-model' => 'pSourname', 'ng-init' => 'pSourname="' . $userInfo->sourname . '"', 'class' => 'form-control', 'value' => $userInfo->sourname, 'placeholder' => $t->_('vvedite') . ' ' . $t->_('eimya'))); ?>
         </div>
      </div>

      <div class="form-group" id="select_register">
         <div class="col-xs-12">
            <p class="col-xs-3">
               <?php echo $t->_('mybday'); ?>
            </p>

            <div class="col-xs-9">
               <div class="select_main col-xs-3">
                  <p></p>
                  <select name="u_birthDay" class="select-birth-date">
                     <?php foreach (range(1, 31) as $num) { ?>
                        <option <?php if ($num == $birthDay) { ?> selected="selected" <?php } ?>
                              value="<?php echo $num; ?>"><?php echo $num; ?></option>
                     <?php } ?>
                  </select>
               </div>

               <div class="select_main col-xs-6">
                  <p></p>
                  <select name="u_birthMonth" class="select-birth-date">
                     <option <?php echo ($birthMonth == 1 ? 'selected' : ''); ?> value="1">  <?php echo $t->_('m1'); ?>  </option>
                     <option <?php echo ($birthMonth == 2 ? 'selected' : ''); ?> value="2">  <?php echo $t->_('m2'); ?>  </option>
                     <option <?php echo ($birthMonth == 3 ? 'selected' : ''); ?> value="3">  <?php echo $t->_('m3'); ?>  </option>
                     <option <?php echo ($birthMonth == 4 ? 'selected' : ''); ?> value="4">  <?php echo $t->_('m4'); ?>  </option>
                     <option <?php echo ($birthMonth == 5 ? 'selected' : ''); ?> value="5">  <?php echo $t->_('m5'); ?>  </option>
                     <option <?php echo ($birthMonth == 6 ? 'selected' : ''); ?> value="6">  <?php echo $t->_('m6'); ?>  </option>
                     <option <?php echo ($birthMonth == 7 ? 'selected' : ''); ?> value="7">  <?php echo $t->_('m7'); ?>  </option>
                     <option <?php echo ($birthMonth == 8 ? 'selected' : ''); ?> value="8">  <?php echo $t->_('m8'); ?>  </option>
                     <option <?php echo ($birthMonth == 9 ? 'selected' : ''); ?> value="9">  <?php echo $t->_('m9'); ?>  </option>
                     <option <?php echo ($birthMonth == 10 ? 'selected' : ''); ?> value="10"> <?php echo $t->_('m10'); ?> </option>
                     <option <?php echo ($birthMonth == 11 ? 'selected' : ''); ?> value="11"> <?php echo $t->_('m11'); ?> </option>
                     <option <?php echo ($birthMonth == 12 ? 'selected' : ''); ?> value="12"> <?php echo $t->_('m12'); ?> </option>
                  </select>
               </div>
               <div class="select_main col-xs-3">
                  <p></p>
                  <select name="u_birthYear" class="select-birth-date">

                     <?php foreach (range(2007, 1959) as $num) { ?>
                        <option <?php if ($num == $birthYear) { ?> selected="selected" <?php } ?>
                              value="<?php echo $num; ?>"><?php echo $num; ?></option>
                     <?php } ?>

                  </select>
               </div>
            </div>
         </div>
      </div>

      <div class="form-group">
         <label for="inputEmail" class="col-xs-3 control-label">Email</label>

         <div class="col-xs-9">
            <?php echo $form->render('u_email', array('ng-minlength' => 5, 'ng-model' => 'pEmail', 'ng-init' => 'pEmail="' . $userInfo->email . '"', 'required' => 'required', 'class' => 'form-control', 'value' => $userInfo->email, 'placeholder' => $t->_('vvedite') . ' ' . $t->_('email'))); ?>
         </div>
      </div>

      <div class="form-group">
         <label for="inputPhone" class="col-xs-3 control-label"><?php echo $t->_('phone_num'); ?></label>

         <div class="col-xs-9">
            <input name="u_phone" required="required" ng-model="pPhone" ng-init="pPhone='<?php echo $userInfo->phone; ?>'"
                   ng-pattern="/^[ 0-9+]+$/" ng-minlength="7" type="text" value="<?php echo $userInfo->phone; ?>"
                   class="form-control"
                   placeholder="Введите номер телефона"></div>
      </div>


      <div class="form-group">
         <label for="inputAddress" class="col-xs-3 control-label"><?php echo $t->_('living_place'); ?></label>

         <div class="col-xs-9">
            <input name="u_address" type="text" value="<?php echo $userInfo->living_place; ?>" class="form-control"
                   placeholder="Введите адрес">
         </div>
      </div>

      <div class="form-group">
         <label for="inputLanguage" class="col-xs-3 control-label"><?php echo $t->_('_langs'); ?></label>

         <div class="col-xs-9">
            <input name="u_langs" type="text" value="<?php echo $userInfo->languages; ?>" class="form-control"
                   placeholder="Укажите языки (через запятую)">
         </div>
      </div>


      <?php if (!$userInfo->soc_authed) { ?>
         <div class="form-group">
            <label class="col-xs-3 control-label"><?php echo $t->_('upload photo'); ?></label>
            <div class="col-xs-9">
               <input name="u_photo" type="file" class="form-control">
            </div>
         </div>

         <div class="form-group">
            <label for="inputLanguage" class="col-xs-3 control-label"><?php echo $t->_('old_pass'); ?></label>

            <div class="col-xs-9">
               <input type="password" ng-minlength="6" name="u_old_password"
                      placeholder="<?php echo $t->_('vvedite') . ' ' . $t->_('old parol'); ?>" class="form-control" ng-model="pPass">
            </div>
         </div>

         <div class="form-group">
            <label for="inputLanguage" class="col-xs-3 control-label"><?php echo $t->_('new_pass'); ?></label>

            <div class="col-xs-9">
               <input type="password" ng-minlength="6" name="u_new_password"
                      placeholder="<?php echo $t->_('vvedite') . ' ' . $t->_('new parol'); ?>" class="form-control"
                      ng-model="pPassRep">
            </div>
         </div>
      <?php } ?>

      <div class="form-group">
         <div class="col-xs-12">
            <button type="submit" class="user-submit-form col-xs-12 btn btn-default"><?php echo $t->_('f-save'); ?></button>
            <br><br><br>
         </div>
      </div>

      
      
      <?php echo $this->flash->Output(); ?>

   </form>


</div>
