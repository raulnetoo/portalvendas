<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal do Representante - Dashboard</title>
    <link rel="stylesheet" href="assets/css/main.css"> 
</head>
<body>

    <aside class="sidebar">
        <div class="menu-top">
            <h2>Portal de Vendas</h2>
            
            <nav class="main-nav">
                <ul>
                    <li><a href="dashboard.php">📊 Dashboard</a></li>
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
                    <?php 
                        // Exemplo de como você obterá o nome de um sistema de sessão:
                        // echo $_SESSION['usuario_nome']; 
                        echo "João da Silva (Rep. 123)"; // Exemplo
                    ?>
                </span>
            </div>
            
            <div class="vendedor-acoes">
                <a href="trocar_unidade.php" class="btn-unidade">🏢 Trocar Unidade</a>
                
                <a href="logoff.php" class="btn-logoff">➡️ Logoff</a>
            </div>
        </div>
    </aside>

    <main class="content">
        <header>
            <h1>Dashboard</h1>
            </header>
        
        <section class="page-content">
            <p>Bem-vindo ao seu painel de controle. Aqui você verá seus KPIs e resumos.</p>
        </section>
    </main>

    <script src="scripts.js"></script>
</body>
</html>