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
.btn-reset{padding:10px 20px;border-radius:8px;border:1.5px solid #e5e7eb;background:white;color:#555;font-size:13px;font-weight:500;cursor:pointer;display:flex;align-items:center;gap:6px}
.btn-reset:hover{background:#f3f4f6}
.btn-save{padding:10px 24px;border-radius:8px;border:none;background:#f97316;color:white;font-size:13px;font-weight:600;cursor:pointer;display:flex;align-items:center;gap:6px}
.btn-save:hover{background:#ea6c0a}
.form-note{font-size:11px;color:#aaa;margin-top:12px;text-align:right}
.form-note span{color:#f97316}
@media(max-width:700px){.form-grid-3{grid-template-columns:1fr}.form-card{margin:12px;padding:20px 16px}}
</style>

<div class="form-card">
  <div class="form-card-title"><i class="fas fa-cash-register fa-fw" style="color:#f97316"></i> &nbsp; Nueva caja</div>
  <div class="form-card-subtitle">Registra una nueva caja de ventas en el sistema</div>

  <form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/cajaAjax.php" method="POST" autocomplete="off">
    <input type="hidden" name="modulo_caja" value="registrar">

    <div class="form-grid form-grid-3">
      <div class="form-group">
        <label>Número de caja <span class="req">*</span></label>
        <input type="text" name="caja_numero" placeholder="Ej: 1" pattern="[0-9]{1,5}" maxlength="5" required>
      </div>
      <div class="form-group">
        <label>Nombre o código <span class="req">*</span></label>
        <input type="text" name="caja_nombre" placeholder="Ej: Caja Principal" maxlength="70" required>
      </div>
      <div class="form-group">
        <label>Efectivo inicial <span class="req">*</span></label>
        <input type="text" name="caja_efectivo" placeholder="Ej: 100.000 o 100000" pattern="[0-9., ]{1,25}" maxlength="25" value="0" required>
      </div>
    </div>

    <div class="form-actions">
      <button type="reset" class="btn-reset"><i class="fas fa-undo"></i> Limpiar</button>
      <button type="submit" class="btn-save"><i class="far fa-save"></i> Guardar caja</button>
    </div>
    <div class="form-note">Los campos con <span>*</span> son obligatorios</div>
  </form>
</div>
<script>const APP_URL = "<?php echo APP_URL; ?>";</script>