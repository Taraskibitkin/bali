<?php $currentPage = $_SERVER['REQUEST_URI']; ?>

{% if session.has('authIdentity') %}

   {% set avaFix = (indexPage)? 'main-class-fix' : '' %}

      <div class="right-set">
         <ul class="main-menu nav navbar-nav navbar-right {{ avaFix }}">
         {% if session.authIdentity['userPhoto'] %}
            <li class="contains-ava">
               {% set basepath = (session.authIdentity['socAuthorized'] === true)? '': '/uploads/images/users/' %}
               <img class="user-ava" src="{{ basepath }}{{ session.authIdentity['userPhoto'] }}">
            </li>

         {% else %}

            <li class="user-no-ava">
               <span class="glyphicon glyphicon-user"></span>
            </li>
         {% endif %}

         <li>
            <a href="#services">{{ session.authIdentity['userFullName'] }} <span class="caret"></span></a>
            <ul class="sub-menu">
               <li><a href="{{ linkPrefix }}/user/orders">{{ t._('orders') }}</a></li>
               <li><a href="{{ linkPrefix }}/user/profile">{{ t._('profile') }}</a></li>
               <li><a href="{{ linkPrefix }}/user/logout">{{ t._('vuhod') }}</a></li>
            </ul>
         </li>
         <li><a href='/lang/index/en' class="language">EN</a></li>
         <li><a href='/lang/index/ru' class="language">RU</a></li>
      </ul>
   </div>

   {% else %}
   <ul class="nav navbar-nav navbar-right">
      <li><a href="{{ linkPrefix }}/user/login">{{ t._('voiti') }}</a></li>
      <li><a href="{{ linkPrefix }}/user/registration" class="button-empty btn">{{ t._('register') }}</a></li>
      <li><a href='/lang/index/en' class="language">EN</a></li>
      <li><a href='/lang/index/ru' class="language">RU</a></li>
   </ul>
{% endif %}