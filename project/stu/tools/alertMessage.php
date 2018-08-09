<?php

function alertMessage($message, $url) {
    echo "<script>alert('$message'); location.href='$url';</script>";
}