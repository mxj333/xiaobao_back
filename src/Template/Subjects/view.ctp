<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subject'), ['action' => 'edit', $subject->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subject'), ['action' => 'delete', $subject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subject->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subject'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Catalogs'), ['controller' => 'Catalogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Catalog'), ['controller' => 'Catalogs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="subjects view large-9 medium-8 columns content">
    <h3><?= h($subject->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Catalog') ?></th>
            <td><?= $subject->has('catalog') ? $this->Html->link($subject->catalog->name, ['controller' => 'Catalogs', 'action' => 'view', $subject->catalog->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($subject->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Body') ?></th>
            <td><?= h($subject->body) ?></td>
        </tr>
        <tr>
            <th><?= __('Answer') ?></th>
            <td><?= h($subject->answer) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($subject->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($subject->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($subject->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= $subject->type ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
</div>
