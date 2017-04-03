<div class="container text-center">

    <br>
    <br>
    <br>
    <form method="post" class="form-horizontal col-xs-6 col-xs-offset-3">

    <div class="form-group">

        {#<label class="col-xs-3 control-label">Email</label>#}
        <div class="col-xs-9">
            {#<input type="text" name="rest_email" class="form-control" placeholder="{{ t._('enter email')  }}" >#}
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-12">
            <p>{{ flash.output() }}</p>

            {#<input value="{{ 'Restore password' }}" type="submit" class="btn btn-default col-xs-12">#}

            {#<p class="text-left">{{ t._('yet registered') }}</p>#}

            {#<p class="text-left"><a href="/user/registration" id="registration_request">{{ t._('register') }}</a>#}
            {#</p>#}
        </div>
    </div>
    </form>
</div>