<!-- File: /app/View/Users/index.ctp -->

<h1><?php
    echo h($user['User']['username']);
    if ($Auth['id'] == $user['User']['id']){
        echo '(You)' ;
    }
?></h1>

<p><?php echo h($user['User']['role']); ?></p>
<p><?php echo h($user['User']['created']); ?></p>
<?php if (!empty($Auth)): ?>
        <p>
        <?php echo $this->Html->link(
            'Logout',
            array('controller' => 'users','action' => 'logout')
        );
        if ($Auth['role'] == 'admin'){
            echo $this->Form->postLink(
                'Delete',
                array('controller' => 'users','action' => 'delete', $user['User']['id']),
                array('confirm' => 'Are you sure?')
            );
            echo ' | ';
            echo $this->Html->link(
                'Edit',
                array('controller' => 'users','action' => 'edit', $user['User']['id'])
            );
        }
        ?>
        </p>
    <?php endif; ?>