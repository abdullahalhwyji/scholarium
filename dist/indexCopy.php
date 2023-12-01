<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarium</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="font-Raleway overflow-x-hidden scroll-smooth">
    <!-- NAVBAR -->
    <?php
    session_start();
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) { ?>
        <nav class="mt-0 w-full flex px-8 gap-3 top-2 fixed z-50 align-middle items-center">
            <div>
                <a href="./index.html"><img src="./assets/image/letter-s.png" alt=""
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
                    <a href="../dist/controller/logout.php?logout=true"
                        class="block px-4 py-2 text-sm text-white hover:text-light">Logout</a>
                </div>
                <!-- End Dropdown Menu -->
            </div>
        </nav>
    <?php } else {
        ?>
        <nav class=" w-full flex px-8 gap-3 top-2 fixed z-50 align-middle justify-between items-center">
            <div class="mt-2">
                <a href="./index.html"><img src="./assets/image/letter-s.png" alt=""
                        class="w-10 bg-white bg-opacity-90 backdrop-filter backdrop-blur-sm rounded-full"></a>
            </div>

            <div class="ml-2 mt-2 mr-4">
                <ul class="flex gap-3">
                    <li><a href="./login.html"
                            class="font-semibold shadow-none hover:text-hover rounded-full bg-white bg-opacity-90 backdrop-filter backdrop-blur-sm p-2">Log
                            in</a></li>
                    <li><a href="./signUp.html"
                            class="font-semibold shadow-none hover:text-hover rounded-full bg-white bg-opacity-90 backdrop-filter backdrop-blur-sm p-2">Sign
                            Up</a></li>
                </ul>
            </div>
        </nav>
        <!-- END NAVBAR -->
    <?php }
    ?>

    <!-- HERO SECTION -->
    <div class="h-screen mt-[30px] w-full flex flex-col justify-center px-8 ">
        <div class="bg-hero-pattern w-[99%] h-[50%] bg-cover bg-center rounded-3xl align-middle">

        </div>
        <div class="mt-20 flex items-center">
            <div class=" w-[90%]" data-aos="fade-right">
                <h1 class="text-6xl font-semibold leading-tight">Global Learning<br>Excellence journey</h1>
            </div>
            <div class="text-7xl ml-2 mr-4">✺</div>
            <div data-aos="fade-up">
                <p class="text-justify text-3xl w-[95%] ml-4">Explore scholarships from all corners
                    of the globe and unlock your
                    path to a brighter future.</p>
            </div>
        </div>
    </div>
    <!-- END HERO SECTION -->

    <!-- LATEST SECTION -->
    <div class="mt-24">
        <div data-aos="fade-in" data-aos-duration="1100">
            <h3 class="text-center text-night">The latest</h3>
        </div>
        <div class="mt-4" data-aos="fade-in">
            <h1 class="text-center text-7xl font-semibold text-night">CHANCES</h1>
        </div>
        <div data-aos="fade-in">
            <h2 class="text-night text-center font-medium mt-6 text-lg">
                View recently added scholarships.
            </h2>
        </div>

        <!-- First Latest Scholarship -->
        <?php
        include('../dist/controller/connection.php');

        $query = "SELECT scholarship_name, sponsoring_organization, photoName, photo FROM scholarships WHERE scholarship_id = (SELECT MAX(scholarship_id) FROM scholarships)";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo "Error: " . mysqli_error($conn);
        } else {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $scholarshipName = $row['scholarship_name'];
                $organizer = $row['sponsoring_organization'];
                $photoName = $row['photoName'];
                $photo = $row['photo'];

                echo '<div class="flex justify-center mt-12 relative" data-aos="fade-up" data-aos-duration="">';
                echo '<div class="flex justify-center mx-auto gap-6">';
                echo '<div class="w-[380px] h-[300px] relative">';

                if ($photo && $photoName) {
                    $imageData = base64_encode($photo);
                    $imageType = 'image/jpeg';


                    echo '<img src="data:' . $imageType . ';base64,' . $imageData . '" alt="' . $photoName . '" class="bg-cover bg-center rounded-[18px] w-[380px] h-[300px]" />';
                } else {

                    echo '<img src="./assets/image/example.jpg" alt="Default Image" class="bg-cover bg-center rounded-[18px] w-[380px] h-[300px]" />';
                }
                echo '<div class="w-[372px] h-[70px] bg-white absolute bottom-1 left-1 rounded-[18px] py-4 px-4">';
                echo '<h1 class="font-semibold text-night uppercase">' . $scholarshipName . '</h1>';
                echo '<div class="flex gap-2">';
                echo '<h6 class="font-light text-sm leading-3 text-night">' . $organizer . '</h6>';
                echo '</div>';
                echo '<a href="#" class="absolute bottom-[15px] right-3"><img src="assets/icon/Navigation.svg" alt class="w-8" /></a>';
                echo '</div>';
                echo '</div>';

            } else {
                echo "No data found.";
            }
        }
        mysqli_close($conn);
        ?>
        <!-- End of First Latest Scholarship -->

        <!-- Second Latest Scholarship -->
        <?php
        include('../dist/controller/connection.php');


        $query = "SELECT scholarship_name, sponsoring_organization, photoName, photo FROM scholarships WHERE scholarship_id = (
    SELECT MAX(scholarship_id) FROM scholarships WHERE scholarship_id < (SELECT MAX(scholarship_id) FROM scholarships)
)";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo "Error: " . mysqli_error($conn);
        } else {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $scholarshipName = $row['scholarship_name'];
                $organizer = $row['sponsoring_organization'];
                $photoName = $row['photoName'];
                $photo = $row['photo'];


                echo '<div class="w-[380px] h-[300px] relative">';

                if ($photo && $photoName) {
                    $imageData = base64_encode($photo);
                    $imageType = 'image/jpeg';


                    echo '<img src="data:' . $imageType . ';base64,' . $imageData . '" alt="' . $photoName . '" class="bg-cover bg-center rounded-[18px] w-[380px] h-[300px]" />';
                } else {

                    echo '<img src="./assets/image/example.jpg" alt="Default Image" class="bg-cover bg-center rounded-[18px] w-[380px] h-[300px]" />';
                }
                echo '<div class="w-[372px] h-[70px] bg-white absolute bottom-1 left-1 rounded-[18px] py-4 px-4">';
                echo '<h1 class="font-semibold text-night uppercase">' . $scholarshipName . '</h1>';
                echo '<div class="flex gap-2">';
                echo '<h6 class="font-light text-sm leading-3 text-night">' . $organizer . '</h6>';
                echo '</div>';
                echo '<a href="#" class="absolute bottom-[15px] right-3"><img src="assets/icon/Navigation.svg" alt class="w-8" /></a>';
                echo '</div>';
                echo '</div>';
            } else {
                echo "No data found.";
            }
        }


        mysqli_close($conn);
        ?>
        <!-- End of Second Latest Scholarship -->

        <!-- Third Latest Scholarship -->
        <?php
        include('../dist/controller/connection.php');

        $query = "SELECT scholarship_name, sponsoring_organization, photoName, photo FROM scholarships WHERE scholarship_id = (
    SELECT MAX(scholarship_id) FROM scholarships WHERE scholarship_id NOT IN (
        SELECT MAX(scholarship_id) FROM scholarships
        UNION
        SELECT MAX(scholarship_id) FROM scholarships WHERE scholarship_id < (SELECT MAX(scholarship_id) FROM scholarships)
    )
)";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo "Error: " . mysqli_error($conn);
        } else {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $scholarshipName = $row['scholarship_name'];
                $organizer = $row['sponsoring_organization'];
                $photoName = $row['photoName'];
                $photo = $row['photo'];


                echo '<div class="w-[380px] h-[300px] relative">';

                if ($photo && $photoName) {
                    $imageData = base64_encode($photo);
                    $imageType = 'image/jpeg';


                    echo '<img src="data:' . $imageType . ';base64,' . $imageData . '" alt="' . $photoName . '" class="bg-cover bg-center rounded-[18px] w-[380px] h-[300px]" />';
                } else {
                    echo '<img src="./assets/image/example.jpg" alt="Default Image" class="bg-cover bg-center rounded-[18px] w-[380px] h-[300px]" />';
                }
                echo '<div class="w-[372px] h-[70px] bg-white absolute bottom-1 left-1 rounded-[18px] py-4 px-4">';
                echo '<h1 class="font-semibold text-night uppercase">' . $scholarshipName . '</h1>';
                echo '<div class="flex gap-2">';
                echo '<h6 class="font-light text-sm leading-3 text-night">' . $organizer . '</h6>';
                echo '</div>';
                echo '<a href="#" class="absolute bottom-[15px] right-3"><img src="assets/icon/Navigation.svg" alt class="w-8" /></a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

            } else {
                echo "No data found.";
            }
        }


        mysqli_close($conn);
        ?>
        <!-- End of Third Latest Scholarship -->

        <!-- Repeat the above block for other scholarship entries -->
    </div>
    </div>
    </div>

    <div class="flex justify-center mt-10">
        <a href="schoa" class="underline-gray">View All Scholarships</a>
        <img src="./assets/icon/arrow.svg" alt class="w-2.5 ml-2" />
    </div>
    <!-- END LATEST SECTION -->

    <!-- ENROLLMENT SECTION -->
    <div class="flex mt-32 h-screen p-12 text-night">
        <div class="w-[50%]">
            <h3 class="text-start" data-aos="fade-in">Enrollment</h3>
            <h1 class="lg:text-5xl lg:font-medium mt-4" data-aos="fade-in">
                Get to know how to apply <br />
                for scholarship.
            </h1>
            <h2 class="lg:text-lg lg:font-medium mt-7" data-aos="fade-in">
                Prepare Ahead: Scholarships rely on past achievements. <br />
                Begin early to craft an impressive accomplishment portfolio.
            </h2>
        </div>
        <div class="w-[50%] mt-12 relative flex flex-col">
            <div class="border-y-2 py-5 w-full cursor" onmouseover="showElement(this)" onmouseout="hideElement(this)">
                <h1 data-aos="fade-left" data-aos-duration="1100"><span class="text-gray-500">01</span> Research</h1>
                <div class="absolute py-8 px-4 bg-night text-white rounded-xl shadow-sm hidden left-5" id="hiddenDiv">
                    <p>
                        Research and identity the scholarships you might be
                        eligible
                        <br />
                        for and interested in pursuing.
                    </p>
                </div>
            </div>
            <div class="border-b-2 py-5 w-full cursor" onmouseover="showElement(this)" onmouseout="hideElement(this)">
                <h1 data-aos="fade-left" data-aos-duration="1100"><span class="text-gray-500">02</span>
                    Gathering
                    information</h1>
                <div class="absolute py-8 px-4 bg-night text-white rounded-xl shadow-sm hidden left-5" id="hiddenDiv">
                    <p>
                        Gather Required Docs: Get your transcripts, test
                        scores (SAT/GPA),
                        essays, letters of recommendation, and financial
                        info ready.
                    </p>
                </div>
            </div>
            <div class="border-b-2 py-5 w-full cursor" onmouseover="showElement(this)" onmouseout="hideElement(this)">
                <h1 data-aos="fade-left" data-aos-duration="1100"><span class="text-gray-500">03</span>
                    Completing the
                    form</h1>
                <div class="absolute py-8 px-4 bg-night text-white rounded-xl shadow-sm hidden left-5" id="hiddenDiv">
                    <p>
                        Complete the application form, following the
                        instructions provided
                        by the scholarship provider. All scholarships
                        require this.
                    </p>
                </div>
            </div>
            <div class="border-b-2 py-5 w-full cursor" onmouseover="showElement(this)" onmouseout="hideElement(this)">
                <h1 data-aos="fade-left" data-aos-duration="1100"><span class="text-gray-500">05</span>
                    Preparing for
                    interview</h1>
                <div class="absolute py-8 px-4 bg-night text-white rounded-xl shadow-sm hidden left-5" id="hiddenDiv">
                    <p>Last step in the scholarship process, not always
                        required.</p>
                </div>
            </div>
            <div class="border-b-2 py-5 w-full cursor" onmouseover="showElement(this)" onmouseout="hideElement(this)">
                <h1 data-aos="fade-left" data-aos-duration="1100"><span class="text-gray-500">06</span>
                    Awaiting response</h1>
                <div class="absolute py-8 px-4 bg-night text-white rounded-xl shadow-sm hidden left-5" id="hiddenDiv">
                    <p>
                        If chosen, expect a notification from the
                        scholarship provider
                        regarding award details and any additional
                        requirements.
                    </p>
                </div>
            </div>
            <div class="border-b-2 py-5 w-full cursor" onmouseover="showElement(this)" onmouseout="hideElement(this)">
                <h1 data-aos="fade-left" data-aos-duration="1100"><span class="text-gray-500">07</span>
                    Accepting the
                    reward</h1>
                <div class="absolute py-8 px-4 bg-night text-white rounded-xl shadow-sm hidden left-5" id="hiddenDiv">
                    <p>
                        Formally accept the scholarship, then follow the
                        university's
                        guidance on continuing your studies and receiving
                        important
                        information.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- END ENROLLMENT SECTION -->

    <!-- POPULAR SECTION -->
    <div class="py-24 px-12 bg-night h-[780px]">
        <div class="text-center text-white">
            <h1>Featured</h1>
            <h1 class="text-7xl font-semibold uppercase mt-8">Discover popular
                scholarship</h1>
        </div>
        <div class="animation-container mt-8">
            <div class="animation-content">
                <div class="animation-item">✺ Based on user preferences ✺</div>
                <div class="animation-item"> Curated for your success ✺</div>
                <div class="animation-item"> Apply now ✺</div>
                <div class="animation-item"> Achieve success ✺</div>
                <div class="animation-item"> Based on user preferences ✺</div>
                <div class="animation-item"> Curated for your success ✺</div>
                <div class="animation-item"> Apply now ✺</div>
                <div class="animation-item"> Achive success ✺</div>

                <!-- Tambahkan elemen sesuai kebutuhan -->
            </div>
        </div>
        <div class="flex xl:flex-row sm:flex-col justify-center mx-auto gap-4 mt-14">
            <div class="w-[380px] h-[300px] relative">
                <img src="./assets/image/example.jpg" alt
                    class="bg-cover bg-center rounded-[18px] w-[380px] h-[300px]" />
                <div class="w-[372px] h-[70px] bg-white absolute bottom-1 left-1 rounded-[18px] py-4 px-4">
                    <h1 class="font-semibold text-night uppercase">National event</h1>
                    <div class="flex gap-2">
                        <h6 class="font-light text-sm leading-3 text-night">University of
                            Melbourne</h6>
                    </div>
                    <a href="#" class="absolute bottom-[15px] right-3"><img src="assets/icon/Navigation.svg" alt
                            class="w-8" /></a>
                </div>
            </div>
            <div class="w-[380px] h-[300px] relative">
                <img src="./assets/image/example.jpg" alt
                    class="bg-cover bg-center rounded-[18px] w-[380px] h-[300px]" />
                <div class="w-[372px] h-[70px] bg-white absolute bottom-1 left-1 rounded-[18px] py-4 px-4">
                    <h1 class="font-semibold text-night uppercase">National event</h1>
                    <div class="flex gap-2">
                        <h6 class="font-light text-sm leading-3 text-night">University of
                            Melbourne</h6>
                    </div>
                    <a href="#" class="absolute bottom-[15px] right-3"><img src="assets/icon/Navigation.svg" alt
                            class="w-8" /></a>
                </div>
            </div>
            <div class="w-[380px] h-[300px] relative">
                <img src="./assets/image/example.jpg" alt
                    class="bg-cover bg-center rounded-[18px] w-[380px] h-[300px]" />
                <div class="w-[372px] h-[70px] bg-white absolute bottom-1 left-1 rounded-[18px] py-4 px-4">
                    <h1 class="font-semibold text-night uppercase">National event</h1>
                    <div class="flex gap-2">
                        <h6 class="font-light text-sm leading-3 text-night">University of
                            Melbourne</h6>
                    </div>
                    <a href="#" class="absolute bottom-[15px] right-3"><img src="assets/icon/Navigation.svg" alt
                            class="w-8" /></a>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-10 mb-10">
            <a href="#" class="underline-gray-2">View All Popular</a>
            <img src="./assets/icon/arrow-white.svg" alt class="w-2.5 ml-2" />
        </div>
    </div>
    <!-- END POPULAR SECTION -->

    <!-- SERVICE SECTION -->
    <div class="p-12 mt-12">
        <div class="flex xl:flex-row sm:flex-col justify-between items-center">
            <div>
                <h3 class="text-start" data-aos="fade-right">Service</h3>
                <h1 class="lg:text-5xl lg:font-medium mt-4" data-aos="fade-right" data-aos-duration="">
                    Choose the package <br>
                    that suits you best.
                </h1>
            </div>
            <div data-aos="fade-left" data-aos-duration="">
                <p>We are here to help you seize opportunities. <br>
                    Choose the package and let us do it for you.</p>
            </div>
        </div>
        <div class="flex xl:flex-row sm:flex-col mt-20 gap-6 justify-center" data-aos="fade-up" data-aos-duration="">
            <div class="bg-night w-[350px] h-[500px] rounded-xl">
                <div class="text-white text-center p-8">
                    <h2 class="text-2xl font-semibold">Essential</h2>
                    <h1 class="text-6xl mt-2">$50</h1>
                    <h3 class="mt-4 text-gray-300">Each application</h3>
                    <hr class="mt-6 w-full">
                    <ul class="text-white list-disc text-start pl-4 mt-8 space-y-3">
                        <li>Apply for scholarship</li>
                        <li class="line-through text-gray-400">Write motivation letter</li>
                        <li class="line-through text-gray-400">Recommendation letter (x2)</li>
                        <li class="line-through text-gray-400">Make CV</li>
                    </ul>
                    <button class="p-4 border rounded-xl w-full mt-12 hover:bg-white hover:text-night">Select
                        essential plan</button>
                </div>
            </div>
            <div class="bg-night w-[350px] h-[500px] rounded-xl">
                <div class="text-white text-center p-8">
                    <h2 class="text-2xl font-semibold">Premium</h2>
                    <h1 class="text-6xl mt-2">$75</h1>
                    <h3 class="mt-4 text-gray-300">Each application</h3>
                    <hr class="mt-6 w-full">
                    <ul class="text-white list-disc text-start pl-4 mt-8 space-y-3">
                        <li>Apply for scholarship</li>
                        <li>Write motivation letter</li>
                        <li class="line-through text-gray-400">Recommendation letter (x2)</li>
                        <li class="line-through text-gray-400">Make CV</li>
                    </ul>
                    <button class="p-4 border rounded-xl w-full mt-12 hover:bg-white hover:text-night">Select
                        premium plan</button>
                </div>
            </div>
            <div class="bg-night w-[350px] h-[500px] rounded-xl">
                <div class="text-white text-center p-8">
                    <h2 class="text-2xl font-semibold">Ultimate</h2>
                    <h1 class="text-6xl mt-2">$100</h1>
                    <h3 class="mt-4 text-gray-300">Each application</h3>
                    <hr class="mt-6 w-full">
                    <ul class="text-white list-disc text-start pl-4 mt-8 space-y-3">
                        <li>Apply for scholarship</li>
                        <li>Write motivation letter</li>
                        <li>Recommendation letter (x2)</li>
                        <li>Make CV</li>
                    </ul>
                    <button class="p-4 border rounded-xl w-full mt-12 hover:bg-white hover:text-night">Select
                        ultimate plan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END SERVICE SECTION -->

    <!-- FEEDBACK SECTION -->
    <div class="mt-16 carousel-container p-12">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-medium" data-aos="fade-right">What they say</h1>
            </div>
            <div class="flex gap-3">
                <img src="assets/icon/arrow-slider.png" alt="Left Arrow" class="w-10 h-10 cursor-pointer"
                    onclick="prevFeedback()">
                <img src="assets/icon/arrow-slider.png" alt="Right Arrow" class="-rotate-180 w-10 h-10 cursor-pointer"
                    onclick="nextFeedback()">
            </div>
        </div>
        <div class="carousel-container">
            <div class="carousel-content mt-8" data-aos="fade-in">
                <div class="feedback-entry">
                    <blockquote class="text-3xl font-medium text-justify">" I can't thank this website enough! It made
                        my scholarship search incredibly easy and efficient. I found the perfect scholarship in no time.
                        Highly recommend! "</blockquote>
                    <p class="mt-7 text-2xl">~ Arladiann</p>
                </div>
                <div class="feedback-entry">
                    <blockquote class="text-3xl font-medium text-justify">" I highly recommend this scholarship website
                        to any student. The interface is intuitive, and the comprehensive database helped me discover
                        scholarships I didn't even know existed. It's a valuable resource for anyone navigating the
                        world of scholarships."</blockquote>
                    <p class="mt-7 text-2xl">~ Permenkakibiru</p>
                </div>
                <div class="feedback-entry">
                    <blockquote class="text-3xl font-medium text-justify">" Navigating the scholarship landscape can be
                        overwhelming, but this website made it surprisingly easy. The weekly updates on new scholarship
                        opportunities keep me informed, and the application tips are a bonus. Thank you for creating
                        such a valuable platform!"</blockquote>
                    <p class="mt-7 text-2xl">~ Naksputin</p>
                </div>
                <div class="feedback-entry">
                    <blockquote class="text-3xl font-medium text-justify">" Nothing to say hehe"</blockquote>
                    <p class="mt-7 text-2xl">~ Alhwyji</p>
                </div>
                <div class="feedback-entry">
                    <blockquote class="text-3xl font-medium text-justify">" I found my dream scholarship through this
                        website! The personalized recommendations based on my profile were spot on. The website is
                        well-organized, and the continuous updates ensure that I never miss out on valuable
                        opportunities. A must-have for every scholarship seeker!"</blockquote>
                    <p class="mt-7 text-2xl">~ Wajehaldeen</p>
                </div>
            </div>
        </div>
    </div>

    <!-- END FEEDBACK SECTION -->

    <!-- FOOTER -->
    <footer class="px-12 mt-6 h-[150px]">
        <div>
            <img src="./assets/image/letter-s.png" alt="" class="w-10">
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

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="script.js"></script>
</body>

</html>