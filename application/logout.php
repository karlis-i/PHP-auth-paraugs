<?php

session_start();

// nodzēš sesijas datus
// delete session data
session_destroy();

// un pāradresē lietotāju uz sākumlapu
// redirect to home page
header("Location: /", true, 303);
exit();
