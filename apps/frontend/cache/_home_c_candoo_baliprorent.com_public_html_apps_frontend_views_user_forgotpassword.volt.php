<div class="container text-center">

    <br>
    <br>
    <br>
    <form method="post" class="form-horizontal col-xs-6 col-xs-offset-3">

    <div class="form-group">

        <label class="col-xs-3 control-label">Email</label>
        <div class="col-xs-9">
            <input type="text" name="rest_email" class="form-control" placeholder="<?php echo $t->_('enter email'); ?>" >
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-12">
            <p><?php echo $this->flash->output(); ?></p>

            <input value="<?php echo $t->_('restor'); ?>" type="submit" class="btn btn-default col-xs-12">

            <p class="text-left"><?php echo $t->_('yet registered'); ?></p>

            <p class="text-left"><a href="/user/registration" id="registration_request"><?php echo $t->_('register'); ?></a>
            </p>
        </div>
    </div>
    </form>
</div>