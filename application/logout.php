<?php

session_start();

// nodzēš sesijas datus
session_destroy();

// un pāradresē lietotāju uz sākumlapu
header("Location: /", true, 303);
exit();
