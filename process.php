<?php
if (!isset($_GET['numbers']) || !isset($_GET['threshold'])) {
    die("Error: Missing input parameters.");
}

$numbers = $_GET['numbers'];
$threshold = $_GET['threshold'];

// Escape shell arguments
$numbers_safe = escapeshellarg($numbers);
$threshold_safe = escapeshellarg($threshold);

// Execute Python script
$command = "python3 bitwise_operations.py $numbers_safe $threshold_safe";
$output = shell_exec($command);

// Parse JSON output
$result = json_decode($output, true);

// Display results
if (isset($result["error"])) {
    echo "<h3>Error: " . htmlspecialchars($result["error"]) . "</h3>";
} else {
    echo "<h3>Bitwise Operations Results</h3>";
    echo "<p><strong>Bitwise AND:</strong> " . $result["Bitwise AND"] . "</p>";
    echo "<p><strong>Bitwise OR:</strong> " . $result["Bitwise OR"] . "</p>";
    echo "<p><strong>Bitwise XOR:</strong> " . $result["Bitwise XOR"] . "</p>";
    echo "<p><strong>Numbers greater than threshold:</strong> " . json_encode($result["Numbers greater than threshold"]) . "</p>";
}

// Get and display the public IP address (always displayed)
$publicIP = trim(shell_exec('curl -4 ifconfig.io'));
if (!empty($publicIP)) {
    echo "<p><strong>Public IP Address:</strong> " . htmlspecialchars($publicIP) . "</p>";
} else {
    echo "<p><strong>Could not retrieve public IP address.</strong></p>";
}
?>


