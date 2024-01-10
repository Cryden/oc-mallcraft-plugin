<div data-control="toolbar">
    <a href="<?= Backend::url('crydesign/mallcraft/categories/create') ?>" class="btn btn-primary oc-icon-plus">
        <?= e(trans('categories.list.create_button', ['name' => 'Category'])) ?>
    </a>

    <button class="btn btn-danger oc-icon-trash-o" data-request="onDelete" data-list-checked-trigger data-list-checked-request data-stripe-load-indicator disabled>
        <?= e(trans('backend::lang.list.delete_selected')) ?>
    </button>

    <div class="dropdown dropdown-fixed">
        <button type="button" class="btn btn-info oc-icon-download" data-toggle="dropdown">
            <?= __('categories.list.export') ?>
        </button>
        <ul class="dropdown-menu" data-dropdown-title="<?= __('categories.list.export') ?>">
            <li><a href="#" tabindex="-1" class="oc-icon-file-text-o">CSV</a></li>
        </ul>
    </div>
    <div class="dropdown dropdown-fixed">
        <button type="button" class="btn btn-info oc-icon-upload" data-toggle="dropdown">
            <?= __('categories.list.import') ?>
        </button>
        <ul class="dropdown-menu" data-dropdown-title="<?= __('categories.list.import') ?>">
            <li><a href="#" tabindex="-1" class="oc-icon-file-text-o">CSV</a></li>
        </ul>
    </div>
</div>