<div class="container text-center" ng-app="appLogForm">

    <?php echo $this->partial('partial/enter-via-social'); ?>

   <form action="<?php echo $linkPrefix; ?>/user/login" method="post" name="logForm" novalidate="novalidate" class="form-horizontal col-sm-6 col-sm-offset-3">

        <div class="form-group">
           <label class="col-sm-3 control-label"><?php echo $t->_('E-mail'); ?></label>
            <div class="col-sm-9">
               <input ng-model="lEmail" name="log_email" ng-minlength="5" placeholder="<?php echo $t->_('enter email'); ?>" type="email" class="form-control" required="required" >
            </div>
        </div>

        <div class="form-group">
           <label class="col-sm-3 control-label"><?php echo $t->_('parol'); ?></label>
            <div class="col-sm-9">
               <input ng-model="lParol" name="log_password" ng-minlength="6" placeholder="<?php echo $t->_('enter pass'); ?>" type="password" class="form-control" required="required" >
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-12">
                <div class="checkbox text-left">
                    <label>
                        <?php echo $form->render('remember'); ?>

                        <?php echo $t->_('remember me'); ?></label>
                    <span class="pull-right"><a href="<?php echo $linkPrefix; ?>/user/forgotPassword" id="forgotten_password"><?php echo $t->_('forgot pass'); ?></a></span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-12">
                <p><?php echo $this->flash->output(); ?></p>

                <?php echo $form->render('csrf', array('value' => $this->security->getToken())); ?>

                <?php echo $this->tag->submitButton(array($t->_('voiti'), 'class' => 'user-submit-form btn btn-default col-xs-12')); ?>
                <br><br>

                <p class="text-left"><?php echo $t->_('yet registered'); ?></p>

                <p class="text-left"><a href="<?php echo $linkPrefix; ?>/user/registration" id="registration_request"><?php echo $t->_('register'); ?></a>
                </p>
            </div>
        </div>
    </form>
</div>