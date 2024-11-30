<?php
// API URL
$api_url = "https://data.gov.bh/explore/dataset/01-statistics-of-students-nationalities_updated/table/?disjunctive.year&disjunctive.semester&disjunctive.the_programs&sort=number_of_students";

// Fetch data from API
$response = file_get_contents($api_url);

// Decode JSON response
$data = json_decode($response, true);

// Check if data is retrieved successfully
if (!$data || !isset($data['records'])) {
    $records = []; // Empty array to avoid errors
} else {
    // Extract the records
    $records = $data['records'];
}
?>


