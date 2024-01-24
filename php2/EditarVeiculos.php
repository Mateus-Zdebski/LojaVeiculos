<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<style>
    #navvbar {
        top: 0;
        background-image: linear-gradient(to right, #1e072e, #560f85, #6f0ab3) ;
        z-index: 1;
        box-shadow: 0 10px 40px #00000091;
    }

    .nav-link {
        transition: background-color 0.1s, transform 0.1s;
    }

    .nav-link:hover {
        transform: scale(1.1);
    }

    #logo-tipo {
        width: 350px;
        min-width: 290px;
        height: 100px;
        object-fit: cover;
    }

    #imagem1,
    #imagem2,
    #imagem3,
    #imagem4 {
        border: 2px solid;
        border-color: white;
        border-radius: 11px;
        width: 23.5%;
        height: 40vh;
        margin: 0 auto;

    }

    #Editar {
        border: none;
        background-color: #6f0ab3;
        width: 160px;
        min-width: 95px;
        height: 55px;
        border-radius: 9px;
        box-shadow: 0 0 19px #00000093;
        color: azure;
        display: flex;
        justify-content: center;
        font-family: 'league-spartan-master', sans-serif;
        align-items: center;
        transition: background-color 0.3s, transform 0.3s;

    }

    #Editar:hover {
        transform: scale(1.1);
    }

    #Editar:focus {
        outline: none;
    }

    #boxImagens {
        /* Adicione a propriedade position para que a posição absoluta funcione nos filhos */
        position: relative;
        margin-top: 20px;
        display: flex;
        justify-content: space-evenly;
    }

    /* Adicione o estilo para a imagem dentro de cada div */
    .imagem-dinamica {
        width: 23.5%;
        height: 100%;
        object-fit: cover;
        /* Ajusta a imagem às proporções da div mantendo a proporção */
        position: absolute;
        /* Garante que a imagem fique sobreposta */
        top: 0;
        border-radius: 11px;
    }

    #informaçõesComp {
        padding: 3%;
        color: #4700c1;
    }

    label {
        color: white;
        font-size: 25px;
    }

    input {
        height: 45px;
        border: 2px solid white;
        border-radius: 8px;
        margin-bottom: 2%;

    }

    input:focus {
        outline: none;
    }

    .entradas {
        display: flex;
        flex-direction: column;
    }
</style>



<body style="background-color:  #0e0d0d;">
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark" id="navvbar">

        <!-- Logo -->
        <img src="../Imagens/MOTORCODE__1_-removebg-preview.png" alt="" class="navbar-brand" id="logo-tipo">

        <!-- Menu Hamburguer -->
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navegacao">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- navegacao -->
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <p class="nav-link" style="color: white; font-size:20px;"><b>ADMINISTRADOR</b></p>
                </li>
                <li class="nav-item">
                    <a href="../admin.php" class="nav-link" style="color: white; font-size:20px;"
                    ><b>Home</b></a>
                </li>
                <li class="nav-item">
                    <a href="../estoqueadmin.php" class="nav-link" style="color: white; font-size:20px;"
                   ><b>Veículos</b></a>
                </li>
                <li class="nav-item">
                    <a href="../php2/cadastrarCert.php" class="nav-link" style="color: white; font-size:20px;"
                   ><b>Cadastrar</b></a>
                </li>
                <li class="nav-item">
                    <a href="../estoqueadmin.php" class="nav-link" style="color: white; font-size:20px;"
                  ><b>Voltar</b></a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
    $db = new mysqli('localhost', 'root', '', 'motorcode');

    // Verifica se o ID do veículo foi passado pela URL
    if (isset($_GET['id'])) {
        $id = $db->real_escape_string($_GET['id']);

        // Consulta SQL para buscar as informações do veículo com base no ID
        $sql = "SELECT * FROM cadastro_veiculo WHERE id_veiculos = '$id'";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            $veiculo = $result->fetch_assoc();

            // Preenche as variáveis com os dados do veículo para utilizar no HTML
            $marca = $veiculo['Marca'];
            $modelo = $veiculo['Modelo'];
            $categoria = $veiculo['Categoria'];
            $preco = $veiculo['Preco'];
            $ano = $veiculo['Ano'];
            $cambio = $veiculo['Cambio'];
            $tipoCombustivel = $veiculo['TipoCombustivel'];
            $cor = $veiculo['Cor'];
            $kmRodado = $veiculo['KmRodado'];
            $descricao = $veiculo['Descricao'];
            $imagePath1 = $veiculo['imagem1'];
            $imagePath2 = $veiculo['imagem2'];
            $imagePath3 = $veiculo['imagem3'];
            $imagePath4 = $veiculo['imagem4'];
        }
    }
    ?>
    <form action="RecaVeiculos.php" method="POST" enctype="multipart/form-data">

        <div id="geralComp">
            <div id="boxImagens">
                <input type="hidden" name="id_veiculos" value="<?php echo isset($id) ? $id : ''; ?>">

                <div id="imagem1">
                    <?php
                    echo '<img src="uploads/' . $imagePath1 . '" alt="" class="imagem-dinamica">';
                    ?>
                    <div style="height: 100%;">
                        <input style="height: 100%;" for="imagem" type="file" class="custom-file-input" id="input-b1" name="images[]" multiple>
                    </div>
                    <div style="position: relative;  display: flex; justify-content: center; top: -63%;">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                <path d="M2480 4288 c-18 -13 -43 -36 -54 -51 -21 -28 -21 -35 -24 -773 l-2
                            -744 -744 -2 c-738 -3 -745 -3 -773 -24 -98 -73 -98 -195 0 -268 28 -21 35
                            -21 773 -24 l744 -2 2 -744 c3 -738 3 -745 24 -773 73 -98 195 -98 268 0 21
                            28 21 35 24 773 l2 744 744 2 c738 3 745 3 773 24 98 73 98 195 0 268 -28 21
                            -35 21 -773 24 l-744 2 -2 744 c-3 738 -3 745 -24 773 -35 48 -82 73 -134 73
                            -32 0 -57 -7 -80 -22z" />
                            </g>
                        </svg>
                    </div>
                </div>

                <div id="imagem2">
                    <?php
                    echo '<img src="uploads/' . $imagePath2 . '" alt="" class="imagem-dinamica">';
                    ?>
                    <div style="height: 100%;">
                        <input style="height: 100%;" for="imagem" type="file" class="custom-file-input" id="input-b2" name="images[]" multiple>
                    </div>
                    <div style="position: relative;  display: flex; justify-content: center; top: -63%;">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                <path d="M2480 4288 c-18 -13 -43 -36 -54 -51 -21 -28 -21 -35 -24 -773 l-2
                                -744 -744 -2 c-738 -3 -745 -3 -773 -24 -98 -73 -98 -195 0 -268 28 -21 35
                                -21 773 -24 l744 -2 2 -744 c3 -738 3 -745 24 -773 73 -98 195 -98 268 0 21
                                28 21 35 24 773 l2 744 744 2 c738 3 745 3 773 24 98 73 98 195 0 268 -28 21
                                -35 21 -773 24 l-744 2 -2 744 c-3 738 -3 745 -24 773 -35 48 -82 73 -134 73
                                -32 0 -57 -7 -80 -22z" />
                            </g>
                        </svg>
                    </div>
                </div>
                <div id="imagem3">
                    <?php
                    echo '<img src="uploads/' . $imagePath3 . '" alt="" class="imagem-dinamica">';
                    ?>
                    <div style="height: 100%;">
                        <input style="height: 100%;" for="imagem" type="file" class="custom-file-input" id="input-b3" name="images[]" multiple>
                    </div>
                    <div style="position: relative;  display: flex; justify-content: center; top: -63%;">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                <path d="M2480 4288 c-18 -13 -43 -36 -54 -51 -21 -28 -21 -35 -24 -773 l-2
                                -744 -744 -2 c-738 -3 -745 -3 -773 -24 -98 -73 -98 -195 0 -268 28 -21 35
                                -21 773 -24 l744 -2 2 -744 c3 -738 3 -745 24 -773 73 -98 195 -98 268 0 21
                                28 21 35 24 773 l2 744 744 2 c738 3 745 3 773 24 98 73 98 195 0 268 -28 21
                                -35 21 -773 24 l-744 2 -2 744 c-3 738 -3 745 -24 773 -35 48 -82 73 -134 73
                                -32 0 -57 -7 -80 -22z" />
                            </g>
                        </svg>
                    </div>
                </div>
                <div id="imagem4">
                    <?php
                    echo '<img src="uploads/' . $imagePath4 . '" alt="" class="imagem-dinamica">';
                    ?>
                    <div style="height: 100%;">
                        <input style="height: 100%;" for="imagem" type="file" class="custom-file-input" id="input-b4" name="images[]" multiple>
                    </div>
                    <div style="position: relative;  display: flex; justify-content: center; top: -63%;">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                <path d="M2480 4288 c-18 -13 -43 -36 -54 -51 -21 -28 -21 -35 -24 -773 l-2
                                -744 -744 -2 c-738 -3 -745 -3 -773 -24 -98 -73 -98 -195 0 -268 28 -21 35
                                -21 773 -24 l744 -2 2 -744 c3 -738 3 -745 24 -773 73 -98 195 -98 268 0 21
                                28 21 35 24 773 l2 744 744 2 c738 3 745 3 773 24 98 73 98 195 0 268 -28 21
                                -35 21 -773 24 l-744 2 -2 744 c-3 738 -3 745 -24 773 -35 48 -82 73 -134 73
                                -32 0 -57 -7 -80 -22z" />
                            </g>
                        </svg>
                    </div>
                </div>

            </div>
            <div id="informaçõesComp">
                <div class="row">
                    <div class="col-md-6">
                        <div class="entradas">
                            <label for="Marca">Marca:</label>
                            <input type="text" placeholder=" Informe a marca do veiculo" id="Marca" name="Marca" value="<?php echo isset($marca) ? $marca : ''; ?>">
                        </div>

                        <div class="entradas">
                            <label for="Modelo">Modelo:</label>
                            <input type="text" placeholder=" Informe o Modelo" id="Modelo" name="Modelo" value="<?php echo isset($modelo) ? $modelo : ''; ?>">

                        </div>
                        <div class="entradas">
                            <label for="Categoria">Categoria:</label>
                            <input type="text" placeholder=" Informe a Categoria" id="Categoria" name="Categoria" value="<?php echo isset($categoria) ? $categoria : ''; ?>">

                        </div>
                        <div class="entradas">
                            <label for="Preco">Preço:</label>
                            <input type="text" placeholder=" Informe o Preco" id="Preco" name="Preco" value="<?php echo isset($preco) ? $preco : ''; ?>">

                        </div>
                        <div class="entradas">
                            <label for="Ano">Ano:</label>
                            <input type="text" placeholder=" Informe o ano" id="Ano" name="Ano" value="<?php echo isset($ano) ? $ano : ''; ?>">

                        </div>
                        <br><br>

                        <button type="submit" class="btn btn-primary btn-cadastrar" id="Editar">Editar</button>

                    </div>

                    <div class="col-md-6">
                        <div class="entradas">
                            <label for="Cambio">Câmbio:</label>
                            <input type="text" placeholder=" Informe o Cambio" id="Cambio" name="Cambio" value="<?php echo isset($cambio) ? $cambio : ''; ?>">
                        </div>
                        <div class="entradas">
                            <label for="TipoCombustivel">Tipo de Combustível:</label>
                            <input type="text" placeholder=" Informe o Tipo de Combustivel" id="TipoCombustivel" name="TipoCombustivel" value="<?php echo isset($tipoCombustivel) ? $tipoCombustivel : ''; ?>">
                        </div>
                        <div class="entradas">
                            <label for="Cor">Cor:</label>
                            <input type="text" placeholder=" Informe a cor" id="Cor" name="Cor" value="<?php echo isset($cor) ? $cor : ''; ?>">
                        </div>
                        <div class="entradas">
                            <label for="KmRodado">KmRodado:</label>
                            <input type="text" placeholder=" Informe a KmRodado" id="KmRodado" name="KmRodado" value="<?php echo isset($kmRodado) ? $kmRodado : ''; ?>">
                        </div>
                        <div class="entradas">
                            <label for="Descricao">Descrição:</label>
                            <textarea class="form-control" rows="5" id="Descricao" name="Descricao" style="border:2px solid#3b00a2;"><?php echo isset($descricao) ? $descricao : ''; ?></textarea>
                        </div>


                    </div>

                </div>

            </div>
    </form>
</body>
<script>
    for (let i = 1; i <= 4; i++) {
        let divimg = document.getElementById('imagem' + i);
        divimg.addEventListener('click', function() {
            let inputImagem = document.querySelector('#imagem' + i + ' input');

            inputImagem.addEventListener('change', function() {
                // Obtém a imagem selecionada
                let imagem = this.files[0];

                // Remove a imagem anterior da div específica
                let imagemAnterior = divimg.querySelector('img');
                if (imagemAnterior) {
                    imagemAnterior.remove();
                }

                // Cria um elemento `img` para a nova imagem
                let img = document.createElement('img');
                img.src = URL.createObjectURL(imagem);
                img.alt = imagem.name;

                // Adiciona uma classe à imagem criada
                img.classList.add('imagem-dinamica');

                // Adiciona o elemento `img` à div específica
                divimg.appendChild(img);
            });
        });
    }
</script>




</html>