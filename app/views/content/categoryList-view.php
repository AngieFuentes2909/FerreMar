<style>
.list-card{background:white;border-radius:12px;border:0.5px solid #e5e7eb;padding:28px 32px;margin:24px}
.list-card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;padding-bottom:16px;border-bottom:0.5px solid #e5e7eb}
.list-card-title{font-size:18px;font-weight:700;color:#1a1a1a}
.btn-new{padding:9px 18px;border-radius:8px;border:none;background:#f97316;color:white;font-size:13px;font-weight:600;cursor:pointer;text-decoration:none;display:flex;align-items:center;gap:6px}
.btn-new:hover{background:#ea6c0a}
</style>

<div class="list-card">
  <div class="list-card-header">
    <div class="list-card-title"><i class="fas fa-tags fa-fw" style="color:#f97316"></i> &nbsp; Lista de categorías</div>
    <a href="<?php echo APP_URL; ?>categoryNew/" class="btn-new"><i class="fas fa-plus"></i> Nueva categoría</a>
  </div>
  <?php
    use app\controllers\categoryController;
    $insCategoria = new categoryController();
    echo $insCategoria->listarCategoriaControlador($url[1], 15, $url[0], "");
  ?>
</div>
<script>const APP_URL = "<?php echo APP_URL; ?>";</script>