<style>
  .navbar-pro {
    background-color: rgba(255, 255, 255, 0.9) !important;
    backdrop-filter: blur(12px) !important;
    -webkit-backdrop-filter: blur(12px) !important;
    height: 56px !important;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 24px;
    position: sticky;
    top: 0;
    z-index: 100;
    border-bottom: 1px solid #e2e8f0 !important;
    box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03) !important;
  }
  .navbar-pro-left {
    display: flex;
    align-items: center;
    gap: 14px;
  }
  .navbar-menu-btn {
    background: none;
    border: none;
    color: #475569;
    font-size: 18px;
    cursor: pointer;
    padding: 6px 10px;
    border-radius: 8px;
    transition: all 0.25s ease;
  }
  .navbar-menu-btn:hover { 
    background: rgba(15, 23, 42, 0.05) !important; 
    color: #0f172a;
  }
  .navbar-brand {
    color: #f97316;
    font-size: 18px !important;
    font-weight: 900 !important;
    font-family: 'Outfit', sans-serif !important;
    letter-spacing: 0.5px;
    background: linear-gradient(135deg, #f97316 0%, #ff8c59 100%);
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
  }
  .navbar-pro-right {
    display: flex;
    align-items: center;
    gap: 14px;
  }

  /* Notificaciones */
  .notif-wrapper {
    position: relative;
    display: flex;
    align-items: center;
  }
  .notif-btn {
    background: none;
    border: none;
    color: #475569;
    font-size: 16px;
    cursor: pointer;
    padding: 8px;
    border-radius: 8px;
    transition: all 0.25s ease;
    position: relative;
  }
  .notif-btn:hover { 
    background: rgba(15, 23, 42, 0.05) !important; 
    color: #0f172a;
  }
  #contador-stock {
    position: absolute;
    top: -2px;
    right: -2px;
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%) !important;
    color: white;
    border-radius: 999px;
    padding: 1px 5px;
    font-size: 9px;
    font-weight: 800;
    min-width: 16px;
    text-align: center;
    line-height: 1.4;
    box-shadow: 0 0 8px rgba(239, 68, 68, 0.4) !important;
    border: 1px solid rgba(255, 255, 255, 0.8);
  }
  #dropdown-stock {
    display: none;
    position: absolute;
    right: 0;
    top: 42px;
    background: white;
    color: #0f172a;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.15);
    width: 280px;
    max-height: 320px;
    overflow-y: auto;
    z-index: 1000;
    padding: 16px;
    transition: all 0.3s ease;
  }
  .dropdown-title {
    font-family: 'Outfit', sans-serif !important;
    font-size: 11px;
    font-weight: 700;
    color: #f97316;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }
  #lista-stock {
    display: flex;
    flex-direction: column;
    gap: 8px;
  }

  /* Usuario */
  .navbar-user {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 6px 14px !important;
    border-radius: 99px !important;
    background: rgba(15, 23, 42, 0.03) !important;
    border: 1px solid rgba(15, 23, 42, 0.06) !important;
    transition: all 0.25s ease;
    cursor: pointer;
  }
  .navbar-user:hover { 
    background: rgba(15, 23, 42, 0.06) !important; 
    border-color: rgba(15, 23, 42, 0.1) !important;
  }
  .navbar-user-name {
    color: #334155;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 0.3px;
  }
  .navbar-avatar {
    width: 28px !important;
    height: 28px !important;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #f97316 !important;
    box-shadow: 0 0 10px rgba(249, 115, 22, 0.2);
  }
  .navbar-exit {
    background: none;
    border: none;
    color: #64748b;
    font-size: 15px;
    cursor: pointer;
    padding: 6px 8px;
    border-radius: 6px;
    transition: background 0.2s, color 0.2s;
    text-decoration: none;
    display: flex;
    align-items: center;
  }
  .navbar-exit:hover {
    background: rgba(15, 23, 42, 0.05);
    color: #0f172a;
  }
</style>

<div class="navbar-pro">
  <div class="navbar-pro-left">
    <button class="navbar-menu-btn" id="btn-menu">
      <i class="fas fa-bars"></i>
    </button>
    <span class="navbar-brand">FerreMar</span>
  </div>

  <div class="navbar-pro-right">
    <!-- Notificaciones -->
    <div class="notif-wrapper">
      <button class="notif-btn" id="campana-notificacion">
        <i class="fas fa-bell"></i>
        <span id="contador-stock">0</span>
      </button>
      <div id="dropdown-stock">
        <div class="dropdown-title">Bajo stock</div>
        <div id="lista-stock"></div>
      </div>
    </div>

    <!-- Usuario -->
    <div class="navbar-user">
      <span class="navbar-user-name"><?php echo $_SESSION['usuario']; ?></span>
      <?php
        if (is_file("./app/views/fotos/" . $_SESSION['foto'])) {
          echo '<img class="navbar-avatar" src="' . APP_URL . 'app/views/fotos/' . $_SESSION['foto'] . '">';
        } else {
          echo '<img class="navbar-avatar" src="' . APP_URL . 'app/views/fotos/default.png">';
        }
      ?>
    </div>

  </div>
</div>