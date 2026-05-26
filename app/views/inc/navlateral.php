<style>
  .sidebar-pro {
    width: 260px;
    height: 100%;
    background: #ffffff;
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
    overflow-y: auto;
    flex-shrink: 0;
    border-right: 1px solid #e2e8f0;
  }
  .sidebar-pro.collapsed {
    width: 0;
    overflow: hidden;
    pointer-events: none;
    opacity: 0;
  }

  /* Perfil */
  .sidebar-profile {
    padding: 20px 16px;
    display: flex;
    align-items: center;
    gap: 12px;
    border-bottom: 1px solid #f1f5f9;
  }
  .sidebar-profile-img {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #f97316;
    flex-shrink: 0;
  }
  .sidebar-profile-name {
    font-size: 13px;
    font-weight: 600;
    color: #0f172a;
    line-height: 1.3;
  }
  .sidebar-profile-role {
    font-size: 11px;
    color: #f97316;
  }

  /* Secciones */
  .sidebar-section-label {
    padding: 16px 16px 6px;
    font-size: 10px;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    font-weight: 600;
  }

  /* Items del menú */
  .sidebar-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 16px;
    color: #475569;
    font-size: 13px;
    cursor: pointer;
    transition: background 0.2s, color 0.2s;
    text-decoration: none;
    border-left: 3px solid transparent;
  }
  .sidebar-item:hover {
    background: #f1f5f9;
    color: #0f172a;
  }
  .sidebar-item.active {
    background: rgba(249,115,22,0.08) !important;
    color: #f97316 !important;
    border-left-color: #f97316 !important;
    font-weight: 600 !important;
  }
  .sidebar-item-left {
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .sidebar-item i {
    width: 16px;
    text-align: center;
    font-size: 13px;
    flex-shrink: 0;
  }
  .sidebar-chevron {
    font-size: 10px;
    transition: transform 0.2s;
    color: #94a3b8;
  }
  .sidebar-item.open .sidebar-chevron {
    transform: rotate(180deg);
  }

  /* Submenú */
  .sidebar-submenu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
    background: #f8fafc;
  }
  .sidebar-submenu.open {
    max-height: 400px;
  }
  .sidebar-submenu a {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 16px 8px 42px;
    color: #64748b;
    font-size: 12px;
    text-decoration: none;
    transition: color 0.2s, background 0.2s;
    border-left: 3px solid transparent;
  }
  .sidebar-submenu a:hover {
    color: #0f172a;
    background: #f1f5f9;
  }

  /* Cerrar sesión */
  .sidebar-logout {
    margin-top: auto;
    padding: 12px 16px;
    border-top: 1px solid #f1f5f9;
  }
  .sidebar-logout a {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #64748b;
    font-size: 13px;
    text-decoration: none;
    padding: 8px 12px;
    border-radius: 8px;
    transition: background 0.2s, color 0.2s;
  }
  .sidebar-logout a:hover {
    background: rgba(239,68,68,0.08);
    color: #ef4444;
  }

  /* Responsive */
  @media (max-width: 750px) {
    .sidebar-pro {
      position: fixed;
      left: 0;
      top: 48px;
      height: calc(100% - 48px);
      z-index: 200;
      width: 0;
      opacity: 0;
      pointer-events: none;
    }
    .sidebar-pro.mobile-open {
      width: 260px;
      opacity: 1;
      pointer-events: auto;
    }
  }
</style>

<section class="sidebar-pro scroll" id="navLateral">

  <!-- Perfil -->
  <div class="sidebar-profile">
    <?php
      if (is_file("./app/views/fotos/" . $_SESSION['foto'])) {
        echo '<img class="sidebar-profile-img" src="' . APP_URL . 'app/views/fotos/' . $_SESSION['foto'] . '">';
      } else {
        echo '<img class="sidebar-profile-img" src="' . APP_URL . 'app/views/fotos/default.png">';
      }
    ?>
    <div>
      <div class="sidebar-profile-name"><?php echo $_SESSION['nombre']; ?></div>
      <div class="sidebar-profile-role"><?php echo $_SESSION['cargo']; ?></div>
    </div>
  </div>

  <nav>
    <!-- Inicio -->
    <div class="sidebar-section-label">Principal</div>
    <a href="<?php echo APP_URL; ?>dashboard/" class="sidebar-item active">
      <div class="sidebar-item-left">
        <i class="fas fa-home"></i> Inicio
      </div>
    </a>

    <?php if ($_SESSION['cargo'] == 'Administrador'): ?>
    <!-- Cajas -->
    <div class="sidebar-section-label">Administración</div>
    <div class="sidebar-item btn-subMenu" onclick="toggleMenu(this)">
      <div class="sidebar-item-left">
        <i class="fas fa-cash-register"></i> Cajas
      </div>
      <i class="fas fa-chevron-down sidebar-chevron"></i>
    </div>
    <div class="sidebar-submenu">
      <a href="<?php echo APP_URL; ?>cashierNew/"><i class="fas fa-plus"></i> Nueva caja</a>
      <a href="<?php echo APP_URL; ?>cashierList/"><i class="fas fa-list"></i> Lista de cajas</a>
      <a href="<?php echo APP_URL; ?>cashierSearch/"><i class="fas fa-search"></i> Buscar caja</a>
    </div>

    <!-- Usuarios -->
    <div class="sidebar-item btn-subMenu" onclick="toggleMenu(this)">
      <div class="sidebar-item-left">
        <i class="fas fa-users"></i> Usuarios
      </div>
      <i class="fas fa-chevron-down sidebar-chevron"></i>
    </div>
    <div class="sidebar-submenu">
      <a href="<?php echo APP_URL; ?>userNew/"><i class="fas fa-user-plus"></i> Nuevo usuario</a>
      <a href="<?php echo APP_URL; ?>userList/"><i class="fas fa-users"></i> Lista de usuarios</a>
    </div>
    <?php endif; ?>

    <?php if ($_SESSION['cargo'] == 'Administrador' || $_SESSION['cargo'] == 'Vendedor'): ?>
    <!-- Clientes -->
    <div class="sidebar-section-label">Ventas</div>
    <div class="sidebar-item btn-subMenu" onclick="toggleMenu(this)">
      <div class="sidebar-item-left">
        <i class="fas fa-address-book"></i> Clientes
      </div>
      <i class="fas fa-chevron-down sidebar-chevron"></i>
    </div>
    <div class="sidebar-submenu">
      <a href="<?php echo APP_URL; ?>clientNew/"><i class="fas fa-user-plus"></i> Nuevo cliente</a>
      <a href="<?php echo APP_URL; ?>clientList/"><i class="fas fa-list"></i> Lista de clientes</a>
      <a href="<?php echo APP_URL; ?>clientSearch/"><i class="fas fa-search"></i> Buscar cliente</a>
    </div>

    <!-- Ventas -->
    <div class="sidebar-item btn-subMenu" onclick="toggleMenu(this)">
      <div class="sidebar-item-left">
        <i class="fas fa-shopping-cart"></i> Ventas
      </div>
      <i class="fas fa-chevron-down sidebar-chevron"></i>
    </div>
    <div class="sidebar-submenu">
      <a href="<?php echo APP_URL; ?>saleNew/"><i class="fas fa-cart-plus"></i> Nueva venta</a>
      <a href="<?php echo APP_URL; ?>saleList/"><i class="fas fa-list"></i> Lista de ventas</a>
    </div>
    <?php endif; ?>

    <?php if ($_SESSION['cargo'] == 'Administrador' || $_SESSION['cargo'] == 'Bodeguero'): ?>
    <!-- Inventario -->
    <div class="sidebar-section-label">Inventario</div>
    <div class="sidebar-item btn-subMenu" onclick="toggleMenu(this)">
      <div class="sidebar-item-left">
        <i class="fas fa-tags"></i> Categorías
      </div>
      <i class="fas fa-chevron-down sidebar-chevron"></i>
    </div>
    <div class="sidebar-submenu">
      <a href="<?php echo APP_URL; ?>categoryNew/"><i class="fas fa-plus"></i> Nueva categoría</a>
      <a href="<?php echo APP_URL; ?>categoryList/"><i class="fas fa-list"></i> Lista de categorías</a>
    </div>

    <div class="sidebar-item btn-subMenu" onclick="toggleMenu(this)">
      <div class="sidebar-item-left">
        <i class="fas fa-cubes"></i> Productos
      </div>
      <i class="fas fa-chevron-down sidebar-chevron"></i>
    </div>
    <div class="sidebar-submenu">
      <a href="<?php echo APP_URL; ?>productNew/"><i class="fas fa-box"></i> Nuevo producto</a>
      <a href="<?php echo APP_URL; ?>productList/"><i class="fas fa-list"></i> Lista de productos</a>
    </div>
    <?php endif; ?>

    <!-- Configuración -->
    <div class="sidebar-section-label">Cuenta</div>
    <div class="sidebar-item btn-subMenu" onclick="toggleMenu(this)">
      <div class="sidebar-item-left">
        <i class="fas fa-cogs"></i> Configuración
      </div>
      <i class="fas fa-chevron-down sidebar-chevron"></i>
    </div>
    <div class="sidebar-submenu">
      <a href="<?php echo APP_URL."userUpdate/".$_SESSION['id']."/"; ?>"><i class="fas fa-user-tie"></i> Mi cuenta</a>
      <a href="<?php echo APP_URL."userPhoto/".$_SESSION['id']."/"; ?>"><i class="fas fa-camera"></i> Mi foto</a>
      <?php if ($_SESSION['cargo'] == 'Administrador'): ?>
      <a href="<?php echo APP_URL."reportes/".$_SESSION['id']."/"; ?>"><i class="fas fa-chart-bar"></i> Reportes</a>
      <a href="<?php echo APP_URL; ?>companyNew/"><i class="fas fa-store-alt"></i> Datos de empresa</a>
      <?php endif; ?>
    </div>
  </nav>

  <!-- Cerrar sesión -->
  <div class="sidebar-logout">
    <a href="<?php echo APP_URL."logOut/"; ?>">
      <i class="fas fa-power-off"></i> Cerrar sesión
    </a>
  </div>

</section>

<script>
function toggleMenu(el) {
  const submenu = el.nextElementSibling;
  const isOpen = submenu.classList.contains('open');
  document.querySelectorAll('.sidebar-submenu.open').forEach(s => s.classList.remove('open'));
  document.querySelectorAll('.sidebar-item.open').forEach(s => s.classList.remove('open'));
  if (!isOpen) {
    submenu.classList.add('open');
    el.classList.add('open');
  }
}

document.getElementById('btn-menu').addEventListener('click', function() {
  const sidebar = document.getElementById('navLateral');
  sidebar.classList.toggle('collapsed');
  sidebar.classList.toggle('mobile-open');
});
</script>