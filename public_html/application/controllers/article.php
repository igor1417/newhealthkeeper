<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Article extends CI_Controller {


    public function index() {
        require_once('../engine/starter/config.php');
        require_once(ENGINE_PATH . 'class/post.class.php');
        require_once(ENGINE_PATH . 'class/config.class.php');

       
        $postClass = new Post();
        $configClass = new Config();
        $Post = $postClass->getPostById((int)$this->input->get('id'));
        $Post = $Post[0];
//        unset($resPosts['result']);
//        $postCount = $postClass->getAllPostsCount('news');
//        if ($postCount['result']) {
//            $postCount = $postCount[0]['postCount'];
//        } else {
//            $postCount = 0;
//        }
//
//        foreach ($resPosts as $key => $val) {
//            $resPosts[$key]['date_post'] = $configClass->ago(strtotime($resPosts[$key]['date_post']));
//            if ($resPosts[$key]['comments_post'] > 0) {
//                    $postComments = $postClass->getAllPostComments($resPosts[$key]['id_post'], 0);
//                    if($postComments['result'] != 0) {
//                        $postLastCommentDate = $postComments[$postComments['result'] - 1]['date_pc'];
//                    } else {
//                        $postLastCommentDate = null;
//                    }
//                    $resPosts[$key]['postLastCommentDate'] = $configClass->ago(strtotime($postLastCommentDate));
//                } else {
//                    $resPosts[$key]['postLastCommentDate'] = '&nbsp;';
//                }
//        }
//
//        $data = array(
//            'posts' => $resPosts
//          , 'pageNum' => $pageNum
//          , 'pageCount' => ceil($postCount / $limit)
//          , 'pagerVisibleSigns' => 2
//        );
        $this->load->library('breadcrumbs');
        $this->breadcrumbs->push('Articles', '/tab_articles');
        $this->breadcrumbs->push($Post['title_post'], '/article?id='.$Post['id_post']);
        $this->breadcrumbs->unshift('Home', '/');
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('article', array('post' => $Post));
        $this->load->view('footer');
    }

}
