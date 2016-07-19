<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Catalogs'), ['controller' => 'Catalogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Catalog'), ['controller' => 'Catalogs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subjects form large-9 medium-8 columns content">
    <?= $this->Form->create($subject) ?>
    <fieldset>
        <legend><?= __('Add Subject') ?></legend>
        <?php
            echo $this->Form->input('catalog_id', ['options' => $catalogs, 'empty' => false]);
            echo $this->Form->input('type', ['options' => [1 => '单选题', 2 => '多选题', 3 => '判断题']]);
            echo $this->Form->input('title');
            echo $this->Form->input('body', ['rows' => '3']);
            echo $this->Form->input('answer');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
