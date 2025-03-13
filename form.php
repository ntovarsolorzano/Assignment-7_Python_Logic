<!DOCTYPE html>
<html>
<head>
    <title>Bitwise Operations Form</title>
</head>
<body>
    <h2>Enter a List of Integers</h2>
    <form action="process.php" method="get">
        <label for="numbers">Integers (comma-separated):</label>
        <input type="text" name="numbers" required>
        <br><br>
        <label for="threshold">Threshold:</label>
        <input type="number" name="threshold" required>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
