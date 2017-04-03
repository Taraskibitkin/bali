<div class="container text-center">

    <br>
    <br>
    <br>
    <form method="post" class="form-horizontal col-xs-6 col-xs-offset-3">

        <div class="form-group">

            <label class="col-xs-3 control-label">New password</label>
            <div class="col-xs-9">
                <input type="password" name="new_password" class="form-control" placeholder="{{ t._('enter password')  }}" >
            </div>
        </div>

        <div class="form-group">

            <label class="col-xs-3 control-label">Confirm password</label>
            <div class="col-xs-9">
                <input type="password" name="confirm_new_password" class="form-control" placeholder="{{ t._('enter password') }}" >
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-12">
                <p>{{ flash.output() }}</p>

                <input value="{{ 'Change password' }}" type="submit" class="btn btn-default col-xs-12">

                <p class="text-left"><a href="/user/registration" id="registration_request">{{ t._('register') }}</a></p>
            </div>
        </div>
    </form>
</div>