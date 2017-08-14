<!--
 * Created with ♥ by Verlikylos on 03.05.2017 14:55.
 * Visit www.verlikylos.pro for more.
 * Copyright © vMCShop 2017
-->

<nav class="navbar navbar-fixed-top navbar-primary navbar-color-on-scroll navbar-transparent">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				<div class="logo-container">
					<div class="brand">
						<?php echo $this->config->item('page_title'); ?>
					</div>
				</div>
			</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li <?php echo ($this->uri->rsegment('1') == "home") ? 'class="active"' : ''; ?>><a href="<?php echo ($this->uri->rsegment('1') == "home") ? '#"' : base_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i> Strona Główna</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Sklep <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="dropdown-header">Wybierz serwer</li>
                        <?php foreach ($servers as $server): ?>
                            <li><a href="<?php echo base_url('shop?server=' . $server['name']); ?>">Serwer <?php echo $server['name']; ?></a></li>
                        <?php endforeach; ?>
					</ul>
				</li>
                <li <?php echo ($this->uri->rsegment('1') == "voucher") ? 'class="active"' : ''; ?>><a href="<?php echo ($this->uri->rsegment('1') == "voucher") ? '#"' : base_url('voucher'); ?>"><i class="fa fa-key" aria-hidden="true"></i> Realizuj voucher</a></li>
			</ul>
		</div>
	</div>
</nav>