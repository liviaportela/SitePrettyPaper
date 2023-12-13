<!DOCTYPE html>
<html lang="en">
<head>
	<title>Carrinho</title>
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

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="payment-container">
							<h4 class="mtext-109 cl2 p-b-30" style="text-align: center">
								SELECIONE O MÉTODO DE PAGAMENTO
							</h4>
								<div class="col-sm-10 p-b-5 d-flex">
									<div class="col-sm-6 p-b-5 d-flex">
										<label class="stext-102 cl3 mr-2" style="margin-top: 8px;">Cartão de crédito</label>
										<input type="radio" name="paymentMethod" value="creditCard"> 
									</div>
									<div class="col-sm-6 p-b-5 d-flex">
										<label class="stext-102 cl3 mr-2" style="margin-top: 8px;"> Boleto</label>
										<input type="radio" name="paymentMethod" value="boleto"> 
									</div>
									<div class="col-sm-6 p-b-5 d-flex">
										<label class="stext-102 cl3 mr-2" style="margin-top: 8px;"> PIX </label>
										<input type="radio" name="paymentMethod" value="pix"> 
									</div>
								</div>
								<div id="creditCardForm" class="payment-form">
									<div style="text-align: center; margin-top: 2.5%;">	
										<h4 class="mtext-109 cl2 p-b-30">
											Cartão de crédito
										</h4>
									</div>
									<div class="row p-b-25">
										<div class="col-sm-6 p-b-5">
											<label class="stext-102 cl3">NÚMERO DO CARTÃO</label>
											<input class="size-111 bor8 stext-102 cl2 p-lr-20" type="text" placeholder="Número do cartão" name="numeroCartao" title="Digite apenas números" required>
										</div>
										<div class="col-sm-6 p-b-5">
											<label class="stext-102 cl3">NOME DO CARTÃO</label>
											<input class="size-111 bor8 stext-102 cl2 p-lr-20" type="text" placeholder="Nome do cartão" name="nomeCartao" required>
										</div>
									</div>
									<div class="row p-b-25">
										<div class="col-sm-6 p-b-5">
											<label class="stext-102 cl3">VALIDADE</label>
											<input class="size-111 bor8 stext-102 cl2 p-lr-20" type="text" placeholder="Validade" name="validade" required>
										</div>
										<div class="col-sm-6 p-b-5">
											<label class="stext-102 cl3">CVV</label>
											<input class="size-111 bor8 stext-102 cl2 p-lr-20" type="text" placeholder="CVV" name="cvv" required>
										</div>
									</div>
									<span class="mtext-110 cl2" id="resultado">
										Total: R$<?= $totalGeral ?>
									</span>
										<button type="button" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 m-t-25 trans-04 pointer" id="btnRealizarPagamento" onclick="processPayment()">Realizar Pagamento</button>
								</div>
								<div id="boletoForm" class="payment-form">
									<button type="button" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 m-t-25 trans-04 pointer" id="btnRealizarPagamento" onclick="processPayment()">Realizar Pagamento</button>
								</div>
								<div id="pixForm" class="payment-form">
									<div style="display: flex; align-items: center; justify-content: center; margin: 0;">
										<img src="https://devtools.com.br/img/pix/logo-pix-png-930x616.png" style="width: 40%; max-width: 100%; height: auto;">
									</div>
									<div id="pix-qrcode" class="m-b-35 m-t-5" style="display: flex; justify-content: center; align-items: center;"></div>
									<span class="mtext-110 cl2" id="resultado">
										Total: R$<?= $totalGeral ?>
									</span>
									<button type="button" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 m-t-25 trans-04 pointer" id="btnRealizarPagamento" onclick="processPayment()">Realizar Pagamento</button>
								</div>
							</div>						
						</div>
					</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-5">
							PRODUTOS:
						</h4>
						<?php foreach($produtosCarrinho as $produto): ?>
							<tr class="table_row size-220">
								<div class="how-itemcart1">
									<img src="<?= $produto['imagem1'] ?>" alt="IMG">
								</div>
								<span class="stext-102 cl3 mr-2"><?= $produto['nome_produto'] ?></span>
								<span class="stext-102 cl3 mr-2"><?= $produto['preco'] ?> X</span>
								<span class="stext-102 cl3 mr-2"><?= $produto['quantidade'] ?></span>
							</tr>
						<?php endforeach; ?>
									<div class="flex-w flex-t p-t-27 p-b-33">
										<div class="size-220">
											<span class="mtext-110 cl2" id="resultado">
												Frete:
											</span><br>
											<span class="mtext-110 cl2">
												Subtotal: R$<?= $totalGeral ?>
											</span><br>
											<span class="mtext-110 cl2" id="result">
												Valor total: R$
											</span>
										</div>
									</div>									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	
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

	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const paymentForms = document.querySelectorAll('.payment-form');

			document.querySelectorAll('input[name="paymentMethod"]').forEach(function (radio) {
				radio.addEventListener('change', function () {
					paymentForms.forEach(function (form) {
						form.style.display = 'none';
					});

					const selectedFormId = this.value + 'Form';
					const selectedForm = document.getElementById(selectedFormId);

					if (selectedForm) {
						selectedForm.style.display = 'block';
					}
				});
			});

			// Oculta todos os formulários no carregamento inicial
			paymentForms.forEach(function (form) {
				form.style.display = 'none';
			});
		});

		function processPayment() {
			const xhr = new XMLHttpRequest();
			xhr.open('POST', 'pagar.php', true);
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

			const params = 'realizar_pagamento=true';
			
			xhr.onreadystatechange = function () {
				if (xhr.readyState === 4 && xhr.status === 200) {
					alert('Pagamento processado com sucesso!');
					
					// Redirecione para a página desejada após o pagamento
					window.location.href = 'perfil.php';
				}
			};

			xhr.send(params);
		}
	</script>

	<script>
        document.addEventListener('DOMContentLoaded', function () {
            function generatePixQRCode(pixData, elementId) {
                var qrcode = new QRCode(document.getElementById(elementId), {
                    text: pixData,
                    width: 128,
                    height: 128,
                });
            }

            var pixData = "00020101021126240014BR.GOV.BCB.PIX011411683016152550032226585802BR5925PrettyPaper6007SaoPaulo62070503***6304C887";
            var idElementoQRCode = "pix-qrcode";

            generatePixQRCode(pixData, idElementoQRCode);
        });
    </script>

	<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

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

	<script>
		document.addEventListener('DOMContentLoaded', function() {
		// Seu código aqui
			
		// Recupera o valor do parâmetro 'frete' da URL
			const urlParams = new URLSearchParams(window.location.search);
			let valorFrete = urlParams.get('frete');

			// Obtém a referência da span com o ID 'resultado'
			const spanResultado = document.getElementById('resultado');

			

			// Verifica se o valor do frete é válido e atualiza a span
			if (valorFrete !== null) {
				// Converte a string para um número de ponto flutuante
				valorFrete = parseFloat(valorFrete);

				// Atualiza o conteúdo da span com o valor do frete
				spanResultado.innerHTML = `Frete: R$${valorFrete.toFixed(2)}`;
				console.log('FRETE:' + valorFrete)
			} else {
				console.error('O parâmetro de frete não foi fornecido na URL.');
			}
		});
	</script>

	<script src="js/main.js"></script>

<!-- Seu HTML existente ... -->
</body>
</html>