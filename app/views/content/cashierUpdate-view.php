<style>
.form-card{background:white;border-radius:12px;border:0.5px solid #e5e7eb;padding:28px 32px;margin:24px}
.form-card-title{font-size:18px;font-weight:700;color:#1a1a1a;margin-bottom:4px}
.form-card-subtitle{font-size:13px;color:#888;margin-bottom:24px;padding-bottom:16px;border-bottom:0.5px solid #e5e7eb}
.form-grid{display:grid;gap:16px;margin-bottom:16px}
.form-grid-3{grid-template-columns:1fr 1fr 1fr}
.form-group{display:flex;flex-direction:column;gap:5px}
.form-group label{font-size:12px;font-weight:600;color:#555}
.form-group label span.req{color:#f97316;margin-left:2px}
.form-group input{padding:10px 14px;border:1.5px solid #e5e7eb;border-radius:8px;font-size:13px;color:#1a1a1a;background:#fafafa;transition:border-color 0.2s,box-shadow 0.2s;outline:none;width:100%}
.form-group input:focus{border-color:#f97316;box-shadow:0 0 0 3px rgba(249,115,22,0.10);background:white}
.form-actions{display:flex;justify-content:flex-end;gap:10px;margin-top:24px;padding-top:16px;border-top:0.5px solid #e5e7eb}
.btn-update{padding:10px 24px;border-radius:8px;border:none;background:#378add;color:white;font-size:13px;font-weight:600;cursor:pointer;display:flex;align-items:center;gap:6px}
.btn-update:hover{background:#2970bb}
.form-note{font-size:11px;color:#aaa;margin-top:12px;text-align:right}
.form-note span{color:#f97316}
@media(max-width:700px){.form-grid-3{grid-template-columns:1fr}.form-card{margin:12px;padding:20px 16px}}
</style>

<div class="form-card">
  <?php include "./app/views/inc/btn_back.php"; ?>
  <?php
    $id = $insLogin->limpiarCadena($url[1]);
    $datos = $insLogin->seleccionarDatos("Unico","caja","caja_id",$id);
    if($datos->rowCount() == 1):
      $datos = $datos->fetch();
  ?>

  <div class="form-card-title"><i class="fas fa-cash-register fa-fw" style="color:#f97316"></i> &nbsp; Actualizar caja</div>
  <div class="form-card-subtitle">Editando: <strong>Caja #<?php echo $datos['caja_numero']; ?> — <?php echo $datos['caja_nombre']; ?></strong></div>

  <form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/cajaAjax.php" method="POST" autocomplete="off">
    <input type="hidden" name="modulo_caja" value="actualizar">
    <input type="hidden" name="caja_id" value="<?php echo $datos['caja_id']; ?>">

    <div class="form-grid form-grid-3">
      <div class="form-group">
        <label>Número de caja <span class="req">*</span></label>
        <input type="text" name="caja_numero" value="<?php echo $datos['caja_numero']; ?>" pattern="[0-9]{1,5}" maxlength="5" required>
      </div>
      <div class="form-group">
        <label>Nombre o código <span class="req">*</span></label>
        <input type="text" name="caja_nombre" value="<?php echo $datos['caja_nombre']; ?>" maxlength="70" required>
      </div>
      <div class="form-group">
        <label>Efectivo en caja <span class="req">*</span></label>
        <input type="text" name="caja_efectivo" value="<?php echo number_format($datos['caja_efectivo'],2,'.',''); ?>" pattern="[0-9., ]{1,25}" maxlength="25" required>
      </div>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn-update"><i class="fas fa-sync-alt"></i> Actualizar caja</button>
    </div>
    <div class="form-note">Los campos con <span>*</span> son obligatorios</div>
  </form>

  <?php else: ?>
    <?php include "./app/views/inc/error_alert.php"; ?>
  <?php endif; ?>
</div>
<script>const APP_URL = "<?php echo APP_URL; ?>";</script>