<?php
include('../dist/controller/connection.php');
if (isset($_GET['id'])) {
    $scholarship_id = $_GET['id'];

    // Fetch scholarship data based on ID
    $query = "SELECT scholarship_name, sponsoring_organization, country, type, description, degree_bachelor, degree_master, degree_phd, application_deadline, majors, required_documents, benefits, notes, application_link, photoName, photo FROM scholarships WHERE scholarship_id = $scholarship_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Display fetched data
        $scholarship_name = $row['scholarship_name'];
        $sponsoring_organization = $row['sponsoring_organization'];
        $country = $row['country'];
        $benefits = $row['benefits'];
        $type = $row['type'];
        $description = $row['description'];
        $bachelor = $row['degree_bachelor'];
        $master = $row['degree_master'];
        $phd = $row['degree_phd'];
        $deadline = $row['application_deadline'];
        $majors = $row['majors'];
        $requiredDocument = $row['required_document'];
        $notes = $row['notes'];
        $applicationLink = $row['application_link'];

    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarium</title>
    <link rel="stylesheet" href="../dist/output.css">
</head>

<body class="w-full px-3 py-3 font-font overflow-x-hidden scroll-smooth">
    <!-- Header -->
    <header>
        <div class="w-full flex justify-between align-middle items-center pr-10">
            <div class="pl-8">
                <a href="">
                    <img src="./icon/letter-s.png" alt="" class="w-10">
                </a>
            </div>
            <div class="ml-2">
                <a href="">
                    <img src="./icon/profile.png" alt="" class="mt-[6px]">
                </a>
            </div>
        </div>
    </header>
    <!-- End Header -->
    <!-- Hero-Section -->
    <div class="flex mt-16">
        <div class="flex-col items-center mx-auto text-center">
            <h1 class="text-5xl font-semibold mb-3">
                <?php
                echo $scholarship_name;
                ?>
            </h1>
            <h3 class="text-xl">
                <?php
                echo $sponsoring_organization;
                ?>

            </h3>
            <h3 class="text-sm">
                <?php
                echo $country
                    ?>
            </h3>
        </div>
    </div>
    <!-- End-Hero-Section -->
    <!-- Content -->
    <div class="flex-col mt-24 w-7/12 m-auto mb-32">
        <div class="flex w-full">
            <div class="flex-col w-11/12">
                <div class="flex gap-3 mb-1">
                    <img src="./icon/degree_icon.png" alt="" class="w-6 h-6">
                    <div class="text-base">

                        <?php
                        if ($bachelor == 1) {
                            echo '<p>Bachelor</p>';
                        } else if ($bachelor == 1 && $master == 1) {
                            echo '<p>Bachelor, Master</p>';
                        } else if ($bachelor == 1 && $master == 1 && $phd == 1) {
                            echo '<p>Bachelor, Master, PhD</p>';
                        } else if ($bachelor == 1 && $phd == 1) {
                            echo '<p>Bachelor, PhD</p>';
                        } else if ($master == 1 && $phd == 1) {
                            echo '<p>Master, PhD</p>';
                        } else if ($master == 1) {
                            echo '<p>Master</p>';
                        } else if ($phd == 1) {
                            echo '<p>PhD</p>';
                        } else {
                            echo 'No data';
                        }
                        ?>

                    </div>
                </div>
                <div class="flex gap-3 mb-1">
                    <img src="./icon/calendar_icon.png" alt="" class="w-6 h-6">
                    <p class="text-base my-0.5">
                        Application Deadline :
                    <p class="text-base my-0.5">
                        <?php
                        echo $deadline;
                        ?>
                    </p>
                    </p>
                </div>
                <div class="flex gap-3">
                    <img src="./icon/money-icon.png" alt="" class="w-6 h-5">
                    <p class="text-base my-0.5">
                        <?php
                        echo $type;
                        ?>
                    </p>
                </div>
            </div>
            <div class="flex justify-end">
                <a href="">
                    <div class="bg-black w-48 h-12 rounded-full flex mt-3.5">
                        <p class="text-white m-auto">Visit Website</p>
                    </div>
                </a>
            </div>
            <div class="flex">
                <div class="flex gap-4 ml-8 mt-2 mr-4">
                    <button class="w-6 h-5 mt-4">
                        <img src="./icon/heart.png" alt="">
                    </button>
                    <p class="text-lg font-semibold mt-3.5">00</p>
                </div>
            </div>
        </div>
        <div class="bg-black w-full h-[1px] mt-7"></div>
        <div class="flex justify-end">
            <h3 class="my-3 font-semibold">DESCRIPTION</h3>
        </div>
        <div class="bg-black w-full h-[1px]"></div>
        <p class="my-3">
            <?php
            echo $description;
            ?>
        </p>
        <div class="bg-black w-full h-[1px] mt-7"></div>
        <div class="flex justify-end">
            <h3 class="my-3 font-semibold">BENEFITS</h3>
        </div>
        <div class="bg-black w-full h-[1px]"></div>
        <p class="my-3">
            <?php
            echo $benefits;
            ?>
        </p>
        <div class="bg-black w-full h-[1px] mt-7"></div>
        <div class="flex justify-end">
            <h3 class="my-3 font-semibold">REQUIREMENTS</h3>
        </div>
        <div class="bg-black w-full h-[1px]"></div>
        <p class="my-3">
            <?php
            echo $requiredDocument;
            ?>
        </p>
        <div class="bg-black w-full h-[1px] mt-7"></div>
        <div class="flex justify-end">
            <h3 class="my-3 font-semibold">MAJORS</h3>
        </div>
        <div class="bg-black w-full h-[1px]"></div>
        <p class="my-3">
            <?php
            echo $majors;
            ?>
        <div class="bg-black w-full h-[1px] mt-7"></div>
        <div class="flex justify-end">
            <h3 class="my-3 font-semibold">NOTES</h3>
        </div>
        <div class="bg-black w-full h-[1px]"></div>
        <p class="my-3">
            <?php
            echo $notes;
            ?>
        </p>
    </div>
    <!-- Footer -->
    <footer class="px-12 mt-16 h-[150px]">
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
</body>

</html>