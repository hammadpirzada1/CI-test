<!DOCTYPE html>
<html>
<head>
	<title>Articles</title>
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
        <!-- <li class="nav-item active">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> -->
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <a class="btn btn-primary my-2 my-sm-0" href="<?=base_url('/index.php/login/') ?>">Login</a>
      </form>
    </div>
  </nav>
  
  <div class="container">
  <br>

