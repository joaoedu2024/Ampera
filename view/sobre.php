<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Página Moderna - Ampera</title>
    <link rel="stylesheet" href="/Ampera/view/CSS/sobre.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <script>
        var usuarioLogado = true;

        window.onload = function () {
            if (usuarioLogado) {
                document.getElementById("login-links").innerHTML = "<p>Atraia mais clientes e destaque-se no mercado! Criar um anúncio de oferta é simples e eficaz. <br> Mostre o que você tem de melhor e conecte-se com um público qualificado. </p>";
            }
        }
    </script>
</head>

<body>
    <section class="hero-section">
        <h1>Bem-vindo à Ampera</h1>
        <h2>Conectando Vendedores e Compradores</h2>
        <br>
        <p>Descubra uma nova forma de fazer negócios com nossa plataforma</p>
    </section>
    <section class="features-section">
        <h2>Características</h2>
        <br>
        <div class="features-grid">
            <div class="feature-item">
                <img src="/Ampera/imagens/icone5.png" alt="Icone Inovação">
                <h3>Inovação</h3>
                <p>Produtos de ponta que destacam sua empresa no mercado.</p>
                <div class="extra-info">
                    <p>Nosso compromisso é trazer as inovações mais recentes do setor para ajudar você a alcançar novos patamares.</p>
                    <p><b>Vantagens:</b> Aumento da visibilidade, soluções únicas e personalizadas.</p>
                </div>
            </div>
            <div class="feature-item">
                <img src="/Ampera/imagens/icone6.png" alt="Icone Tecnologia">
                <h3>Tecnologia</h3>
                <p>Ferramentas avançadas que garantem a excelência dos seus serviços.</p>
                <div class="extra-info">
                    <p>Com nossa tecnologia de ponta, você otimiza processos e aumenta a produtividade.</p>
                    <p><b>Vantagens:</b> Integração digital, automação, suporte contínuo.</p>
                </div>
            </div>
            </div>
        </div>

        <section class="features-section">
            <div class="features-grid">
                <div class="feature-item">
                    <img src="/Ampera/imagens/icone3.png" alt="Ícone Escalabilidade">
                    <h3>Escalabilidade</h3>
                    <p>Soluções flexíveis que crescem junto com sua empresa.</p>
                    <div class="extra-info">
                        <p>Suporte ao seu crescimento contínuo, com soluções que acompanham suas necessidades em expansão.</p>
                        <p><b>Vantagens:</b> Flexibilidade de planos, modularidade, recursos expansíveis.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <img src="/Ampera/imagens/icone1.png" alt="Icone Segurança">
                    <h3>Segurança</h3>
                    <p>Plataforma segura para proteger seus dados e suas informações.</p>
                    <div class="extra-info">
                        <p>Adotamos os mais altos padrões de segurança, protegendo suas informações sensíveis.</p>
                        <p><b>Vantagens:</b> Criptografia avançada, monitoramento 24/7, backups automáticos.</p>
                    </div>
                </div>
            </div>
        </section>

    </section>
    <section class="parallax-section">
        <div class="parallax-content">
            <h2>Ampera</h2>
            <p>Atraia os clientes ideais para o seu negócio com Ampera! Conecte-se com os Produtores e Empresas que valorizam o seu Trabalho e desfrute de <br> uma inscrição gratuita, rápida e fácil. Com Ampera, você pode alcançar o público certo e destacar o que torna o seu estabelecimento único.</p>
        </div>
    </section>

    <section class="testimonial-section">
        <h2>O que nossos clientes estão dizendo?</h2>
        <div class="testimonials-grid">
            <div class="testimonial-item">
                <p>"Desde que começamos a usar a Ampera, nossos clientes aumentaram significativamente e a plataforma é incrivelmente fácil de usar!"</p>
                <h3>- Ana Souza, Empresária</h3>
            </div>
            <div class="testimonial-item">
                <p>"A segurança que a Ampera nos proporciona é incomparável, além de suas ferramentas tecnológicas serem uma mão na roda."</p>
                <h3>- Lucas Pereira, Empreendedor</h3>
            </div>
            <div class="testimonial-item">
                <p>"Conseguimos automatizar muitos processos com as soluções da Ampera, o que nos trouxe uma grande vantagem competitiva."</p>
                <h3>- Fernanda Lima, Diretora de TI</h3>
            </div>
            <div class="testimonial-item">
                <p>"A Ampera transformou a forma como gerenciamos nossas demandas. O modo de como o site funciona é excepcional!"</p>
                <h3>- João Silva, Gerente de Marketing</h3>
            </div>
            <div class="testimonial-item">
                <p>"A interface é intuitiva e me ajuda a focar no que realmente importa: meu negócio."</p>
                <h3>- Carla Martins, Proprietária de Loja</h3>
            </div>
            <div class="testimonial-item">
                <p>"O Ampera me ajudou a alcançar novos clientes e a expandir meus negócios de forma significativa."</p>
                <h3>- Ricardo Gomes, CEO de Startup</h3>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <h2>Vamos começar?</h2>
        <p>Crie sua oferta ainda hoje para atrair a atenção de empresas e produtores de alto nível.</p>
        <a href="criar-oferta" class="cta-button">Anunciar agora!</a>
        <div id="login-links" class="cta-links">
            <span>Já está logado? </span>
            <a href="login">Fazer login na Ampera</a>
            <a>|</a>
            <a href="cadastro">Cadastrar-se na Ampera</a>
        </div>
    </section>

</body>

</html>
