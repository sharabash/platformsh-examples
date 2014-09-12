<?php header("Content-Type: text/plain"); ?>

# Relationships

<?php
print_r(json_decode(base64_decode(getenv("PLATFORM_RELATIONSHIPS"))));
?>

# Application

<?php
print_r(json_decode(base64_decode(getenv("PLATFORM_APPLICATION"))));
?>
