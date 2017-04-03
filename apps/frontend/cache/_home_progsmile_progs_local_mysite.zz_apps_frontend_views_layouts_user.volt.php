
  <link rel="stylesheet" type="text/css" href="<?php echo $this->url->getStatic('css/catalogue.css'); ?>">  
  
  <?php $this->assets->outputCss() ?>
  <?php $this->assets->outputJs() ?>
  
  <style>
    .black{
      color: black !important;
      font-size: 20px;
    }
    .links-html{
      padding: 40px 0;
    }
  </style>
</head>
<body>
  <div class="head-part">
    <header>
      <div class="container">
        
        <nav class="<?php $this->partial("partial/get-auth-class") ?>">
          <ul class="menu-font">
            
            <?php $this->partial("partial/menu-li") ?>
            
          </ul>
        </nav>
          
          <?php $this->partial("partial/check-auth") ?>
          
      </div>
    </header>
  </div>

  <div class="col-sm-12 col-md-12 col-xs-12 no-padding">
    <div class="main-content">
        
          <?php echo $this->getContent(); ?>
          
      </div>
    </div>
  </div>
