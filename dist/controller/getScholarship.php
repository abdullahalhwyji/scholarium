<?php
include('connection.php');

$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 12;

$query = "SELECT scholarship_name, sponsoring_organization, photoName, photo FROM scholarships LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Output HTML for each scholarship
        // Adjust HTML structure and classes as needed
        echo '<div class="w-[380px] h-[300px] relative">';
        // Displaying the retrieved image if available
        if ($row['photo'] && $row['photoName']) {
            $imageData = base64_encode($row['photo']);
            $imageType = 'image/jpeg';

            echo '<img src="data:' . $imageType . ';base64,' . $imageData . '" alt="' . $row['photoName'] . '" class="bg-cover bg-center rounded-[18px] w-[380px] h-[300px]" />';
        } else {
            echo '<img src="./assets/image/example.jpg" alt="Default Image" class="bg-cover bg-center rounded-[18px] w-[380px] h-[300px]" />';
        }
        echo '<div class="w-[372px] h-[70px] bg-white absolute bottom-1 left-1 rounded-[18px] py-4 px-4 sm:w-[412px] md:w-[372px] xl:w-[392px]">';
        echo '<h1 class="font-semibold text-night uppercase">' . $row['scholarship_name'] . '</h1>';
        echo '<div class="flex gap-2">';
        echo '<h6 class="font-light text-sm leading-3 text-night">' . $row['sponsoring_organization'] . '</h6>';
        echo '</div>';
        echo '<a href="clickpage.html" class="absolute bottom-[15px] right-3" id="test" onclick="show()">';
        echo '<img src="assets/icon/Navigation.svg" alt="" class="w-8"/></a>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "No more records available.";
}

mysqli_close($conn);
?>