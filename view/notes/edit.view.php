<?php require_once(__DIR__ . '/../partials/head.php'); ?>
<?php require_once(__DIR__ . '/../partials/nav.php'); ?>
<?php require_once(__DIR__ . '/../partials/banner.php'); ?>

<main>
	<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 space-y-4">
		<!-- Your content -->
		<!-- Edit Note-->
		<div class="flex flex-col">
			<a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:text-blue-600
			hover:underline">
				<p class="text-lg font-medium leading-6"><span>&larr;</span>Back to Note</p>
			</a>
			
			<form method="POST" action="/note/edit" class="mt-10">
				<input type="hidden" name="_method" value="PATCH">
				<input type="hidden" name="id" value="<?= $note['id'] ?>">
				<div class="flex flex-col">
					<label for="title" class="text-lg font-medium leading-6">Title</label>
					<input type="text" name="title" id="title" value="<?= $title ?? $note['title'] ?? '' ?>"
					       class="border border-gray-300 rounded-md p-2 mt-1">
					<?php if (isset($errors['title'])): ?>
						<p class="text-red-500 text-sm mt-1"><?= $errors['title'] ?></p>
					<?php endif; ?>
				</div>
				
				<a href="/note?id=<?= $note['id'] ?>" class="inline-flex justify-center py-2 px-4 border
				border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600
				hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2
				focus:ring-gray-500
				mt-4">
					Cancel
				</a>
				<button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mt-4">
					Update
				</button>
			</form>
	</div>
</main>

<?php require_once(__DIR__ .'/../partials/foot.php'); ?>
