<?php
require_once(ROOT_PATH . 'model/conexao.php');

if (!isset($_SESSION['id_perfil'])) {
    die("Usuário não está logado. Faça o login novamente.");
}
$id_perfil = $_SESSION['id_perfil'];
$sql = "SELECT contato, email FROM perfil WHERE id_usuarios = :id_perfil";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id_perfil', $id_perfil);
$stmt->execute();
$perfil = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$perfil) {
    die("Erro ao buscar os dados de contato e email.");
}

$contato = htmlspecialchars($perfil['contato']);
$email = htmlspecialchars($perfil['email']);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ampera - Criar Oferta</title>
    <link rel="stylesheet" href="/Ampera/view/CSS/criar_oferta.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery Mask Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body>
    <br><br><br><br>
    <div class="negrito">
        <div class="container">
            <div class="section">
                <h2>Detalhes</h2>
                <form action="controller/cadastrar_ofertas.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="nome" placeholder="Nome da sua Oferta" required>
                    <textarea name="descricao" rows="5" cols="30" placeholder="Digite sua descrição"></textarea>
                    Categoria: 
                    <select name="categoria" required>
                        <option value="Tecnologia">Tecnologia</option>
                        <option value="Moda e Vestuário">Moda e Vestuário</option>
                        <option value="Beleza e Cuidados Pessoais">Beleza e Cuidados Pessoais</option>
                        <option value="Casa e Decoração">Casa e Decoração</option>
                        <option value="Esportes e Lazer">Esportes e Lazer</option>
                        <option value="Alimentos e Bebidas">Alimentos e Bebidas</option>
                        <option value="Automóveis e Acessórios">Automóveis e Acessórios</option>
                        <option value="Serviços">Serviços</option>
                        <option value="Brinquedos e Jogos">Brinquedos e Jogos</option>
                        <option value="Livros, Filmes e Música">Livros, Filmes e Música</option>
                        <option value="Animais e Acessórios">Animais e Acessórios</option>
                        <option value="Saúde e Bem-estar">Saúde e Bem-estar</option>
                        <option value="Eletrônicos e Eletrodomésticos">Eletrônicos e Eletrodomésticos</option>
                        <option value="Artigos Infantis">Artigos Infantis</option>
                    </select>
                    <br>
                    Status:
                    <select name="status" required>
                        <option value="A">Ativo</option>
                        <option value="I">Inativo</option>
                    </select>

            </div>
            <div class="section">
                <h2>Foto</h2>
                <div class="upload-box" id="uploadBox">
                    <img id="preview" src="/Ampera/imagens/upload.png" name="nome_foto" alt="Miniatura" class="placeholder">
                    <p>Fazer upload de miniatura</p>
                    <button type="button" id="uploadBtn">Procurar</button>
                    <input type="file" name="nome_foto" accept="image/*" id="uploadInput" required>
                    <p>ou arraste os arquivos até aqui</p>
                </div>
                <div class="contato">
                    <h2>Contato</h2>
                    <input type="text" name="contato" id="contato" value="<?= $contato ?>" required>
                    <input type="email" name="email" value="<?= $email ?>" required>
                    <button class="create-offer" type="submit">Criar oferta</button>
                </div>
            </div>
            
            </form>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#contato').mask('(00) 00000-0000');
    });

    // Preview da imagem após o upload via input
    function updatePreview(file) {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = function() {
            document.getElementById('preview').src = reader.result;
            document.getElementById('preview').classList.remove('placeholder');
        }
    }

    // Ao selecionar arquivo
    document.getElementById('uploadInput').onchange = function(evt) {
        const files = evt.target.files;
        if (files.length) {
            updatePreview(files[0]);
        }
    };

    // Ação do botão "Procurar"
    document.getElementById('uploadBtn').onclick = function() {
        document.getElementById('uploadInput').click();
    };

    // Implementação de drag and drop
    const uploadBox = document.getElementById('uploadBox');

    // comportamentos padrão ao arrastar e soltar
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        uploadBox.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    // Adicionar/remover classe "dragging" ao arrastar
    ['dragenter', 'dragover'].forEach(eventName => {
        uploadBox.addEventListener(eventName, () => {
            uploadBox.classList.add('dragging');
        }, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        uploadBox.addEventListener(eventName, () => {
            uploadBox.classList.remove('dragging');
        }, false);
    });

    // Lidar com o arquivo solto
    uploadBox.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        if (files.length) {
            updatePreview(files[0]);
        }
    }
    </script>
</body>

</html>