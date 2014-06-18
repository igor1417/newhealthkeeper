<?php foreach ($post as $item):?>
	<div class="post-content">
		<div class="col-md-3 flex-vertical">
			<div class="col-40">
				<img src="img/profile/tb/<?php echo !empty($item['image_profile']) ? $item['image_profile'] : 'ava1.jpg'; ?>" class="img-rounded avatar center-block">
				<div class="info-placeholder">
					<div class="like">
						<span><?php echo $item['social_rank_post']; ?></span>
					</div>
					<span class="like-text">Like</span>
				</div>
			</div>
			<div class="col-60">
				<h2><?php echo $item['username_profile']; ?></h2>
				<p><?php echo !empty($item['date_post']) ? $item['date_post'] : '' ; ?></p>
				<div class="info-placeholder">
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
	
<?php endforeach;	?>
	</div>