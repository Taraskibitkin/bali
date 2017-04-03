<div class="container text-center">

    <?php echo $this->partial('partial/enter-via-social'); ?>

    <?php echo $this->tag->form(array('user/login', 'class' => 'form-horizontal col-xs-6 col-xs-offset-3', 'onbeforesubmit' => 'return false')); ?>

        <div class="form-group">
            <?php echo $form->label('log_email', array('class' => 'col-xs-3 control-label')); ?>
            <div class="col-xs-9">
                <?php echo $form->render('log_email', array('class' => 'form-control', 'placeholder' => $t->_('enter email'))); ?>
            </div>
        </div>

        <div class="form-group">
           <label class="col-xs-3 control-label"><?php echo $t->_('parol'); ?></label>
            <div class="col-xs-9">
                <?php echo $form->render('log_password', array('class' => 'form-control', 'placeholder' => $t->_('enter pass'))); ?>
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

                <?php echo $this->tag->submitButton(array($t->_('voiti'), 'class' => 'btn btn-default col-xs-12')); ?>
                <br><br>

                <p class="text-left"><?php echo $t->_('yet registered'); ?></p>

                <p class="text-left"><a href="<?php echo $linkPrefix; ?>/user/registration" id="registration_request"><?php echo $t->_('register'); ?></a>
                </p>
            </div>
        </div>
    </form>
</div>