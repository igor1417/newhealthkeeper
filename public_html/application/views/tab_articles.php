
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


<ul class="paginator">
    <li><a href="#">Back</a></li>
    <li class="selected"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li class="pag-space"><a href="#">...</a></li>
    <li><a href="#">15</a></li>	
    <li><a href="#">Next</a></li>
</ul>