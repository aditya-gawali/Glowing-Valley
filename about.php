<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- <link rel="icon" type="image/svg+xml" href="./assets/IMG-20230309-WA0008-removebg-preview.jpg" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glowing Valley | About us</title>

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- <link rel="apple-touch-icon" sizes="180x180" href="./assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon-16x16.png">
    <link rel="manifest" href="./assets/site.webmanifest"> -->
</head>

<body class="relative">

    <?php
    include './components/navbar.html';
    ?>




    <div class="mx-auto max-w-7xl px-4">

        <div class="flex flex-col items-center gap-x-4 gap-y-4 py-16 md:flex-row">
            <div class="space-y-6">
                <p class="text-sm font-semibold md:text-base">About Us →</p>
                <p class="text-3xl font-bold md:text-4xl">
                    We&#x27;re just getting started
                </p>
                <p class="text-base text-gray-600 md:text-lg">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus ducimus dolorem sequi, ab aliquam
                    ratione. Lorem, ipsum.
                </p>
                <button type="button" class="rounded-md bg-[#041e42] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#041e42]/90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                    Contact us
                </button>
            </div>
            <div class="md:mt-o mt-10 w-full">
                <img src="https://images.unsplash.com/photo-1605165566807-508fb529cf3e?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2340&amp;q=80" alt="Getting Started" class="rounded-lg" />
            </div>
        </div>

        <div class="my-4">
            <h1 class="text-3xl font-bold">Our Team</h1>
            <p class="mt-2 text-gray-500">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam,
                voluptatum.
            </p>
        </div>
        <div class="grid grid-cols-1 gap-[30px] md:grid-cols-3">
            <div class="flex flex-col items-center text-start">
                <div class="relative flex h-[342px] w-full flex-col justify-end rounded-[10px] bg-red-300" style="background-position:center;background-size:cover;background-repeat:no-repeat">
                    <img src="https://images.unsplash.com/photo-1540569014015-19a7be504e3a?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8NzZ8fHBlcnNvbnxlbnwwfHwwfHw%3D&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=60" alt="" class="z-0 h-full w-full rounded-[10px] object-cover" />
                    <div class="absolute bottom-4 left-4">
                        <h1 class="text-xl font-semibold text-white">Lorem, ipsum.</h1>
                        <h6 class="text-base text-white">Lorem, ipsum dolor.</h6>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center text-start">
                <div class="relative flex h-[342px] w-full flex-col justify-end rounded-[10px] bg-red-300" style="background-position:center;background-size:cover;background-repeat:no-repeat">
                    <img src="https://images.unsplash.com/photo-1513956589380-bad6acb9b9d4?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDV8fHxlbnwwfHx8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=60" alt="" class="z-0 h-full w-full rounded-[10px] object-cover" />
                    <div class="absolute bottom-4 left-4">
                        <h1 class="text-xl font-semibold text-white">Lorem, ipsum.</h1>
                        <h6 class="text-base text-white">Lorem, ipsum dolor.</h6>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center text-start">
                <div class="relative flex h-[342px] w-full flex-col justify-end rounded-[10px] bg-red-300" style="background-position:center;background-size:cover;background-repeat:no-repeat">
                    <img src="https://images.unsplash.com/photo-1567532939604-b6b5b0db2604?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDB8fHBlcnNvbnxlbnwwfHwwfHw%3D&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=60" alt="" class="z-0 h-full w-full rounded-[10px] object-cover" />
                    <div class="absolute bottom-4 left-4">
                        <h1 class="text-xl font-semibold text-white">Lorem, ipsum.</h1>
                        <h6 class="text-base text-white">Lorem, ipsum dolor.</h6>
                    </div>
                </div>
            </div>
        </div>



        <?php
        include './components/founder.html';
        ?>


        <div class="flex flex-col space-y-8 pb-10 pt-12 md:pt-24">
            <div class="max-w-max rounded-full border bg-gray-50 p-1 px-3">
                <p class="text-xs font-semibold leading-normal md:text-sm">
                    About the company
                </p>
            </div>
            <p class="text-3xl font-bold text-gray-900 md:text-5xl md:leading-10">
                Made with love, right here in India
            </p>
            <p class="max-w-4xl text-base text-gray-600 md:text-xl">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore
                veritatis voluptates neque itaque repudiandae sint, explicabo assumenda
                quam ratione placeat?
            </p>
        </div>
        <div class="w-full space-y-4">
            <img class="h-[200px] w-full rounded-xl object-cover md:h-full" src="https://dev-ui-image-assets.s3.ap-south-1.amazonaws.com/google-map.jpg" alt="" />
        </div>
        <div class="my-8 flex flex-col gap-y-6 md:flex-row px-5">

            <div class="flex flex-col space-y-3 md:w-2/4 lg:w-1/5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
                <p class="w-full text-xl font-semibold  text-gray-900">Head office</p>
                <p class="w-full text-base text-gray-700">Mon-Sat 9am to 5pm.</p>
                <p class="text-sm font-medium">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>

        </div>
        <hr class="mt-20" />



    </div>

    <?php
    include './components/footer.html';
    ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>



</body>

</html>