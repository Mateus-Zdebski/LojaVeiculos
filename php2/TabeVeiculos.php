<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<style>
    #navvbar {
        background-color: #250E5B;
    }

    #logo-tipo {
        width: 400px;
        height: 100px;
        object-fit: cover;
    }

    #Cadastrodeveiculos {
        background-color: #fdf9f9;
        text-align: left;
        width: 900px;
        border-radius: 10px;
        padding: 60px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        margin: 1px auto;
        /* Adicionando margem para centralizar */
        height: 770px;
    }

    h1 {
        text-align: center;
    }

    @media (max-width: 768px) {
        #Cadastrodeveiculos {
            width: 90%;
            /* Define a largura para 90% da largura do viewport */
            padding: 20px;
            /* Reduz o preenchimento */
            height: auto;
            /* Ajusta a altura automaticamente */
        }

        input[type="text"],
        textarea {
            width: 100%;
            /* Define a largura para 100% */
        }

        .btn-cadastrar {
            margin-top: 5px;
            width: 100%;
            /* Define a largura para 100% */
        }
    }
</style>


<body>
    <nav class="navbar navbar-expand-sm navbar-dark" id="navvbar">

        <!-- Logo -->
        <img src="Imagens/MOTORCODE-removebg-preview.png" alt="" class="navbar-brand" id="logo-tipo">

        <!-- Menu Hamburguer -->
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navegacao">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- navegacao -->
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">veículos</a>
                </li>
                <li class="nav-item">
                    <a href="login.html" class="nav-link">Entrar</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Contatos</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover table-condensed">
							<thead>
								<tr class="success">	
									<th>Marca</th>
									<th>Modelo</th>
									<th>Telefone</th>
									
								</tr>	
							</thead>
							<?php
								$contlin = 2;
								/*
								 mysqli_fetch_array - Retorna o campo, a posição do array
								*/
								while($reg_cadastro=mysqli_fetch_array($query))
								{
									$marca=$reg_cadastro["Marca"];
									$modelo = $reg_cadastro["Modelo"];
									$categoria = $reg_cadastro["Categoria"];
                                    $preco = $reg_cadastro["Preco"];
                                    $descricao = $reg_cadastro["Descricao"];
                                    $ano = $reg_cadastro["Ano"];
                                    $cambio = $reg_cadastro["Cambio"];
                                    $tipoCombustivel = $reg_cadastro["TipoCombustivel"];
                                    $cor = $reg_cadastro["Cor"];
                                    $kmRodado = $reg_cadastro["KmRodado"];
                                    "<br>";
									
								?>
								 <tr class="info">
									<?php
										if($contlin%2 == 0){
											?>
											<tr class="trpar">					
									<?php
										}
									?>	
									<td><?php echo $cliente ?></td>									
									<td><?php echo $email ?></td>
									<td><?php echo $telefone ?></td>
									
									<td align="center"><a href="editarCliente.php?id=<?php echo $reg_cadastro["id_cliente"]?>" class="btn btn-success">Alterar</a>
									<td align="center"><a href="#" class="btn btn-danger" onclick = "apagar('<?php echo $reg_cadastro["id_cliente"]?>');">Excluir</td>
								</tr>

							<?php
								$contlin = $contlin + 1;
								}
							?>
						</table>
				</div>
			</div>
		</div>
	</div>			
	
	<!--<div class="col-xs-offset-4 col-xs-10">-->
	<div class='col-lg-offset-10'>
		<a href="main.html" class="btn btn-info">Voltar</a>
	</div>
    
</body>
</html>