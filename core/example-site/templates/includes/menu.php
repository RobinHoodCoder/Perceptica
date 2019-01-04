<div class="menu-spacer"></div>
<div class="menu-container">
    <div class="wrapper">

            <a title="Infra Communicatie" href="<?=WWW_ROOT?>" class="logo div">
                <img src="<?=WWW_ROOT?>images/logo-infra-communicatie.png" srcset="<?=WWW_ROOT?>images/logo-infra-communicatie.svg" alt="Infra Communicatie logo">
            </a>
            <div class="top-cta-container">
                <div class="cleared"></div>
                <a class="phone-cta" href="tel:<?=$cms->getSetting('contact_details')[0]['phone']?>">

                        <div class="dark-bar">
                            <i class="fal fa-mobile"></i>
                            <p>Bel mij</p>
                        </div>

                </a>
            </div>
            <div id="hamburger-menu">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <nav>
                <ul class="menu" class="menu clearfix">
                    <? $bc = $cms->getBreadcrumb(); ?>
                    <li class="<?=($bigtree["page"]["id"] == 0 ? 'active' : '')?>">
                        <a class="" href="<?=WWW_ROOT?>">Home</a>
                    </li>
                    <?foreach ($cms->getNavByParent(0,2) as $nav) { ?>
                        <li class="<?=($bc[0]['id'] == $nav['id'] ? 'active' : '')?>"><a href="<?=$nav['link']?>"><?=$nav['title']?></a></li>
                    <? }; ?>
                </ul>

            </nav>
    </div>
</div>