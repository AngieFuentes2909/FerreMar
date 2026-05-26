<?php require_once "./config/app.php"; ?>

<style>
.reports-card{background:white;border-radius:12px;border:0.5px solid #e5e7eb;padding:28px 32px;margin:24px}
.reports-title{font-size:18px;font-weight:700;color:#1a1a1a;margin-bottom:4px}
.reports-subtitle{font-size:13px;color:#888;margin-bottom:24px;padding-bottom:16px;border-bottom:0.5px solid #e5e7eb}
.report-item{border:0.5px solid #e5e7eb;border-radius:10px;padding:20px;margin-bottom:16px;transition:box-shadow 0.2s}
.report-item:hover{box-shadow:0 4px 16px rgba(0,0,0,0.07)}
.report-item-header{display:flex;align-items:center;gap:12px;margin-bottom:14px}
.report-icon{width:40px;height:40px;border-radius:10px;background:#fff7ed;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0}
.report-name{font-size:14px;font-weight:700;color:#1a1a1a}
.report-desc{font-size:12px;color:#888;margin-top:2px}
.report-form{display:grid;grid-template-columns:1fr 1fr auto;gap:10px;align-items:end}
.report-field{display:flex;flex-direction:column;gap:4px}
.report-field label{font-size:11px;font-weight:600;color:#888;text-transform:uppercase;letter-spacing:0.05em}
.report-field input{padding:9px 14px;border:1.5px solid #e5e7eb;border-radius:8px;font-size:13px;color:#1a1a1a;background:#fafafa;outline:none;transition:border-color 0.2s}
.report-field input:focus{border-color:#f97316;background:white}
.report-actions{display:flex;gap:8px}
.btn-ver{padding:9px 16px;border-radius:8px;border:none;background:#f97316;color:white;font-size:13px;font-weight:600;cursor:pointer;display:flex;align-items:center;gap:6px;white-space:nowrap}
.btn-ver:hover{background:#ea6c0a}
.btn-descargar{padding:9px 16px;border-radius:8px;border:1.5px solid #e5e7eb;background:white;color:#555;font-size:13px;font-weight:500;cursor:pointer;display:flex;align-items:center;gap:6px;white-space:nowrap}
.btn-descargar:hover{background:#f3f4f6}
@media(max-width:700px){.report-form{grid-template-columns:1fr}.report-actions{flex-direction:column}.reports-card{margin:12px;padding:20px 16px}}
</style>

<div class="reports-card">
  <div class="reports-title"><i class="fas fa-chart-bar fa-fw" style="color:#f97316"></i> &nbsp; Biblioteca de Reportes</div>
  <div class="reports-subtitle">Genera y descarga reportes del sistema por rango de fechas</div>

  <!-- Reporte de Productos -->
  <div class="report-item">
    <div class="report-item-header">
      <div class="report-icon">📦</div>
      <div>
        <div class="report-name">Reporte de Productos</div>
        <div class="report-desc">Visualiza los productos más y menos vendidos por fecha</div>
      </div>
    </div>
    <form action="<?php echo APP_URL; ?>app/ajax/reporteProductosAjax.php" method="POST" target="_blank">
      <div class="report-form">
        <div class="report-field">
          <label>Fecha inicio</label>
          <input type="date" name="fecha_inicio" required>
        </div>
        <div class="report-field">
          <label>Fecha fin</label>
          <input type="date" name="fecha_fin" required>
        </div>
        <div class="report-actions">
          <button type="submit" name="accion" value="ver" class="btn-ver"><i class="fas fa-eye"></i> Ver</button>
          <button type="submit" name="accion" value="descargar" class="btn-descargar"><i class="fas fa-download"></i> Descargar</button>
        </div>
      </div>
    </form>
  </div>

  <!-- Reporte de Cajas / Vendedores -->
  <div class="report-item">
    <div class="report-item-header">
      <div class="report-icon">🏪</div>
      <div>
        <div class="report-name">Reporte de Cajas / Vendedores</div>
        <div class="report-desc">Consulta las ventas por vendedor y caja en un período</div>
      </div>
    </div>
    <form action="<?php echo APP_URL; ?>app/ajax/reporteCajasAjax.php" method="POST" target="_blank">
      <div class="report-form">
        <div class="report-field">
          <label>Fecha inicio</label>
          <input type="date" name="fecha_inicio" required>
        </div>
        <div class="report-field">
          <label>Fecha fin</label>
          <input type="date" name="fecha_fin" required>
        </div>
        <div class="report-actions">
          <button type="submit" name="accion" value="ver" class="btn-ver"><i class="fas fa-eye"></i> Ver</button>
          <button type="submit" name="accion" value="descargar" class="btn-descargar"><i class="fas fa-download"></i> Descargar</button>
        </div>
      </div>
    </form>
  </div>

  <!-- Reporte de Ganancias -->
  <div class="report-item">
    <div class="report-item-header">
      <div class="report-icon">💰</div>
      <div>
        <div class="report-name">Reporte de Ganancias</div>
        <div class="report-desc">Muestra el total de ingresos y ganancias por período</div>
      </div>
    </div>
    <form action="<?php echo APP_URL; ?>app/ajax/reporteGananciasAjax.php" method="POST" target="_blank">
      <div class="report-form">
        <div class="report-field">
          <label>Fecha inicio</label>
          <input type="date" name="fecha_inicio" required>
        </div>
        <div class="report-field">
          <label>Fecha fin</label>
          <input type="date" name="fecha_fin" required>
        </div>
        <div class="report-actions">
          <button type="submit" name="accion" value="ver" class="btn-ver"><i class="fas fa-eye"></i> Ver</button>
          <button type="submit" name="accion" value="descargar" class="btn-descargar"><i class="fas fa-download"></i> Descargar</button>
        </div>
      </div>
    </form>
  </div>

</div>
<script>const APP_URL = "<?php echo APP_URL; ?>";</script>