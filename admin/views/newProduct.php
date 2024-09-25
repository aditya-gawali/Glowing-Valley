<?php
$_SESSION['edit'] = 0;

if (isset($_GET['id'])) {

    $id  = $_GET['id'];
    $product = $conn->query("SELECT * FROM products where id = $id");
    $data = $product->fetch(PDO::FETCH_OBJ);

    if ($data->id) {
        $_SESSION['edit'] = $data->id;
    }
}

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
                        <?php echo ($data->id) ? "Update Product" : "Add New Product" ?>
                    </h2>

                    <nav>
                        <ol class="flex items-center gap-2">
                            <li>
                                <a class="font-medium" href="index.php">Dashboard /</a>
                            </li>
                            <li class="font-medium text-primary"> <?php echo ($data->id) ? "Update Product" : "Add New Product" ?></li>
                        </ol>
                    </nav>
                </div>
                <?php
                if ($_SESSION['addproduct'] == true) : ?>
                    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <h2 class="text-title-md2 font-bold text-black dark:text-white">
                            New Product Added Successfully..
                        </h2>

                    </div>
                <?php
                    $_SESSION['addproduct'] = false;
                endif;
                if ($_SESSION['updateproduct'] == true) : ?>
                    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <h2 class="text-title-md2 font-bold text-black dark:text-white">
                            Product Updated Successfully..
                        </h2>

                    </div>
                <?php
                    $_SESSION['updateproduct'] = false;
                endif; ?>
                <!-- Breadcrumb End -->

                <!-- ====== Settings Section Start -->
                <div class="grid grid-cols-5 gap-8">
                    <div class="col-span-5 xl:col-span-5">
                        <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                            <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                                <h3 class="font-medium text-black dark:text-white">
                                    <?php echo ($data->id) ? "Update Product" : "Add New Product" ?>
                                </h3>
                            </div>
                            <div class="p-7">
                                <form action="./db/insert.php" method="POST" enctype="multipart/form-data">
                                    <!-- name  -->
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white" for="Username">Product Name</label>
                                        <input class="w-full rounded border border-stroke bg-gray px-4.5 py-3 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary" type="text" name="name" id="name" placeholder="Product Name" <?php echo ($data->id) ? ("value='$data->name'") : "" ?> required />
                                    </div>

                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white" for="Username">Product Image preview</label>
                                        <img src="./<?php echo $data->image; ?>" class="rounded-lg" alt="" id="file-preview">

                                    </div>



                                    <!-- product image  -->
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                            Product Image
                                        </label>
                                        <input type="file" name="image" id="image" class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary" />
                                    </div>

                                    <script>
                                        const input = document.getElementById('image');
                                        const previewPhoto = () => {
                                            const file = input.files;
                                            if (file) {
                                                const fileReader = new FileReader();
                                                const preview = document.getElementById('file-preview');
                                                fileReader.onload = function(event) {
                                                    preview.setAttribute('src', event.target.result);
                                                }
                                                fileReader.readAsDataURL(file[0]);
                                            }
                                        }
                                        input.addEventListener("change", previewPhoto);
                                    </script>

                                    <!-- category -->
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                            Select Category
                                        </label>
                                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-white dark:bg-form-input">
                                            <span class="absolute left-4 top-1/2 z-30 -translate-y-1/2">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g opacity="0.8">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0007 2.50065C5.85852 2.50065 2.50065 5.85852 2.50065 10.0007C2.50065 14.1428 5.85852 17.5007 10.0007 17.5007C14.1428 17.5007 17.5007 14.1428 17.5007 10.0007C17.5007 5.85852 14.1428 2.50065 10.0007 2.50065ZM0.833984 10.0007C0.833984 4.93804 4.93804 0.833984 10.0007 0.833984C15.0633 0.833984 19.1673 4.93804 19.1673 10.0007C19.1673 15.0633 15.0633 19.1673 10.0007 19.1673C4.93804 19.1673 0.833984 15.0633 0.833984 10.0007Z" fill="#637381"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.833984 9.99935C0.833984 9.53911 1.20708 9.16602 1.66732 9.16602H18.334C18.7942 9.16602 19.1673 9.53911 19.1673 9.99935C19.1673 10.4596 18.7942 10.8327 18.334 10.8327H1.66732C1.20708 10.8327 0.833984 10.4596 0.833984 9.99935Z" fill="#637381"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.50084 10.0008C7.55796 12.5632 8.4392 15.0301 10.0006 17.0418C11.5621 15.0301 12.4433 12.5632 12.5005 10.0008C12.4433 7.43845 11.5621 4.97153 10.0007 2.95982C8.4392 4.97153 7.55796 7.43845 7.50084 10.0008ZM10.0007 1.66749L9.38536 1.10547C7.16473 3.53658 5.90275 6.69153 5.83417 9.98346C5.83392 9.99503 5.83392 10.0066 5.83417 10.0182C5.90275 13.3101 7.16473 16.4651 9.38536 18.8962C9.54325 19.069 9.76655 19.1675 10.0007 19.1675C10.2348 19.1675 10.4581 19.069 10.6159 18.8962C12.8366 16.4651 14.0986 13.3101 14.1671 10.0182C14.1674 10.0066 14.1674 9.99503 14.1671 9.98346C14.0986 6.69153 12.8366 3.53658 10.6159 1.10547L10.0007 1.66749Z" fill="#637381"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                            <select class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent px-12 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input" :class="isOptionSelected && 'text-black dark:text-white'" @change="isOptionSelected = true" name="category" required>
                                                <option value="1" class="text-body" <?php echo ($data->category == 1) ? ("selected") : "" ?>>Beauty</option>
                                                <option value="2" class="text-body" <?php echo ($data->category == 2) ? ("selected") : "" ?>>Hamper</option>
                                            </select>
                                            <span class="absolute right-4 top-1/2 z-10 -translate-y-1/2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g opacity="0.8">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z" fill="#637381"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- use and Benefits -->
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white" for="Username">Product Usage & Benefits</label>
                                        <div class="relative">
                                            <span class="absolute left-4.5 top-4">
                                                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g opacity="0.8" clip-path="url(#clip0_88_10224)">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.56524 3.23223C2.03408 2.76339 2.66997 2.5 3.33301 2.5H9.16634C9.62658 2.5 9.99967 2.8731 9.99967 3.33333C9.99967 3.79357 9.62658 4.16667 9.16634 4.16667H3.33301C3.11199 4.16667 2.90003 4.25446 2.74375 4.41074C2.58747 4.56702 2.49967 4.77899 2.49967 5V16.6667C2.49967 16.8877 2.58747 17.0996 2.74375 17.2559C2.90003 17.4122 3.11199 17.5 3.33301 17.5H14.9997C15.2207 17.5 15.4326 17.4122 15.5889 17.2559C15.7452 17.0996 15.833 16.8877 15.833 16.6667V10.8333C15.833 10.3731 16.2061 10 16.6663 10C17.1266 10 17.4997 10.3731 17.4997 10.8333V16.6667C17.4997 17.3297 17.2363 17.9656 16.7674 18.4344C16.2986 18.9033 15.6627 19.1667 14.9997 19.1667H3.33301C2.66997 19.1667 2.03408 18.9033 1.56524 18.4344C1.0964 17.9656 0.833008 17.3297 0.833008 16.6667V5C0.833008 4.33696 1.0964 3.70107 1.56524 3.23223Z" fill="" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.6664 2.39884C16.4185 2.39884 16.1809 2.49729 16.0056 2.67253L8.25216 10.426L7.81167 12.188L9.57365 11.7475L17.3271 3.99402C17.5023 3.81878 17.6008 3.5811 17.6008 3.33328C17.6008 3.08545 17.5023 2.84777 17.3271 2.67253C17.1519 2.49729 16.9142 2.39884 16.6664 2.39884ZM14.8271 1.49402C15.3149 1.00622 15.9765 0.732178 16.6664 0.732178C17.3562 0.732178 18.0178 1.00622 18.5056 1.49402C18.9934 1.98182 19.2675 2.64342 19.2675 3.33328C19.2675 4.02313 18.9934 4.68473 18.5056 5.17253L10.5889 13.0892C10.4821 13.196 10.3483 13.2718 10.2018 13.3084L6.86847 14.1417C6.58449 14.2127 6.28409 14.1295 6.0771 13.9225C5.87012 13.7156 5.78691 13.4151 5.85791 13.1312L6.69124 9.79783C6.72787 9.65131 6.80364 9.51749 6.91044 9.41069L14.8271 1.49402Z" fill="" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_88_10224">
                                                            <rect width="20" height="20" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </span>

                                            <textarea class="w-full rounded border border-stroke bg-gray py-3 pl-11.5 pr-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary" name="uses" id="uses" rows="6" placeholder="Write product description here"><?php echo ($data->id) ? ("$data->uses") : "" ?></textarea>
                                        </div>
                                    </div>

                                    <!-- Ingredients -->
                                    <div class="mb-5.5">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white" for="Username">Product Ingredients </label>
                                        <div class="relative">
                                            <span class="absolute left-4.5 top-4">
                                                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g opacity="0.8" clip-path="url(#clip0_88_10224)">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.56524 3.23223C2.03408 2.76339 2.66997 2.5 3.33301 2.5H9.16634C9.62658 2.5 9.99967 2.8731 9.99967 3.33333C9.99967 3.79357 9.62658 4.16667 9.16634 4.16667H3.33301C3.11199 4.16667 2.90003 4.25446 2.74375 4.41074C2.58747 4.56702 2.49967 4.77899 2.49967 5V16.6667C2.49967 16.8877 2.58747 17.0996 2.74375 17.2559C2.90003 17.4122 3.11199 17.5 3.33301 17.5H14.9997C15.2207 17.5 15.4326 17.4122 15.5889 17.2559C15.7452 17.0996 15.833 16.8877 15.833 16.6667V10.8333C15.833 10.3731 16.2061 10 16.6663 10C17.1266 10 17.4997 10.3731 17.4997 10.8333V16.6667C17.4997 17.3297 17.2363 17.9656 16.7674 18.4344C16.2986 18.9033 15.6627 19.1667 14.9997 19.1667H3.33301C2.66997 19.1667 2.03408 18.9033 1.56524 18.4344C1.0964 17.9656 0.833008 17.3297 0.833008 16.6667V5C0.833008 4.33696 1.0964 3.70107 1.56524 3.23223Z" fill="" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.6664 2.39884C16.4185 2.39884 16.1809 2.49729 16.0056 2.67253L8.25216 10.426L7.81167 12.188L9.57365 11.7475L17.3271 3.99402C17.5023 3.81878 17.6008 3.5811 17.6008 3.33328C17.6008 3.08545 17.5023 2.84777 17.3271 2.67253C17.1519 2.49729 16.9142 2.39884 16.6664 2.39884ZM14.8271 1.49402C15.3149 1.00622 15.9765 0.732178 16.6664 0.732178C17.3562 0.732178 18.0178 1.00622 18.5056 1.49402C18.9934 1.98182 19.2675 2.64342 19.2675 3.33328C19.2675 4.02313 18.9934 4.68473 18.5056 5.17253L10.5889 13.0892C10.4821 13.196 10.3483 13.2718 10.2018 13.3084L6.86847 14.1417C6.58449 14.2127 6.28409 14.1295 6.0771 13.9225C5.87012 13.7156 5.78691 13.4151 5.85791 13.1312L6.69124 9.79783C6.72787 9.65131 6.80364 9.51749 6.91044 9.41069L14.8271 1.49402Z" fill="" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_88_10224">
                                                            <rect width="20" height="20" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </span>

                                            <textarea class="w-full rounded border border-stroke bg-gray py-3 pl-11.5 pr-4.5 font-medium text-black focus:border-primary focus-visible:outline-none dark:border-strokedark dark:bg-meta-4 dark:text-white dark:focus:border-primary" name="ingre" id="ingre" rows="6" placeholder="Write product description here"><?php echo ($data->id) ? ("$data->ingre") : "" ?></textarea>
                                        </div>
                                    </div>


                                    <script>
                                        let i = <?php $weights = explode(',', $data->weight);
                                                echo ($data->id) ? sizeof($weights) + 1 : 1 ?>;
                                        const addOption = () => {
                                            const inputs = document.querySelector("#inputs");
                                            let string = inputs.innerHTML;

                                            let code = `
                                        <div class="mb-4.5 flex flex-row gap-4" id="inputs">

                                            <div class="w-1/2 xl:w-1/2">
                                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                                    Weight ${"w",i}
                                                </label>
                                                <input type="text" placeholder="Enter product weight" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" name="w${i}" />
                                            </div>

                                            <div class="w-1/2 xl:w-1/2">
                                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                                    Price ${"p_",i}
                                                </label>
                                                <input type="number" placeholder="Enter product price" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" name="p${i}" />
                                            </div>
                                        </div>`;
                                            // alert(inputs.innerHTML.length)

                                            string += code;

                                            if (i <= 3) {
                                                i++;
                                                inputs.innerHTML = string;
                                            }

                                        }
                                    </script>


                                    <!-- weight and price  -->
                                    <div class="mb-5.5 flex justify-between" id="option">
                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white" for="Username">Weight and Prices</label>
                                        <button class="flex justify-center rounded bg-primary px-6 py-2 font-medium text-gray hover:bg-opacity-90" type="button" onclick="addOption()">
                                            + Add Option
                                        </button>

                                    </div>

                                    <div id="inputs">
                                        <?php
                                        $weights = explode(',', $data->weight);
                                        $prices = explode(',', $data->prices);
                                        if ($data->id) :
                                            for ($i = 0; $i < sizeof($weights); $i++) : ?>


                                                <div class="mb-4.5 flex flex-row gap-4" id="inputs">

                                                    <div class="w-1/2 xl:w-1/2">
                                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                                            Weight <?php echo $i + 1; ?>
                                                        </label>
                                                        <input type="text" placeholder="Enter product weight" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" name="w<?php echo $i + 1 ?>" value="<?php echo $weights[$i]; ?>" />
                                                    </div>

                                                    <div class="w-1/2 xl:w-1/2">
                                                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                                            Price <?php echo $i + 1; ?>
                                                        </label>
                                                        <input type="number" placeholder="Enter product price" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" name="p<?php echo $i + 1 ?>" value="<?php echo $prices[$i]; ?>" />
                                                    </div>
                                                </div>
                                        <?php endfor;
                                        endif;                                        ?>
                                    </div>


                                    <div class="flex justify-end gap-4.5 mb-5.5">
                                        <button class="flex justify-center rounded border border-stroke px-6 py-2 font-medium text-black hover:shadow-1 dark:border-strokedark dark:text-white" type="reset">
                                            Reset
                                        </button>
                                        <button class="flex justify-center rounded bg-primary px-6 py-2 font-medium text-gray hover:bg-opacity-90" type="submit" name="addProduct">
                                            <?php echo ($data->id) ? "update" : "Save" ?>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- ====== Settings Section End -->


            </div>
        </main>
        <!-- ===== Main Content End ===== -->
    </div>
    <!-- ===== Content Area End ===== -->
</div>