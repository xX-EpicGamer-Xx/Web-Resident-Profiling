<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$dbname = 'website';
$username = 'root';
$password = ''; // Leave empty if default

$backupDir = 'backups';
if (!is_dir($backupDir)) {
    mkdir($backupDir, 0777, true);
}

$filename = $backupDir . '/backup-' . date('Ymd-His') . '.sql';
$mysqldumpPath = 'C:\\xampp\\mysql\\bin\\mysqldump.exe';

// If password is empty, don't include the flag
if ($password === '') {
    $command = "\"$mysqldumpPath\" --user=$username --host=$host $dbname > \"$filename\"";
} else {
    $command = "\"$mysqldumpPath\" --user=$username --password=$password --host=$host $dbname > \"$filename\"";
}

// Use shell_exec instead of exec
$output = shell_exec($command);

// Optional: log command for debugging
file_put_contents('log.txt', "COMMAND: $command\n");

if (file_exists($filename)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/sql');
    header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filename));
    readfile($filename);
    exit;
} else {
    echo "Backup failed. SQL file not created.";
}
?>
