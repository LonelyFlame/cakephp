<?php
App::uses('Post', 'Comment');
class CommentsController extends AppController
{
     public function add() {
        if ($this->request->is('post')) {
            $this->Comment->create();
            if ($this->Comment->save($this->request->data)) {
                $this->Session->setFlash(__('Your comment has been saved.'));
                return $this->redirect('/posts/view/'.$this->data['Comment']['post']);
            }
            $this->Session->setFlash(__('Unable to add your comment.'));
        }
    }
}