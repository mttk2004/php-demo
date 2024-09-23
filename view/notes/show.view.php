<?php require_once(__DIR__ . '/../partials/head.php'); ?>
<?php require_once(__DIR__ . '/../partials/nav.php'); ?>
<?php require_once(__DIR__ . '/../partials/banner.php'); ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 space-y-4">
    <!-- Your content -->
    <!-- only one note -->
      <div class="flex flex-col">
        <a href="/notes" class="text-blue-500 hover:text-blue-600 hover:underline">
          <p class="text-lg font-medium leading-6"><span>&larr;</span>Back to Notes</p>
        </a>
      </div>

      <!-- delete note -->
      <form method="POST">
	      <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">
        <input type="hidden" value="<?= $note["id"] ?>" name="delete">
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
          Delete
        </button>
      </form>

      <div class="flex flex-col">
        <div class="flex-1 flex items-center justify-between border-b border-gray-200 py-3 sm:px-6">
          <div class="flex-1 min-w-0">
              <p class="text-lg font-medium leading-6"><?= htmlspecialchars($note['title']) ?></p>
          </div>
        </div>
      </div>
  </div>
</main>

<?php require_once(__DIR__ .'/../partials/foot.php'); ?>
