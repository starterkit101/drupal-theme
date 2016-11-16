<?php 
$pathTema=base_path().drupal_get_path('theme', 'serijakala');
print $doctype; 
?>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf->version . $rdf->namespaces; ?>>
<head<?php print $rdf->profile; ?>>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>  
  <?php print $styles; ?>

  <!--[if (gte IE 6)&(lte IE 8)]><script rel="javascript" type="text/javascript" src="<?php print $pathTema ?>/libraries/condition_ie/html5shiv/html5shiv.js"></script><![endif]-->
  <!--[if (gte IE 6)&(lte IE 8)]><script rel="javascript" type="text/javascript" src="<?php print $pathTema ?>/libraries/condition_ie/respond/respond.min.js"></script><![endif]-->
  <!--[if (gte IE 6)&(lte IE 8)]><script rel="javascript" type="text/javascript" src="<?php print $pathTema ?>/libraries/condition_ie/selectivizr/selectivizr.js"></script><![endif]-->
  <!--[if (gte IE 6)&(lte IE 8)]><script rel="javascript" type="text/javascript" src="<?php print $pathTema ?>/libraries/condition_ie/placeholders/placeholders.min.js"></script><![endif]-->
  <?php print $scripts; ?>
  
</head>
<body<?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>

</body>
</html>