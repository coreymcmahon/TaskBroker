<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <?php include_partial("global/header"); ?>  
    <?php include_partial("global/navigation"); ?>
    <div id="content"><?php echo $sf_content ?></div>
    <?php include_partial("global/footer"); ?>
  </body>
</html>
