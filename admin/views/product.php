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
                        Products
                    </h2>

                    <nav>
                        <ol class="flex items-center gap-2">
                            <li>
                                <a class="font-medium" href="index.php">Dashboard /</a>
                            </li>
                            <li class="font-medium text-primary">Products</li>
                        </ol>
                    </nav>
                </div>

                <!-- Breadcrumb End -->
                <?php
                include './components/cards.php'
                ?>

                <div class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5">



                    <!-- ====== Table One Start -->
                    <div class="col-span-12 xl:col-span-12">
                        <!-- ====== Table Three Start -->
                        <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1 overflow-x-auto">
                            <div class="max-w-full overflow-x-auto">
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-2 text-left dark:bg-meta-4">
                                            <th class="min-w-[120px] px-4 py-4 font-medium text-black dark:text-white">
                                                Product Image
                                            </th>
                                            <th class="min-w-[150px] px-4 py-4 font-medium text-black dark:text-white">
                                                Product Name
                                            </th>
                                            <th class="min-w-[150px] px-4 py-4 font-medium text-black dark:text-white">
                                                Category
                                            </th>
                                            <th class="px-4 py-4 font-medium text-black dark:text-white">
                                                Weight
                                            </th>
                                            <th class="px-4 py-4 font-medium text-black dark:text-white">
                                                Prices
                                            </th>
                                            <th class="min-w-[120px] px-4 py-4 font-medium text-black dark:text-white">
                                                Status
                                            </th>
                                            <th class="px-4 py-4 font-medium text-black dark:text-white">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $product = $conn->query("SELECT * FROM products ORDER BY `id` DESC");

                                        $product->execute();

                                        $data = $product->fetchAll(PDO::FETCH_OBJ);
                                        $id = 0;
                                        foreach ($data as $row) :
                                            $id++;
                                        ?>
                                            <tr>

                                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                                    <div class="h-10.5 w-15 rounded-md">
                                                        <img src=" <?php echo './' . $row->image; ?>" alt="Product" />
                                                    </div>
                                                </td>
                                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                                    <p class="text-black dark:text-white"><?php echo $row->name; ?></p>
                                                </td>
                                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                                    <p class="text-black dark:text-white"><?php echo ($row->category == 1  ? "Beauty" : "Hamper") ?></p>
                                                </td>
                                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                                    <p class="text-black dark:text-white"><?php echo $row->weight; ?></p>
                                                </td>
                                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                                    <p class="text-black dark:text-white"><?php echo $row->prices; ?></p>
                                                </td>
                                                <!-- <form action="./db/insert.php" method="POST"> -->
                                                <?php
                                                if ($row->popular == 1) : ?> <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                                        <a href="./db/insert.php?id=<?php echo $row->id; ?>&type=p">
                                                            <button class="inline-flex rounded-full bg-success bg-opacity-10 px-3 py-1 text-sm font-medium text-success" name="popular" type="submit">
                                                                Popular
                                                            </button>
                                                        </a>
                                                    </td>
                                                <?php else : ?> <td class="px-4 py-5">
                                                        <a href="./db/insert.php?id=<?php echo $row->id; ?>&type=u">
                                                            <button class="inline-flex rounded-full bg-warning bg-opacity-10 px-3 py-1 text-sm font-medium text-warning" name="unpopular" type="submit">
                                                                unpopular
                                                            </button>
                                                        </a>
                                                    </td>
                                                <?php endif;
                                                ?>
                                                <!-- </form> -->


                                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                                    <div class="flex items-center space-x-3.5">

                                                        <a href="./newProduct.php?id=<?php echo $row->id; ?>">
                                                            <button class="hover:text-primary">

                                                                <svg class="fill-current" fill="none" height="18" width="18" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 348.882 348.882" xml:space="preserve" stroke="#9b9ea1">

                                                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                                                    <g id="SVGRepo_iconCarrier">
                                                                        <g>
                                                                            <path d="M333.988,11.758l-0.42-0.383C325.538,4.04,315.129,0,304.258,0c-12.187,0-23.888,5.159-32.104,14.153L116.803,184.231 c-1.416,1.55-2.49,3.379-3.154,5.37l-18.267,54.762c-2.112,6.331-1.052,13.333,2.835,18.729c3.918,5.438,10.23,8.685,16.886,8.685 c0,0,0.001,0,0.001,0c2.879,0,5.693-0.592,8.362-1.76l52.89-23.138c1.923-0.841,3.648-2.076,5.063-3.626L336.771,73.176 C352.937,55.479,351.69,27.929,333.988,11.758z M130.381,234.247l10.719-32.134l0.904-0.99l20.316,18.556l-0.904,0.99 L130.381,234.247z M314.621,52.943L182.553,197.53l-20.316-18.556L294.305,34.386c2.583-2.828,6.118-4.386,9.954-4.386 c3.365,0,6.588,1.252,9.082,3.53l0.419,0.383C319.244,38.922,319.63,47.459,314.621,52.943z" />
                                                                            <path d="M303.85,138.388c-8.284,0-15,6.716-15,15v127.347c0,21.034-17.113,38.147-38.147,38.147H68.904 c-21.035,0-38.147-17.113-38.147-38.147V100.413c0-21.034,17.113-38.147,38.147-38.147h131.587c8.284,0,15-6.716,15-15 s-6.716-15-15-15H68.904c-37.577,0-68.147,30.571-68.147,68.147v180.321c0,37.576,30.571,68.147,68.147,68.147h181.798 c37.576,0,68.147-30.571,68.147-68.147V153.388C318.85,145.104,312.134,138.388,303.85,138.388z" />
                                                                        </g>
                                                                    </g>

                                                                </svg>
                                                            </button>
                                                        </a>
                                                        <a onclick="deleteConfirm(<?php echo $row->id; ?>)">
                                                            <button class="hover:text-danger">
                                                                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.90352C7.05977 0.478149 6.38477 1.15315 6.38477 1.9969V2.47502H4.21914C3.40352 2.47502 2.72852 3.15002 2.72852 3.96565V4.8094C2.72852 5.42815 3.09414 5.9344 3.62852 6.1594L4.07852 15.4688C4.13477 16.6219 5.09102 17.5219 6.24414 17.5219H11.7004C12.8535 17.5219 13.8098 16.6219 13.866 15.4688L14.3441 6.13127C14.8785 5.90627 15.2441 5.3719 15.2441 4.78127V3.93752C15.2441 3.15002 14.5691 2.47502 13.7535 2.47502ZM7.67852 1.9969C7.67852 1.85627 7.79102 1.74377 7.93164 1.74377H10.0973C10.2379 1.74377 10.3504 1.85627 10.3504 1.9969V2.47502H7.70664V1.9969H7.67852ZM4.02227 3.96565C4.02227 3.85315 4.10664 3.74065 4.24727 3.74065H13.7535C13.866 3.74065 13.9785 3.82502 13.9785 3.96565V4.8094C13.9785 4.9219 13.8941 5.0344 13.7535 5.0344H4.24727C4.13477 5.0344 4.02227 4.95002 4.02227 4.8094V3.96565ZM11.7285 16.2563H6.27227C5.79414 16.2563 5.40039 15.8906 5.37227 15.3844L4.95039 6.2719H13.0785L12.6566 15.3844C12.6004 15.8625 12.2066 16.2563 11.7285 16.2563Z" fill="" />
                                                                    <path d="M9.00039 9.11255C8.66289 9.11255 8.35352 9.3938 8.35352 9.75942V13.3313C8.35352 13.6688 8.63477 13.9782 9.00039 13.9782C9.33789 13.9782 9.64727 13.6969 9.64727 13.3313V9.75942C9.64727 9.3938 9.33789 9.11255 9.00039 9.11255Z" fill="" />
                                                                    <path d="M11.2502 9.67504C10.8846 9.64692 10.6033 9.90004 10.5752 10.2657L10.4064 12.7407C10.3783 13.0782 10.6314 13.3875 10.9971 13.4157C11.0252 13.4157 11.0252 13.4157 11.0533 13.4157C11.3908 13.4157 11.6721 13.1625 11.6721 12.825L11.8408 10.35C11.8408 9.98442 11.5877 9.70317 11.2502 9.67504Z" fill="" />
                                                                    <path d="M6.72245 9.67504C6.38495 9.70317 6.1037 10.0125 6.13182 10.35L6.3287 12.825C6.35683 13.1625 6.63808 13.4157 6.94745 13.4157C6.97558 13.4157 6.97558 13.4157 7.0037 13.4157C7.3412 13.3875 7.62245 13.0782 7.59433 12.7407L7.39745 10.2657C7.39745 9.90004 7.08808 9.64692 6.72245 9.67504Z" fill="" />
                                                                </svg>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </td>

                                                <script>
                                                    const deleteConfirm = (id) => {
                                                        if (confirm("Are you sure you want to delete this item?")) {
                                                            window.location.href = `./db/delete.php?id=${id}`;
                                                        }
                                                    }
                                                </script>


                                            </tr>

                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- ====== Table Three End -->
                    </div>
                    <!-- ====== Table One End -->

                </div>
            </div>
        </main>
        <!-- ===== Main Content End ===== -->
    </div>
    <!-- ===== Content Area End ===== -->
</div>