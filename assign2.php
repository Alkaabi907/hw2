<?php
// Endpoint URL
$URL = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=" . urlencode('colleges like "IT" AND the_programs like "bachelor"') . "&limit=100";

// Fetch the JSON data
$response = file_get_contents($URL);

// Decode JSON data
$data = json_decode($response, true);

// Check if data is retrieved successfully
if ($data && isset($data['results'])) {
    $records = $data['results'];
} else {
    $records = [];
    echo "<p>No data found or there was an error fetching the data.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
    <!-- picocss -->
    <link rel="stylesheet" href="pico-main/css/pico.min.css"> 


</head>
<body>
    <h1>Student Nationality Data</h1>

    <!-- Check if records are not empty -->
    <?php if (!empty($records)): ?>
        <div class="overflow-auto">
            <table class="table">
                <thead>
                    <!-- table -->
                    <tr>
                        <th>Year</th>
                        <th>Semester</th>
                        <th>Nationality</th>
                        <th>College</th>
                        <th>Number of Students</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- loop through the records -->
                    <?php foreach ($records as $record): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($record['year']); ?></td>
                            <td><?php echo htmlspecialchars($record['semester']); ?></td>
                            <td><?php echo htmlspecialchars($record['nationality']); ?></td>
                            <td><?php echo htmlspecialchars($record['colleges']); ?></td>
                            <td><?php echo htmlspecialchars($record['number_of_students']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- For debugging, if records are empty -->
    <?php else: ?>
        <p>No records available to display.</p>
    <?php endif; ?>
</body>
</html>
