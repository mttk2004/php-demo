<?php require_once('partials/head.php'); ?>
<?php require_once('partials/nav.php'); ?>
<?php require_once('partials/banner.php'); ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <!-- Your content -->

    <?php foreach ($notes as $note): ?>
      <div class="flex flex-col">
        <div class="flex-1 flex items-center justify-between border-b border-gray-200 py-6 sm:px-6">
          <div class="flex-1 min-w-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900"><?php echo $note['title']; ?></h3>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</main>

<?php require_once('partials/foot.php'); ?>
