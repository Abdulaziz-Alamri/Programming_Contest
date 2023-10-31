<?php

$conn = mysqli_connect('localhost', 'root', '', 'win');

if (!$conn) {
    echo mysqli_connect_error();
}