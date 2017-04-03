<link rel="stylesheet" type="text/css" href="<?php echo $this->url->getStatic('css/catalogue.css'); ?>">

<?php $this->assets->outputCss() ?>
<?php $this->assets->outputJs() ?>

<style>
   .black {
      color: black !important;
      font-size: 20px;
   }

   .links-html {
      padding: 40px 0;
   }
</style>
</head>
<body>
<div class="head-part">

   <nav class="navbar navbar-default">
      <div class="container">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
         </div>

         <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav menu-font">

               <?php echo $this->partial('partial/menu-li'); ?>

            </ul>

            <?php echo $this->partial('partial/check-auth'); ?>

         </div>
      </div>
   </nav>


</div>


<div class="col-sm-12 col-md-12 col-xs-12 no-padding">
   <div class="main-content">

      <?php echo $this->getContent(); ?>

   </div>
</div>

