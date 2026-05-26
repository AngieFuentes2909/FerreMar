<style>
.form-card{background:white;border-radius:12px;border:0.5px solid #e5e7eb;padding:28px 32px;margin:24px}
.form-card-title{font-size:18px;font-weight:700;color:#1a1a1a;margin-bottom:4px}
.form-card-subtitle{font-size:13px;color:#888;margin-bottom:24px;padding-bottom:16px;border-bottom:0.5px solid #e5e7eb}
.form-grid{display:grid;gap:16px;margin-bottom:16px}
.form-grid-2{grid-template-columns:1fr 1fr}
.form-group{display:flex;flex-direction:column;gap:5px}
.form-group label{font-size:12px;font-weight:600;color:#555}
.form-group label span.req{color:#f97316;margin-left:2px}
.form-group input,.form-group select{padding:10px 14px;border:1.5px solid #e5e7eb;border-radius:8px;font-size:13px;color:#1a1a1a;background:#fafafa;transition:border-color 0.2s,box-shadow 0.2s;outline:none;width:100%}
.form-group input:focus,.form-group select:focus{border-color:#f97316;box-shadow:0 0 0 3px rgba(249,115,22,0.10);background:white}
.form-actions{display:flex;justify-content:flex-end;gap:10px;margin-top:24px;padding-top:16px;border-top:0.5px solid #e5e7eb}
.btn-update{padding:10px 24px;border-radius:8px;border:none;background:#378add;color:white;font-size:13px;font-weight:600;cursor:pointer;display:flex;align-items:center;gap:6px}
.btn-update:hover{background:#2970bb}
.form-note{font-size:11px;color:#aaa;margin-top:12px;text-align:right}
.form-note span{color:#f97316}
.form-section-label{font-size:11px;font-weight:700;color:#f97316;text-transform:uppercase;letter-spacing:0.08em;margin-bottom:8px;margin-top:8px}
.form-hint{font-size:12px;color:#888;background:#f9fafb;border-radius:8px;padding:10px 14px;margin-bottom:12px;border-left:3px solid #e5e7eb}
.user-profile-header{display:flex;align-items:center;gap:16px;margin-bottom:24px;padding-bottom:16px;border-bottom:0.5px solid #e5e7eb}
.user-avatar{width:60px;height:60px;border-radius:50%;object-fit:cover;border:2px solid #f97316}
.user-fullname{font-size:16px;font-weight:700;color:#1a1a1a}
.user-role{font-size:12px;color:#888}
@media(max-width:700px){.form-grid-2{grid-template-columns:1fr}.form-card{margin:12px;padding:20px 16px}}
</style>

<div class="form-card">
  <?php include "./app/views/inc/btn_back.php"; ?>
  <?php
    $id = $insLogin->limpiarCadena($url[1]);
    $datos = $insLogin->seleccionarDatos("Unico","usuario","usuario_id",$id);
    if($datos->rowCount() == 1):
      $datos = $datos->fetch();
  ?>

  <!-- Header con foto y nombre -->
  <div class="user-profile-header">
    <?php if(is_file("./app/views/fotos/".$datos['usuario_foto'])): ?>
      <img class="user-avatar" src="<?php echo APP_URL; ?>app/views/fotos/<?php echo $datos['usuario_foto']; ?>">
    <?php else: ?>
      <img class="user-avatar" src="<?php echo APP_URL; ?>app/views/fotos/default.png">
    <?php endif; ?>
    <div>
      <div class="user-fullname"><?php echo $datos['usuario_nombre']." ".$datos['usuario_apellido']; ?></div>
      <div class="user-role"><?php echo $datos['usuario_cargo'] ?? 'Usuario'; ?></div>
    </div>
  </div>

  <div class="form-card-title">
    <i class="fas fa-user-tie fa-fw" style="color:#f97316"></i> &nbsp;
    <?php echo ($id == $_SESSION['id']) ? 'Mi cuenta' : 'Actualizar usuario'; ?>
  </div>
  <div class="form-card-subtitle">Actualiza la información del usuario</div>

  <form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php" method="POST" autocomplete="off">
    <input type="hidden" name="modulo_usuario" value="actualizar">
    <input type="hidden" name="usuario_id" value="<?php echo $datos['usuario_id']; ?>">

    <!-- Datos personales -->
    <div class="form-section-label">Datos personales</div>
    <div class="form-grid form-grid-2">
      <div class="form-group">
        <label>Nombres <span class="req">*</span></label>
        <input type="text" name="usuario_nombre" value="<?php echo $datos['usuario_nombre']; ?>" maxlength="40" required>
      </div>
      <div class="form-group">
        <label>Apellidos <span class="req">*</span></label>
        <input type="text" name="usuario_apellido" value="<?php echo $datos['usuario_apellido']; ?>" maxlength="40" required>
      </div>
    </div>
    <div class="form-grid form-grid-2">
      <div class="form-group">
        <label>Usuario <span class="req">*</span></label>
        <input type="text" name="usuario_usuario" value="<?php echo $datos['usuario_usuario']; ?>" maxlength="20" required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="usuario_email" value="<?php echo $datos['usuario_email']; ?>" maxlength="70">
      </div>
    </div>
    <div class="form-grid">
      <div class="form-group">
        <label>Caja de ventas</label>
        <select name="usuario_caja">
          <?php
            $datos_cajas = $insLogin->seleccionarDatos("Normal","caja","*",0);
            while($campos_caja = $datos_cajas->fetch()){
              $selected = ($campos_caja['caja_id'] == $datos['caja_id']) ? 'selected' : '';
              echo '<option value="'.$campos_caja['caja_id'].'" '.$selected.'>Caja No.'.$campos_caja['caja_numero'].' - '.$campos_caja['caja_nombre'].'</option>';
            }
          ?>
        </select>
      </div>
    </div>

    <!-- Nueva contraseña -->
    <div class="form-section-label" style="margin-top:16px">Cambiar contraseña</div>
    <div class="form-hint">Deja estos campos vacíos si no deseas cambiar la contraseña</div>
    <div class="form-grid form-grid-2">
      <div class="form-group">
        <label>Nueva contraseña</label>
        <input type="password" name="usuario_clave_1" placeholder="Mínimo 7 caracteres" maxlength="100">
      </div>
      <div class="form-group">
        <label>Repetir contraseña</label>
        <input type="password" name="usuario_clave_2" placeholder="Repite la contraseña" maxlength="100">
      </div>
    </div>

    <!-- Confirmación -->
    <div class="form-section-label" style="margin-top:16px">Confirmación de identidad</div>
    <div class="form-hint">Ingresa tu usuario y contraseña actual para confirmar los cambios</div>
    <div class="form-grid form-grid-2">
      <div class="form-group">
        <label>Tu usuario <span class="req">*</span></label>
        <input type="text" name="administrador_usuario" placeholder="Tu usuario actual" maxlength="20" required>
      </div>
      <div class="form-group">
        <label>Tu contraseña <span class="req">*</span></label>
        <input type="password" name="administrador_clave" placeholder="Tu contraseña actual" maxlength="100" required>
      </div>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn-update"><i class="fas fa-sync-alt"></i> Actualizar datos</button>
    </div>
    <div class="form-note">Los campos con <span>*</span> son obligatorios</div>
  </form>

  <?php else: ?>
    <?php include "./app/views/inc/error_alert.php"; ?>
  <?php endif; ?>
</div>
<script>const APP_URL = "<?php echo APP_URL; ?>";</script>