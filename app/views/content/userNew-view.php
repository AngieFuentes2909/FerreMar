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
.file-upload-area{border:2px dashed #e5e7eb;border-radius:10px;padding:20px;text-align:center;cursor:pointer;transition:border-color 0.2s,background 0.2s;position:relative}
.file-upload-area:hover{border-color:#f97316;background:#fff7ed}
.file-upload-area input[type="file"]{position:absolute;inset:0;opacity:0;cursor:pointer;width:100%;height:100%}
.file-upload-icon{font-size:24px;color:#ccc;margin-bottom:6px}
.file-upload-text{font-size:13px;color:#888}
.file-upload-hint{font-size:11px;color:#bbb;margin-top:4px}
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
  <div class="form-card-title"><i class="fas fa-user-tie fa-fw" style="color:#f97316"></i> &nbsp; Nuevo usuario</div>
  <div class="form-card-subtitle">Completa los datos para registrar un nuevo usuario del sistema</div>

  <form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php" method="POST" autocomplete="off" enctype="multipart/form-data">
    <input type="hidden" name="modulo_usuario" value="registrar">

    <div class="form-grid form-grid-2">
      <div class="form-group">
        <label>Nombres <span class="req">*</span></label>
        <input type="text" name="usuario_nombre" placeholder="Ej: Juan Carlos" maxlength="40" required>
      </div>
      <div class="form-group">
        <label>Apellidos <span class="req">*</span></label>
        <input type="text" name="usuario_apellido" placeholder="Ej: García López" maxlength="40" required>
      </div>
    </div>

    <div class="form-grid form-grid-2">
      <div class="form-group">
        <label>Usuario <span class="req">*</span></label>
        <input type="text" name="usuario_usuario" placeholder="Ej: jgarcia" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="usuario_email" placeholder="Ej: correo@ejemplo.com" maxlength="70">
      </div>
    </div>

    <div class="form-grid form-grid-2">
      <div class="form-group">
        <label>Contraseña <span class="req">*</span></label>
        <input type="password" name="usuario_clave_1" placeholder="Mínimo 7 caracteres" maxlength="100" required>
      </div>
      <div class="form-group">
        <label>Repetir contraseña <span class="req">*</span></label>
        <input type="password" name="usuario_clave_2" placeholder="Repite la contraseña" maxlength="100" required>
      </div>
    </div>

    <div class="form-grid form-grid-3">
      <div class="form-group">
        <label>Cargo <span class="req">*</span></label>
        <select name="usuario_cargo" id="usuario_cargo" required>
          <option value="">Seleccione...</option>
          <option value="Administrador">Administrador</option>
          <option value="Vendedor">Vendedor</option>
          <option value="Bodeguero">Bodeguero</option>
        </select>
      </div>
      <div class="form-group" id="cajaDiv">
        <label>Caja de ventas</label>
        <select name="usuario_caja" id="usuario_caja">
          <option value="">Seleccione...</option>
          <?php
            $datos_cajas = $insLogin->seleccionarDatos("Normal","caja","*",0);
            while($campos_caja = $datos_cajas->fetch()){
              echo '<option value="'.$campos_caja['caja_id'].'">Caja No.'.$campos_caja['caja_numero'].' - '.$campos_caja['caja_nombre'].'</option>';
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Foto de perfil</label>
        <div class="file-upload-area">
          <input type="file" name="usuario_foto" accept=".jpg,.png,.jpeg" onchange="updateFileName(this)">
          <div class="file-upload-icon"><i class="fas fa-camera"></i></div>
          <div class="file-upload-text" id="uploadText">Seleccionar foto</div>
          <div class="file-upload-hint">JPG, PNG — máx 5MB</div>
        </div>
      </div>
    </div>

    <div class="form-actions">
      <button type="reset" class="btn-reset" onclick="resetUpload()"><i class="fas fa-undo"></i> Limpiar</button>
      <button type="submit" class="btn-save"><i class="far fa-save"></i> Guardar usuario</button>
    </div>
    <div class="form-note">Los campos con <span>*</span> son obligatorios</div>
  </form>
</div>

<script>
const APP_URL = "<?php echo APP_URL; ?>";

document.getElementById('usuario_cargo').addEventListener('change', function(){
  var cargo = this.value;
  var cajaDiv = document.getElementById('cajaDiv');
  var cajaField = document.getElementById('usuario_caja');
  if(cargo === 'Vendedor'){
    cajaDiv.style.display = 'flex';
    cajaField.setAttribute('required', true);
  } else {
    cajaDiv.style.display = 'none';
    cajaField.removeAttribute('required');
    cajaField.value = '';
  }
});
document.getElementById('usuario_cargo').dispatchEvent(new Event('change'));

function updateFileName(input){
  const text = document.getElementById('uploadText');
  if(input.files && input.files[0]){
    text.textContent = input.files[0].name;
    text.style.color = '#f97316';
  }
}
function resetUpload(){
  const text = document.getElementById('uploadText');
  text.textContent = 'Seleccionar foto';
  text.style.color = '#888';
}
</script>