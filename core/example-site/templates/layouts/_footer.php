<footer>
    <div class="wrapper">
        <div class="sheet-padder">
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-md-4 col-lg-3 mobile-centered">
                    <div class="profile-image"
                         style="background: url(<?= WWW_ROOT . 'images/profielfoto-marcel-infra-communicatie.png'; ?>) no-repeat center center /cover;">
                        <div class="spacer"></div>
                    </div>
                </div>
                <div class="col-12 col-sm-8 col-md-8 col-lg-4 mobile-centered">
                    <div class="mobile-marger-bottom">
                        <h2>Infra communicatie</h2>
                        <h3>Contactgegevens</h3>
                        <?
                        $contact_details = $cms->getSetting('contact_details');
                        foreach($contact_details as $contact_detail){?>
                            <div class="footer-details">
                                <p><span class="l-spacing"><i class="fa fa-envelope"></i></span><a href="mailto:<?=$contact_detail['email']?>"><?=$contact_detail['email']?></a>
                                </p>
                                <p><span class="l-spacing"><i class="fa fa-mobile"></i></span><a href="tel:<?=$contact_detail['phone']?>"><?=$contact_detail['phone']?></a></p>
                                <div class="text-spacer"></div>
                                <p><span class="l-spacing">KVK:</span><?=$contact_detail['kvk']?></p>
                                <p><span class="l-spacing">IBAN:</span><?=$contact_detail['iban']?></p>
                            </div>

                        <?}
                        ?>
                    </div>
                </div>
                <div class="col-12 col-sm-8 col-md-8 col-lg-3 order-sm-4 order-lg-3 mobile-centered">
                    <h2>Social media</h2>
                    <h3>Blijf up-to-date</h3>
                    <div class="footer-details social">
                        <ul class="fa-ul">
                            <li>
                                <a rel="noopener" target="_blank" title="Bekijk mijn Facebook pagina" href="https://www.facebook.com/infrafotografie/"><span class="fa-li"></span><i class="fab fa-facebook-square"></i> Facebook
                                </a>
                            </li>
                            <li>
                                <a rel="noopener" target="_blank" title="Bekijk mijn Twitter pagina" href="https://twitter.com/marcelsteinbach"><span class="fa-li"></span><i class="fab fa-twitter-square"></i> Twitter
                                </a>
                            </li>
                            <li>
                                <a rel="noopener" target="_blank" title="Bekijk mijn Instagram" href="https://www.instagram.com/marcel.steinbach/"><span class="fa-li"></span><i class="fab fa-instagram"></i> Instagram</a>
                            </li>
                            <li>
                                <a rel="noopener" target="_blank" title="Bekijk foto's op mijn 500px pagina" href="https://500px.com/marcelsteinbach"><span class="fa-li"></span><i class="fab fa-500px"></i> 500px</a>
                            </li>
                            <li><a rel="noopener" target="_blank" title="Bekijk foto's op mijn Flickr pagina" href="https://www.flickr.com/photos/infra_communicatie/"><span class="fa-li"></span><i class="fab fa-flickr"></i>Flickr</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-2              order-sm-3     order-lg-4     mobile-marger-bottom  mobile-centered">
                    <div class="footer-imgs">
                        <img src="<?= STATIC_ROOT ?>images/sluiter-logo-infra-communicatie.png"
                             alt="Sluiter logo Infra Communicatie">
                        <img width="100%" src="<?= STATIC_ROOT ?>images/dupho-infra-communicatie-marcel-steinbach.png"
                             alt="Dupho logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="sub-footer">
    <span>© <?=date("Y");?> - Infra Communicatie | Website door <a rel="noopener" target="_blank" title="Ga naar Steinbach Media (nieuw tabblad)" href="https://www.steinbachmedia.nl">Steinbach Media</a></span>
</div>
<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe.
         It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides.
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">




            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>




                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>


                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>


            <div class="pswp__tags">
                <div class="tag"></div>
            </div>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>

            </div>

        </div>

    </div>

</div>
</body>
</html>