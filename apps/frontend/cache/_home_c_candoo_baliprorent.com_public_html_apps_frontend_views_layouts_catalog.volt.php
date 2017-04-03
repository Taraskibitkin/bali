<?php echo $this->assets->outputCss(); ?>
<?php echo $this->assets->outputJs(); ?>
</head>
<body>
   <div class="head-part">

      <nav class="navbar navbar-default">
         <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                       data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<div class="logo-container">
					<a href="<?=SITE_URL;?>">
						<img src="<?php echo $this->url->getStatic('images/baliprorent-logo-without-text.png'); ?>" alt="BaliProRent" class="logo" />
					</a>
				</div>
				<ul class="nav navbar-nav menu-font">
					<?php echo $this->partial('partial/menu-li'); ?>
				</ul>

               <?php echo $this->partial('partial/check-auth'); ?>
            </div>
         </div>
      </nav>

         <?php echo $this->partial('partial/villas-filter'); ?>
   </div>

   <?php echo $this->getContent(); ?>




