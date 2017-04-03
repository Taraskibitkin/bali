<div class="container text-center" ng-app="registrationForm" ng-controller="regFormCtrl">

   {{ partial('partial/enter-via-social') }}


   <form action="{{ linkPrefix }}/user/registration" method="post" name="regForm" novalidate="novalidate"
         class="form-horizontal col-sm-6 col-sm-offset-3" enctype="multipart/form-data">

      <div class="form-group">
         <label class="col-sm-3 control-label">{{ t._('imya') }}</label>

         <div class="col-sm-9">
            {{ form.render('reg_name', ['ng-pattern':'/^[A-Za-zА-Яа-яЁё ]+$/','ng-minlength':'2', 'ng-model':'mName', 'required':'required', 'class': 'form-control', 'placeholder' : t._('vvedite') ~ ' ' ~ t._('eimya') ]) }}
         </div>
      </div>


      <div class="form-group">

         <label class="col-sm-3 control-label">{{ t._('familiya') }}</label>

         <div class="col-sm-9">
            {{ form.render('reg_sourname', ['ng-pattern':'/^[A-Za-zА-Яа-яЁё ]+$/', 'ng-minlength':'2', 'ng-model':'mSourname', 'required':'required', 'class': 'form-control', 'placeholder' : t._('vvedite') ~ ' ' ~ t._('familiu') ]) }}
         </div>
      </div>


      <div class="form-group">
         {{ form.label('reg_email', ['class': 'col-sm-3 control-label']) }}
         <div class="col-sm-9">
            <input ng-model="mEmail" name="reg_email" ng-minlength="5"
                   placeholder="{{ t._('vvedite') ~ ' ' ~ t._('email') }}" type="email" class="form-control"
                   required="required">
         </div>
      </div>


      <div class="form-group">
         <label class="col-sm-3 control-label">{{ t._('parol') }}</label>

         <div class="col-sm-9">
            {{ form.render('reg_password', ['ng-minlength':'6', 'ng-model':'mParol', 'class': 'form-control', 'required':'required', 'placeholder' : t._('vvedite') ~ ' ' ~ t._('parol') ]) }}
         </div>
      </div>

      <div class="form-group">
         <label class="col-sm-3 control-label">{{ t._('povtor parol') }}</label>

         <div class="col-sm-9">
            {{ form.render('reg_pass_rep', [ 'match':'mParol', 'ng-minlength':'6', 'name':'reg_pass_rep', 'ng-model':'mRepParol', 'class': 'form-control',  'required':'required', 'placeholder' : t._('vvedite') ~ ' ' ~ t._('parol') ]) }}
            <div ng-show="registrationForm.mRepParol.$error.mismatch">
               <span class="msg-error">Email and Confirm Email must match.</span>
            </div>
         </div>
      </div>


      <div class="form-group">
         <label class="col-sm-3 control-label">{{ t._('upload photo') }}</label>

         <div class="col-sm-9">
            <input type="file" name="reg_user_photo">
         </div>
      </div>





      <div class="form-group" id="select_register">
         <div class="col-xs-12">
            <p class="col-sm-3">{{ t._('mybday') }}</p>

            <div class="col-sm-9">
               <div class="select_main col-xs-3">
                  <p></p>
                  <select name="reg_b_day" class="select-birth-date">

                     <option selected="selected" value="1">1</option>

                     {% for num in 2..31 %}
                        <option value="{{ num }}">{{ num }}</option>
                     {% endfor %}

                  </select>
               </div>
               <div class="select_main col-xs-6">
                  <p></p>
                  <select class="select-birth-date" name="reg_b_month">
                     {#<option value="">{{ t._('m b month') }}</option>#}
                     <option selected="selected" value="1"> {{ t._('m1') }}</option>
                     <option value="2">  {{ t._('m2') }}  </option>
                     <option value="3">  {{ t._('m3') }}  </option>
                     <option value="4">  {{ t._('m4') }}  </option>
                     <option value="5">  {{ t._('m5') }}  </option>
                     <option value="6">  {{ t._('m6') }}  </option>
                     <option value="7">  {{ t._('m7') }}  </option>
                     <option value="8">  {{ t._('m8') }}  </option>
                     <option value="9">  {{ t._('m9') }}  </option>
                     <option value="10"> {{ t._('m10') }} </option>
                     <option value="11"> {{ t._('m11') }} </option>
                     <option value="12"> {{ t._('m12') }} </option>
                  </select>
               </div>

               <div class="select_main col-xs-3">
                  <p></p>
                  <select class="select-birth-date" name="reg_b_year">
                     {#<option selected="selected" value="">{{ t._('m b year') }}</option>#}
                     <option selected="selected" value="1960">1960</option>

                     {% for num in 1961..2007 %}
                        <option value="{{ num }}">{{ num }}</option>
                     {% endfor %}

                  </select>
               </div>
            </div>
         </div>
      </div>

      <div class="form-group">
         <div class="col-xs-12">
            {{ form.render('csrf', ['value': security.getToken()]) }}

            <p>{{ flash.output() }} </p>

            <button type="submit" class="user-submit-form btn btn-default col-xs-12"> {{ t._('zaregistr') }} </button>
         </div>
      </div>

   </form>
</div>