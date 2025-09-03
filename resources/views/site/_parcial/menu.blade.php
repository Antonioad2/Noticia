<!-- Painel de menu -->
<div id="uc-menu-panel" data-uc-offcanvas="overlay: true;">
    <div class="uc-offcanvas-bar bg-white text-dark dark:bg-gray-900 dark:text-white">
        @include('site._parcial.header')
        <div class="panel">
            <form id="search-panel" class="form-icon-group vstack gap-1 mb-3" data-uc-sticky="">
                <input type="email" class="form-control form-control-md fs-6" placeholder="Pesquisar...">
                <span class="form-icon text-gray">
                    <i class="unicon-search icon-1"></i>
                </span>
            </form>
            <ul class="nav-y gap-narrow fw-bold fs-5" data-uc-nav>
                <li class="uc-parent">
                    <a href="#">Páginas iniciais</a>
                    <ul class="uc-nav-sub" data-uc-nav="">
                        <li><a href="../main/index.html">Principal</a></li>
                        <li><a href="../demo-two/index.html">Notícias clássicas</a></li>
                        <li><a href="../demo-three/index.html">Tecnologia</a></li>
                        <li><a href="../demo-four/index.html">Blog clássico</a></li>
                        <li><a href="../demo-five/index.html">Jogos</a></li>
                        <li><a href="../demo-six/index.html">Esportes</a></li>
                        <li><a href="../demo-seven/index.html">Jornal</a></li>
                        <li><a href="../demo-eight/index.html">Revista</a></li>
                        <li><a href="../demo-nine/index.html">Viagem</a></li>
                        <li><a href="../demo-ten/index.html">Comida</a></li>
                    </ul>
                </li>
                <li><a href="#">Mais recentes</a></li>
                <li><a href="#">Em alta</a></li>
                <li class="uc-parent">
                    <a href="#">Páginas internas</a>
                    <ul class="uc-nav-sub" data-uc-nav="">
                        <li class="uc-parent">
                            <a href="blog.html">Blog</a>
                            <ul class="uc-nav-sub">
                                <li><a href="blog.html">Largura total</a></li>
                                <li><a href="blog-2cols.html">Grade 2 colunas</a></li>
                                <li><a href="blog-3cols.html">Grade 3 colunas</a></li>
                                <li><a href="blog-4cols.html">Grade 4 colunas</a></li>
                            </ul>
                        </li>
                        <li class="uc-parent">
                            <a href="blog-details.html">Blog - detalhes</a>
                            <ul class="uc-nav-sub">
                                <li><a href="blog-details.html">Detalhes do blog</a></li>
                                <li><a href="blog-details-2.html">Detalhes do blog - v2</a></li>
                            </ul>
                        </li>
                        <li class="uc-parent">
                            <a href="#">Páginas úteis</a>
                            <ul class="uc-nav-sub">
                                <li><a href="sign-up.html">Cadastrar-se</a></li>
                                <li><a href="sign-in.html">Entrar</a></li>
                                <li><a href="reset-password.html">Redefinir senha</a></li>
                                <li><a href="404.html">Página 404</a></li>
                                <li><a href="coming-soon.html">Em breve</a></li>
                            </ul>
                        </li>
                        <li class="uc-parent">
                            <a href="#">Outras páginas</a>
                            <ul class="uc-nav-sub">
                                <li><a href="page-faq.html">FAQ</a></li>
                                <li><a href="page-terms.html">Termos de uso</a></li>
                                <li><a href="page-privacy.html">Política de privacidade</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="uc-parent">
                    <a href="shop.html">Loja</a>
                    <ul class="uc-nav-sub" data-uc-nav="">
                        <li class="uc-parent">
                            <a href="shop.html">Layouts de loja</a>
                            <ul class="uc-nav-sub">
                                <li><a href="shop.html">Loja 4 colunas</a></li>
                                <li><a href="shop-3.html">Loja 3 colunas</a></li>
                                <li><a href="shop-2.html">Loja 2 colunas</a></li>
                                <li><a href="shop-sidebar.html">Loja com barra lateral</a></li>
                            </ul>
                        </li>
                        <li><a href="shop-category.html">Categoria de arquivo</a></li>
                        <li><a href="shop-product-detail.html">Detalhes do produto</a></li>
                        <li><a href="shop-product-detail-2.html">Detalhes do produto - v2</a></li>
                        <li><a href="shop-cart.html">Carrinho</a></li>
                        <li><a href="shop-cart-2.html">Carrinho - v2</a></li>
                        <li><a href="shop-checkout.html">Finalizar compra</a></li>
                        <li><a href="shop-checkout-2.html">Finalizar compra - v2</a></li>
                        <li><a href="shop-order.html">Confirmação de pedido</a></li>
                    </ul>
                </li>
                <li class="hr opacity-10 my-1"></li>
                <li><a href="sign-in.html">Entrar</a></li>
                <li><a href="sign-up.html">Criar uma conta</a></li>
            </ul>
            <ul class="social-icons nav-x mt-4">
                <li>
                    <a href="#"><i class="unicon-logo-medium icon-2"></i></a>
                    <a href="#"><i class="unicon-logo-x-filled icon-2"></i></a>
                    <a href="#"><i class="unicon-logo-instagram icon-2"></i></a>
                    <a href="#"><i class="unicon-logo-pinterest icon-2"></i></a>
                </li>
            </ul>
            <div class="py-2 hstack gap-2 mt-4 bg-white dark:bg-gray-900" data-uc-sticky="position: bottom">
                <div class="vstack gap-1">
                    <span class="fs-7 opacity-60">Selecionar tema:</span>
                    <div class="darkmode-trigger" data-darkmode-switch="">
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider fs-5"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>