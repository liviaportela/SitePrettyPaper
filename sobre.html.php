<!DOCTYPE html>
<html lang="en">
<head>
	<title>About</title>
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

							<li class="active-menu">
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
						$totalGeral += $total;
						?>
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

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/banner1.png');">
		<h2 class="ltext-105 cl0 txt-center">
			SOBRE
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Nossa História
						</h3>

						<p class="stext-113 cl6 p-b-26" style="text-align: justify">
						Em um pacato bairro residencial, no início do ano de 2021, nasceu um sonho colorido que se materializou em uma pequena papelaria chamada Pretty Paper. Fundada por três amigos apaixonados por papelaria e design, Lauren, Lívia e Mariana, a loja nasceu da ideia de proporcionar um espaço encantador onde a criatividade pudesse florescer.
						</p>

						<p class="stext-113 cl6 p-b-26" style="text-align: justify">
						Com o passar dos anos, Pretty Paper expandiu suas operações online, alcançando clientes além das fronteiras da cidade. No entanto, mesmo com a expansão digital, a essência da loja permaneceu a mesma: um lugar onde a beleza dos materiais de papelaria se encontra com a criatividade de quem os utiliza. 
						</p>

						<p class="stext-113 cl6 p-b-26" style="text-align: justify">
						Hoje, a Pretty Paper continua a crescer, inspirando pessoas de todas as idades a explorar suas paixões criativas por meio do papel e da escrita. Lauren, Lívia e Mariana, orgulhosas do que construíram, continuam comprometidos em oferecer uma experiência encantadora e um toque de magia em cada produto que vendem.
						</p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="images/Img1.jpg" alt="IMG">
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Nossa Missão
						</h3>

						<p class="stext-113 cl6 p-b-26" style="text-align: justify">
						Com sua paixão pelos detalhes, cada item da loja foi escolhido pessoalmente, garantindo uma seleção diversificada e de alta qualidade. Eles não apenas queriam oferecer produtos bonitos, mas também buscavam incentivar a expressão pessoal e a criatividade em cada cliente que adentrava a Pretty Paper.
						</p>

						<p class="stext-113 cl6 p-b-26" style="text-align: justify">
						Logo, a papelaria se tornou mais do que um lugar para comprar materiais de escritório. Tornou-se um refúgio para artistas em busca de inspiração, estudantes ávidos por cadernos únicos para suas anotações e profissionais em busca de presentes diferenciados para colegas de trabalho.
						</p>

						<p class="stext-113 cl6 p-b-26" style="text-align: justify">
						A equipe da Pretty Paper se esforçava para tornar a experiência dos clientes memorável. Eles ofereciam workshops de arte e caligrafia, incentivando os clientes a explorar novas técnicas e aprimorar suas habilidades. A loja também abrigava eventos regulares, como lançamentos de coleções exclusivas e concursos de arte, criando uma comunidade vibrante de entusiastas por papelaria.
						</p>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="images/Img2.jpg" alt="IMG">
						</div>
					</div>
				</div>
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
	
</body>
</html>