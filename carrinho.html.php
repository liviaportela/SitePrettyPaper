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
					<a href="produtos.php" class="logo">
						<img src="images/icons/Logo.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="produtos.php">Home</a>
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
				<a href="index.html"><img src="images/icons/Logo.png" alt="IMG-LOGO"></a>
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
					<a href="produtos.php">Home</a>
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
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1"></th>
									<th class="column-2">Produto</th>
									<th class="column-3">Preço</th>
									<th class="column-4">Quantidade</th>
									<th class="column-5">Total</th>
									<th class="column-6"></th>
								</tr>
								<?php foreach($produtosCarrinho as $produto): ?>
									<tr class="table_row">
										<td class="column-1">
											<div class="how-itemcart1">
												<img src="<?= $produto['imagem1'] ?>" alt="IMG">
											</div>
										</td>
										<td class="column-2"><?= $produto['nome_produto'] ?></td>
										<td class="column-3">R$<?= $produto['preco'] ?></td>
										<td class="column-4" style="text-align: center"><?= $produto['quantidade'] ?></td>
										<td class="column-5">R$<?= $total = $produto['quantidade'] * $produto['preco']?></td>
										<td class="column-6">
											<button class="flex-c-m text-101 cl0 size-10 bg1 bor1 p-lr-15 m-r-15 trans-04 zmdi zmdi-close btnRemoverDoCarrinho" data-idProduto="<?= $produto['id_produto'] ?>"></button>
										</td>
									</tr>
								<?php endforeach; ?>
							</table>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Valor Total
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-209">
								<span class="mtext-110 cl2">
									Subtotal: R$<?= $totalGeral ?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Frete:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									Verifique seu endereço ou entre em contato conosco se precisar de ajuda.
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8" >
										Calcular Frete
									</span>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="cep" placeholder="CEP" id="cepDestino" required>
									</div>
									
									<div class="flex-w">
										<button class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer"  id="calculaFrete">
											Calcular
										</button>
									</div>

									<div class="flex-w flex-t p-t-27 p-b-33">
										<div class="size-220">
											<span class="mtext-110 cl2" id="resultado">
												Valor:
											</span>
										</div>
									</div>									
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-220">
								<span class="mtext-101 cl2 result" id="result">
									Valor total: 
								</span>
							</div>
						</div>

						<a href="pagar.php" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							<script>
								window.location.href = `pagar.php?valorFrete=${valorFrete.toFixed(2)}`;
							</script>
							Realizar pagamento
						</a>
					</div>
				</div>
			</div>
		</div>
	</form>
		
	
	<!-- Footer -->
	<footer class="bg3 p-t-32 p-b-32">
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
	    async function obterInformacoesCEP(cep) {
            try {
                const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
                const data = await response.json();
                return data;
            } catch (error) {
                console.error('Erro ao obter informações do CEP:', error);
                return null;
            }
        }

        function calcularFreteSimples(distancia) {
            // Lógica simplificada para calcular o frete (apenas a distância)
            const custoPorKm = 0.045; // Valor fictício, ajuste conforme necessário

            return distancia * custoPorKm;
        }

        function calcularDistancia(infoOrigem, infoDestino) {
            // Lógica simplificada para calcular a distância entre dois pontos geográficos
            const R = 6371; // Raio médio da Terra em quilômetros
            const lat1 = parseFloat(infoOrigem.cep.replace(',', '.')); // Utilizando o próprio CEP como valor
            const lon1 = parseFloat(infoOrigem.cep.replace(',', '.'));
            const lat2 = parseFloat(infoDestino.cep.replace(',', '.'));
            const lon2 = parseFloat(infoDestino.cep.replace(',', '.'));

            const dLat = toRadians(lat2 - lat1);
            const dLon = toRadians(lon2 - lon1);
            const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                    Math.cos(toRadians(lat1)) * Math.cos(toRadians(lat2)) *
                    Math.sin(dLon / 2) * Math.sin(dLon / 2);
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            const distance = R * c;

            return distance;
        }

        function toRadians(degrees) {
            return degrees * (Math.PI / 180);
        }
        
        async function calcularFrete(event) {
          
            event.preventDefault();
            // console.log('clicou')
            let cepOrigem = "14400730";
            let cepDestino = document.getElementById('cepDestino').value.replace('-', '');
			

            console.log('CEP Origem:', cepOrigem);
            console.log('CEP Destino:', cepDestino);

            if (cepOrigem && cepDestino) {
                const infoOrigem = await obterInformacoesCEP(cepOrigem);
                const infoDestino = await obterInformacoesCEP(cepDestino);                
                console.log('Informações Origem:', infoOrigem);
                console.log('Informações Destino:', infoDestino);
                

                if (infoOrigem && infoDestino) {
                    // Simulando um cálculo de frete simplificado (apenas a distância)
                    const distancia = calcularDistancia(infoOrigem, infoDestino);
                    const valorFrete = calcularFreteSimples(distancia);

                    console.log('Distância:', distancia);
                    console.log('Valor do Frete:', valorFrete);

                    if (!isNaN(valorFrete)) {
                        document.getElementById('resultado').innerHTML = `Valor: R$ ${valorFrete.toFixed(2)}`;
						document.getElementById('result').innerHTML = `Valor total: R$ ${(parseFloat(<?php echo $totalGeral; ?>) + parseFloat(valorFrete.toFixed(2))).toFixed(2)}`;
						setTimeout(() => {
							window.location.href = `pagar.php?frete=${valorFrete.toFixed(2)}`;
						}, 100);
                    } else {
                        document.getElementById('resultado').innerHTML = 'Erro ao calcular o frete';
                    }
                } else {
                    document.getElementById('resultado').innerHTML = 'Erro ao obter informações dos CEPs';
                }
                document.getElementById('result').innerHTML = `Valor: R$ ${valorFrete.toFixed(2)} + ${valorTotal}`;
            } else {
                document.getElementById('resultado').innerHTML = 'Preencha todos os campos corretamente';
            }
        }
        document.getElementById('calculaFrete').addEventListener('click', calcularFrete);
		document.getElementById('botaoRedirecionar').addEventListener('click', redirecionarParaOutraPagina);
	</script>

	<script>
		document.addEventListener('DOMContentLoaded', function () {
			let btnsRemoverDoCarrinho = document.querySelectorAll('.btnRemoverDoCarrinho');

			btnsRemoverDoCarrinho.forEach(function (btnRemoverDoCarrinho) {
				btnRemoverDoCarrinho.addEventListener('click', function () {
					let id_produto = this.dataset.idproduto;
					console.log('ID do produto:', id_produto);

					if (!id_produto) {
						alert('ID do produto não encontrado.');
						return;
					}

					removerDoCarrinho(id_produto);
				});
			});

			function removerDoCarrinho(id_produto) {
				let xhr = new XMLHttpRequest();
				xhr.open('POST', 'removerDoCarrinho.php', true);
				xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

				xhr.onload = function () {
					if (xhr.status === 200) {
						console.log(xhr.responseText);
						swal('Produto removido do carrinho com sucesso!', '', 'success');
					} else {
						console.error('Erro na requisição.');
						swal('Erro ao remover o produto do carrinho.', '', 'error');
					}
				};

				let params = 'id_produto=' + encodeURIComponent(id_produto);
				xhr.send(params);
			}
		});
	</script>

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

	<!-- <script src="frete.js"></script> -->

</body>
</html>