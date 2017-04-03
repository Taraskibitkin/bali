<!doctype html>
<html>
<head>
   <meta name="viewport" content="width=device-width">
   <meta charset="utf-8">
   <title> <?php echo $title; ?> </title>
   <meta name="description" content="<?php echo $seoDescription; ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo $this->url->getStatic('css/styles.css'); ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo $this->url->getStatic('css/style.dns.css'); ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo $this->url->getStatic('bower_components/bootstrap/dist/css/bootstrap.css'); ?>">

   <script type="text/javascript" src="<?php echo $this->url->getStatic('bower_components/jquery/dist/jquery.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo $this->url->getStatic('bower_components/bootstrap/dist/js/bootstrap.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo $this->url->getStatic('js/main.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo $this->url->getStatic('js/script.dns.js'); ?>"></script>

   <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
   <script src="<?php echo $this->url->getStatic('js/jquery/jquery-ui.css'); ?>"></script>
   <script src="<?php echo $this->url->getStatic('js/jquery/jquery-ui.js'); ?>"></script>

   <?php echo $this->getContent(); ?>

   <hr class="clear">
   <footer>
      <div class="container">
         <div class="col-sm-12 col-md-12 col-xs-12">
            <div class="col-sm-6 col-md-6 col-xs-12">
               <a href="<?php echo $linkPrefix; ?>"><img src="<?php echo $this->url->getStatic('images/logo.png'); ?>" class="logo"></a>
            </div>
            <div class="col-sm-6 col-md-6 col-xs-12 pay-sistem">
               <img src="<?php echo $this->url->getStatic('images/pay-sistem1.png'); ?>" class="pay-sistem-img">
               <img src="<?php echo $this->url->getStatic('images/pay-sistem2.png'); ?>" class="pay-sistem-img">
               <img src="<?php echo $this->url->getStatic('images/pay-sistem3.png'); ?>" class="pay-sistem-img">
               <img src="<?php echo $this->url->getStatic('images/pay-sistem4.png'); ?>" class="pay-sistem-img">
            </div>
         </div>
         <div class="col-sm-12 col-md-12 col-xs-12 footer-menu">
            <ul class="menu-font">

               <li><a href="<?php echo $linkPrefix; ?>"><?php echo $t->_('homepage'); ?></a></li>

               <?php echo $this->partial('partial/menu-li'); ?>

            </ul>
         </div>
         <div class="col-sm-12 col-md-21 col-xs-12">
            <h4 class="text-center"><?php echo $t->_('prisoedinyai'); ?> </h4>

            <div class="social-block">
               <a href="<?php echo $soc[0]; ?>" class="one"></a>
               <a href="<?php echo $soc[1]; ?>" class="two"></a>
               <a href="<?php echo $soc[2]; ?>" class="three"></a>
               <a href="<?php echo $soc[3]; ?>" class="four"></a>
               <a href="<?php echo $soc[4]; ?>" class="fife"></a>
            </div>
            <p class="copyright text-center">
               &copy; <?php echo date('Y'); ?>  by BaliProRent.
            </p>
         </div>
      </div>
   </footer>
   </body>
</html>
