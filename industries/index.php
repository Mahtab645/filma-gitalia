<?php
$prefix = rtrim(str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME'] ?? ''))), '/');
if ($prefix === '.' || $prefix === '\\') {
    $prefix = '';
}
header('Location: ' . $prefix . '/references.php', true, 301);
exit;
