<?php
class Post extends AppModel {
    var $name = 'Post';
    var $belongsTo = array(
        'User' => array(
            'className' => 'User'
        )
    );
    public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) === $post;
    }
}
?>