<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UOB Student Data</title>
    <!-- Link Pico CSS -->
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
    <style>
        table {
            overflow-x: auto;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <main class="container">
        <h1>UOB Student Enrollment Data</h1>
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>The Programs</th>
                    <th>Nationality</th>
                    <th>Colleges</th>
                    <th>Number of Students</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include fetchData.php to retrieve data
                include('fetchData.php');

                // Loop through records and display them
                foreach ($records as $record) {
                    $fields = $record['record']['fields'];
                    echo "<tr>
                        <td>{$fields['year']}</td>
                        <td>{$fields['semester']}</td>
                        <td>{$fields['the_programs']}</td>
                        <td>{$fields['nationality']}</td>
                        <td>{$fields['colleges']}</td>
                        <td>{$fields['number_of_students']}</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>
