	<div class="head-part">
		<div class="container">
			<header>
				<nav class="cos-sm-8 col-md-8 col-xs-12">
					<img src="<?php echo $this->url->getStatic('images/logo.png'); ?>" class="logo" />
					<ul class="menu-font">
						<?php echo $this->partial('partial/menu-li'); ?>
					</ul>
				</nav>
					
				<?php echo $this->partial('partial/check-auth'); ?>
					
			</header>
			<div class="main-title">
				<h1 class="text-center"><?php echo $t->_('feel like at home'); ?> </h1>
				<h4 class="text-center"><?php echo $t->_('when you away'); ?> </h4>
			</div>
		</div>
		<div class='search-panel'>
			<div class="container">
				<form id="find-villas" method="get" action="<?php echo $linkPrefix; ?>/catalog/find">
					<input type="hidden" name="a" value="<?php echo isset($_GET['a'])? $_GET['a'] : 1; ?>" id="person-count">
					<input type="hidden" name="c" value="<?php echo isset($_GET['c'])? $_GET['c'] : 1; ?>" id="children-count">
					
					<div class="col-sm-12 col-md-12 col-xs-12">
						<div class="col-sm-3 col-md-3 col-xs-3">
							<span class="label"><?php echo $t->_('check in'); ?></span>
						</div>
						<div class="col-sm-3 col-md-3 col-xs-3">
							<span class="label"><?php echo $t->_('check out'); ?></span>
						</div>
						<div class="col-sm-2 col-md-2 col-xs-2">
							<span class="label"><?php echo $t->_('adults'); ?></span>
						</div>
						<div class="col-sm-2 col-md-2 col-xs-2">
							<span class="label"><?php echo $t->_('kids'); ?></span>
						</div>
						<div class="col-sm-2 col-md-2 col-xs-2"></div>
					</div>
					<div class="col-sm-12 col-md-12 col-xs-12">
						<div class="col-sm-3 col-md-3 col-xs-3">
							<input type="text" id="datepicker" class="calendar">
						</div>
						<div class="col-sm-3 col-md-3 col-xs-3">
							<input type="text" id="datepicker2" class="calendar">
						</div>
						<div class="col-sm-2 col-md-2 col-xs-2">
							<div class="count1 count-form">
								<span id='number1' class="number"><?php echo isset($_GET['a'])? $_GET['a'] : 1; ?></span>
								<div id="plus1" class="plus"></div>
								<div id="minus1" class="minus"></div>
							</div>
						</div>
						<div class="col-sm-2 col-md-2 col-xs-2">
							<div class="count2 count-form">
								<span id='number2' class="number"><?php echo isset($_GET['c'])? $_GET['c'] : 1; ?></span>
								<div id="plus2" class="plus"></div>
								<div id="minus2" class="minus"></div>
							</div>
						</div>
						<div class="col-sm-2 col-md-2 col-xs-2"><button type="submit" class="btn btn-primary"><?php echo $t->_('search'); ?></button></div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-md-12 col-xs-12 no-padding">
		<div class="main-first">
			<div class="container">
				<h2 class="text-center title"><?php echo $t->_('s nami prosto'); ?></h2>
				<div class="col-sm-3 col-md-3 col-xs-6">
					<img src="<?php echo $this->url->getStatic('images/easy-with-us1.png'); ?>">
					<p class="text-center"><?php echo $t->_('choose-vila'); ?> </p>
				</div>
				<div class="col-sm-3 col-md-3 col-xs-6">
					<img src="<?php echo $this->url->getStatic('images/easy-with-us2.png'); ?>">
					<p class="text-center"><?php echo $t->_('bron-villa'); ?> </p>
				</div>
				<div class="col-sm-3 col-md-3 col-xs-6">
					<img src="<?php echo $this->url->getStatic('images/easy-with-us3.png'); ?>">
					<p class="text-center"><?php echo $t->_('oplati-villa'); ?> </p>
				</div>
				<div class="col-sm-3 col-md-3 col-xs-6">
					<img src="<?php echo $this->url->getStatic('images/easy-with-us4.png'); ?>">
					<p class="text-center"><?php echo $t->_('priejaiteotduhaite'); ?> </p>
				</div>
			</div>
		</div>
		<div class="main-second">
			<div class="container">
				<h2 class="text-center title"><?php echo $t->_('open-world'); ?> </h2>
				<div class="col-sm-8 col-md-8 col-xs-12">
					<a href="<?php echo $linkPrefix; ?>/catalog/findRegion/1">
						<img src="<?php echo $this->url->getStatic('images/open-world1.jpg'); ?>" class="main-photo">
						<span class="text"><span><?php echo $t->_('nusa-duv'); ?></span></span>
					</a>
				</div>
				<div class="col-sm-4 col-md-4 col-xs-6">
					<a href="<?php echo $linkPrefix; ?>/catalog/findRegion/2">
						<img src="<?php echo $this->url->getStatic('images/open-world2.jpg'); ?>" class="main-photo">
						<span class="text"><span><?php echo $t->_('djumbaran'); ?></span></span>
					</a>
				</div>
				<div class="col-sm-4 col-md-4 col-xs-6">
					<a href="<?php echo $linkPrefix; ?>/catalog/findRegion/3">
						<img src="<?php echo $this->url->getStatic('images/open-world3.jpg'); ?>" class="main-photo">
						<span class="text"><span><?php echo $t->_('ubud'); ?></span></span>
					</a>
				</div>
				<div class="col-sm-8 col-md-8 col-xs-12">
					<a href="<?php echo $linkPrefix; ?>/catalog/findRegion/4">
						<img src="<?php echo $this->url->getStatic('images/open-world4.jpg'); ?>" class="main-photo">
						<span class="text"><span><?php echo $t->_('legian-kuta-semiak'); ?></span></span>
					</a>
				</div>

				<div class="col-sm-12 col-md-12 col-xs-12 vacation-logo">
					<div class="col-sm-3 col-md-3 col-xs-6">
						<img src="<?php echo $this->url->getStatic('images/vacation-logo1.png'); ?>">
					</div>
					<div class="col-sm-3 col-md-3 col-xs-6">
						<img src="<?php echo $this->url->getStatic('images/vacation-logo2.png'); ?>">
					</div>
					<div class="col-sm-3 col-md-3 col-xs-6">
						<img src="<?php echo $this->url->getStatic('images/vacation-logo3.png'); ?>">
					</div>
					<div class="col-sm-3 col-md-3 col-xs-6">
						<img src="<?php echo $this->url->getStatic('images/vacation-logo4.png'); ?>">
					</div>
				</div>
			</div>
		</div>
	</div>
