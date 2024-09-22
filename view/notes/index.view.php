<?php require_once(__DIR__ . '/../partials/head.php'); ?>
<?php require_once(__DIR__ . '/../partials/nav.php'); ?>
<?php require_once(__DIR__ . '/../partials/banner.php'); ?>

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
      <a href="/notes/create" class="text-white">
        <span class="inline-flex gap-2 text-lg font-medium leading-6 bg-green-600 py-3 px-6 rounded"><span>Create new note</span><span>&rarr;</span></span>   
      </a>
    </div>
  </div>
</main>

<?php require_once(__DIR__ . '/../partials/foot.php'); ?>
