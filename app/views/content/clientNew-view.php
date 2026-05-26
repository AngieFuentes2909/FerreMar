<style>
.form-card{background:white;border-radius:12px;border:0.5px solid #e5e7eb;padding:28px 32px;margin:24px}
.form-card-title{font-size:18px;font-weight:700;color:#1a1a1a;margin-bottom:4px}
.form-card-subtitle{font-size:13px;color:#888;margin-bottom:24px;padding-bottom:16px;border-bottom:0.5px solid #e5e7eb}
.form-grid{display:grid;gap:16px;margin-bottom:16px}
.form-grid-2{grid-template-columns:1fr 1fr}
.form-grid-3{grid-template-columns:1fr 1fr 1fr}
.form-group{display:flex;flex-direction:column;gap:5px}
.form-group label{font-size:12px;font-weight:600;color:#555}
.form-group label span.req{color:#f97316;margin-left:2px}
.form-group input,.form-group select{padding:10px 14px;border:1.5px solid #e5e7eb;border-radius:8px;font-size:13px;color:#1a1a1a;background:#fafafa;transition:border-color 0.2s,box-shadow 0.2s;outline:none;width:100%}
.form-group input:focus,.form-group select:focus{border-color:#f97316;box-shadow:0 0 0 3px rgba(249,115,22,0.10);background:white}
.form-actions{display:flex;justify-content:flex-end;gap:10px;margin-top:24px;padding-top:16px;border-top:0.5px solid #e5e7eb}
.btn-reset{padding:10px 20px;border-radius:8px;border:1.5px solid #e5e7eb;background:white;color:#555;font-size:13px;font-weight:500;cursor:pointer;display:flex;align-items:center;gap:6px}
.btn-reset:hover{background:#f3f4f6}
.btn-save{padding:10px 24px;border-radius:8px;border:none;background:#f97316;color:white;font-size:13px;font-weight:600;cursor:pointer;display:flex;align-items:center;gap:6px}
.btn-save:hover{background:#ea6c0a}
.form-note{font-size:11px;color:#aaa;margin-top:12px;text-align:right}
.form-note span{color:#f97316}
@media(max-width:700px){.form-grid-2,.form-grid-3{grid-template-columns:1fr}.form-card{margin:12px;padding:20px 16px}}
</style>

<div class="form-card">
  <div class="form-card-title"><i class="fas fa-user fa-fw" style="color:#f97316"></i> &nbsp; Nuevo cliente</div>
  <div class="form-card-subtitle">Completa los datos para registrar un nuevo cliente</div>

  <form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/clienteAjax.php" method="POST" autocomplete="off">
    <input type="hidden" name="modulo_cliente" value="registrar">

    <div class="form-grid form-grid-2">
      <div class="form-group">
        <label>Tipo de documento <span class="req">*</span></label>
        <select name="cliente_tipo_documento" required>
          <option value="">Seleccione...</option>
          <?php echo $insLogin->generarSelect(DOCUMENTOS_USUARIOS,"VACIO"); ?>
        </select>
      </div>
      <div class="form-group">
        <label>Número de documento <span class="req">*</span></label>
        <input type="text" name="cliente_numero_documento" placeholder="Ej: 1234567890" pattern="[a-zA-Z0-9-]{7,30}" maxlength="30" required>
      </div>
    </div>

    <div class="form-grid form-grid-2">
      <div class="form-group">
        <label>Nombres <span class="req">*</span></label>
        <input type="text" name="cliente_nombre" placeholder="Ej: Juan Carlos" maxlength="40" required>
      </div>
      <div class="form-group">
        <label>Apellidos <span class="req">*</span></label>
        <input type="text" name="cliente_apellido" placeholder="Ej: García López" maxlength="40" required>
      </div>
    </div>

    <div class="form-grid form-grid-3">
      <div class="form-group">
        <label>Departamento <span class="req">*</span></label>
        <input type="text" name="cliente_provincia" placeholder="Ej: Atlántico" maxlength="30" required>
      </div>
      <div class="form-group">
        <label>Ciudad <span class="req">*</span></label>
        <input type="text" name="cliente_ciudad" placeholder="Ej: Barranquilla" maxlength="30" required>
      </div>
      <div class="form-group">
        <label>Dirección <span class="req">*</span></label>
        <input type="text" name="cliente_direccion" placeholder="Ej: Calle 58 #45-12" maxlength="70" required>
      </div>
    </div>

    <div class="form-grid form-grid-2">
      <div class="form-group">
        <label>Teléfono</label>
        <input type="text" name="cliente_telefono" placeholder="Ej: 3001234567" pattern="[0-9()+]{8,20}" maxlength="20">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="cliente_email" placeholder="Ej: correo@ejemplo.com" maxlength="70">
      </div>
    </div>

    <div class="form-actions">
      <button type="reset" class="btn-reset"><i class="fas fa-undo"></i> Limpiar</button>
      <button type="submit" class="btn-save"><i class="far fa-save"></i> Guardar cliente</button>
    </div>
    <div class="form-note">Los campos con <span>*</span> son obligatorios</div>
  </form>
</div>
<script>const APP_URL = "<?php echo APP_URL; ?>";</script>