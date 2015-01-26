<?php

class Olelookoie_Weblog_IndexController extends Mage_Core_Controller_Front_Action
{
    public function testModelAction()
    {
        $params = $this->getRequest()->getParams();
        $blogPost = Mage::getModel('weblog/blogpost');
        echo("Loading the blogpost with an ID of ".$params['id']);
        $blogPost->load($params['id']);
        $data = $blogPost->getData();
        var_dump($data);
    }

    public function createNewPostAction()
    {
        $blogPost = Mage::getModel('weblog/blogpost');
        $blogPost->setTitle('Code Post!');
        $blogPost->setPost('This post was created from code!');
        $blogPost->save();
        echo 'post with ID ' . $blogPost->getId() . ' created';
    }

    public function editFirstPostAction()
    {
        $blogPost = Mage::getModel('weblog/blogpost');
        $blogPost->load(1);
        $blogPost->setTitle('The 1st post!');
        $blogPost->save();
        echo 'post edited';
    }

    public function deleteFirstPostAction()
    {
        $blogPost = Mage::getModel('weblog/blogpost');
        $blogPost->load(1);
        $blogPost->delete();
        echo 'post removed';
    }

    public function showAllBlogPostsAction()
    {
        $posts = Mage::getModel('weblog/blogpost')->getCollection();
        foreach ($posts as $blogPost) {
            echo '<h3>'.$blogPost->getTitle().'</h3>';
            echo nl2br($blogPost->getPost());
        }
    }
}