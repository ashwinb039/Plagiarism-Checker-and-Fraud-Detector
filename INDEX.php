<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plagiarism Checker and Fraud Detector</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Plagiarism Checker and Fraud Detector</h1>
    </header>
    <main>
        <form action="compare.php" method="post" enctype="multipart/form-data">
            <label for="file1">Upload Document 1:</label>
            <input type="file" id="file1" name="file1" required><br>
            <label for="file2">Upload Document 2:</label>
            <input type="file" id="file2" name="file2" required><br>
            <input type="submit" value="Check for Plagiarism">
        </form>
    </main>
</body>
</html>
