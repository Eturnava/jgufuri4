<?php
require 'components.php';
require 'data.php';

render_head("Lugx Gaming - Home");
render_header("home");
include 'sections/banner.php'; 
include 'sections/features-trending.php';
include 'sections/most-played.php';
include 'sections/categories.php';
include 'sections/cta.php';

render_footer(); ?>