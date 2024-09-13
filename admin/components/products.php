
<div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1 overflow-x-auto">
    <div class="pl-2 py-4">
        <h4 class="text-xl font-bold text-black dark:text-white">All Products</h4>
    </div>
    <div class="max-w-full overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-2 text-left dark:bg-meta-4">
                    <!-- <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">
                        Srn
                    </th> -->
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
                                <img src=" <?php echo $row->image; ?>" alt="Product" />
                            </div>
                        </td>
                        <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                            <p class="text-black dark:text-white"><?php echo $row->name; ?></p>
                        </td>
                        <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                            <p class="text-black dark:text-white"><?php echo ($row->category == 1 ? "Beauty" : "Hamper") ?></p>
                        </td>
                        <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                            <p class="text-black dark:text-white"><?php echo $row->weight; ?></p>
                        </td>
                        <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                            <p class="text-black dark:text-white"><?php echo $row->prices; ?></p>
                        </td>


                    </tr>

                <?php
                endforeach;
                ?>

            </tbody>
        </table>
    </div>
</div>