<div data-control="toolbar">
    <a href="<?= Backend::url('crydesign/mallcraft/products/create') ?>" class="btn btn-primary oc-icon-plus">
        <?= e(trans('products.list.create_button', ['name' => 'Product'])) ?>
    </a>

    <button class="btn btn-danger oc-icon-trash-o" data-request="onDelete" data-list-checked-trigger data-list-checked-request data-stripe-load-indicator disabled>
        <?= e(trans('backend::lang.list.delete_selected')) ?>
    </button>
</div>