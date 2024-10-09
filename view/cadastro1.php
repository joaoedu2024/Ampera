<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <link rel="stylesheet" href="/Ampera/view/CSS/cadastro.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" />
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery Mask Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <title>Cadastro de Endereço</title>
</head>

<body>
    <div class="register-container">
        <h1>Coloque suas informações</h1>
        <br>
        <form action="controller/cadastrar_endereco.php" method="POST">
            <div class="floating-label-container">
                <input id="cep" type="text" name="cep" placeholder=" " />
                <label for="cep">CEP</label>
            </div>
            <div class="floating-label-container">
                <input id="estado" type="text" name="estado" placeholder=" " />
                <label for="estado">Estado</label>
            </div>
            <div class="floating-label-container">
                <input id="cidade" type="text" name="cidade" placeholder=" " />
                <label for="cidade">Cidade</label>
            </div>
            <div class="floating-label-container">
                <input id="bairro" type="text" name="bairro" placeholder=" " />
                <label for="bairro">Bairro</label>
            </div>
            <div class="floating-label-container">
                <input id="rua" type="text" name="rua" placeholder=" " />
                <label for="rua">Rua</label>
            </div>
            <div class="floating-label-container">
                <input id="pais" type="text" name="pais" placeholder=" " />
                <label for="pais">País</label>
            </div>
            <br>
            <button class="register-btn" id="registrarText" type="submit">Registrar</button>
        </form>

        <button class="register-btn" onclick="getGeolocation()">Usar minha localização</button>

        <div class="divider">ou</div>
        <br>
        <a href="/Ampera/cadastro"><button class="register-btn" id="voltarText" type="button">Voltar</button></a>

        <div class="terms">
            Ao se registrar, você concorda com nossos Termos de Uso e reconhece que leu nossa Política de Privacidade.
        </div>
    </div>

    <script>

        $(document).ready(function() {
            $('#cep').mask('00000-000'); 
        });

        function getGeolocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;

                    // URL da API Nominatim (OpenStreetMap)
                    const url = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`;

                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            const address = data.address;

                            if (address) {
                                document.getElementById('cep').value = address.postcode || "";
                                document.getElementById('estado').value = address.state || "";
                                document.getElementById('cidade').value = address.city || address.town || address.village || "";
                                document.getElementById('bairro').value = address.suburb || address.neighbourhood || "";
                                document.getElementById('rua').value = address.road || address.pedestrian || "";
                                document.getElementById('pais').value = address.country || "";
                            } else {
                                alert("Não foi possível obter o endereço. Tente novamente.");
                            }
                        })
                        .catch(error => {
                            console.error('Erro na geocodificação:', error);
                            alert("Erro ao obter localização.");
                        });
                }, function(error) {
                    alert("Erro ao obter localização: " + error.message);
                });
            } else {
                alert("Geolocalização não é suportada neste navegador.");
            }
        }
    </script>
</body>

</html>