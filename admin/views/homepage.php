<?php
// include './db/conn.php';

// $product = $conn->query("SELECT * FROM products ORDER BY `id` DESC ");

// $product->execute();

// $data = $product->fetchAll(PDO::FETCH_OBJ);
?>
<div class="flex h-screen overflow-hidden">

  <?php include './components/sidebar.html' ?>

  <!-- ===== Content Area Start ===== -->
  <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">

    <?php include './components/header.html' ?>
    <!-- ===== Main Content Start ===== -->
    <main>
      <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
          <h2 class="text-title-md2 font-bold text-black dark:text-white">
            Dashboard
          </h2>

          <nav>
            <ol class="flex items-center gap-2">
              <li>
                <a class="font-medium" href="index.php">Dashboard /</a>
              </li>
              <li class="font-medium text-primary">Glowing Valley</li>
            </ol>
          </nav>
        </div>
        <!-- Breadcrumb End -->
        <?php
        include './components/cards.php'
        ?>

        <div class="flex flex-col gap-10 pt-7.5">

          <!-- ====== Table One Start -->
          <?php
          include './components/products.php'
          ?>
          <!-- ====== Table One End -->
        </div>
      </div>
    </main>
    <!-- ===== Main Content End ===== -->
  </div>
  <!-- ===== Content Area End ===== -->
</div>