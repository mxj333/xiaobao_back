<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $catalog->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $catalog->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Catalogs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Catalogs'), ['controller' => 'Catalogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Catalog'), ['controller' => 'Catalogs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="catalogs form large-9 medium-8 columns content">
    <?= $this->Form->create($catalog) ?>
    <fieldset>
        <legend><?= __('Edit Catalog') ?></legend>
        <?php
            echo $this->Form->input('parent_id', ['options' => $parentCatalogs]);
            echo $this->Form->input('lft');
            echo $this->Form->input('rght');
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
