<link rel="stylesheet" type="text/css" href="{{ static_url("css/catalogue.css") }}">
<link rel="stylesheet" type="text/css" href="{{ static_url("css/edit_me_only.css") }}">
<link rel="stylesheet" type="text/css" href="{{ static_url("css/room.css") }}">

<script src="https://www.paypalobjects.com/js/external/paypal-button.min.js"></script>

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

               {{ partial("partial/menu-li") }}

            </ul>

            {{ partial("partial/check-auth") }}

         </div>
      </div>
   </nav>


   {{ partial("partial/villas-filter") }}


</div>







{{ content() }}
