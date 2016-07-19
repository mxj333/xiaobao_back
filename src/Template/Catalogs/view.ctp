<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Catalog'), ['action' => 'edit', $catalog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Catalog'), ['action' => 'delete', $catalog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $catalog->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Catalogs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Catalog'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Catalogs'), ['controller' => 'Catalogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Catalog'), ['controller' => 'Catalogs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="catalogs view large-9 medium-8 columns content">
    <h3><?= h($catalog->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Parent Catalog') ?></th>
            <td><?= $catalog->has('parent_catalog') ? $this->Html->link($catalog->parent_catalog->name, ['controller' => 'Catalogs', 'action' => 'view', $catalog->parent_catalog->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($catalog->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($catalog->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Lft') ?></th>
            <td><?= $this->Number->format($catalog->lft) ?></td>
        </tr>
        <tr>
            <th><?= __('Rght') ?></th>
            <td><?= $this->Number->format($catalog->rght) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($catalog->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($catalog->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Catalogs') ?></h4>
        <?php if (!empty($catalog->child_catalogs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Lft') ?></th>
                <th><?= __('Rght') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($catalog->child_catalogs as $childCatalogs): ?>
            <tr>
                <td><?= h($childCatalogs->id) ?></td>
                <td><?= h($childCatalogs->parent_id) ?></td>
                <td><?= h($childCatalogs->lft) ?></td>
                <td><?= h($childCatalogs->rght) ?></td>
                <td><?= h($childCatalogs->name) ?></td>
                <td><?= h($childCatalogs->created) ?></td>
                <td><?= h($childCatalogs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Catalogs', 'action' => 'view', $childCatalogs->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Catalogs', 'action' => 'edit', $childCatalogs->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Catalogs', 'action' => 'delete', $childCatalogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childCatalogs->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
