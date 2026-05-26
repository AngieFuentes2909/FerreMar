<style>
.list-card{background:white;border-radius:12px;border:0.5px solid #e5e7eb;padding:28px 32px;margin:24px}
.list-card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;padding-bottom:16px;border-bottom:0.5px solid #e5e7eb}
.list-card-title{font-size:18px;font-weight:700;color:#1a1a1a}
.search-form{display:flex;gap:10px;margin-bottom:20px}
.search-input{flex:1;padding:10px 16px;border:1.5px solid #e5e7eb;border-radius:8px;font-size:13px;color:#1a1a1a;background:#fafafa;outline:none;transition:border-color 0.2s,box-shadow 0.2s}
.search-input:focus{border-color:#f97316;box-shadow:0 0 0 3px rgba(249,115,22,0.10);background:white}
.btn-search{padding:10px 20px;border-radius:8px;border:none;background:#f97316;color:white;font-size:13px;font-weight:600;cursor:pointer;display:flex;align-items:center;gap:6px}
.btn-search:hover{background:#ea6c0a}
.btn-clear{padding:10px 16px;border-radius:8px;border:1.5px solid #e5e7eb;background:white;color:#555;font-size:13px;font-weight:500;cursor:pointer;text-decoration:none;display:flex;align-items:center;gap:6px}
.btn-clear:hover{background:#f3f4f6}
.search-tag{display:inline-flex;align-items:center;gap:8px;background:#fff7ed;border:1px solid #fed7aa;border-radius:20px;padding:6px 14px;font-size:13px;color:#f97316;margin-bottom:16px}
</style>

<div class="list-card">
  <div class="list-card-header">
    <div class="list-card-title"><i class="fas fa-search fa-fw" style="color:#f97316"></i> &nbsp; Buscar clientes</div>
  </div>

  <?php
    use app\controllers\clientController;
    $insCliente = new clientController();
    if(!isset($_SESSION[$url[0]]) && empty($_SESSION[$url[0]])):
  ?>

  <form class="FormularioAjax search-form" action="<?php echo APP_URL; ?>app/ajax/buscadorAjax.php" method="POST" autocomplete="off">
    <input type="hidden" name="modulo_buscador" value="buscar">
    <input type="hidden" name="modulo_url" value="<?php echo $url[0]; ?>">
    <input class="search-input" type="text" name="txt_buscador" placeholder="Buscar por nombre, documento..." maxlength="30" required>
    <button type="submit" class="btn-search"><i class="fas fa-search"></i> Buscar</button>
  </form>

  <?php else: ?>

  <div class="search-tag">
    <i class="fas fa-search"></i>
    Buscando: <strong><?php echo $_SESSION[$url[0]]; ?></strong>
  </div>
  <form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/buscadorAjax.php" method="POST" autocomplete="off">
    <input type="hidden" name="modulo_buscador" value="eliminar">
    <input type="hidden" name="modulo_url" value="<?php echo $url[0]; ?>">
    <button type="submit" class="btn-clear"><i class="fas fa-times"></i> Limpiar búsqueda</button>
  </form>
  <br>
  <?php echo $insCliente->listarClienteControlador($url[1], 15, $url[0], $_SESSION[$url[0]]); ?>

  <?php endif; ?>
</div>
<script>const APP_URL = "<?php echo APP_URL; ?>";</script>