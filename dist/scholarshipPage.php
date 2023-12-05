<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarium</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="px-3 py-3 font-Raleway overflow-x-hidden scroll-smooth">
    <!--Search-Bar-->
    <nav class="mt-0 w-full flex px-8 gap-3 top-2 fixed z-50 align-middle items-center">
        <div>
            <a href="./indexLogged.html"><img src="./assets/image/letter-s.png" alt=""
                    class="w-10 bg-white bg-opacity-90 backdrop-filter backdrop-blur-sm rounded-full"></a>
        </div>
        <div class="flex bg-light px-3 rounded-xl w-[90%] align-middle">
            <div class="flex gap-3 rounded-lg w-[87%] mr-2">
                <img src="./assets/icon/Searching.svg" alt="" class="w-5">
                <input type="search" placeholder="Search Something"
                    class="focus:outline-none bg-light py-3 rounded-sm text-sm w-full">
            </div>
            <span class="mt-[10px]">
                <span class="h-full border-l-2 border-gray-300"></span>
            </span>
            <select name="category" id="categorySelect" onchange="redirectToPage()"
                class="bg-light focus:outline-none rounded-md cursor-pointer text-sm ml-2">
                <option value="website" selected disabled>Category</option>
                <option value="scholarship">Scholarship</option>
                <option value="fellowship">Fellowship</option>
                <option value="grants">Grants</option>
                <option value="volunteer">Volunteer</option>
                <option value="event">Event</option>
                <option value="competition">Competition</option>
                <option value="cultural-exchange">Cultural Exchange</option>
                <option value="workshop">Workshop</option>
                <option value="training-center">Training Center</option>
            </select>
        </div>
        <div class="ml-2 relative">
            <button id="dropdownButton" class="focus:outline-none">
                <img src="./assets/image/login-icon.svg" alt="" class="w-10 mt-2">
            </button>
            <!-- Dropdown Menu -->
            <div id="dropdownMenu" class="hidden absolute right-0 mt-2 bg-night rounded-md shadow-md px-2 py-3">
                <a href="#" class="block px-4 py-2 text-sm text-white hover:text-light">Profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-white hover:text-light">Settings</a>
                <a href="#" class="block px-4 py-2 text-sm text-white hover:text-light">Logout</a>
            </div>
            <!-- End Dropdown Menu -->
        </div>
    </nav>
    <!--End-Search-Bar-->
    <!--Hero-Section-->
    <div>
        <div class="m-auto w-11/12">
            <h2
                class="md:mt-[12%] md:mb-[15%] mt-[15%] mb-[18%] text-center font-semibold text-night xl:text-4xl text-base sm:text-2xl ">
                Discover inspiration and explore a wealth of<br>opportunities from all over the world.
            </h2>
        </div>
    </div>
    <!--End-Hero-Section-->
    <!--Scholarship Cart-->
    <div class="flex justify-center mt-12 relative">
        <div class="flex gap-6 flex-wrap-reverse justify-center">
            <?php include('../dist/controller/getAllScholarships.php'); ?>
        </div>
    </div>
    <!--End Scholarship Cart-->
    <!-- Footer -->
    <footer class="px-12 mt-6 h-[150px]">
        <div>
            <img src="./icon/letter-s.png" alt="" class="w-10">
        </div>
        <hr class="mt-3">
        <div class="mt-6 flex justify-between">
            <ul class="flex gap-4">
                <li><a href="" class="font-semibold">About Us</a></li>
                <li><a href="" class="font-semibold">FAQs</a></li>
                <li><a href="" class="font-semibold">Contact Us</a></li>
            </ul>
            <div class="flex gap-3">
                <p class="font-semibold">Connect with us :</p>
                <a href="">Instagram</a>
                <a href="">Telegram</a>
                <a href="">Youtube</a>
                <a href="">Facebook</a>
            </div>
        </div>
    </footer>
    <!-- End-Footer -->
    <script src="script.js"></script>
</body>

</html>