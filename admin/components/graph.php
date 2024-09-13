<div class="col-span-12 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-12">
    <div class="mb-3 justify-between gap-4 sm:flex">
        <div>
            <h4 class="text-xl font-bold text-black dark:text-white">
                Products Analytics
            </h4>
        </div>

    </div>
    <div class="mb-2">
        <div id="chartThree" class="mx-auto flex justify-center"></div>
    </div>
    <div class="-mx-8 flex flex-wrap items-center justify-center gap-y-3">
        <div class="w-full px-8 sm:w-1/2">
            <div class="flex w-full items-center">
                <span class="mr-2 block h-3 w-full max-w-3 rounded-full bg-primary"></span>
                <p class="flex w-full justify-between text-sm font-medium text-black dark:text-white">
                    <span> Beauty </span>
                    <span>
                        <?php
                        $total_p = $conn->query("SELECT count(*) from products");
                        $total_b = $conn->query("SELECT count(*) from products where category = 1");


                        $beauty_percentage = ($total_b->fetchColumn() * 100) / $total_p->fetchColumn();
                        echo $beauty_percentage . "%";
                        ?>


                    </span>
                </p>
            </div>
        </div>
        <div class="w-full px-8 sm:w-1/2">
            <div class="flex w-full items-center">
                <span class="mr-2 block h-3 w-full max-w-3 rounded-full bg-[#6577F3]"></span>
                <p class="flex w-full justify-between text-sm font-medium text-black dark:text-white">
                    <span> Hamper </span>
                    <span> <?php
                            $total_p = $conn->query("SELECT count(*) from products");
                            $total_b = $conn->query("SELECT count(*) from products where category = 2");


                            $beauty_percentage = ($total_b->fetchColumn() * 100) / $total_p->fetchColumn();
                            echo $beauty_percentage . "%";
                            ?>

                    </span>
                </p>
            </div>
        </div>

    </div>
</div>