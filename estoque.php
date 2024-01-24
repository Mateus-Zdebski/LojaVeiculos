<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>

</head>


<body style="background-color:  #0e0d0d;">


    <nav class="navbar sticky-top navbar-expand-sm navbar-dark" id="navvbar">

        <!-- Logo -->
        <img src="Imagens/MOTORCODE__1_-removebg-preview.png" alt="" id="logo">

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
                    <a href="login.html" class="nav-link" style="color: white; font-size:20px;" 
                  ><b>Entrar</b></a>
                </li>
                <li class="nav-item" id="batata">
                    <a href="index.php#teste" class="nav-link" style="color: white; font-size:20px;" 
                    ><b>Sobre Nós</b></a>
                </li>
            </ul>
        </div>
    </nav>
    <h1 id="agaum"><b>VEÍCULOS</b></h1>
    <input placeholder="   Pesquisar" type="text" id="barraPesquisa1">

    <div class="botoes">
        <button id="sedan">
           <b> SEDAN</b>
        </button>
        <button id="suv">
           <b> SUV</b>
        </button>
        <button id="picape">
            <b>PICAPE</b>
        </button>
        <button id="esportivo">
            <b>ESPORTIVO</b>
        </button>
        <button id="eletrico">
           <b> ELETRICO</b>
        </button>
    </div>
    <div id="destaquesGerall">
        <?php
        $con = mysqli_connect("localhost", "root", "", "motorcode");
        $sql = 'select * from cadastro_veiculo';
        $query = mysqli_query($con, $sql);
        ?>
        <?php
        $contlin = 2;
        while ($linha = mysqli_fetch_array($query)) {
            $id = $linha['id_veiculos'];
            $marca =  $linha['Marca'];
            $modelo =  $linha['Modelo'];
            $preco =  $linha['Preco'];
            $ano =  $linha['Ano'];
            $kmrodado =  $linha['KmRodado'];
            $tipocombustivel =  $linha['TipoCombustivel'];
            $categoria = $linha['Categoria'];
        ?>

 <a  style="text-decoration: none" class="destaq1" href="/MotorCode/compra.php?id=<?php echo $linha['id_veiculos']; ?>">
           
                <div class="divImgEstoq">
                    <?php
                           $idVeiculo = $linha['id_veiculos'];
                           $imagem = $linha['imagem1'];
                   
                           // Verifique se a imagem existe
                           if (!empty($imagem)) {
                               echo '<img src="php2/uploads/' . $imagem . '" alt="Imagem do Veículo" class="imgdivImgEstoq">';
                           } else {
                               echo '<img src="caminho_da_imagem_padrao.jpg" alt="Imagem não disponível" class="imgEstoq">';
                           }
                           ?>
                    <?php
                    if ($contlin % 2 == 0) {
                    ?>

                    <?php
                    }
                    ?>


                    <h4 class="h4titEst"><u><?php echo $marca ?> <?php echo $modelo ?></u></h4>
                    <div id="divTxtDescri">

                        <p class="espCar1"><?php echo $ano ?></p>
                        <p class="espCar1"><?php echo $kmrodado ?>Km</p>
                        <p class="espCar1"><?php echo $tipocombustivel ?></p>
                        <p class="categoriaOcul" style="visibility: hidden;"><?php echo $categoria ?></p>
                    </div>
                    <h4 class="h4Estpreco1">R$<?php echo $preco ?></h4>
                </div>
           
</a>



        <?php
            $contlin = $contlin + 1;
        }
        ?>
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
                    <h5>Informações adicionais</h5>
                  
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    //     $(document).ready(function() {
    //         $(".destaq1 a").click(function(event) {
    //             const target = event.target.getAttribute("data-target");
    //             window.location.href = target;
    //         });
    //     });







        // Função para realizar a pesquisa
        const searchInput = document.getElementById("barraPesquisa1");
        const itemsToSearch = document.querySelectorAll(".destaq1");
        const searchResults = document.getElementById("destaquesGerall");
        const botoes = document.querySelectorAll('.botoes button')




        searchInput.addEventListener("input", performSearch);

        function performSearch() {
            const searchTerm = searchInput.value.trim().toLowerCase();

            searchResults.innerHTML = "";

            itemsToSearch.forEach(item => {
                const itemText = item.textContent.toLowerCase();
                if (itemText.includes(searchTerm)) {
                    const itemClone = item.cloneNode(true);
                    searchResults.appendChild(itemClone);
                }
            });

            if (searchResults.children.length === 0) {
                searchResults.innerHTML = '<p id="noResul"><b>Nenhum resultado encontrado.</b></p>';
            }
        }

        // Event listener para a tecla "keyup" no campo de pesquisa

        searchInput.addEventListener("keyup", performSearch);





        const itemsToSearch1 = document.querySelectorAll(".destaq1");
        const searchResults1 = document.getElementById("destaquesGerall");


        // Adiciona um ouvinte de evento de clique a cada botão
        botoes.forEach(function(botao) {
            botao.addEventListener('click', function() {
                var valorBtn1 = botao.id.toLowerCase()
                searchResults1.innerHTML = ""

                // Código a ser executado quando o botão for clicado
                console.log('Botão clicado: ' + botao.id);

                itemsToSearch1.forEach(item => {
                    const itemText1 = item.textContent.toLowerCase();
                    if (itemText1.includes(valorBtn1)) {
                        const itemClone = item.cloneNode(true);
                        searchResults1.appendChild(itemClone);
                    }
                });
            });
        });
    </script>

    <script src="../JavaScript/funções.js" async defer></script>

</body>

</html>