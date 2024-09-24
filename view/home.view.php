<?php require_once('partials/head.php'); ?>
<?php require_once('partials/nav.php'); ?>
<?php require_once('partials/banner.php'); ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <!-- Your content -->
	  <!-- if session has a user, show the welcome message -->
	  <?php if (isset($_SESSION['user'])): ?>
	    <h1>Welcome, <?= $_SESSION['user']['email'] ?></h1>
	  <?php else: ?>
	    <h1>Welcome, Guest</h1>
	  <?php endif; ?>
  </div>
</main>

<?php require_once('partials/foot.php'); ?>
