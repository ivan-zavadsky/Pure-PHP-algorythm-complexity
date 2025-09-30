<?php
require 'Nested.php';

// To use it, call the function with the initial depth (0),
// the desired number of nested loops (N),
// and an empty array for current values.
// For example, 3 nested loops
(new Nested)->go();
