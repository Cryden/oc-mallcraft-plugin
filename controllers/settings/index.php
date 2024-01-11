<div class="control-settings">

    <?php foreach ($items as $category => $items) : ?>

        <div class="settings-category">
            <h3><?= e(__($category)) ?></h3>
        </div>

        <div class="settings-items row">

            <?php foreach ($items as $item) : ?>
                <div class="settings-item col-xs-12 col-md-6 col-lg-4">
                    <a href="<?= $item->url ?>">
                        <div class="item-icon"><img width="60" height="60" src="/<?= $item->iconSvg ?>"></div>
                        <h5><?= e(__($item->label)) ?></h5>
                        <p><?= e(__($item->description)) ?></p>
                    </a>
                </div>
            <?php endforeach ?>

        </div>

    <?php endforeach ?>
</div>