<!-- ***************** TABS ********************* -->
<div class="col-lg-10 col-md-10 col-sm-9 right-col">
    <ul id="three-tabs" class="nav nav-tabs">
        <li class="active"><a href="tab_community">Community</a></li>
        <li class=""><a href="tab_articles">Articles</a></li>
        <li class=""><a href="tab_tracking">Tracking</a></li>
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
                            <div class="btn btn-default btn-discuss"><i class="ico-star">&#42;</i> Start a discussion</div>
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
                                <p class="p-avatar"><?php echo !empty($item['date_post']) ? $item['date_post'] : '' ; ?></p>
                            </div>
                        </div>
                        <div class="row marg1">
                            <div class="col-lg-6">
                                <div class="like">
                                    <span><?php echo $item['social_rank_post']; ?></span>
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
                        <div class="btn btn-default btn-xs post-tags">Tags for post</div>
                        <div class="btn btn-default btn-xs post-tags">Tags for post</div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>

            <!-- PAGINATION -->
            <ul class="paginator">
                <? if ($pageNum > 1):?>
                    <li><a href="tab_community?pageNum=<? echo $pageNum - 1; ?>">Back</a></li>
                <? endif; ?>

                <? if ( $pageNum > 0 &&  $pageNum <= $pagerVisibleSigns + 1): ?>
                    <? for ($i=1; $i<=$pagerVisibleSigns+1; ++$i ): ?>
                        <li <?php if ($i == $pageNum): ?> class="selected" <?php endif; ?> ><a href="#"><?= $i; ?></a></li>
                    <? endfor; ?>
                    <?php if ( $pageNum==2 ): ?>
                        <li><a href="#"><?= $pageNum+2; ?></a></li>
                    <?php endif; ?>
                    <?php if ( $pageNum==3 ): ?>
                        <li><a href="#"><?= $pageNum+1; ?></a></li>
                        <li><a href="#"><?= $pageNum+2; ?></a></li>
                    <?php endif; ?>
                    <li class="pag-space"><a href="#">...</a></li>
                    <li><a href="#"><?= $pageCount; ?></a></li>

                <? elseif ( $pageNum <= $pageCount && $pageNum > $pageCount - $pagerVisibleSigns + 1): ?>
                    <li><a href="#">1</a></li>
                    <li class="pag-space"><a href="#">...</a></li>
                    <li <?= $pageNum-2 ?> ><a href="#"><?=  $pageNum-2; ?></a></li>
                    <li <?= $pageNum-1 ?> ><a href="#"><?=  $pageNum-1; ?></a></li>
                    <li <? if ($pageNum == $pageCount): ?> class="selected"<? endif; ?> ><a href="#"><? echo $pageCount; ?></a></li>

                <? else: ?>
                    <li><a href="#">1</a></li>
                    <li class="pag-space"><a href="#">...</a></li>
                    <li <?= $pageNum-2 ?> ><a href="#"><?=  $pageNum-2; ?></a></li>
                    <li <?= $pageNum-1 ?> ><a href="#"><?=  $pageNum-1; ?></a></li>
                    <li <?= $pageNum ?> class="selected" ><a href="#"><?=  $pageNum; ?></a></li>
                    <li <?= $pageNum+1 ?>  ><a href="#"><?=  $pageNum+1; ?></a></li>
                    <li <?= $pageNum+2 ?>  ><a href="#"><?=  $pageNum+2; ?></a></li>
                    <li class="pag-space"><a href="#">...</a></li>
                    <li><a href="#"><?= $pageCount; ?></a></li>
                <? endif; ?>

                <? if ($pageNum < $pageCount): ?>
                    <li><a href="tab_community?pageNum=<? echo $pageNum + 1; ?>">Next</a></li>
                <? endif; ?>
            </ul>

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
