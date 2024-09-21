<?php require_once('partials/head.php'); ?>
<?php require_once('partials/nav.php'); ?>
<?php require_once('partials/banner.php'); ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 space-y-4">
    <!-- Your content -->
    <!-- only one note -->
      <div class="flex flex-col">
        <a href="/notes" class="text-blue-500 hover:text-blue-600 hover:underline">
          <p class="text-lg font-medium leading-6"><span>&larr;</span>Back to Notes</p>
        </a>
      </div>

      <div class="flex flex-col">
        <div class="flex-1 flex items-center justify-between border-b border-gray-200 py-3 sm:px-6">
          <div class="flex-1 min-w-0">
              <p class="text-lg font-medium leading-6"><?= $note['title'] ?></p>
          </div>
        </div>
      </div>
  </div>
</main>

<?php require_once('partials/foot.php'); ?>
