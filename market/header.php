
<link rel="stylesheet" href="/market/css/header.css">
<link rel="stylesheet" href="/market/css/pure.css">
<header>
	<div class="links">
	<div class="icon">
	<a href="/market/index.php">
	<img src="/market/icon2.png" ></a></div>
		<ul class="nav-list">
		
		
											<li class="item">
				<?php if (isset($_SESSION['username']) && $_SESSION['accesslevel'] =='admin'): ?> <a id="reg_link" class="pure-button" href="/market/admin/webmaster.php">Webmaster</a>
					<!-- this output if user logged in-->
					<?php
endif
?>
			</li>
			
			<li class="item">
				<?php if (isset($_SESSION['username']) && $_SESSION['accesslevel'] =='doa'): ?> <a id="reg_link" class="pure-button" href="/market/admin/doa.php">DOA</a>
					<!-- this output if user logged in-->
					<?php
endif
?>
			</li>
			
						<li class="item">
				<?php if (isset($_SESSION['username']) && $_SESSION['accesslevel'] =='keels'): ?> <a id="reg_link" class="pure-button" href="/market/admin/keels.php">Keels</a>
					<!-- this output if user logged in-->
					<?php
endif
?>
			</li>
			
			
			<li class="item">
				<?php if (isset($_SESSION['username']) && $_SESSION['accesslevel'] =='farmer'): ?> <a id="reg_link" class="pure-button" href="/market/farmer/farmer.php">Farmer</a>
					<!-- this output if user logged in-->
					<?php
endif
?>
			</li>
		
		
		
		
			<li class="item"> <a class="pure-button" href="/market/index.php">Home</a> </li>
			<li class="item"> <a class="pure-button" href="/market/public.php">Prices</a> </li>
			

			
			
			
			<li class="item">
				<?php if (!isset($_SESSION['username'])): ?> <a id="reg_link" class="pure-button" href="/market/reglog/register.php">Signup</a>
					<!-- this output if user logged in-->
					<?php
endif
?>
			</li>
			<li class="item">
				<?php if (!isset($_SESSION['username'])): ?> <a class="pure-button" href="/market/reglog/login.php">Login</a>
					<!-- this output if user logged in-->
					<?php
endif
?>
			</li>
			<li class="item">
				<?php if (isset($_SESSION['username'])): ?> <a class="pure-button" href="/market/index.php?logout='1'">Logout</a>
					<input type="hidden" class="UserIsLogged" />
					<!-- this output if user logged in-->
					<?php
endif
?>
						<!--	<a class="pure-button" href="index.php?logout='1'">Logout</a> --></li>
		</ul>
	</div>
</header>
