<style>
.sale-layout{display:grid;grid-template-columns:1fr 340px;gap:20px;padding:20px 24px;align-items:start}
.sale-left{display:flex;flex-direction:column;gap:16px}
.sale-right{position:sticky;top:60px}

/* Card base */
.sale-card{background:white;border-radius:12px;border:0.5px solid #e5e7eb;padding:20px}
.sale-card-title{font-size:14px;font-weight:700;color:#1a1a1a;margin-bottom:12px;display:flex;align-items:center;gap:8px}

/* Barra de búsqueda */
.sale-search-bar{display:flex;gap:10px;align-items:center}
.sale-search-input{flex:1;padding:10px 16px;border:1.5px solid #e5e7eb;border-radius:8px;font-size:13px;color:#1a1a1a;background:#fafafa;outline:none;transition:border-color 0.2s,box-shadow 0.2s}
.sale-search-input:focus{border-color:#f97316;box-shadow:0 0 0 3px rgba(249,115,22,0.10);background:white}
.btn-add{padding:10px 18px;border-radius:8px;border:none;background:#f97316;color:white;font-size:13px;font-weight:600;cursor:pointer;display:flex;align-items:center;gap:6px;white-space:nowrap}
.btn-add:hover{background:#ea6c0a}
.btn-search-prod{padding:10px 16px;border-radius:8px;border:1.5px solid #e5e7eb;background:white;color:#555;font-size:13px;font-weight:500;cursor:pointer;display:flex;align-items:center;gap:6px;white-space:nowrap}
.btn-search-prod:hover{background:#f3f4f6}

/* Alerta producto agregado */
.sale-alert-success{background:#eaf3de;border:1px solid #c3e6a0;border-radius:8px;padding:10px 16px;font-size:13px;color:#3b6d11;margin-bottom:4px}
.sale-alert-info{background:#e6f1fb;border:1px solid #b3d4f5;border-radius:8px;padding:16px;font-size:13px;color:#185fa5;margin-bottom:4px}
.sale-alert-info h4{font-weight:700;text-align:center;margin-bottom:8px}
.sale-alert-actions{display:flex;gap:10px;justify-content:center;margin-top:12px}
.btn-print{padding:9px 18px;border-radius:8px;border:1.5px solid #b3d4f5;background:white;color:#185fa5;font-size:13px;font-weight:500;cursor:pointer;display:flex;align-items:center;gap:6px}
.btn-print:hover{background:#e6f1fb}

/* Tabla de productos */
.sale-table{width:100%;border-collapse:collapse;font-size:13px}
.sale-table th{background:#f9fafb;padding:10px 12px;text-align:left;font-size:11px;font-weight:700;color:#888;text-transform:uppercase;letter-spacing:0.05em;border-bottom:0.5px solid #e5e7eb}
.sale-table td{padding:10px 12px;border-bottom:0.5px solid #f3f4f6;color:#333;vertical-align:middle}
.sale-table tr:last-child td{border-bottom:none}
.sale-table .total-row td{font-weight:700;background:#f9fafb;color:#1a1a1a}
.sale-table .empty-row td{text-align:center;color:#aaa;padding:24px}
.qty-input{width:70px;padding:6px 10px;border:1.5px solid #e5e7eb;border-radius:6px;font-size:13px;text-align:center;outline:none}
.qty-input:focus{border-color:#f97316}
.btn-update-qty{padding:6px 10px;border-radius:6px;border:none;background:#eaf3de;color:#3b6d11;cursor:pointer;font-size:12px}
.btn-update-qty:hover{background:#d1eab8}
.btn-remove{padding:6px 10px;border-radius:6px;border:none;background:#fef2f2;color:#ef4444;cursor:pointer;font-size:12px}
.btn-remove:hover{background:#fee2e2}

/* Panel derecho */
.sale-panel-title{font-size:16px;font-weight:700;color:#1a1a1a;margin-bottom:16px;padding-bottom:12px;border-bottom:0.5px solid #e5e7eb}
.sale-field{margin-bottom:14px}
.sale-field label{display:block;font-size:11px;font-weight:700;color:#888;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:5px}
.sale-field label span.req{color:#f97316}
.sale-field input,.sale-field select{width:100%;padding:9px 14px;border:1.5px solid #e5e7eb;border-radius:8px;font-size:13px;color:#1a1a1a;background:#fafafa;outline:none;transition:border-color 0.2s}
.sale-field input:focus,.sale-field select:focus{border-color:#f97316;background:white}
.sale-field input[readonly]{background:#f3f4f6;color:#888}
.client-field{display:flex;gap:6px}
.client-field input{flex:1}
.btn-client-add{padding:9px 12px;border-radius:8px;border:none;background:#e6f1fb;color:#185fa5;cursor:pointer;font-size:13px}
.btn-client-add:hover{background:#b3d4f5}
.btn-client-remove{padding:9px 12px;border-radius:8px;border:none;background:#fef2f2;color:#ef4444;cursor:pointer;font-size:13px}
.btn-client-remove:hover{background:#fee2e2}
.sale-total{background:#fff7ed;border:1px solid #fed7aa;border-radius:10px;padding:14px;text-align:center;margin:16px 0}
.sale-total-label{font-size:11px;font-weight:700;color:#888;text-transform:uppercase;letter-spacing:0.05em}
.sale-total-amount{font-size:22px;font-weight:700;color:#f97316;margin-top:4px}
.btn-save-sale{width:100%;padding:13px;border-radius:8px;border:none;background:#f97316;color:white;font-size:14px;font-weight:700;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;transition:background 0.2s}
.btn-save-sale:hover{background:#ea6c0a}
.sale-note{font-size:11px;color:#aaa;text-align:center;margin-top:10px}
.sale-note span{color:#f97316}

/* Warning */
.sale-warning{background:#fef3cd;border:1px solid #fde68a;border-radius:10px;padding:16px;color:#92400e;font-size:13px}

/* Modal */
.modal-pro{display:none;position:fixed;inset:0;background:rgba(0,0,0,0.5);z-index:1000;align-items:center;justify-content:center}
.modal-pro.active{display:flex}
.modal-pro-card{background:white;border-radius:12px;width:100%;max-width:500px;max-height:80vh;overflow:hidden;display:flex;flex-direction:column;margin:20px}
.modal-pro-header{padding:16px 20px;border-bottom:0.5px solid #e5e7eb;display:flex;align-items:center;justify-content:space-between}
.modal-pro-title{font-size:15px;font-weight:700;color:#1a1a1a}
.modal-pro-close{background:none;border:none;font-size:18px;cursor:pointer;color:#888;padding:4px 8px;border-radius:6px}
.modal-pro-close:hover{background:#f3f4f6;color:#333}
.modal-pro-body{padding:20px;overflow-y:auto;flex:1}
.modal-search-bar{display:flex;gap:8px;margin-bottom:16px}
.modal-search-input{flex:1;padding:9px 14px;border:1.5px solid #e5e7eb;border-radius:8px;font-size:13px;outline:none}
.modal-search-input:focus{border-color:#f97316}
.btn-modal-search{padding:9px 16px;border-radius:8px;border:none;background:#f97316;color:white;font-size:13px;font-weight:600;cursor:pointer}

@media(max-width:900px){.sale-layout{grid-template-columns:1fr}.sale-right{position:static}}
</style>

<div class="sale-layout">

<?php
  $check_empresa = $insLogin->seleccionarDatos("Normal","empresa LIMIT 1","*",0);
  if($check_empresa->rowCount() == 1):
    $check_empresa = $check_empresa->fetch();
?>

  <!-- COLUMNA IZQUIERDA -->
  <div class="sale-left">

    <!-- Barra agregar producto -->
    <div class="sale-card">
      <div class="sale-card-title"><i class="fas fa-barcode" style="color:#f97316"></i> Agregar producto</div>
      <p style="font-size:12px;color:#888;margin-bottom:12px">Escribe el código de barras o usa el buscador para agregar productos a la venta</p>
      <form id="sale-barcode-form" autocomplete="off">
        <div class="sale-search-bar">
          <button type="button" class="btn-search-prod js-modal-trigger" data-target="modal-js-product">
            <i class="fas fa-search"></i> Buscar producto
          </button>
          <input class="sale-search-input" type="text" pattern="[a-zA-Z0-9- ]{1,70}" maxlength="70" autofocus placeholder="Código de barras" id="sale-barcode-input">
          <button type="submit" class="btn-add"><i class="far fa-check-circle"></i> Agregar</button>
        </div>
      </form>
    </div>

    <!-- Alertas -->
    <?php if(isset($_SESSION['alerta_producto_agregado']) && $_SESSION['alerta_producto_agregado'] != ""): ?>
    <div class="sale-alert-success"><i class="fas fa-check-circle"></i> <?php echo $_SESSION['alerta_producto_agregado']; unset($_SESSION['alerta_producto_agregado']); ?></div>
    <?php endif; ?>

    <?php if(isset($_SESSION['venta_codigo_factura']) && $_SESSION['venta_codigo_factura'] != ""): ?>
    <div class="sale-alert-info">
      <h4><i class="fas fa-check-circle"></i> Venta realizada con éxito</h4>
      <p style="text-align:center">¿Qué deseas hacer a continuación?</p>
      <div class="sale-alert-actions">
        <button type="button" class="btn-print" onclick="print_ticket('<?php echo APP_URL."app/pdf/ticket.php?code=".$_SESSION['venta_codigo_factura']; ?>')">
          <i class="fas fa-receipt"></i> Imprimir ticket
        </button>
        <button type="button" class="btn-print" onclick="print_invoice('<?php echo APP_URL."app/pdf/invoice.php?code=".$_SESSION['venta_codigo_factura']; ?>')">
          <i class="fas fa-file-invoice-dollar"></i> Imprimir factura
        </button>
      </div>
    </div>
    <?php unset($_SESSION['venta_codigo_factura']); endif; ?>

    <!-- Tabla productos -->
    <div class="sale-card">
      <div class="sale-card-title"><i class="fas fa-shopping-cart" style="color:#f97316"></i> Productos en la venta</div>
      <div style="overflow-x:auto">
        <table class="sale-table">
          <thead>
            <tr>
              <th>#</th>
              <th>Código</th>
              <th>Producto</th>
              <th>Cant.</th>
              <th>Precio</th>
              <th>Subtotal</th>
              <th>Actualizar</th>
              <th>Remover</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if(isset($_SESSION['datos_producto_venta']) && count($_SESSION['datos_producto_venta']) >= 1):
                $_SESSION['venta_total'] = 0;
                $cc = 1;
                foreach($_SESSION['datos_producto_venta'] as $productos):
            ?>
            <tr>
              <td><?php echo $cc; ?></td>
              <td><?php echo $productos['producto_codigo']; ?></td>
              <td><?php echo $productos['venta_detalle_descripcion']; ?></td>
              <td>
                <input class="qty-input sale_input-cant" value="<?php echo $productos['venta_detalle_cantidad']; ?>" id="sale_input_<?php echo str_replace(" ","_",$productos['producto_codigo']); ?>" type="number" min="1" onchange="actualizar_cantidad_directa('#sale_input_<?php echo str_replace(" ","_",$productos['producto_codigo']); ?>','<?php echo $productos['producto_codigo']; ?>')" onkeydown="if(event.key === 'Enter') { event.preventDefault(); this.blur(); }">
              </td>
              <td><?php echo MONEDA_SIMBOLO.number_format($productos['venta_detalle_precio_venta'],MONEDA_DECIMALES,MONEDA_SEPARADOR_DECIMAL,MONEDA_SEPARADOR_MILLAR)." ".MONEDA_NOMBRE; ?></td>
              <td><?php echo MONEDA_SIMBOLO.number_format($productos['venta_detalle_total'],MONEDA_DECIMALES,MONEDA_SEPARADOR_DECIMAL,MONEDA_SEPARADOR_MILLAR)." ".MONEDA_NOMBRE; ?></td>
              <td>
                <button type="button" class="btn-update-qty" onclick="actualizar_cantidad_directa('#sale_input_<?php echo str_replace(" ","_",$productos['producto_codigo']); ?>','<?php echo $productos['producto_codigo']; ?>')" title="Actualizar">
                  <i class="fas fa-sync-alt"></i>
                </button>
              </td>
              <td>
                <form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/ventaAjax.php" method="POST" autocomplete="off">
                  <input type="hidden" name="producto_codigo" value="<?php echo $productos['producto_codigo']; ?>">
                  <input type="hidden" name="modulo_venta" value="remover_producto">
                  <button type="submit" class="btn-remove"><i class="fas fa-trash-restore"></i></button>
                </form>
              </td>
            </tr>
            <?php
                $cc++;
                $_SESSION['venta_total'] += $productos['venta_detalle_total'];
              endforeach;
            ?>
            <tr class="total-row">
              <td colspan="4"></td>
              <td>TOTAL</td>
              <td><?php echo MONEDA_SIMBOLO.number_format($_SESSION['venta_total'],MONEDA_DECIMALES,MONEDA_SEPARADOR_DECIMAL,MONEDA_SEPARADOR_MILLAR)." ".MONEDA_NOMBRE; ?></td>
              <td colspan="2"></td>
            </tr>
            <?php else: $_SESSION['venta_total'] = 0; ?>
            <tr class="empty-row"><td colspan="8">No hay productos agregados</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- COLUMNA DERECHA -->
  <div class="sale-right">
    <div class="sale-card">
      <div class="sale-panel-title"><i class="fas fa-receipt" style="color:#f97316"></i> Datos de la venta</div>

      <?php if($_SESSION['venta_total'] > 0): ?>
      <form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/ventaAjax.php" method="POST" autocomplete="off" name="formsale">
        <input type="hidden" name="modulo_venta" value="registrar_venta">
      <?php else: ?>
      <form name="formsale">
      <?php endif; ?>

        <div class="sale-field">
          <label>Fecha</label>
          <input type="date" value="<?php echo date("Y-m-d"); ?>" readonly>
        </div>

        <div class="sale-field">
          <label>Caja de ventas <span class="req">*</span></label>
          <select name="venta_caja">
            <?php
              $datos_cajas = $insLogin->seleccionarDatos("Normal","caja","*",0);
              while($campos_caja = $datos_cajas->fetch()){
                $selected = ($campos_caja['caja_id'] == $_SESSION['caja']) ? 'selected' : '';
                echo '<option value="'.$campos_caja['caja_id'].'" '.$selected.'>Caja No.'.$campos_caja['caja_numero'].' - '.$campos_caja['caja_nombre'].'</option>';
              }
            ?>
          </select>
        </div>

        <div class="sale-field">
          <label>Cliente</label>
          <?php
            if(isset($_SESSION['datos_cliente_venta']) && count($_SESSION['datos_cliente_venta']) >= 1 && $_SESSION['datos_cliente_venta']['cliente_id'] != 1):
          ?>
          <div class="client-field">
            <input type="text" readonly id="venta_cliente" value="<?php echo $_SESSION['datos_cliente_venta']['cliente_nombre']." ".$_SESSION['datos_cliente_venta']['cliente_apellido']; ?>">
            <button type="button" class="btn-client-remove" onclick="remover_cliente(<?php echo $_SESSION['datos_cliente_venta']['cliente_id']; ?>)" title="Quitar cliente">
              <i class="fas fa-user-times"></i>
            </button>
          </div>
          <?php else:
            $datos_cliente = $insLogin->seleccionarDatos("Normal","cliente WHERE cliente_id='1'","*",0);
            if($datos_cliente->rowCount() == 1){
              $datos_cliente = $datos_cliente->fetch();
              $_SESSION['datos_cliente_venta'] = [
                "cliente_id" => $datos_cliente['cliente_id'],
                "cliente_tipo_documento" => $datos_cliente['cliente_tipo_documento'],
                "cliente_numero_documento" => $datos_cliente['cliente_numero_documento'],
                "cliente_nombre" => $datos_cliente['cliente_nombre'],
                "cliente_apellido" => $datos_cliente['cliente_apellido']
              ];
            } else {
              $_SESSION['datos_cliente_venta'] = [
                "cliente_id" => 1, "cliente_tipo_documento" => "N/A",
                "cliente_numero_documento" => "N/A",
                "cliente_nombre" => "Publico", "cliente_apellido" => "General"
              ];
            }
          ?>
          <div class="client-field">
            <input type="text" readonly id="venta_cliente" value="<?php echo $_SESSION['datos_cliente_venta']['cliente_nombre']." ".$_SESSION['datos_cliente_venta']['cliente_apellido']; ?>">
            <button type="button" class="btn-client-add js-modal-trigger" data-target="modal-js-client" title="Agregar cliente">
              <i class="fas fa-user-plus"></i>
            </button>
          </div>
          <?php endif; ?>
        </div>

        <div class="sale-field">
          <label>Total pagado por cliente <span class="req">*</span></label>
          <input type="text" name="venta_abono" id="venta_abono" value="0.00" pattern="[0-9.]{1,25}" maxlength="25">
        </div>

        <div class="sale-field">
          <label>Cambio devuelto</label>
          <input type="text" id="venta_cambio" value="0.00" readonly>
        </div>

        <div class="sale-total">
          <div class="sale-total-label">Total a pagar</div>
          <div class="sale-total-amount"><?php echo MONEDA_SIMBOLO.number_format($_SESSION['venta_total'],MONEDA_DECIMALES,MONEDA_SEPARADOR_DECIMAL,MONEDA_SEPARADOR_MILLAR)." ".MONEDA_NOMBRE; ?></div>
        </div>

        <?php if($_SESSION['venta_total'] > 0): ?>
        <button type="submit" class="btn-save-sale"><i class="far fa-save"></i> Guardar venta</button>
        <?php endif; ?>

        <div class="sale-note">Los campos con <span>*</span> son obligatorios</div>
        <input type="hidden" value="<?php echo number_format($_SESSION['venta_total'],MONEDA_DECIMALES,MONEDA_SEPARADOR_DECIMAL,""); ?>" id="venta_total_hidden">
      </form>
    </div>
  </div>

<?php else: ?>
  <div class="sale-warning" style="grid-column:1/-1">
    <i class="fas fa-exclamation-triangle"></i>
    No se encontraron datos de la empresa. <a href="<?php echo APP_URL; ?>companyNew/">Verifica los datos de la empresa aquí</a>
  </div>
<?php endif; ?>
</div>

<!-- Modal buscar producto -->
<div class="modal-pro" id="modal-js-product">
  <div class="modal-pro-card" style="max-width: 600px;">
    <div class="modal-pro-header">
      <div class="modal-pro-title"><i class="fas fa-search" style="color:#f97316"></i> Buscar producto</div>
      <button class="modal-pro-close delete">✕</button>
    </div>
    <div class="modal-pro-body">
      <p style="font-size:12px;color:#888;margin-bottom:14px">Filtra por categoría o busca por coincidencia parcial de nombre, marca, modelo o código.</p>
      
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 16px;">
        <!-- Filtrar por Categoría -->
        <div class="sale-field" style="margin-bottom: 0;">
          <label style="font-size: 10px;">Categoría</label>
          <div class="select is-fullwidth">
            <select id="modal_categoria_select" onchange="buscar_codigo()" style="width: 100%; border-radius: 8px;">
              <option value="">Todas las categorías</option>
              <?php
                $categorias = $insLogin->seleccionarDatos("Normal","categoria","*",0);
                while($cat = $categorias->fetch()){
                  echo '<option value="'.$cat['categoria_id'].'">'.$cat['categoria_nombre'].'</option>';
                }
              ?>
            </select>
          </div>
        </div>

        <!-- Buscar por Nombre / Coincidencia -->
        <div class="sale-field" style="margin-bottom: 0;">
          <label style="font-size: 10px;">Buscar texto</label>
          <div style="display: flex; gap: 6px;">
            <input class="modal-search-input" type="text" name="input_codigo" id="input_codigo" placeholder="Escribe para buscar..." maxlength="30" oninput="buscar_codigo()" style="border-radius: 8px;">
            <button type="button" class="btn-modal-search" onclick="buscar_codigo()" style="border-radius: 8px; padding: 0 14px;"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </div>

      <div id="tabla_productos"></div>
    </div>
  </div>
</div>

<!-- Modal buscar cliente -->
<div class="modal-pro" id="modal-js-client">
  <div class="modal-pro-card">
    <div class="modal-pro-header">
      <div class="modal-pro-title"><i class="fas fa-user-plus" style="color:#f97316"></i> Buscar cliente</div>
      <button class="modal-pro-close delete">✕</button>
    </div>
    <div class="modal-pro-body">
      <p style="font-size:12px;color:#888;margin-bottom:14px">Busca clientes registrados por coincidencia parcial de documento, nombre, apellido o teléfono mientras escribes.</p>
      <div class="modal-search-bar">
        <input class="modal-search-input" type="text" name="input_cliente" id="input_cliente" placeholder="Escribe para buscar cliente..." maxlength="30" oninput="buscar_cliente()" style="border-radius: 8px;">
        <button type="button" class="btn-modal-search" onclick="buscar_cliente()" style="border-radius: 8px; padding: 0 14px;"><i class="fas fa-search"></i> Buscar</button>
      </div>
      <div id="tabla_clientes"></div>
    </div>
  </div>
</div>

<script>
  // Modales
  document.querySelectorAll('.js-modal-trigger').forEach(btn => {
    btn.addEventListener('click', () => {
      const target = btn.dataset.target;
      document.getElementById(target).classList.add('active');
      if (target === 'modal-js-product') {
        buscar_codigo();
      } else if (target === 'modal-js-client') {
        buscar_cliente();
      }
    });
  });
  document.querySelectorAll('.modal-pro-close, .modal-pro').forEach(el => {
    el.addEventListener('click', e => {
      if(e.target === el) el.closest('.modal-pro').classList.remove('active');
      if(el.classList.contains('modal-pro-close')) el.closest('.modal-pro').classList.remove('active');
    });
  });

  // Agregar producto por código de barras
  let sale_form_barcode = document.querySelector("#sale-barcode-form");
  sale_form_barcode.addEventListener('submit', function(event){
    event.preventDefault();
    setTimeout('agregar_producto()', 100);
  });
  let sale_input_barcode = document.querySelector("#sale-barcode-input");
  sale_input_barcode.addEventListener('paste', function(){
    setTimeout('agregar_producto()', 100);
  });

  function agregar_producto(){
    let codigo_producto = document.querySelector('#sale-barcode-input').value.trim();
    if(codigo_producto != ""){
      let datos = new FormData();
      datos.append("producto_codigo", codigo_producto);
      datos.append("modulo_venta", "agregar_producto");
      fetch('<?php echo APP_URL; ?>app/ajax/ventaAjax.php', { method:'POST', body:datos })
        .then(r => r.json()).then(r => alertas_ajax(r));
    } else {
      Swal.fire({ icon:'error', title:'Error', text:'Debes introducir el código del producto', confirmButtonText:'Aceptar' });
    }
  }

  function buscar_codigo(){
    let input_codigo = document.querySelector('#input_codigo').value.trim();
    let select_categoria = document.querySelector('#modal_categoria_select').value;
    
    let datos = new FormData();
    datos.append("buscar_codigo", input_codigo);
    datos.append("categoria_id", select_categoria);
    datos.append("modulo_venta", "buscar_codigo");
    
    fetch('<?php echo APP_URL; ?>app/ajax/ventaAjax.php', { method:'POST', body:datos })
      .then(r => r.text()).then(r => { 
        document.querySelector('#tabla_productos').innerHTML = r; 
      });
  }

  function agregar_codigo($codigo){
    document.querySelector('#sale-barcode-input').value = $codigo;
    setTimeout('agregar_producto()', 100);
  }

  function actualizar_cantidad(id, codigo){
    let cantidad = document.querySelector(id).value.trim();
    if(cantidad > 0){
      Swal.fire({
        title:'¿Actualizar cantidad?', icon:'question',
        showCancelButton:true, confirmButtonText:'Sí, actualizar', cancelButtonText:'Cancelar'
      }).then(result => {
        if(result.isConfirmed){
          let datos = new FormData();
          datos.append("producto_codigo", codigo);
          datos.append("producto_cantidad", cantidad);
          datos.append("modulo_venta", "actualizar_producto");
          fetch('<?php echo APP_URL; ?>app/ajax/ventaAjax.php', { method:'POST', body:datos })
            .then(r => r.json()).then(r => alertas_ajax(r));
        }
      });
    } else {
      Swal.fire({ icon:'error', title:'Error', text:'La cantidad debe ser mayor a 0', confirmButtonText:'Aceptar' });
    }
  }

  function actualizar_cantidad_directa(id, codigo){
    let cantidad = parseInt(document.querySelector(id).value.trim());
    if(cantidad > 0){
      let datos = new FormData();
      datos.append("producto_codigo", codigo);
      datos.append("producto_cantidad", cantidad);
      datos.append("modulo_venta", "actualizar_producto");
      fetch('<?php echo APP_URL; ?>app/ajax/ventaAjax.php', { method:'POST', body:datos })
        .then(r => r.json()).then(r => {
          if (r.tipo == "redireccionar") {
            window.location.href = r.url;
          } else {
            alertas_ajax(r);
          }
        });
    } else {
      Swal.fire({ icon:'error', title:'Error', text:'La cantidad debe ser mayor a 0', confirmButtonText:'Aceptar' });
    }
  }

  function buscar_cliente(){
    let input_cliente = document.querySelector('#input_cliente').value.trim();
    let datos = new FormData();
    datos.append("buscar_cliente", input_cliente);
    datos.append("modulo_venta", "buscar_cliente");
    fetch('<?php echo APP_URL; ?>app/ajax/ventaAjax.php', { method:'POST', body:datos })
      .then(r => r.text()).then(r => { document.querySelector('#tabla_clientes').innerHTML = r; });
  }

  function agregar_cliente(id){
    Swal.fire({
      title:'¿Agregar este cliente?', icon:'question',
      showCancelButton:true, confirmButtonText:'Sí, agregar', cancelButtonText:'Cancelar'
    }).then(result => {
      if(result.isConfirmed){
        let datos = new FormData();
        datos.append("cliente_id", id);
        datos.append("modulo_venta", "agregar_cliente");
        fetch('<?php echo APP_URL; ?>app/ajax/ventaAjax.php', { method:'POST', body:datos })
          .then(r => r.json()).then(r => alertas_ajax(r));
      }
    });
  }

  function remover_cliente(id){
    Swal.fire({
      title:'¿Quitar este cliente?', icon:'question',
      showCancelButton:true, confirmButtonText:'Sí, quitar', cancelButtonText:'Cancelar'
    }).then(result => {
      if(result.isConfirmed){
        let datos = new FormData();
        datos.append("cliente_id", id);
        datos.append("modulo_venta", "remover_cliente");
        fetch('<?php echo APP_URL; ?>app/ajax/ventaAjax.php', { method:'POST', body:datos })
          .then(r => r.json()).then(r => alertas_ajax(r));
      }
    });
  }

  // Calcular cambio
  document.querySelector("#venta_abono").addEventListener('keyup', function(e){
    e.preventDefault();
    let abono = parseFloat(document.querySelector('#venta_abono').value.trim());
    let total = parseFloat(document.querySelector('#venta_total_hidden').value.trim());
    if(abono >= total){
      document.querySelector('#venta_cambio').value = parseFloat(abono - total).toFixed(<?php echo MONEDA_DECIMALES; ?>);
    } else {
      document.querySelector('#venta_cambio').value = "0.00";
    }
  });
</script>

<?php include "./app/views/inc/print_invoice_script.php"; ?>
<script>const APP_URL = "<?php echo APP_URL; ?>";</script>