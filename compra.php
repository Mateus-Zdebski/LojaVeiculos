<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Adicione esses links no head do seu HTML -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyDEU1y6IbBt6PD1dySLwnf+rLea21z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8Wv5qJW5Y7F" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyDEU1y6IbBt6PD1dySLwnf+rLea21z" crossorigin="anonymous"></script>

</head>
<style>
    .form-item {
        display: flex;
        flex-direction: column;
    }

    .form-item label {
        margin-bottom: 5px;
    }

    h5 {
        top: 10px;
        opacity: 70%;
    }

    #imagemCarousel .carousel-control-prev:not(.disabled):hover {
        color: #ff0000 !important;
    }

    /* Adicione este bloco no seu arquivo de estilo CSS ou no estilo interno da sua página */
    .footer {
        background-color: #343a40;
        color: #ffffff;
    }

    .footer a {
        color: #ffffff;
    }

    .footer a:hover {
        color: #f8f9fa;
    }
</style>
<?php
include 'PHP/Conexao.php';

// Verifique se o ID foi passado na URL e se é um número válido
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];

    // Consulta SQL para obter os detalhes do veículo com o ID especificado
    $sql = "SELECT * FROM cadastro_veiculo WHERE id_veiculos = $id";

    // Execute a consulta
    $executa = mysqli_query($con, $sql);

    // Populate the $resultado array only if the query is successful
    if ($executa && mysqli_num_rows($executa) > 0) {
        $resultado = mysqli_fetch_array($executa);
    }
} else {
    echo "ID de veículo inválido.";
}

?>

<body style="background-color: #0e0d0d;">

    <nav class="navbar sticky-top navbar-expand-sm navbar-dark" id="navvbar">

        <!-- Logo -->
        <img src="Imagens/MOTORCODE__1_-removebg-preview.png" alt="" id="logo">

        <!-- Menu Hamburguer -->
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navegacao">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- navegacao -->
        <div class="collapse navbar-collapse" id="navegacao">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a href="index.php" class="nav-link" style="color: white; font-size:20px;" 
                ><b>Home</b></a>
                </li>
                <li class="nav-item">
                    <a href="estoque.php" class="nav-link" style="color: white; font-size:20px;" 
                  ><b>Veículos</b></a>
                </li>
                <li class="nav-item">
                    <a href="login.html" class="nav-link"style="color: white; font-size:20px;" 
                   ><b>Entrar</b></a>
                </li>
                <li class="nav-item" id="batata">
                    <a href="index.php#teste" class="nav-link"style="color: white; font-size:20px;"
                 ><b>Sobre Nós</b></a>
                </li>
            </ul>
        </div>
    </nav>
    <div style="display: flex;  flex-direction: column; ">
        <div id="geralcompra">
            <div id="ladoEsq">
                <div id="divimgcompra">

                    <div id="imagemCarousel" class="carousel slide" data-ride="carousel" data-slides-to-show="3" data-slides-to-scroll="3">

                        <?php
                        echo '<div class="carousel-inner" style="border-radius: 10px; box-shadow: 0 0 20px black;">';

                        for ($i = 1; $i <= 4; $i++) {
                            $imagePath = $resultado['imagem' . $i];

                            if (!empty($imagePath)) {
                                // Adiciona a classe 'active' à primeira imagem para começar o carrossel
                                $activeClass = ($i == 1) ? 'active' : '';

                                echo '<div class="carousel-item ' . $activeClass . '">';
                                echo '<img src="php2/uploads/' . $imagePath . '" alt="" class="d-block w-100 divimgcompra">';
                                echo '</div>';
                            }
                        }

                        echo '</div>';
                        echo '<a class="carousel-control-prev" href="#imagemCarousel" role="button" data-slide="prev">';
                        echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
                        echo '<span class="sr-only">Anterior</span>';
                        echo '</a>';
                        echo '<a class="carousel-control-next" href="#imagemCarousel" role="button" data-slide="next">';
                        echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
                        echo '<span class="sr-only">Próximo</span>';
                        echo '</a>';


                        ?>
                    </div>

                </div>
                <div id="infoCompra">
                    <div id="fichaCompra">
                        <input type="hidden" class="form-control" id="id_veiculos" name="id_veiculos" value="<?php echo $resultado["id_veiculos"]; ?>" />
                        <div id="tituloCarCompra">

                            <h2 id="Marca"><?php echo $resultado["Marca"] ?> </h2>
                        </div>
                        <br>
                        <div id="InfoCarro">
                            <div class="InfoIndividul">
                                <h5>CATEGORIA</h5>
                                <p id="Categoria" class="infotxt"><?php echo $resultado["Categoria"]; ?></p>
                            </div>
                            <div class="InfoIndividul">
                                <h5>ANO</h5>
                                <p id="Ano" class="infotxt"><?php echo $resultado["Ano"]; ?></p>
                            </div>
                            <div class="InfoIndividul">
                                <h5>CAMBIO</h5>
                                <p id="Cambio" class="infotxt"><?php echo $resultado["Cambio"]; ?></p>
                            </div>
                        </div>
                        <br>

                        <div id="InfoCarro">
                            <div class="InfoIndividul">
                                <h5>COMBUSTÍVEL</h5>
                                <p id="TipoCombustivel" class="infotxt"><?php echo $resultado["TipoCombustivel"]; ?></p>
                            </div>
                            <div class="InfoIndividul">
                                <h5>COR</h5>
                                <p id="Cor" class="infotxt"><?php echo $resultado["Cor"]; ?></p>
                            </div>
                            <div class="InfoIndividul">
                                <h5>KM RODADO</h5>
                                <p id="KmRodado" class="infotxt"><?php echo $resultado["KmRodado"]; ?></p>
                            </div>
                        </div>

                    </div>
                    <div id="descricaoCompra">
                        <h5>DESCRIÇÃO</h5>
                        <p id="Descricao" class="infotxt"><?php echo $resultado["Descricao"]; ?></p>
                    </div>
                </div>
            </div>
            <div id="ladoDir">
                <form id="formulario" method="post">
                    <div id="divProposta" style="position: sticky;">
                        <div>
                            <h2 id="Preco">R$<?php echo $resultado["Preco"]; ?></h2>
                        </div>
                        <br>
                        <br>
                        <div id="dadosCompra">
                            <h4>Envie sua proposta</h4>
                            <div class="form-group">
                                <div class="form-item">
                                    <label for="name">Nome:</label>
                                    <input type="name" class="form-control rounded-pill" id="email" name="name" placeholder="Nome" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-item">
                                    <label for="email">E-mail:</label>
                                    <input type="email" class="form-control rounded-pill" id="email" name="email" placeholder="E-mail" required>
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <div class="form-item">
                                    <label for="telefone">Telefone:</label>
                                    <input type="tel" class="form-control rounded-pill" id="telefone" name="tel" placeholder="Telefone" required>
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <div class="form-item">
                                    <label for="assunto">Proposta:</label>
                                    <textarea class="form-control rounded" id="assunto" name="message" rows="5" placeholder="Escreva sua mensagem aqui..." required></textarea>
                                </div>
                            </div>

                            <div class="botoes">
                                <button onclick="myFunction()" id="eletrico" type="submit">
                                    Enviar
                                </button>
                            </div>
                            <input type="hidden" name="accessKey" value="19a0db0e-a78c-4c34-9039-9d074859674f">
                            <input type="hidden" name="redirectTo" value="http://localhost/MotorCode/compra.php?id=<?php echo $resultado['id_veiculos']; ?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer style="background-color: #000000; box-shadow: 0 10px 40px #5d00ff " class="footer mt-auto py-3">
        <div class="container">
        <div class="row">
                <div class="col-md-4" style="color: white;">
                    <h5>Informações de Contato</h5>
                    <p>Email: contato@seusite.com</p>
                    <p>Telefone: (123) 456-7890</p>
                </div>
                <div class="col-md-4" style="color: white;">
                    <h5>Informações Adicionais</h5>
                  
                </div>
                <div class="col-md-4" style="color: white;">
                    <h5>Redes Sociais</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Instagram</a></li>
                    </ul>
                </div>
            </div>
            <hr class="mt-2 mb-3">
            <p class="text-muted">&copy; 2023 Seu Site. Todos os direitos reservados.</p>
        </div>
    </footer>


    <script>
       function myFunction() {
    var confirmar = window.confirm("Você tem certeza de que deseja enviar isso?");
    
    if (confirmar) {
        // Ação a ser executada se o usuário confirmar
        alert("Seu veículo foi levado para análise");

       
        var formulario = document.getElementById('formulario'); // Substitua 'seuFormulario' pelo ID real do seu formulário
        formulario.action = "https://api.staticforms.xyz/submit";
        formulario.submit();
    }else{
        alert("Envio cancelado");
    }
}
    </script>

    <script>
        function redirectToEditPage(idVeiculo) {
            if (idVeiculo && Number.isInteger(idVeiculo)) {
                // Certifica-se de que idVeiculo é um número inteiro válido
                window.location.href = '/MotorCode/php2/EditarVeiculo.php?id=' + idVeiculo;
            } else {
                console.error('ID de veículo inválido:', idVeiculo);
            }
        }

        function excluirVeiculo(id) {
            window.location.href = '/MotorCode/php2/ExcluVeiculos.php?id_veiculos=' + id;

        }

        function redirecionarParaWhatsApp() {
            // Número de telefone com código de país (por exemplo, +55 para o Brasil)
            var numeroTelefone = '+5547988388696';

            // Mensagem pré-populada (opcional)
            var mensagem = document.getElementById('assunto').value;

            // Monta o link do WhatsApp
            var linkWhatsApp = 'https://wa.me/' + numeroTelefone + '?text=' + encodeURIComponent(mensagem);

            // Redireciona para o link do WhatsApp
            window.location.href = linkWhatsApp;
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="JavaScript/funções.js" async defer></script>
</body>


</html>