<?php
// Inicia a sessão PHP para gerenciar o login e as variáveis do usuário
session_start();

// --- LÓGICA BÁSICA DE SESSÃO E TEMA ---

// 1. Configuração Inicial do Usuário (se não estiver logado)
// Em um sistema real, essa informação viria APÓS o login.
if (!isset($_SESSION['usuario_nome'])) {
    $_SESSION['usuario_nome'] = "João da Silva";
    $_SESSION['unidade_atual'] = "São Paulo Matriz"; 
}

// 2. Determina a Classe do Tema
// O tema é salvo no localStorage (JS), mas o PHP pode ler isso se você
// usar cookies, ou simplesmente deixar o JS manipular a classe 'body'.
$body_class = '';
// Se você implementar a leitura de COOKIE PHP para o tema, ele seria aqui:
// if (isset($_COOKIE['portal_theme'])) {
//     $body_class = htmlspecialchars($_COOKIE['portal_theme']);
// }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal do Representante - Dashboard</title>
    <link rel="stylesheet" href="style.css"> 
</head>

<body class="<?php echo $body_class; ?>">

    <?php 
        // Em um projeto grande, você separaria o sidebar para inclusão
        // Por enquanto, vamos incluir o código do sidebar diretamente aqui para simplificar
        // Em seguida, adiciono o código que simula o sidebar.php
    ?>

    <aside class="sidebar" id="sidebar">
        <div class="menu-top">
            <h2>Portal de Vendas</h2>
            
            <nav class="main-nav">
                <ul>
                    <li><a href="index.php" class="active">📊 Dashboard</a></li> 
                    <li><a href="orcamento_pedido.php">📝 Orçamento / Pedido</a></li>
                    <li><a href="clientes.php">👥 Clientes</a></li>
                    <li><a href="produtos.php">📦 Produtos</a></li>
                </ul>
            </nav>
        </div>

        <div class="sidebar-footer">
            <div class="vendedor-info">
                <img src="caminho/para/foto_vendedor.jpg" alt="Foto do Vendedor" class="vendedor-foto">
                
                <span class="vendedor-nome">
                    <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>
                </span>

                <span class="unidade-atual">
                    Unidade: **<?php echo htmlspecialchars($_SESSION['unidade_atual']); ?>**
                </span>
            </div>
            
            <div class="vendedor-acoes">
                <button onclick="toggleSettingsPanel()" class="btn-configuracoes">⚙️ Configurações</button>
                
                <a href="logoff.php" class="btn-logoff">➡️ Logoff</a>
            </div>
        </div>
    </aside>

    <div id="settings-panel" class="settings-panel">
        <div class="settings-header">
            <h3>⚙️ Configurações</h3>
            <button onclick="toggleSettingsPanel()" class="close-btn">X</button>
        </div>

        <nav class="settings-nav">
            <ul>
                <li><button onclick="showSetting('unidade')" class="active" id="btn-unidade">🏢 Trocar Unidade</button></li>
                <li><button onclick="showSetting('temas')" id="btn-temas">🎨 Temas</button></li>
            </ul>
        </nav>

        <div class="settings-content">
            <div id="setting-unidade" class="setting-pane active-pane">
                <h4>Trocar de Unidade</h4>
                <p>Selecione a nova unidade para acessar dados específicos dela:</p>
                <select name="nova_unidade" id="nova_unidade">
                    <option value="SP">São Paulo Matriz</option>
                    <option value="RJ">Rio de Janeiro Filial</option>
                    <option value="MG">Minas Gerais Filial</option>
                </select>
                <button onclick="changeUnidade()" class="btn-save">Salvar Unidade</button>
            </div>

            <div id="setting-temas" class="setting-pane">
                <h4>Trocar de Tema</h4>
                <p>Mude o esquema de cores do seu portal:</p>
                <div class="theme-options">
                    <button onclick="applyTheme('default')" class="btn-theme default-theme">Padrão (Dark)</button>
                    <button onclick="applyTheme('white-blue')" class="btn-theme white-blue-theme">White Blue</button>
                    <button onclick="applyTheme('dark-blue')" class="btn-theme dark-blue-theme">Dark Blue</button>
                </div>
            </div>
        </div>
    </div>


    <main class="content">
        <header>
            <h1>📊 Dashboard</h1>
            <p>Seja bem-vindo, **<?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>**!</p>
        </header>
        
        <section class="page-content">
            <h3>📈 Resumo de Vendas - <?php echo htmlspecialchars($_SESSION['unidade_atual']); ?></h3>
            <p>Aqui você verá os principais indicadores (KPIs) da sua unidade:</p>
            
            <div class="kpi-grid">
                <div class="kpi-card">
                    <h4>Pedidos Abertos</h4>
                    <p class="data-big">15</p>
                </div>
                <div class="kpi-card">
                    <h4>Meta Mensal (%)</h4>
                    <p class="data-big color-success">78%</p>
                </div>
                <div class="kpi-card">
                    <h4>Melhor Cliente</h4>
                    <p class="data-big">Tecnologia Alfa</p>
                </div>
            </div>
            
            </section>
    </main>

    <script src="scripts.js"></script>

</body>
</html>