<meta charset="UTF-8">

<link rel="stylesheet" type="text/css" href="<?php echo $this->url->getStatic('bower_components/bootstrap/dist/css/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo $this->url->getStatic('css/admin.dns.css'); ?>">

<script src="<?php echo $this->url->getStatic('bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php echo $this->url->getStatic('bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

<script src="<?php echo $this->url->getStatic('js/tinymce/tinymce.min.js'); ?>"></script>
<script src="<?php echo $this->url->getStatic('js/admin/admin.dns.js'); ?>"></script>


<title>Dashboard | BaliProRent</title>
</head>
<body>

<?php if ($this->session->has('adminAccess')) { ?>

   <nav class="navbar navbar-inverse">
      <div class="container">
         <div class="navbar-header">
            <a class="navbar-brand" href="/admin">Bali Rent</a>
         </div>
         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav nav-controll">
               <li><a href="/admin/page/show">Pages</a></li>
               <li><a href="/admin/villa/showVillas">Villas <span class="sr-only">(current)</span></a></li>
               <li><a href="/admin/hoster/showHosters">Hosters</a></li>
               <li><a href="/admin/user/showUsers">Users</a></li>
               <li><a href="/admin/order/show">Orders</a></li>

               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                     aria-expanded="false">Language <?php echo Phalcon\Text::upper($this->session->get('adminLangCode')); ?> <span
                           class="caret"></span></a>
                  <ul class="dropdown-menu">
                     <li><a href="/admin/lang/index/l/1">English</a></li>
                     <li><a href="/admin/lang/index/l/2">Russian</a></li>
                  </ul>
               </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
               <li><a href="/admin/settings/show">Settings</a></li>
               <li><a href="/user/logout">Logout</a></li>
            </ul>
         </div>
      </div>
   </nav>
   <div class="container">
      <?php echo $this->getContent(); ?>

      <?php echo $this->flash->output(); ?>

   </div>

<?php } else { ?>

   <?php echo $this->getContent(); ?>

<?php } ?>

</body>
</html>