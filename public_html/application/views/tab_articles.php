<!-- ***************** TABS ********************* -->
<div class="col-lg-10 col-md-10 col-sm-9 right-col">
    <ul id="three-tabs" class="nav nav-tabs">
        <li class=""><a href="tab_community">Community</a></li>
        <li class="active"><a href="tab_articles">Articles</a></li>
        <li class=""><a href="tab_tracking">Tracking</a></li>
    </ul>
    <div id="three-tabsContent" class="tab-content">
        <!-- ***************** COMMUNITY ******************** -->
        <div class="tab-pane fade row" id="tab_community">
        </div>

        <!-- ***************** ARTICLES ********************* -->
        <div class="tab-pane fade active in row" id="tab_articles">

            <!-- ***************** Filters Panel ********************* -->
            <div class="article-content container">
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
            <?php foreach ($posts as $post):?>

                <div class="article-content">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8 col-sxs-12">
                        <h1><?= !empty($post['title_post']) ? $post['title_post'] : "&nbsp;"; ?></h1>
                        <h6 class="author-time"><?= $post['username_profile'], ' ', !empty($post['date_post']) ? $post['date_post'] : '' ; ?></h6>
                        <p><?= !empty($post['text_post']) ? $post['text_post'] : "&nbsp;"; ?></p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 col-sxs-12">
                        <img class="article-ico center-block img-responsive img-rounded" src="resourses/img/article_img1.jpg">
                        <div class="like-group">
                            <div class="info-placeholder col-lg-6">
                                <div class="like">
                                    <span><?= $post['social_rank_post'] ?></span>
                                </div>
                            </div>
                            <div class="info-placeholder">
                                <div class="comment">
                                    <span><?= $post['comments_post'] ?></span>
                                </div>
                                <span class="comment-text"> <?= !empty($item['postLastCommentDate']) ? $item['postLastCommentDate'] : ''; ?> </span>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach;?>


            <!-- PAGINATION -->
            <ul class="paginator">
                <? if ($pageNum > 1):?>
                    <li><a href="tab_articles?pageNum=<? echo $pageNum - 1; ?>">Back</a></li>
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
                    <li><a href="tab_articles?pageNum=<? echo $pageNum + 1; ?>">Next</a></li>
                <? endif; ?>
            </ul>

        </div>

        <!-- ***************** READ ARTICLE ***************** -->
        <div class="tab-pane fade row" id="read_article">
        </div>

        <!-- ***************** TRACKING ********************* -->
        <div class="tab-pane fade row" id="tab_tracking">
        </div>
    </div>
</div>
