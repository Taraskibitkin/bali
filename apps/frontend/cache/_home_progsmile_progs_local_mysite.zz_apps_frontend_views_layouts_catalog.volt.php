<?php echo $this->assets->outputCss(); ?>
<?php echo $this->assets->outputJs(); ?>
</head>
<body>
  <div class="head-part">
    <header>
      <div class="container">
        <nav class="<?php echo $this->partial('partial/get-auth-class'); ?>">
          <ul class="menu-font">
            <?php echo $this->partial('partial/menu-li'); ?>
          </ul>
        </nav>
          
          <?php echo $this->partial('partial/check-auth'); ?>
          
      </div>
    </header>
    <div class='search-panel'>
        
      <?php echo $this->partial('partial/villas-filter'); ?>

    </div>
  </div>

      <?php echo $this->getContent(); ?>