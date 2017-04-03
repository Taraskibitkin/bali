{{ this.assets.outputCss() }}
{{ this.assets.outputJs() }}
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
						<img src="{{ static_url('images/baliprorent-logo-without-text.png') }}" alt="BaliProRent" class="logo" />
					</a>
				</div>
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




