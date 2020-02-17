<!DOCTYPE html>
<html>
<head>
	<title>My Magazines</title>
	<meta name="viewport" content="width=device-width">

        <?= link_tag('/css/bootstrap.min.css') ?>
        <?= link_tag('/css/bootstrap-responsive.min.css') ?>
        <?= link_tag('/css/main.css') ?>

        <script src="<?=base_url('/js/vendor/modernizr-2.6.2.min.js') ?>"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="<?=base_url('/index.php/magazine/') ?>">Magazine Collection</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?=base_url('/index.php/magazine/') ?>">View</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('/index.php/magazine/add') ?>">Add</a>
          </li>
        </ul>
      </div>
    </nav>

	<div class="container">
  <br>