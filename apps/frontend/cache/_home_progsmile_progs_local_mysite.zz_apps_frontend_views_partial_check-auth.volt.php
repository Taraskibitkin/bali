<?php $currentPage = $_SERVER['REQUEST_URI']; ?>

<?php if ($this->session->has('authIdentity')) { ?>

    <div class="<?php echo ($currentPage == '/' ? 'col-sm-4 col-md-4' : 'col-sm-6 col-md-6'); ?> col-xs-12 right-set">
        <ul class="main-menu">
            <li><span class="glyphicon glyphicon-user"></span></li>
            <li><a href="#services"><?php echo $this->session->authIdentity['userFullName']; ?> <span class="caret"></span></a>
                <ul class="sub-menu">
                    <li><a href="<?php echo $linkPrefix; ?>/user/orders"><?php echo $t->_('orders'); ?></a></li>
                    <li><a href="<?php echo $linkPrefix; ?>/user/profile"><?php echo $t->_('profile'); ?></a></li>
                    <li><a href="<?php echo $linkPrefix; ?>/user/logout"><?php echo $t->_('vuhod'); ?></a></li>
                </ul>
            </li>
            <li><a href='/lang?l=en' class="language">EN</a></li>
            <li><a href='/lang?l=ru' class="language">RU</a></li>
        </ul>
    </div>

<?php } else { ?>


    <div class="cos-sm-4 col-md-4 col-xs-12 right-set">
        <a href="<?php echo $linkPrefix; ?>/user/login"><?php echo $t->_('voiti'); ?></a>
        <a href="<?php echo $linkPrefix; ?>/user/registration" class="button-empty btn"><?php echo $t->_('register'); ?></a>
        <a href='/lang/index/en' class="language">EN</a>
        <a href='/lang/index/ru' class="language">RU</a>
    </div>

<?php } ?>