<?php
setcookie('pos_access_token', '', time() - 3600, '/');
header('Location: ../login');
?>
