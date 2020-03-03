<?php

$site_name = get_bloginfo('name');
$site_desc = get_bloginfo('description');

$nav_menu = wp_nav_menu(array(
    'theme_location' => 'header',
    'menu_class' => 'menu header-menu',
    'echo' => false));

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Marissa Presbyterian Church</title>
  <?php wp_head();?>
</head>
<body <?php body_class()?>>

<header class="page-header">
  <div class="row">
    <div class="col-md-auto">
      <h1>
        <?php echo $site_name ?>
        <?php if (!empty($site_desc)) {?>
          <small><?php echo $site_desc ?></small>
        <?php }?>
      </h1>
    </div>
    <div class="col-md">
        <?php echo $nav_menu ?>
    </div>
  </div>
</header>