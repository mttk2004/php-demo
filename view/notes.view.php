<?php require_once('partials/head.php'); ?>
<?php require_once('partials/nav.php'); ?>
<?php require_once('partials/banner.php'); ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <!-- Your content -->

    <?php foreach ($notes as $note): 
        $id = $note['id'];
        $title = $note['title'];
      ?>
      <div class="flex flex-col">
        <div class="flex-1 flex items-center justify-between border-b border-gray-200 py-3 sm:px-6">
          <div class="flex-1 min-w-0">
            <a href="/note?id=<?= $id ?>" class="text-blue-500 hover:text-blue-600 hover:underline">
              <p class="text-lg font-medium leading-6"><?= htmlspecialchars($title) ?></p>
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

    <div class="flex flex-col mt-8">
      <a href="/notes/create" class="text-blue-500 hover:text-blue-600 hover:underline">
        <p class="text-lg font-medium leading-6">Create New Note</p>
      </a>
    </div>
  </div>
</main>

<?php require_once('partials/foot.php'); ?>
