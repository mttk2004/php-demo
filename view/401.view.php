<?php
require_once('partials/head.php'); ?>
<?php
require_once('partials/nav.php'); ?>

<main>
	<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
		<!-- Your content -->
		<!-- 401 Unauthorized -->
		<h1 class="text-3xl font-bold text-center">401 Unauthorized</h1>
		<p class="text-center">You are not authorized to access this page.</p>
		
		<!-- go back to the home page -->
		<div class="flex justify-center mt-4">
			<a
					href="/"
					class="rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
				Go back to the home page
			</a>
		</div>
	</div>
</main>

<?php
require_once('partials/foot.php'); ?>
