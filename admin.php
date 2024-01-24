<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>

    </style>
</head>

<body style="background-color:  #0e0d0d;">
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- <h2>Barra de navegação com menu responsivo</h2>-->


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
                    <p  class="nav-link" style="color: white; font-size:20px;"><b>ADMINISTRADOR</b></p>
                </li>
                <li class="nav-item">
                    <a href="admin.php" class="nav-link"style="color: white; font-size:20px;" 
                  ><b>Home</b></a>
                </li>
                <li class="nav-item">
                    <a href="estoqueadmin.php" class="nav-link" style="color: white; font-size:20px;"
                  ><b>Veículos</b></a>
                </li>
                <li class="nav-item">
                    <a href="php2/cadastrarCert.php" class="nav-link"style="color: white; font-size:20px;" 
                    ><b>Cadastrar</b></a>
                </li>
                <li class="nav-item">
                    <a href="login.html" class="nav-link" style="color: white; font-size:20px;"
                   ><b>Voltar</b></a>
                </li>
            </ul>
        </div>
    </nav>

    <video id="imgInicio" autoplay muted loop>
  <source src="Imagens/lv_0_20231204212553.mp4" type="video/mp4">
</video>


    <input placeholder="   Pesquisar" type="text" id="barraPesquisa">

    <div class="botoes">
        <button id="sedan">
            <b>SEDAN</b>
        </button>
        <button id="suv">
          <b>  SUV</b>
        </button>
        <button id="picape">
           <b> PICAPE</b>
        </button>
        <button id="esportivo">
           <b> ESPORTIVO</b>
        </button>
        <button id="eletrico">
           <b> ELETRICO</b>
        </button>
    </div>
    <div id="txtDestaques">
            <h3 style="color: white; font-size:5vh;   padding-inline-start: 10%; margin-top: 50px"><b>DESTAQUES</b></h3>
        </div>
    <div id="destaquesGerall">
 
        <?php
        $con = mysqli_connect("localhost", "root", "", "motorcode");
        $sql = 'select * from cadastro_veiculo LIMIT 5';
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


            <div class="destaq1">
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
                </div>
                <div class="divDescricao">

                    <h4 class="h4titEst"><u><?php echo $marca ?> <?php echo $modelo ?></u></h4>
                    <div id="divTxtDescri">

                        <p class="espCar1"><?php echo $ano ?></p>
                        <p class="espCar1"><?php echo $kmrodado ?>Km</p>
                        <p class="espCar1"><?php echo $tipocombustivel ?></p>
                        <p class="categoriaOcul" style="visibility: hidden;"><?php echo $categoria ?></p>
                    </div>
                    <h4 class="h4Estpreco1">R$<?php echo $preco ?></h4>
                    
                </div>
            </div>




        <?php
            $contlin = $contlin + 1;
        }
        ?>
    </div>
    </div>
    <div class="divBtEstoq">
        <a style="text-decoration: none" href="estoqueadmin.php">
            <button class="btnEstoque">
                <p class="txtCategoria"><b>ESTOQUE</b></p>
            </button>
        </a>

    </div>

    <div class="controls">
        <button id="prevBtn">Anterior</button>
        <button id="nextBtn">Próxima</button>
    </div>
    <div id="teste"></div>
    <div id="divHist">
        <div id="osdoisjuntoHist">
            <div id="titHist">
                <h1 style="color: white; opacity: 50%; font-size: 7vh;"><b>NOSSA HISTÓRIA</b></h1>
            </div>
            <div id="txtHist">
                <p style="color: white; font-family: 'league-spartan-master', sans-serif ; font-size: 1.3vw;"><b>
                        A Motorcode Vendas de Veículos é sua parceira confiável na busca pelo carro dos seus sonhos.
                        Oferecemos uma seleção cuidadosamente escolhida de veículos novos e usados, atendendo a uma
                        variedade de estilos e orçamentos. Nossa equipe apaixonada e experiência está pronta para ajudá-lo a
                        encontrar o veículo perfeito e oferecer as melhores condições de compra. Na Motorcode,
                        comprometemo-nos com a qualidade, transparência e satisfação do cliente. Venha nos visitar e
                        descubra a diferença Motorcode!</b></p>
            </div>
        </div>
        <div id="imgHist">
            <img src="Imagens/lrBxbeg - Imgur.png" alt="" id="imagemm">

        </div>
    </div>
    <footer class="footer mt-auto py-3">
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="JavaScript/funções.js" async defer></script>
    <script>

        // Função para realizar a pesquisa
        const searchInput = document.getElementById("barraPesquisa");
        const itemsToSearch = document.querySelectorAll(".destaq1");
        const searchResults = document.getElementById("destaquesGerall");

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

        const botoes = document.querySelectorAll('.botoes button')
        // Adiciona um ouvinte de evento de clique a cada botão
        botoes.forEach(function(botao) {
            botao.addEventListener('click', function() {
                var valorBtn = botao.id.toLowerCase()
                searchResults.innerHTML = ""

                // Código a ser executado quando o botão for clicado
                console.log('Botão clicado: ' + botao.id);

                itemsToSearch.forEach(item => {
                    const itemText1 = item.textContent.toLowerCase();
                    if (itemText1.includes(valorBtn)) {
                        const itemClone = item.cloneNode(true);
                        searchResults.appendChild(itemClone);
                    }
                });
            });
        });


        const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");
const boxes = document.querySelectorAll(".destaq1");
let currentIndex = 0;

function showBox(index) {
  boxes.forEach((box, i) => {
    if (i === index) {
      box.style.display = "block";
    } else {
      box.style.display = "none";
    }
  });
}

function checkScreenSize() {
  if (window.innerWidth <= 768) {
    showBox(currentIndex);
    prevBtn.style.display = "block";
    nextBtn.style.display = "block";
  } else {
    boxes.forEach((box) => {
      box.style.display = "block";
    });
    prevBtn.style.display = "none";
    nextBtn.style.display = "none";
  }
}

checkScreenSize();

prevBtn.addEventListener("click", () => {
  currentIndex = (currentIndex - 1 + boxes.length) % boxes.length;
  showBox(currentIndex);
});

nextBtn.addEventListener("click", () => {
  currentIndex = (currentIndex + 1) % boxes.length;
  showBox(currentIndex);
});

window.addEventListener("resize", checkScreenSize);

    </script>
</body>

</html>