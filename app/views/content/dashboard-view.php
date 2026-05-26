<?php
$total_cajas      = $insLogin->seleccionarDatos("Normal", "caja", "caja_id", 0);
$total_usuarios   = $insLogin->seleccionarDatos("Normal", "usuario WHERE usuario_id!='1' AND usuario_id!='" . $_SESSION['id'] . "'", "usuario_id", 0);
$total_clientes   = $insLogin->seleccionarDatos("Normal", "cliente WHERE cliente_id!='1'", "cliente_id", 0);
$total_categorias = $insLogin->seleccionarDatos("Normal", "categoria", "categoria_id", 0);
$total_productos  = $insLogin->seleccionarDatos("Normal", "producto", "producto_id", 0);
$total_ventas     = $insLogin->seleccionarDatos("Normal", "venta", "venta_id", 0);
?>

<style>
  .dash-page {
    padding: 28px 24px;
  }

  .dash-welcome {
    margin-bottom: 28px;
  }

  .dash-welcome h1 {
    font-size: 22px;
    font-weight: 600;
    color: #1a1a1a;
    font-family: 'OswaldLight', sans-serif;
  }

  .dash-welcome p {
    font-size: 13px;
    color: #888;
    margin-top: 4px;
  }

  .kpi-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 16px;
    margin-bottom: 32px;
  }

  .kpi-card {
    background: white;
    border-radius: 12px;
    padding: 20px;
    border: 0.5px solid #e5e7eb;
    display: flex;
    flex-direction: column;
    gap: 10px;
    transition: box-shadow 0.2s, transform 0.2s;
    text-decoration: none;
  }

  .kpi-card:hover {
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    transform: translateY(-2px);
  }

  .kpi-icon-wrap {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
  }

  .kpi-icon-orange {
    background: rgba(249, 115, 22, 0.1);
    color: #f97316;
  }

  .kpi-icon-blue {
    background: rgba(55, 138, 221, 0.1);
    color: #378add;
  }

  .kpi-icon-green {
    background: rgba(99, 153, 34, 0.1);
    color: #639922;
  }

  .kpi-icon-purple {
    background: rgba(127, 119, 221, 0.1);
    color: #7f77dd;
  }

  .kpi-icon-pink {
    background: rgba(212, 83, 126, 0.1);
    color: #d4537e;
  }

  .kpi-icon-teal {
    background: rgba(29, 158, 117, 0.1);
    color: #1d9e75;
  }

  .kpi-value {
    font-size: 28px;
    font-weight: 700;
    color: #1a1a1a;
    line-height: 1;
  }

  .kpi-label {
    font-size: 12px;
    color: #888;
  }

  .dash-section-title {
    font-size: 14px;
    font-weight: 600;
    color: #555;
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .dash-section-title::after {
    content: '';
    flex: 1;
    height: 0.5px;
    background: #e5e7eb;
  }

  .quick-actions {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
    gap: 12px;
    margin-bottom: 32px;
  }

  .quick-btn {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 14px 16px;
    background: white;
    border: 0.5px solid #e5e7eb;
    border-radius: 10px;
    color: #333;
    font-size: 13px;
    font-weight: 500;
    text-decoration: none;
    transition: background 0.2s, border-color 0.2s;
    cursor: pointer;
  }

  .quick-btn:hover {
    background: #fff7ed;
    border-color: #f97316;
    color: #f97316;
  }

  .quick-btn i {
    font-size: 15px;
    color: #f97316;
    width: 18px;
    text-align: center;
  }
</style>

<div class="dash-page">

  <!-- Bienvenida -->
  <div class="dash-welcome">
    <h1>Buenos días, <?php echo $_SESSION['nombre']; ?></h1><?php
                                                            $dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
                                                            $meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
                                                            $fecha = $dias[date('w')] . ' ' . date('d') . ' de ' . $meses[date('n') - 1] . ' de ' . date('Y');
                                                            ?>
    <p><?php echo $fecha; ?> &mdash; <?php echo $_SESSION['cargo']; ?></p>
  </div>

  <!-- KPIs -->
  <div class="dash-section-title">Resumen general</div>
  <div class="kpi-grid">
    <a href="<?php echo APP_URL; ?>cashierList/" class="kpi-card">
      <div class="kpi-icon-wrap kpi-icon-orange"><i class="fas fa-cash-register"></i></div>
      <div class="kpi-value"><?php echo $total_cajas->rowCount(); ?></div>
      <div class="kpi-label">Cajas</div>
    </a>
    <a href="<?php echo APP_URL; ?>userList/" class="kpi-card">
      <div class="kpi-icon-wrap kpi-icon-blue"><i class="fas fa-users"></i></div>
      <div class="kpi-value"><?php echo $total_usuarios->rowCount(); ?></div>
      <div class="kpi-label">Usuarios</div>
    </a>
    <a href="<?php echo APP_URL; ?>clientList/" class="kpi-card">
      <div class="kpi-icon-wrap kpi-icon-green"><i class="fas fa-address-book"></i></div>
      <div class="kpi-value"><?php echo $total_clientes->rowCount(); ?></div>
      <div class="kpi-label">Clientes</div>
    </a>
    <a href="<?php echo APP_URL; ?>categoryList/" class="kpi-card">
      <div class="kpi-icon-wrap kpi-icon-purple"><i class="fas fa-tags"></i></div>
      <div class="kpi-value"><?php echo $total_categorias->rowCount(); ?></div>
      <div class="kpi-label">Categorías</div>
    </a>
    <a href="<?php echo APP_URL; ?>productList/" class="kpi-card">
      <div class="kpi-icon-wrap kpi-icon-teal"><i class="fas fa-cubes"></i></div>
      <div class="kpi-value"><?php echo $total_productos->rowCount(); ?></div>
      <div class="kpi-label">Productos</div>
    </a>
    <a href="<?php echo APP_URL; ?>saleList/" class="kpi-card">
      <div class="kpi-icon-wrap kpi-icon-pink"><i class="fas fa-shopping-cart"></i></div>
      <div class="kpi-value"><?php echo $total_ventas->rowCount(); ?></div>
      <div class="kpi-label">Ventas</div>
    </a>
  </div>

  <!-- Acciones rápidas -->
  <div class="dash-section-title">Acciones rápidas</div>
  <div class="quick-actions">
    <a href="<?php echo APP_URL; ?>saleNew/" class="quick-btn">
      <i class="fas fa-cart-plus"></i> Nueva venta
    </a>
    <a href="<?php echo APP_URL; ?>clientNew/" class="quick-btn">
      <i class="fas fa-user-plus"></i> Nuevo cliente
    </a>
    <a href="<?php echo APP_URL; ?>productNew/" class="quick-btn">
      <i class="fas fa-box"></i> Nuevo producto
    </a>
    <?php if ($_SESSION['cargo'] == 'Administrador'): ?>
      <a href="<?php echo APP_URL . "reportes/" . $_SESSION['id'] . "/"; ?>" class="quick-btn">
        <i class="fas fa-chart-bar"></i> Ver reportes
      </a>
    <?php endif; ?>
  </div>

</div>

<script>
  const APP_URL = "<?php echo APP_URL; ?>";
</script>