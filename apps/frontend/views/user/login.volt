<div class="container text-center" ng-app="appLogForm">

    {{ partial('partial/enter-via-social') }}

   <form action="{{ linkPrefix }}/user/login" method="post" name="logForm" novalidate="novalidate" class="form-horizontal col-sm-6 col-sm-offset-3">

        <div class="form-group">
           <label class="col-sm-3 control-label">{{ t._('E-mail') }}</label>
            <div class="col-sm-9">
               <input ng-model="lEmail" name="log_email" ng-minlength="5" placeholder="{{ t._('enter email') }}" type="email" class="form-control" required="required" >
            </div>
        </div>

        <div class="form-group">
           <label class="col-sm-3 control-label">{{ t._('parol') }}</label>
            <div class="col-sm-9">
               <input ng-model="lParol" name="log_password" ng-minlength="6" placeholder="{{ t._('enter pass') }}" type="password" class="form-control" required="required" >
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-12">
                <div class="checkbox text-left">
                    <label>
                        {{ form.render('remember') }}

                        {{ t._('remember me') }}</label>
                    <span class="pull-right"><a href="{{ linkPrefix }}/user/forgotPassword" id="forgotten_password">{{ t._('forgot pass') }}</a></span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-12">
                <p>{{ flash.output() }}</p>

                {{ form.render('csrf', ['value': security.getToken()]) }}

                {{ submit_button(t._('voiti'), 'class': 'user-submit-form btn btn-default col-xs-12' ) }}
                <br><br>

                <p class="text-left">{{ t._('yet registered') }}</p>

                <p class="text-left"><a href="{{ linkPrefix }}/user/registration" id="registration_request">{{ t._('register') }}</a>
                </p>
            </div>
        </div>
    </form>
</div>