<!-- File: /app/View/Posts/view.ctp -->

<h1><?php echo h($post['Post']['title']); ?></h1>

<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<p><?php echo h($post['Post']['body']); ?></p>

<?php
foreach($comments as $comment):
    echo ''.$comment['Comment']['comment'].'
';
endforeach;
?>

<?php
echo $this->Form->create('Comment');
echo $this->Form->hidden('post', array('value' => $post['Post']['id']));
echo $this->Form->input('comment', array('type'=>'textarea'));
echo $this->Form->submit('Submit');
echo $this->Form->end();
?>