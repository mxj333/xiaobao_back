<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Catalog'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="catalogs index large-9 medium-8 columns content">
    <h3><?= __('Catalogs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('parent_id') ?></th>
                <th><?= $this->Paginator->sort('lft') ?></th>
                <th><?= $this->Paginator->sort('rght') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <!-- <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th> -->
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($catalogs as $catalog): ?>
            <tr>
                <td><?= $this->Number->format($catalog->id) ?></td>
                <td><?= $catalog->has('parent_catalog') ? $this->Html->link($catalog->parent_catalog->name, ['controller' => 'Catalogs', 'action' => 'view', $catalog->parent_catalog->id]) : '' ?></td>
                <td><?= $this->Number->format($catalog->lft) ?></td>
                <td><?= $this->Number->format($catalog->rght) ?></td>
                <td><?= h($catalog->name) ?></td>
                <!-- <td><?= h($catalog->created) ?></td>
                <td><?= h($catalog->modified) ?></td> -->
                <td class="actions">
                    <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $catalog->id]) ?> -->
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $catalog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $catalog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $catalog->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
