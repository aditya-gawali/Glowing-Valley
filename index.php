<?php
include "./db/conn.php";
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- <link rel="icon" type="image/svg+xml" href="./assets/IMG-20230309-WA0008-removebg-preview.jpg" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glowing Valley</title>

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</head>

<body class="relative">

    <?php
    include './components/navbar.html';
    ?>


    <div id="hero" class="w-full h-[30vh] lg:h-screen ">

        <div class="mx-5 md:mx-20 my-5 h-[80%] border rounded-lg overflow-hidden shadow-xl">


            <div class="swiper w-full h-full">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="./assets/images/hero-2.png" alt="" class="w-full object-cover h-full">
                    </div>
                    <div class="swiper-slide">
                        <img src="./assets/images/hero-2.1.png" alt="" class="w-full object-cover h-full">
                    </div>
                    <div class="swiper-slide">
                        <!-- <img src="./assets/images/hero3.jpeg" alt="" class="w-full object-cover h-full"> -->
                        <video src="./assets/images/hamer video.mp4" autoplay loop muted class="w-full object-cover h-full"></video>
                    </div>

                </div>


                <div class="swiper-scrollbar"></div>
            </div>
        </div>
    </div>

    <div class="px-5 md:px-20 flex flex-col gap-4 ">
        <h1 class="text-center text-2xl md:text-3xl font-bold py-4">Popular Now</h1>

        <div class="mx-auto grid w-full max-w-7xl items-center space-y-4 px-2 py-10 md:grid-cols-2 md:gap-4 md:space-y-0 lg:grid-cols-4">
            <?php
            $product = $conn->query("SELECT * FROM products WHERE popular = 1 ORDER BY `id` DESC LIMIT 6");

            $product->execute();

            $data = $product->fetchAll(PDO::FETCH_OBJ);

            foreach ($data as $row) :
            ?>
                <div class="rounded-md shadow-lg ">
                    <a href="./overview.php?id=<?php echo $row->id; ?>"><img src="./admin/<?php echo $row->image; ?>" alt="Laptop" class="aspect-[16/9] w-full rounded-md object-cover md:aspect-auto md:h-[200px] lg:h-[200px]" /></a>
                    <div class="p-4 ">
                        <h1 class="inline-flex items-center text-lg font-semibold">
                            <?php echo $row->name; ?>
                        </h1>
                        <p class="mt-3 text-sm text-gray-600">
                            <?php echo $row->uses; ?>
                        </p>

                        <div class="mt-5 flex items-center space-x-2">
                            <?php $weight = explode(",", $row->weight);



                            foreach ($weight as $w) :


                                if ($w != "") :
                            ?>



                                    <span class="block cursor-pointer rounded-md border border-gray-300 p-1 px-2 text-sm font-medium">
                                        <?php echo $w; ?>
                                    </span>

                            <?php
                                endif;
                            endforeach; ?>

                        </div>
                        <div class="mt-5 flex items-center space-x-2">
                            <span class="block text-xl font-semibold font-sans"><?php $price = explode(",", $row->prices);
                                                                                echo ($price[0] != "") ? "₹ " . $price[0] : "" ?></span>
                            </span>
                        </div>
                        <a href="./overview.php?id=<?php echo $row->id; ?>">
                            <button type="button" class="mt-4 w-full rounded-md bg-[#041e42] px-2 py-1.5 text-md font-semibold text-white shadow-sm hover:bg-[#041e42]/90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                                <i class="ri-shopping-cart-line"></i>
                                Add to Cart
                            </button>
                        </a>
                    </div>
                </div>

            <?php
            endforeach;
            ?>



        </div>
    </div>

    <div class="py-10 mx-5 md:mx-20 flex flex-col gap-4">
        <h1 class="text-center text-2xl md:text-3xl font-bold py-4">Shop By Category</h1>
        <div class="grid grid-flow-row grid-cols-3 md:grid-cols-5 gap-2 justify-center items-">

            <div class="flex flex-col gap-4">
                <img src="./assets/images/face.avif" alt="" class="w-full rounded-lg">
                <h1 class="text-xl font-bold text-center">Face</h1>
            </div>
            <div class="flex flex-col gap-4">
                <img src="./assets/images/hair.avif" alt="" class="w-full rounded-lg">
                <h1 class="text-xl font-bold text-center">Hair</h1>
            </div>
            <div class="flex flex-col gap-4">
                <img src="./assets/images/body.avif" alt="" class="w-full h-full rounded-lg">
                <h1 class="text-xl font-bold text-center">Body</h1>
            </div>
            <div class="flex flex-col gap-4">
                <img src="./assets/images/eyes and lips.avif" alt="" class="w-full h-full rounded-lg">
                <h1 class="text-xl font-bold text-center">Eyes</h1>
            </div>
            <div class="flex flex-col gap-4">
                <img src="./assets/images/gifts.avif" alt="" class="w-full h-full rounded-lg">
                <h1 class="text-xl font-bold text-center">Gifts</h1>
            </div>

        </div>
    </div>

    <div class="py-5 px-5 md:px-20 flex flex-col gap-4  overflow-hidden">
        <div class="flex items-center justify-center py-4 hover:cursor-pointer">
            <h1 class="text-center text-xl md:text-2xl font-bold p-2 rounded-l-xl bg-[#041e42] text-white" id="btab">
                Beauty</h1>
            <h1 class="text-center text-xl md:text-2xl font-bold p-2 rounded-r-xl" id="htab">Hamper</h1>
        </div>

        <div class="tabs w-full h-full">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="mx-auto grid w-full max-w-7xl items-center space-y-4 px-2 py-10 md:grid-cols-2 md:gap-4 md:space-y-0 lg:grid-cols-4">
                        <?php
                        $product = $conn->query("SELECT * FROM products WHERE category = 1 ORDER BY `id` DESC");

                        $product->execute();

                        $data = $product->fetchAll(PDO::FETCH_OBJ);

                        foreach ($data as $row) :
                        ?>
                            <div class="rounded-md shadow-xl">
                                <a href="./overview.php?id=<?php echo $row->id; ?>"><img src="./admin/<?php echo $row->image; ?>" alt="Laptop" class="aspect-[16/9] w-full rounded-md object-cover md:aspect-auto md:h-[200px] lg:h-[200px]" /></a>
                                <div class="p-4">
                                    <h1 class="inline-flex items-center text-lg font-semibold">
                                        <?php echo $row->name; ?>
                                    </h1>
                                    <p class="mt-3 text-sm text-gray-600">
                                        <?php echo $row->uses; ?>
                                    </p>

                                    <div class="mt-5 flex items-center space-x-2">
                                        <?php $weight = explode(",", $row->weight);



                                        foreach ($weight as $w) :


                                            if ($w != "") :
                                        ?>



                                                <span class="block cursor-pointer rounded-md border border-gray-300 p-1 px-2 text-sm font-medium">
                                                    <?php echo $w; ?>
                                                </span>

                                        <?php
                                            endif;
                                        endforeach; ?>

                                    </div>
                                    <div class="mt-5 flex items-center space-x-2">
                                        <span class="block text-xl font-semibold font-sans"><?php $price = explode(",", $row->prices);
                                                                                            echo ($price[0] != "") ? "₹ " . $price[0] : "" ?></span>
                                        </span>
                                    </div>
                                    <a href="./overview.php?id=<?php echo $row->id; ?>">
                                        <button type="button" class="mt-4 w-full rounded-md bg-[#041e42] px-2 py-1.5 text-md font-semibold text-white shadow-sm hover:bg-[#041e42]/90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                                            <i class="ri-shopping-cart-line"></i>
                                            Add to Cart
                                        </button>
                                    </a>
                                </div>
                            </div>

                        <?php
                        endforeach;
                        ?>



                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="mx-auto grid w-full max-w-7xl items-center space-y-4 px-2 py-10 md:grid-cols-2 md:gap-4 md:space-y-0 lg:grid-cols-4">
                        <?php
                        $product = $conn->query("SELECT * FROM products WHERE category = 2 ORDER BY `id` DESC");

                        $product->execute();

                        $data = $product->fetchAll(PDO::FETCH_OBJ);

                        foreach ($data as $row) :
                        ?>
                            <div class="rounded-md shadow-xl">
                                <a href="./overview.php?id=<?php echo $row->id; ?>"><img src="./admin/<?php echo $row->image; ?>" alt="Laptop" class="aspect-[16/9] w-full rounded-md object-cover md:aspect-auto md:h-[200px] lg:h-[200px]" /></a>
                                <div class="p-4">
                                    <h1 class="inline-flex items-center text-lg font-semibold">
                                        <?php echo $row->name; ?>
                                    </h1>
                                    <p class="mt-3 text-sm text-gray-600">
                                        <?php echo $row->uses; ?>
                                    </p>

                                    <div class="mt-5 flex items-center space-x-2">
                                        <?php $weight = explode(",", $row->weight);



                                        foreach ($weight as $w) :


                                            if ($w != "") :
                                        ?>



                                                <span class="block cursor-pointer rounded-md border border-gray-300 p-1 px-2 text-sm font-medium">
                                                    <?php echo $w; ?>
                                                </span>

                                        <?php
                                            endif;
                                        endforeach; ?>

                                    </div>
                                    <div class="mt-5 flex items-center space-x-2">
                                        <span class="block text-xl font-semibold font-sans"><?php $price = explode(",", $row->prices);
                                                                                            echo ($price[0] != "") ? "₹ " . $price[0] : "" ?></span>
                                        </span>
                                    </div>
                                    <a href="./overview.php?id=<?php echo $row->id; ?>">
                                        <button type="button" class="mt-4 w-full rounded-md bg-[#041e42] px-2 py-1.5 text-md font-semibold text-white shadow-sm hover:bg-[#041e42]/90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                                            <i class="ri-shopping-cart-line"></i>
                                            Add to Cart
                                        </button>
                                    </a>
                                </div>
                            </div>

                        <?php
                        endforeach;
                        ?>



                    </div>
                </div>

            </div>

            <!-- <div class="swiper-button-prev"></div> -->
            <!-- <div class="swiper-button-next"></div> -->

        </div>

    </div>

    <div class="py-10 px-5 md:px-20 flex flex-col gap-4">
        <h1 class="text-center w-full text-xl md:text-3xl font-bold py-4">Introducing Glowing Valley</h1>
        <div class="grid grid-flow-row grid-cols-1">

            <div class="flex flex-col gap-4 rounded-lg overflow-hidden">
                <video src="./assets/images/hamper video.mp4" autoplay loop muted class=""></video>
            </div>

        </div>
    </div>

    <?php
    include './components/founder.html';
    include './components/footer.html';
    ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>



</body>

</html>