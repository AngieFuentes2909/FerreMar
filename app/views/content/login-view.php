<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }

  .login-page {
    display: flex;
    height: 100vh;
    width: 100%;
    font-family: 'RobotoRegular', sans-serif;
  }

  /* Panel izquierdo naranja */
  .login-brand-panel {
    width: 42%;
    background-color: #f97316;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 48px;
    gap: 20px;
  }
  .login-brand-logo {
    width: 72px;
    height: 72px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    font-weight: 700;
    color: #f97316;
  }
  .login-brand-name {
    color: white;
    font-size: 24px;
    font-weight: 600;
    font-family: 'OswaldLight', sans-serif;
    letter-spacing: 1px;
  }
  .login-brand-desc {
    color: rgba(255,255,255,0.75);
    font-size: 14px;
    text-align: center;
    line-height: 1.6;
  }
  .login-brand-dots {
    display: flex;
    gap: 8px;
    margin-top: 16px;
  }
  .login-brand-dots span {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: rgba(255,255,255,0.4);
  }
  .login-brand-dots span.active {
    background: white;
    width: 24px;
    border-radius: 4px;
  }

  /* Panel derecho formulario */
  .login-form-panel {
    width: 58%;
    background: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 48px;
  }
  .login-form-inner {
    width: 100%;
    max-width: 380px;
  }
  .login-form-title {
    font-size: 26px;
    font-weight: 600;
    color: #1a1a1a;
    margin-bottom: 6px;
    font-family: 'OswaldLight', sans-serif;
  }
  .login-form-subtitle {
    font-size: 14px;
    color: #888;
    margin-bottom: 36px;
  }
  .login-field {
    margin-bottom: 20px;
  }
  .login-field label {
    display: block;
    font-size: 13px;
    color: #555;
    margin-bottom: 6px;
    font-weight: 500;
  }
  .login-field input {
    width: 100%;
    padding: 12px 16px;
    border: 1.5px solid #e5e7eb;
    border-radius: 10px;
    font-size: 14px;
    color: #1a1a1a;
    background: #fafafa;
    transition: border-color 0.2s, box-shadow 0.2s;
    outline: none;
  }
  .login-field input:focus {
    border-color: #f97316;
    box-shadow: 0 0 0 3px rgba(249,115,22,0.12);
    background: #fff;
  }
  .login-btn {
    width: 100%;
    padding: 13px;
    background: #f97316;
    color: white;
    border: none;
    border-radius: 10px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s, transform 0.1s;
    margin-top: 8px;
    letter-spacing: 0.3px;
  }
  .login-btn:hover {
    background: #ea6c0a;
  }
  .login-btn:active {
    transform: scale(0.98);
  }
  .login-footer {
    text-align: center;
    margin-top: 28px;
    font-size: 12px;
    color: #bbb;
  }

  /* Responsive */
  @media (max-width: 680px) {
    .login-brand-panel { display: none; }
    .login-form-panel { width: 100%; padding: 32px 24px; }
  }
</style>

<div class="login-page">

  <!-- Panel izquierdo -->
  <div class="login-brand-panel">
    <div class="login-brand-logo">F</div>
    <div class="login-brand-name">FerreMar</div>
    <div class="login-brand-desc">
      Sistema de gestión de ventas,<br>
      inventario y clientes.
    </div>
    <div class="login-brand-dots">
      <span class="active"></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <!-- Panel derecho -->
  <div class="login-form-panel">
    <div class="login-form-inner">
      <div class="login-form-title">Bienvenido</div>
      <div class="login-form-subtitle">Inicia sesión con tu cuenta para continuar</div>

      <?php
        if (isset($_POST['login_usuario']) && isset($_POST['login_clave'])) {
          $insLogin->iniciarSesionControlador();
        }
      ?>

      <form action="" method="POST" autocomplete="off">
        <div class="login-field">
          <label for="login_usuario">Usuario</label>
          <input
            type="text"
            id="login_usuario"
            name="login_usuario"
            placeholder="Tu nombre de usuario"
            pattern="[a-zA-Z0-9]{4,20}"
            maxlength="20"
            required
          >
        </div>
        <div class="login-field">
                    <label for="login_clave">Contraseña</label>
                    <input
                        type="password"
                        id="login_clave"
                        name="login_clave"
                        placeholder="••••••••"
                        maxlength="100"
                        required>
                </div>
        <button type="submit" class="login-btn">Iniciar sesión</button>
      </form>

      <div class="login-footer">
        FerreMar &copy; <?php echo date('Y'); ?>
      </div>
    </div>
  </div>

</div>