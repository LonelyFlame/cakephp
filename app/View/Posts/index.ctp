<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>

    <!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
        <tr>
            <td><?php echo $post['Post']['id']; ?></td>
            <td>
                <?php
                echo $this->Html->link(
                    $post['Post']['title'],
                    array('action' => 'view', $post['Post']['id'])
                );
                ?>
            </td>
            <td>
                <?php if ($post['Post']['user_id'] == $Auth['id']): ?>
                <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $post['Post']['id'], $post['Post']['title']),
                    array('confirm' => 'Are you sure?')
                );
                    ?>
                <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $post['Post']['id'])
                );
                ?>
                <?php endif; ?>
            </td>
            <td>
                <?php echo $post['Post']['created']; ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
<p><?php
if (!empty($Auth)){
    echo $this->Html->link(
        $Auth['username'],
        array('controller' => 'users','action' => 'view', $Auth['id'])
    );
    echo(' | ');
    echo $this->Html->link(
        'Logout',
        array('controller' => 'users','action' => 'logout')
    );
}
else echo $this->Html->link(
        'Login',
        array('controller' => 'users','action' => 'login')
    );
?></p>