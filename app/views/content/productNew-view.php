<style>
  .form-card {
    background: white;
    border-radius: 12px;
    border: 0.5px solid #e5e7eb;
    padding: 28px 32px;
    margin: 24px;
  }
  .form-card-title {
    font-size: 18px;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 4px;
  }
  .form-card-subtitle {
    font-size: 13px;
    color: #888;
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 0.5px solid #e5e7eb;
  }
  .form-grid {
    display: grid;
    gap: 16px;
    margin-bottom: 16px;
  }
  .form-grid-2 { grid-template-columns: 1fr 1fr; }
  .form-grid-3 { grid-template-columns: 1fr 1fr 1fr; }
  .form-grid-4 { grid-template-columns: 1fr 1fr 1fr 1fr; }
  .form-group { display: flex; flex-direction: column; gap: 5px; }
  .form-group label {
    font-size: 12px;
    font-weight: 600;
    color: #555;
  }
  .form-group label span.req {
    color: #f97316;
    margin-left: 2px;
  }
  .form-group input,
  .form-group select {
    padding: 10px 14px;
    border: 1.5px solid #e5e7eb;
    border-radius: 8px;
    font-size: 13px;
    color: #1a1a1a;
    background: #fafafa;
    transition: border-color 0.2s, box-shadow 0.2s;
    outline: none;
    width: 100%;
  }
  .form-group input:focus,
  .form-group select:focus {
    border-color: #f97316;
    box-shadow: 0 0 0 3px rgba(249,115,22,0.10);
    background: white;
  }
  .form-group select { cursor: pointer; }

  /* File upload */
  .file-upload-area {
    border: 2px dashed #e5e7eb;
    border-radius: 10px;
    padding: 20px;
    text-align: center;
    cursor: pointer;
    transition: border-color 0.2s, background 0.2s;
    position: relative;
  }
  .file-upload-area:hover {
    border-color: #f97316;
    background: #fff7ed;
  }
  .file-upload-area input[type="file"] {
    position: absolute;
    inset: 0;
    opacity: 0;
    cursor: pointer;
    width: 100%;
    height: 100%;
  }
  .file-upload-icon { font-size: 24px; color: #ccc; margin-bottom: 6px; }
  .file-upload-text { font-size: 13px; color: #888; }
  .file-upload-hint { font-size: 11px; color: #bbb; margin-top: 4px; }

  /* Buttons */
  .form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 24px;
    padding-top: 16px;
    border-top: 0.5px solid #e5e7eb;
  }
  .btn-reset {
    padding: 10px 20px;
    border-radius: 8px;
    border: 1.5px solid #e5e7eb;
    background: white;
    color: #555;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.2s;
    display: flex;
    align-items: center;
    gap: 6px;
  }
  .btn-reset:hover { background: #f3f4f6; }
  .btn-save {
    padding: 10px 24px;
    border-radius: 8px;
    border: none;
    background: #f97316;
    color: white;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
    display: flex;
    align-items: center;
    gap: 6px;
  }
  .btn-save:hover { background: #ea6c0a; }

  .form-note {
    font-size: 11px;
    color: #aaa;
    margin-top: 12px;
    text-align: right;
  }
  .form-note span { color: #f97316; }

  @media (max-width: 700px) {
    .form-grid-2,
    .form-grid-3,
    .form-grid-4 { grid-template-columns: 1fr; }
    .form-card { margin: 12px; padding: 20px 16px; }
  }
</style>

<div class="form-card">
  <div class="form-card-title"><i class="fas fa-box fa-fw" style="color:#f97316;"></i> &nbsp; Nuevo producto</div>
  <div class="form-card-subtitle">Completa los datos para registrar un nuevo producto en el inventario</div>

  <form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/productoAjax.php" method="POST" autocomplete="off" enctype="multipart/form-data">
    <input type="hidden" name="modulo_producto" value="registrar">

    <!-- Fila 1: Código y Nombre -->
    <div class="form-grid form-grid-2">
      <div class="form-group">
        <label>Código de barra <span class="req">*</span></label>
        <input type="text" name="producto_codigo" placeholder="Ej: 1234568865" pattern="[a-zA-Z0-9- ]{1,77}" maxlength="77" required>
      </div>
      <div class="form-group">
        <label>Nombre del producto <span class="req">*</span></label>
        <input type="text" name="producto_nombre" placeholder="Ej: Destornillador Phillips" maxlength="100" required>
      </div>
    </div>

    <!-- Fila 2: Precios y Stock -->
    <div class="form-grid form-grid-3">
      <div class="form-group">
        <label>Precio de compra <span class="req">*</span></label>
        <input type="text" name="producto_precio_compra" placeholder="Ej: 20.000 o 20000" pattern="[0-9., ]{1,25}" maxlength="25" value="0" required>
      </div>
      <div class="form-group">
        <label>Precio de venta <span class="req">*</span></label>
        <input type="text" name="producto_precio_venta" placeholder="Ej: 25.000 o 25000" pattern="[0-9., ]{1,25}" maxlength="25" value="0" required>
      </div>
      <div class="form-group">
        <label>Stock / Existencias <span class="req">*</span></label>
        <input type="text" name="producto_stock" placeholder="Ej: 50" pattern="[0-9]{1,22}" maxlength="22" required>
      </div>
    </div>

    <!-- Fila 3: Marca, Modelo, Presentación, Categoría -->
    <div class="form-grid form-grid-4">
      <div class="form-group">
        <label>Marca</label>
        <input type="text" name="producto_marca" placeholder="Ej: Stanley" maxlength="30">
      </div>
      <div class="form-group">
        <label>Modelo</label>
        <input type="text" name="producto_modelo" placeholder="Ej: ST-100" maxlength="30">
      </div>
      <div class="form-group">
        <label>Presentación <span class="req">*</span></label>
        <select name="producto_unidad" required>
          <option value="">Seleccione...</option>
          <?php echo $insLogin->generarSelect(PRODUCTO_UNIDAD,"VACIO"); ?>
        </select>
      </div>
      <div class="form-group">
        <label>Categoría <span class="req">*</span></label>
        <select name="producto_categoria" required>
          <option value="">Seleccione...</option>
          <?php
            $datos_categorias = $insLogin->seleccionarDatos("Normal","categoria","*",0);
            $cc = 1;
            while($campos_categoria = $datos_categorias->fetch()){
              echo '<option value="'.$campos_categoria['categoria_id'].'">'.$campos_categoria['categoria_nombre'].'</option>';
              $cc++;
            }
          ?>
        </select>
      </div>
    </div>

    <!-- Fila 4: Foto -->
    <div class="form-group">
      <label>Foto del producto</label>
      <div class="file-upload-area" id="uploadArea">
        <input type="file" name="producto_foto" accept=".jpg,.png,.jpeg" onchange="updateFileName(this)">
        <div class="file-upload-icon"><i class="fas fa-cloud-upload-alt"></i></div>
        <div class="file-upload-text" id="uploadText">Haz clic o arrastra una imagen aquí</div>
        <div class="file-upload-hint">JPG, JPEG, PNG — máximo 5MB</div>
      </div>
    </div>

    <!-- Acciones -->
    <div class="form-actions">
      <button type="reset" class="btn-reset" onclick="resetUpload()">
        <i class="fas fa-undo"></i> Limpiar
      </button>
      <button type="submit" class="btn-save">
        <i class="far fa-save"></i> Guardar producto
      </button>
    </div>

    <div class="form-note">Los campos con <span>*</span> son obligatorios</div>
  </form>
</div>

<script>
  const APP_URL = "<?php echo APP_URL; ?>";

  function updateFileName(input) {
    const text = document.getElementById('uploadText');
    if (input.files && input.files[0]) {
      text.textContent = input.files[0].name;
      text.style.color = '#f97316';
    }
  }
  function resetUpload() {
    const text = document.getElementById('uploadText');
    text.textContent = 'Haz clic o arrastra una imagen aquí';
    text.style.color = '#888';
  }
</script>