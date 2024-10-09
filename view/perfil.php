<?php
require_once(ROOT_PATH . 'model/conexao.php');

if (!isset($_SESSION['id_perfil'])) {
    die("Usuário não está logado. Faça o login novamente.");
}
$id_usuarios = $_SESSION['id_perfil'];

$sql = "SELECT p.nome, p.email, p.contato, p.cpf_cnpj, p.data_nasc, p.foto_perfil, 
               e.cep, e.estado, e.cidade, e.bairro, e.rua, e.pais
        FROM perfil p
        LEFT JOIN endereco e ON p.id_endereco = e.id
        WHERE p.id_usuarios = :id_usuarios";
$consulta = $pdo->prepare($sql);
$consulta->bindParam(':id_usuarios', $id_usuarios);
$consulta->execute();
$perfil = $consulta->fetch(PDO::FETCH_ASSOC);

if (!$perfil) {
    die("Perfil não encontrado.");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="/Ampera/view/CSS/perfil.css">
    <script>
        function triggerUpload() {
            document.getElementById('uploadImage').click();
        }

        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('profileImage').src = e.target.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
</head>

<body>
    <form action="controller/atualizar_usuario.php" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="section profile-image-section">
                <img id="profileImage" src="/Ampera/imagens/<?= $perfil['foto_perfil']?>" alt="Imagem do Perfil">
                <div class="profile-actions">
                    <button type="button" class="atualizar" name="foto_perfil" onclick="triggerUpload()">Atualizar imagem de perfil</button>
                    <input type="file" id="uploadImage" accept="image/*" style="display: none;" onchange="previewImage(event)">
                    <p>A imagem deve estar em JPG, JPEG ou PNG, e não pode ter mais de 10 MB.</p>
                </div>
            </div>

            <div class="section">
                <h2>Localização</h2>
                <label for="cep">CEP</label>
                <input type="text" id="cep" name="cep" value="<?= htmlspecialchars($perfil['cep']) ?>">
                <label for="estado">Estado</label>
                <input type="text" id="estado" name="estado" value="<?= htmlspecialchars($perfil['estado']) ?>">
                <label for="cidade">Cidade</label>
                <input type="text" id="cidade" name="cidade" value="<?= htmlspecialchars($perfil['cidade']) ?>">
                <label for="bairro">Bairro</label>
                <input type="text" id="bairro" name="bairro" value="<?= htmlspecialchars($perfil['bairro']) ?>">
                <label for="rua">Rua</label>
                <input type="text" id="rua" name="rua" value="<?= htmlspecialchars($perfil['rua']) ?>">
                <label for="pais">País</label>
                <input type="text" id="pais" name="pais" value="<?= htmlspecialchars($perfil['pais']) ?>">
            </div>


            <div class="section">
                <h2>Configurações de perfil</h2>
                <p>Alterar detalhes de identificação da sua conta</p>
                <label for="usuario">Usuário</label>
                <input type="text" id="usuario" name="usuario" value="<?= htmlspecialchars($perfil['nome']) ?>">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($perfil['email']) ?>">
                <label for="contato">Contato</label>
                <input type="text" id="contato" name="contato" value="<?= htmlspecialchars($perfil['contato']) ?>">
                <label for="cpf_cnpj">CPF/CNPJ</label>
                <input type="text" id="cpf_cnpj" name="cpf_cnpj" value="<?= htmlspecialchars($perfil['cpf_cnpj']) ?>">
                <button class="save-changes" type="submit">Salvar alterações</button>
            </div>
        </div>
    </form>
</body>

</html>