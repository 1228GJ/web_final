<div id="nav">
	<ul>
		<li>
			<a href="index.php">Homepage of Voting </a>
			<?php 
				if(isset($_SESSION['user'])){
			?>
			<a href="admin/index.php">Back-Stage Management </a>
			<?php 
				}
			?>
			<a href="guestbook.php">Suggestion Board </a>
			<?php 
				if(!isset($_SESSION['user'])){
			?>
			<a href="admin/login.php">Admin_Login</a>
			<?php 
				}
			?>
			<a href="../index.php">Back to Music Town</a>

	</ul>
</div>