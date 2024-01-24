 <?php


    session_start();
	$Email = $_POST['Email'];
	$Senha = $_POST['Senha'];
	
	
	include 'Conexao.php';
	
	$result = mysqli_query($con,"select id_usuario, Email, Senha from login where Email = '$Email' and Senha = '$Senha'");
    	

	$reg_cadastro=mysqli_fetch_array($result);
    $id_usuario = $reg_cadastro["id_usuario"];
	if(mysqli_num_rows ($result) > 0 ) { 
		$_SESSION['Email'] = $Email; 
		$_SESSION['Senha'] = $Senha; 
	

		header('location:../admin.php'); 			
	}   	if( $Email ==""|| $senha ==""){
		echo"<script>alert('por favor preencha todos os dados')</script>";
		echo "<script>window.location = '../login.html'</script>";
	
		} 

	







// session_start();
// $con=mysqli_connect("localhost","root","","motorcode");

// 	$result = mysqli_query($con,"select Email,Senha from login");
//     $Email = $_POST['Email'];
// 	$senha = $_POST['Senha'];

    
	
	
// 	if( $Email ==""|| $senha ==""){
// 		echo"<script>alert('por favor preencha todos os dados')</script>";
// 		echo "<script>window.location = '../login.html'</script>";
// 	}else if(mysqli_num_rows ($result) > 0 ) { 
//         $_SESSION['Email'] = $Email;
//         $_SESSION['Senha'] =  $senha ;
		
// 		if(isset($_SESSION['Email'])){							
// 				header('location:../admin.php'); 
// 			}
// 		else
// 			{
// 			   header('location:login.html'); 
// 			}
// 	} 
	

	
// 	else{ 	    
		
// 		unset ($_SESSION['txtnome']); 
// 		unset ($_SESSION['txtsenha']);
// 		header('location:login.html');
// 		} 
	
?>		
