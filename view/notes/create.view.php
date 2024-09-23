<?php require_once(__DIR__ . '/../partials/head.php'); ?>
<?php require_once(__DIR__ . '/../partials/nav.php'); ?>
<?php require_once(__DIR__ . '/../partials/banner.php'); ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <!-- Your content -->
      <form action="/notes/store" method="POST">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <div class="mt-1">
                  <input type="text" name="title" id="title" class="h-10 w-64 border border-gray-100 px-3 shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Title" value=<?= $title ?? '' ?>>
                  <?php if (isset($errors['title'])): ?>
                    <p class="mt-2 text-sm text-red-600"><?= $errors['title'] ?></p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
              Create
            </button>
          </div>
        </div>
      </form>
  </div>
</main>

<?php require_once(__DIR__ . '/../partials/foot.php'); ?>
