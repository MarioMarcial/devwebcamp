<h2 class="dashboard__heading"><?php echo $title; ?></h2>
<div class="dashboard__container-button">
  <a class="dashboard__button" href="/admin/ponentes">
    <i class="fa-solid fa-circle-arrow-left"></i>
    Volver
  </a>
</div>
<div class="dashboard__form">
  <?php include_once __DIR__ . '../../../templates/alerts.php'; ?> 
  <form class="form" action="/admin/ponentes/crear" method="POST" enctype="multipart/form-data">
    <?php include_once __DIR__ . '/form.php'; ?>
    <input type="submit" class="form__submit" value="Registrar Ponente">
  </form>
</div>