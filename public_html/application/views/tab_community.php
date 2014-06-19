<script>
function ajax_next(url){
    $.ajax({
        url: url,
        cache: false,
        success: function(html){
            $("#community").html(html);
        }
    });
}

function ajax_back(url){
    $.ajax({
        url: url,
        cache: false,
        success: function(html){
            $("#community").html(html);
        }
    });
}
</script>

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
    <li><a onclick="ajax_next('tab_community?pageNum=<? echo $pageNum - 1; ?>')" href="#tab_community?pageNum=<? echo $pageNum - 1; ?>">Back</a></li>
    <? endif; ?>
    <li class="selected"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li class="pag-space"><a href="#">...</a></li>
    <li><a href="#"><?= $pageCount ?></a></li>
    <? if ($pageNum < $pageCount):?>
    <li><a onclick="ajax_next('tab_community?pageNum=<? echo $pageNum + 1; ?>')" href="#tab_community?pageNum=<? echo $pageNum + 1; ?>">Next</a></li>
    <? endif; ?>
</ul>