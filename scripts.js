// Função para abrir/fechar o Painel de Configurações
function toggleSettingsPanel() {
    const panel = document.getElementById('settings-panel');
    panel.classList.toggle('open');
}

// Função para trocar o conteúdo do Painel de Configurações
function showSetting(settingName) {
    // 1. Esconder todos os painéis de conteúdo
    document.querySelectorAll('.setting-pane').forEach(pane => {
        pane.classList.remove('active-pane');
    });

    // 2. Desativar todos os botões de navegação
    document.querySelectorAll('.settings-nav button').forEach(btn => {
        btn.classList.remove('active');
    });

    // 3. Mostrar o painel e ativar o botão correspondente
    document.getElementById(`setting-${settingName}`).classList.add('active-pane');
    document.getElementById(`btn-${settingName}`).classList.add('active');
}

// Inicializar mostrando o painel de unidade por padrão
document.addEventListener('DOMContentLoaded', () => {
    // Carregar o tema salvo
    const savedTheme = localStorage.getItem('portal_theme') || 'default';
    applyTheme(savedTheme, false); // Aplica o tema sem salvar novamente

    showSetting('unidade');
});


// Função de Troca de Tema (Simulação)
function applyTheme(themeName, save = true) {
    const body = document.body;
    
    // Remove todas as classes de tema
    body.classList.remove('default', 'white-blue', 'dark-blue');

    // Adiciona a classe do novo tema
    if (themeName !== 'default') {
        body.classList.add(themeName);
    }

    // Opcional: Salvar o tema no localStorage para persistir entre páginas
    if (save) {
        localStorage.setItem('portal_theme', themeName);
    }
}

// Função de Troca de Unidade (Placeholder)
function changeUnidade() {
    const select = document.getElementById('nova_unidade');
    const novaUnidade = select.options[select.selectedIndex].text;
    
    // SIMULAÇÃO: Em um sistema real, você faria uma requisição AJAX
    // para um arquivo PHP (ex: save_unidade.php) que atualizaria a $_SESSION.
    
    alert(`Unidade trocada com sucesso (simulado)! Nova Unidade: ${novaUnidade}. Você precisa recarregar a página para ver a mudança real.`);

    // Fechar o painel após a "troca"
    toggleSettingsPanel();
    
    // Para ver a mudança no painel real, você recarregaria a página, o que é feito no PHP.
    // window.location.reload(); 
}