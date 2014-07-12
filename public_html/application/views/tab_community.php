<!-- ***************** TABS ********************* -->
<div class="col-lg-10 col-md-10 col-sm-9 right-col">
    <ul id="three-tabs" class="nav nav-tabs">
        <li class="active"><a href="<?php echo WEB_URL ;?>feed">Community</a></li>
        <li class=""><a href="<?php echo WEB_URL ;?>articles">Articles</a></li>
        <li class=""><a href="<?php echo WEB_URL ;?>track">Tracking</a></li>
    </ul>
    <div id="three-tabsContent" class="tab-content">
        <!-- ***************** COMMUNITY ******************** -->
        <div class="tab-pane fade active in row" id="tab_community">

            <!-- ***************** Filters Panel ********************* -->
            <div class="post-content container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-box">
                            <ul class="filter">
                                <li class="fi-item"><a href="#" class="active">Lastest</a></li>
                                <li class="fi-item"><a href="#">Active</a></li>
                                <li class="fi-item">Filter Group</li>
                                <li class="fi-item">
                                    <div class="inp-group filter">
                                        <input type="text" class=""><span><i class="glyphicon glyphicon-chevron-right"></i></span>
                                    </div>
                                </li>
                            </ul>
                            <a href="#"><div class="btn btn-default btn-discuss"><i class="ico-star">&#42;</i> Start a discussion</div></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ROW -->
            <?php foreach ($post as $item):?>
            <div class="post-content container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-5">
                                <img src="<?php echo !empty($item['image_profile']) ? 'img/profile/tb/'.$item['image_profile'] : 'inc/img/avatar/man1.jpg'; ?>" class="img-rounded avatar center-block">
                            </div>
                            <div class="col-lg-7">
                                <h2 class="title-avatar"><?php echo $item['username_profile']; ?></h2>      
                                <a href="<?=WEB_URL;?>post/<?=$item['id_post'];?>">
                                    <p class="p-avatar"><?php echo !empty($item['date_post']) ? $item['date_post'] : '' ; ?></p>
                                </a>
                            </div>
                        </div>
                        <div class="row marg1">
                            <div class="col-lg-6">
                                <div class="like">
                                    <span><?php echo $item['thumb_up_post']; ?></span>
                                </div>
                                <span class="like-text">Like</span>
                            </div>
                            <div class="col-lg-6">
                                <div class="comment">
                                    <span><?php echo $item['comments_post']; ?></span>
                                </div>
                                <span class="comment-text"><?php echo !empty($item['postLastCommentDate']) ? $item['postLastCommentDate'] : '' ; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 post-pre-text">
                        <div class="left-shadow hidden-sm hidden-xs"></div>
                        <h1><?php echo !empty($item['title_post']) ? $item['title_post'] : "&nbsp;" ; ?></h1>
                        <p><?php echo $item['text_post']; ?></p>
                        <?php foreach ($item['topics'] as $topic) : ?>
                            <a href="<?= $topic['full_url_topic']; ?>">
                                <div class="btn btn-default btn-xs post-tags"> <?= $topic['name_topic']; ?> </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endforeach;?>

            <!-- PAGINATION -->
            <? if ($pageCount > 1):?>
            <ul class="paginator">
                <? if ($pageNum > 1): ?>
                    <li><a href="feed?pageNum=<?= $pageNum-1; ?>">Back</a></li>
                <? endif; ?>
                <? if ($pageNum<=$pagerVisibleSigns+1): ?>
                    <? for ($i=1; $i<=$pageNum+$pagerVisibleSigns; ++$i): ?>
                        <li <?php if ($i == $pageNum): ?> class="selected" <?php endif; ?>><a href="feed?pageNum=<?= $i; ?>"><?= $i; ?></a></li>
                    <? endfor; ?>
                    <? if ($pageNum+$pagerVisibleSigns == $pageCount): ?>
                    <? elseif ($pageNum+$pagerVisibleSigns+1 == $pageCount): ?>
                        <li><a href="feed?pageNum=<?= $pageCount; ?>"><?= $pageCount; ?></a></li>
                    <? else: ?>
                        <li class="pag-space">...</li>
                        <li><a href="feed?pageNum=<?= $pageCount; ?>"><?= $pageCount; ?></a></li>
                    <? endif; ?>
                <? elseif ($pageNum > $pageCount - $pagerVisibleSigns): ?>
                    <? if ($pageNum-$pagerVisibleSigns == 1): ?>
                    <? elseif ($pageNum-$pagerVisibleSigns-1 == 1): ?>
                        <li><a href="feed?pageNum=1">1</a></li>
                    <? else: ?>
                        <li><a href="feed?pageNum=1">1</a></li>
                        <li class="pag-space">...</li>
                    <? endif; ?>
                    <? for ($i=$pageNum-$pagerVisibleSigns; $i<=$pageCount; ++$i): ?>
                        <li <?php if ($i == $pageNum): ?> class="selected" <?php endif; ?>><a href="feed?pageNum=<?= $i; ?>"><?= $i; ?></a></li>
                    <? endfor; ?>
                <? else: ?>
                    <? if ($pageNum-$pagerVisibleSigns == 1): ?>
                    <? elseif ($pageNum-$pagerVisibleSigns-1 == 1): ?>
                        <li><a href="feed?pageNum=1">1</a></li>
                    <? else: ?>
                        <li><a href="feed?pageNum=1">1</a></li>
                        <li class="pag-space">...</li>
                    <? endif; ?>
                    <? for ($i=$pageNum-$pagerVisibleSigns; $i<=$pageNum+$pagerVisibleSigns; ++$i): ?>
                        <li <?php if ($i == $pageNum): ?> class="selected" <?php endif; ?>><a href="feed?pageNum=<?= $i; ?>"><?= $i; ?></a></li>
                    <? endfor; ?>
                    <? if ($pageNum+$pagerVisibleSigns == $pageCount): ?>
                    <? elseif ($pageNum+$pagerVisibleSigns+1 == $pageCount): ?>
                        <li><a href="feed?pageNum=<?= $pageCount; ?>"><?= $pageCount; ?></a></li>
                    <? else: ?>
                        <li class="pag-space">...</li>
                        <li><a href="feed?pageNum=<?= $pageCount; ?>"><?= $pageCount; ?></a></li>
                    <? endif; ?>
                <? endif; ?>
                <? if ($pageNum < $pageCount): ?>
                    <li><a href="feed?pageNum=<? echo $pageNum + 1; ?>">Next</a></li>
                <? endif; ?>
            </ul>
            <? endif; ?>

        </div>

        <!-- ***************** ARTICLES ********************* -->
        <div class="tab-pane fade row" id="tab_articles">
        </div>

        <!-- ***************** READ ARTICLE ***************** -->
        <div class="tab-pane fade row" id="read_article">
        </div>

        <!-- ***************** TRACKING ********************* -->
        <div class="tab-pane fade row" id="tab_tracking">
        </div>
    </div>
</div>
