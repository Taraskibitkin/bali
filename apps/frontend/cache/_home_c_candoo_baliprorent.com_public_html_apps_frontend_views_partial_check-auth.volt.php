<?php $currentPage = $_SERVER['REQUEST_URI']; ?>

<?php if ($this->session->has('authIdentity')) { ?>

   <?php $avaFix = (($indexPage) ? 'main-class-fix' : ''); ?>

      <div class="right-set">
         <ul class="main-menu nav navbar-nav navbar-right <?php echo $avaFix; ?>">
         <?php if ($this->session->authIdentity['userPhoto']) { ?>
            <li class="contains-ava">
               <?php $basepath = (($this->session->authIdentity['socAuthorized'] === true) ? '' : '/uploads/images/users/'); ?>
               <img class="user-ava" src="<?php echo $basepath; ?><?php echo $this->session->authIdentity['userPhoto']; ?>">
            </li>

         <?php } else { ?>

            <li class="user-no-ava">
               <span class="glyphicon glyphicon-user"></span>
            </li>
         <?php } ?>

         <li>
            <a href="#services"><?php echo $this->session->authIdentity['userFullName']; ?> <span class="caret"></span></a>
            <ul class="sub-menu">
               <li><a href="<?php echo $linkPrefix; ?>/user/orders"><?php echo $t->_('orders'); ?></a></li>
               <li><a href="<?php echo $linkPrefix; ?>/user/profile"><?php echo $t->_('profile'); ?></a></li>
               <li><a href="<?php echo $linkPrefix; ?>/user/logout"><?php echo $t->_('vuhod'); ?></a></li>
            </ul>
         </li>
         <li><a href='/lang/index/en' class="language">EN</a></li>
         <li><a href='/lang/index/ru' class="language">RU</a></li>
      </ul>
   </div>

   <?php } else { ?>
   <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo $linkPrefix; ?>/user/login"><?php echo $t->_('voiti'); ?></a></li>
      <li><a href="<?php echo $linkPrefix; ?>/user/registration" class="button-empty btn"><?php echo $t->_('register'); ?></a></li>
      <li><a href='/lang/index/en' class="language">EN</a></li>
      <li><a href='/lang/index/ru' class="language">RU</a></li>
   </ul>
<?php } ?>