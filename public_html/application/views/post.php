<div class="col-lg-10 col-md-10 col-sm-9 right-col">
    <ul id="three-tabs" class="nav nav-tabs">
        <li class="active"><a href="<?php echo WEB_URL ;?>feed">Community</a></li>
        <li class=""><a href="<?php echo WEB_URL ;?>articles">Articles</a></li>
        <li class=""><a href="<?php echo WEB_URL ;?>track">Tracking</a></li>
    </ul>
    <div id='three-tabsContent' class='tab-content'>
        <!-- ***************** READ COMMUNITY ARTICLE ***************** -->
        <div class="tab-pane fade row active in" id="read_community_article">
            <div class="col-lg-12">
                <div class="c-breadcrumbs row">
                    <div class="col-lg-12">
                        <a href="<?=WEB_URL ;?>">Home</a>
                        <span>/</span>
                        <a href="<?=WEB_URL ;?>feed">Community</a>
                        <span>/</span>
                        <a href="<?= WEB_URL;?>post/<?= $post['id_post'] ;?>"><?=$post['title_post'] ;?></a>
                    </div>
                </div>
            </div>

            <?php if ($post) :?>                        <!-- IF POST WITH SUCH ID EXISTS -->
                <div id="iMPost_<?= $post['id_post'] ;?>" class="col-lg-12">
                    <div class="col-lg-12">
                        <h1 class="big-title"><?=$post['title_post'] ;?></h1>
                    </div>
                    <div class="col-lg-12 marg-b-15">
                        <img style="width: 50px; height: 50px;" src="<?php echo !empty($post['image_profile']) ? WEB_URL.'img/profile/tb/'.$post['image_profile'] : WEB_URL.'inc/img/empty-avatar.png'; ?>" class="img-rounded fl marg2">
                        <h2 class="title-avatar2"><?= $post['username_profile'];?></h2>
                        <p class="p-avatar2"><?= $post['timeAgo'] ;?>
                            <?php if($post['id_profile_post'] == USER_ID): ?>
                            <span class="iMPostDelete">
                                <a href="#" onclick="return confirmDelPost('<?= $post["id_post"]; ?>');"><img src="<?= WEB_URL; ?>inc/img/v2/base/delete.png" alt="X" /></a>
                            </span>
                            <?php endif;?>
                        </p>
                    </div>
                    <div class="col-lg-12">
                        <p><?= $post['text_post']?></p>
                        <?php foreach($post['topics'] as $topic) : ?>
                            <a href="<?= $topic['full_url_topic'] ;?>" ><div class="btn btn-default btn-xs post-tags marg1"><?=$topic['name_topic']?></div></a>
                        <?php endforeach ;?>
                    </div>
                    <div class="col-lg-12 marg3">
                        <div class="row c-blue-line">
                            <div class="col-lg-6">
                                <div class="comment-title">Replies</div>
                                <div class="comment marg4">
                                    <span><?= count($post['comments']) ;?></span>
                                </div>
                            </div>
                            <div style="cursor: pointer;" class="col-lg-6" onClick="javascript: toVote(this,<?= $post['id_post'] ;?>)">
                                <div class="like-title">Hugs</div>
                                <div class="like marg4 fr">
                                    <span><?= $post['thumb_up_post'] ;?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!------------COMMENTS------------->
                    <div class="col-lg-12 marg3">
                        <div id='postComments'>
                            <?php foreach($post['comments'] as $comment) : ?>
                                <div id="comment_<?= $comment['id_pc'] ;?>">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <img style="width: 50px; height: 50px;" src="<?php echo !empty($post['image_profile']) ? WEB_URL.'img/profile/tb/'.$post['image_profile'] : WEB_URL.'inc/img/empty-avatar.png'; ?>" class="img-rounded fl marg2" />
                                                    <h2 class="title-avatar2"><?= $comment['username_profile'] ;?></h2>
                                                    <p class="p-avatar2">
                                                        <?=$comment['timeAgo']?>
                                                        <?php if($comment['id_profile_pc'] == USER_ID): ?>
                                                        <span class="iMPostDelete">
                                                            <a href="#" onclick="return confirmDelComment('<?= $comment["id_pc"]; ?>');"><img src="<?= WEB_URL; ?>inc/img/v2/base/delete.png" alt="X" /></a>
                                                        </span>
                                                        <?php endif;?>
                                                    </p>                              
                                                </div>
                                            </div>
                                        </div>
                                        <div style="cursor: pointer;" class="col-lg-6" onClick="javascript: toVoteComment(this,<?= $comment['id_pc'] ;?>)">
                                            <div class="like-title">Hugs</div>
                                            <div class="like marg4 fr">
                                                <span><?= $comment['thumb_up_pc'];?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row c-blue-line">
                                        <div class="col-lg-12"><?= $comment['text_pc']?></div>
                                    </div>
                                </div>
                        <?php endforeach ;?>
                    </div>
                        <!---------SEND COMMENT FORM---------->
                        <div class="row marg1 ">
                            <div class="col-lg-1">
                                <img style="width: 50px; height: 50px;"  src="<?php echo !empty($post['image_profile']) ? WEB_URL.'img/profile/tb/'.$post['image_profile'] : WEB_URL.'inc/img/empty-avatar.png'; ?>" class="img-rounded fl marg2" /> <!-- MAY BE WRONG URL-->
                            </div>
                            <div class="col-lg-9">
                                <div class="row">
                                    <input id='sendComment' class="inp-text" type="text" placeholder="Type reply" />
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <a class="btn-send" href="javascript: sendComment(<?=$post['id_post']?>)">SEND</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else : ?>             <!-- IF POST WITH SUCH ID DOES NOT EXISTS -->
                <div class="col-lg-12">
                    <h1 class="big-title">Such post does not exists</h1>         <!-- MAY BE NEED ANOTHER MESSAGE-->
                </div>
            <?php endif ?>
        </div>
    </div>
</div>