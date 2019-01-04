<aside>
    <div class="aside-content">
        <h2>Bouwfotografie</h2>
        <ul>
            <?
            foreach ($approvedPortfolioItems as $approvedPortfolioItem) {?>
                <li><a href="<?=WWW_ROOT.'portfolio/'.$approvedPortfolioItem['route']?>"><?=$approvedPortfolioItem['title']?></a></li>
            <?}
            ?>
        </ul>
    </div>

    <a href="<?=$cms->getLink(7)?>" class="sheet-label div">
        <div  class="sidebar-cta">
            <h3>Uw project laten fotograferen?</h3>
            <span>Neem <strong class="underline">hier</strong> contact op!</span>
        </div>
    </a>
</aside>