<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cadastro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/Logo1.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">

		<!-- Header desktop -->
		<div class="container-menu-desktop">

			<!-- Topbar -->
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<img src="images/icons/Logo.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Home</a>
							</li>

							<li>
								<a href="comprarprodutos.php">Produtos</a>
							</li>

							<li>
								<a href="sobre.php">Sobre</a>
							</li>

							<li>
								<a href="contato.php">Contato</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?= $totalCarrinho ?>">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 p-b-5">
							<a href="perfil.php"><img src="images\icons\perfil.png"></a>
						</div>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php"><img src="images/icons/Logo.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?= $totalCarrinho ?>">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 p-b-5">
					<a href="perfil.php"><img src="images\icons\perfil.png"></a>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.php">Home</a>
				</li>

				<li>
					<a href="comprarprodutos.php">Produtos</a>
				</li>

				<li>
					<a href="sobre.php">Sobre</a>
				</li>

				<li>
					<a href="contato.php">Contato</a>
				</li>
			</ul>
		</div>
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Seu Carrinho
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<?php foreach($produtosCarrinho as $produto): 
							$total = $produto['quantidade'] * $produto['preco'];
							$totalGeral += $total;?>
							<div class="header-cart-item-img">
								<img src="<?= $produto['imagem1'] ?>" alt="IMG">
							</div>

							<div class="header-cart-item-txt p-t-8">
								<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
									<?= $produto['nome_produto'] ?>
								</a>

								<span class="header-cart-item-info">
									<?= $produto['quantidade'] ?> X <?= $produto['preco'] ?>
								</span>
							</div>
						<?php endforeach; ?>
					</li>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						<span>Total: R$<?= $totalGeral ?></span>
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="produtoscarrinho.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Conferir
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Content page -->
	<section class="bg0 p-t-25 p-b-65">
		<div class="container">
			<div class="size-110 bor10 p-lr-20 p-t-55 p-b-70 p-lr-15-lg w-full-md">
				<form action="cadastro.php" method="post">
                    <section class="bg-img1 txt-center p-lr-15 p-t-10 p-b-22">
                        <h2 class="ltext-105 cl0 txt-center" style="color: gray">
                            CADASTRE-SE
                        </h2>
                    </section>	
                   
					<div style="text-align: center; margin-top: 2.5%;">	
						<h4 class="mtext-109 cl2 p-b-30">
								Informações de cadastro
						</h4>
					</div>

					<div class="row p-b-25">
						<div class="col-sm-6 p-b-5">
							<label class="stext-102 cl3" for="nome">NOME COMPLETO</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" type="text" placeholder="Nome completo" name="nome" required>
						</div>
						<div class="col-sm-6 p-b-5">
							<label class="stext-102 cl3" for="email">EMAIL</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" type="email" placeholder="Email" name="email" required>
						</div>
					</div>

					<div class="row p-b-25">
						<div class="col-sm-6 p-b-5">
							<label class="stext-102 cl3" for="nome">TELEFONE</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" type="text" placeholder="Telefone" name="telefone" required>
						</div>
						<div class="col-sm-6 p-b-5">
							<label class="stext-102 cl3" for="email">CPF</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" type="text" placeholder="CPF" name="cpf" required>
						</div>
					</div>

					<div class="row p-b-25">
						<div class="col-sm-6 p-b-5">
							<label class="stext-102 cl3" for="rg">RG</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" type="text" placeholder="RG" name="rg" required>
						</div>
						<div class="col-sm-6 p-b-5">
							<label class="stext-102 cl3" for="email">SENHA</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" type="password" placeholder="Senha" name="senha" required>
						</div>
					</div>

					<div style="text-align: center; margin-top: 2.5%;">	
						<h4 class="mtext-109 cl2 p-b-30">
								Endereço de cadastro
						</h4>
					</div>

					<div class="row p-b-25">
						<div class="col-sm-6 p-b-5">
							<label class="stext-102 cl3" for="cep">CEP</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" type="text" placeholder="CEP" name="cep" required>
						</div>
						<div class="col-sm-6 p-b-5">
							<label class="stext-102 cl3" for="logradouro">LOGRADOURO</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" type="text" placeholder="Logradouro" name="logradouro" required>
						</div>
					</div>

					<div class="row p-b-25">
						<div class="col-sm-6 p-b-5">
							<label class="stext-102 cl3" for="número">NÚMERO</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" type="text" placeholder="Número" name="numero" required>
						</div>
						<div class="col-sm-6 p-b-5">
							<label class="stext-102 cl3" for="bairro">BAIRRO</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" type="text" placeholder="Bairro" name="bairro" required>
						</div>
					</div>

					<div class="row p-b-25">
						<div class="col-sm-6 p-b-5">
							<label class="stext-102 cl3" for="rg">CIDADE</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" type="text" placeholder="Cidade" name="cidade" required>
						</div>
						<div class="col-sm-6 p-b-5">
							<label class="stext-102 cl3" for="uf">UF</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" type="text" placeholder="UF" name="uf" required>
						</div>
					</div>

					<input class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="margin-bottom: 1.5%;" type="submit" value="Enviar"></input>
				</form>

				<a class="stext-110 cl2" href="login.php">
					Já tem uma conta? Faça login
                </a>
			</div>
		</div>
	</section>	
	
	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<p class="stext-107 cl6 txt-center">
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
		</p>
   </footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Seu HTML existente ... -->
	<script> 
			if ('<?= $mensagemSucesso?>' !== '') {
				alert('<?= $mensagemSucesso?>');
			} else if ('<?= $mensagemErro?>' !== '') {
				alert('<?= $mensagemErro?>');
			} else if ('<?= $mensagemErroRepetido?>' !== '') {
				alert('<?= $mensagemErroRepetido?>');
			}
	</script>

</body>
</html>