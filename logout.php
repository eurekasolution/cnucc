<?php
 
    session_destroy();

    echo "
    <script>
        alert('안녕히 가세요.');
        location.href='$_SERVER[PHP_SELF]';
    </script>
    ";
?>