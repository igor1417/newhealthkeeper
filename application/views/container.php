
<script>
	function ajax_menu(url){
		$.ajax({
			url: url,
			cache: false,
			success: function(html){
				$("#three-tabsContent").html(html);
			}
		});
	}
	
	$(function(){
		var tab_content;
		$.ajax({
			url: 'tab_articles',
			cache: false,
			success: function(html){
				$('#articles').html(html);
			}
		});
		
	});
	
</script>

<div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-3 left-col">
            <ul class="side-bar hidden-xs">
                <li class="sb-item">
                    <a onclick="ajax_menu('my_profile')" href="#">My profile</a>
                </li>
                <li class="sb-item">
                    <a onclick="ajax_menu('my_diary')" href="#">My Diary</a>
                </li>
                <li class="sb-item">
                    <a onclick="ajax_menu('meet_others')" href="#">Meet Others</a>
                </li>
                <li class="sb-item">
                    <a onclick="ajax_menu('my_team')" href="#">My Team</a>
                </li>
                <li class="sb-item">
                    <a onclick="ajax_menu('my_doctors')" href="#">My Doctors</a>
                </li>
                <li class="sb-item iconed">
                    <a href="#">
                        <i class="glyphicon glyphicon-envelope"></i>
                        <div>
                            <p>Message</p>
                            <p>My Doctor</p>
                        </div>
                    </a>
                </li>
                <li class="sb-item iconed">
                    <a href="#">
                        <i class="glyphicon glyphicon-pencil"></i>
                        <div>
                            <p>Request</p>
                            <p>Accountment</p>
                        </div>
                    </a>
                </li>
                <li class="sb-item iconed">
                    <a href="#">
                        <i class="glyphicon glyphicon-edit"></i>
                        <div>
                            <p>Request</p>
                            <p>Rx Refill</p>
                        </div>
                    </a>
                </li>
                <li class="sb-item">
                    <a href="#">Conditions</a>
                </li>
                <li class="sb-item">
                    <a href="#">Symptoms</a>
                </li>
                <li class="sb-item">
                    <a href="#">Medications</a>
                </li>
                <li class="sb-item">
                    <a href="#">Procedures</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-9 right-col">
                <ul id="three-tabs" class="nav nav-tabs">
                    <li class="active"><a href="#community" data-toggle="tab">Community</a></li>
                    <li class=""><a href="#articles" data-toggle="tab">Articles</a></li>
                    <li class=""><a href="#tracking" data-toggle="tab">Tracking</a></li>
                </ul>
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
                            <div class="btn btn-default btn-discuss"><i class="ico-star">*</i> Start a discussion</div>
                        </div>
                    </div>
                </div>
                <div id="three-tabsContent" class="tab-content">
                    <div class="tab-pane fade active in row" id="community">
                        <div class="post-content">
                            <div class="col-md-3 flex-vertical">
                                <div class="col-40">
                                    <img src="resourses/img/ava1.jpg" class="img-rounded avatar center-block">
                                    <div class="info-placeholder">
                                        <div class="like">
                                            <span>3</span>
                                        </div>
                                        <span class="like-text">Like</span>
                                    </div>
                                </div>
                                <div class="col-60">
                                    <h2>Hispers</h2>
                                    <p>12 hours ago</p>
                                    <div class="info-placeholder">
                                        <div class="comment">
                                            <span>3</span>
                                        </div>
                                        <span class="comment-text">45 min ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 post-pre-text">
                                <div class="left-shadow hidden-sm hidden-xs"></div>
                                <h1>Excepteur sint occaecat cupidatat non proident</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtem por incididunt ut labore et dolore magna aliqua. Ut enim admin...</p>
                                <div class="btn btn-default btn-xs post-tags">Tags for post</div>
                                <div class="btn btn-default btn-xs post-tags">Tags for post</div>
                            </div>
                        </div>
                        <div class="post-content">
                            <div class="col-md-3 flex-vertical">
                                <div class="col-40">
                                    <img src="resourses/img/ava2.jpg" class="img-rounded avatar center-block">
                                    <div class="info-placeholder">
                                        <div class="like">
                                            <span>45</span>
                                        </div>
                                        <span class="like-text">Like</span>
                                    </div>
                                </div>
                                <div class="col-60">
                                    <h2>Yukonwhisp</h2>
                                    <p>22 hours ago</p>
                                    <div class="info-placeholder">
                                        <div class="comment">
                                            <span>13</span>
                                        </div>
                                        <span class="comment-text">45 min ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 post-pre-text">
                                <div class="left-shadow hidden-sm hidden-xs"></div>
                                <h1>Lorem ipsum dolor sit amet, consectetur</h1>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officidese runt mollit anim id est laborum. Excepteur sint occaecat...</p>
                                <div class="btn btn-default btn-xs post-tags">Tags for post</div>
                                <div class="btn btn-default btn-xs post-tags">Tags for post</div>
                                <div class="btn btn-default btn-xs post-tags">Tags for post</div>
                            </div>
                        </div>
                        <div class="post-content">
                            <div class="col-md-3 flex-vertical">
                                <div class="col-40">
                                    <img src="resourses/img/ava1.jpg" class="img-rounded avatar center-block">
                                    <div class="info-placeholder">
                                        <div class="like">
                                            <span>3</span>
                                        </div>
                                        <span class="like-text">Like</span>
                                    </div>
                                </div>
                                <div class="col-60">
                                    <h2>Hispers</h2>
                                    <p>12 hours ago</p>
                                    <div class="info-placeholder">
                                        <div class="comment">
                                            <span>3</span>
                                        </div>
                                        <span class="comment-text">45 min ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 post-pre-text">
                                <div class="left-shadow hidden-sm hidden-xs"></div>
                                <h1>Excepteur sint occaecat cupidatat non proident</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtem por incididunt ut labore et dolore magna aliqua. Ut enim admin...</p>
                                <div class="btn btn-default btn-xs post-tags">Tags for post</div>
                                <div class="btn btn-default btn-xs post-tags">Tags for post</div>
                            </div>
                        </div>
                        <div class="post-content">
                            <div class="col-md-3 flex-vertical">
                                <div class="col-40">
                                    <img src="resourses/img/ava2.jpg" class="img-rounded avatar center-block">
                                    <div class="info-placeholder">
                                        <div class="like">
                                            <span>45</span>
                                        </div>
                                        <span class="like-text">Like</span>
                                    </div>
                                </div>
                                <div class="col-60">
                                    <h2>Yukonwhisp</h2>
                                    <p>22 hours ago</p>
                                    <div class="info-placeholder">
                                        <div class="comment">
                                            <span>13</span>
                                        </div>
                                        <span class="comment-text">45 min ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 post-pre-text">
                                <div class="left-shadow hidden-sm hidden-xs"></div>
                                <h1>Lorem ipsum dolor sit amet, consectetur</h1>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officidese runt mollit anim id est laborum. Excepteur sint occaecat...</p>
                                <div class="btn btn-default btn-xs post-tags">Tags for post</div>
                                <div class="btn btn-default btn-xs post-tags">Tags for post</div>
                                <div class="btn btn-default btn-xs post-tags">Tags for post</div>
                            </div>
                        </div>
                        <div class="post-content">
                            <div class="col-md-3 flex-vertical">
                                <div class="col-40">
                                    <img src="resourses/img/ava1.jpg" class="img-rounded avatar center-block">
                                    <div class="info-placeholder">
                                        <div class="like">
                                            <span>3</span>
                                        </div>
                                        <span class="like-text">Like</span>
                                    </div>
                                </div>
                                <div class="col-60">
                                    <h2>Hispers</h2>
                                    <p>12 hours ago</p>
                                    <div class="info-placeholder">
                                        <div class="comment">
                                            <span>3</span>
                                        </div>
                                        <span class="comment-text">45 min ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 post-pre-text">
                                <div class="left-shadow hidden-sm hidden-xs"></div>
                                <h1>Excepteur sint occaecat cupidatat non proident</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtem por incididunt ut labore et dolore magna aliqua. Ut enim admin...</p>
                                <div class="btn btn-default btn-xs post-tags">Tags for post</div>
                                <div class="btn btn-default btn-xs post-tags">Tags for post</div>
                            </div>
                        </div>
                        <div class="post-content">
                            <div class="col-md-3 flex-vertical">
                                <div class="col-40">
                                    <img src="resourses/img/ava2.jpg" class="img-rounded avatar center-block">
                                    <div class="info-placeholder">
                                        <div class="like">
                                            <span>45</span>
                                        </div>
                                        <span class="like-text">Like</span>
                                    </div>
                                </div>
                                <div class="col-60">
                                    <h2>Yukonwhisp</h2>
                                    <p>22 hours ago</p>
                                    <div class="info-placeholder">
                                        <div class="comment">
                                            <span>13</span>
                                        </div>
                                        <span class="comment-text">45 min ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 post-pre-text">
                                <div class="left-shadow hidden-sm hidden-xs"></div>
                                <h1>Lorem ipsum dolor sit amet, consectetur</h1>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officidese runt mollit anim id est laborum. Excepteur sint occaecat...</p>
                                <div class="btn btn-default btn-xs post-tags">Tags for post</div>
                                <div class="btn btn-default btn-xs post-tags">Tags for post</div>
                                <div class="btn btn-default btn-xs post-tags">Tags for post</div>
                            </div>
                        </div>
                        <ul class="paginator">
                            <li><a href="#">Back</a></li>
                            <li class="selected"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="pag-space"><a href="#">...</a></li>
                            <li><a href="#">15</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade row" id="articles">
                        <!--<div class="article-content">
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8 col-sxs-12">
                                <h1>Excepteur sint occaecat cupidatat non proident</h1>
                                <h6 class="author-time">Username. 9 hours ago</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtem por incididunt ut labore et dolore magna aliqua. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officidese runt mollit excepteur sint occaecat cupidatat non proident occaecat cupidatat non proident, sunt in culpa qui officidese runt proident  mollit ...</p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 col-sxs-12">
                                <img class="article-ico center-block img-responsive img-rounded" src="resourses/img/article_img1.jpg">
                                <div class="like-group">
                                    <div class="info-placeholder">
                                        <div class="like">
                                            <span>45</span>
                                        </div>
                                    </div>
                                    <div class="info-placeholder">
                                        <div class="comment">
                                            <span>13</span>
                                        </div>
                                        <span class="comment-text">9 hours ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="article-content">
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8 col-sxs-12">
                                <h1>Excepteur sint occaecat cupidatat non proident</h1>
                                <h6 class="author-time">Username. 9 hours ago</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtem por incididunt ut labore et dolore magna aliqua. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officidese runt mollit excepteur sint occaecat cupidatat non proident occaecat cupidatat non proident, sunt in culpa qui officidese runt proident  mollit ...</p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 col-sxs-12">
                                <img class="article-ico center-block img-responsive img-rounded" src="resourses/img/article_img1.jpg">
                                <div class="like-group">
                                    <div class="info-placeholder">
                                        <div class="like">
                                            <span>45</span>
                                        </div>
                                    </div>
                                    <div class="info-placeholder">
                                        <div class="comment">
                                            <span>13</span>
                                        </div>
                                        <span class="comment-text">9 hours ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="article-content">
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8 col-sxs-12">
                                <h1>Excepteur sint occaecat cupidatat non proident</h1>
                                <h6 class="author-time">Username. 9 hours ago</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtem por incididunt ut labore et dolore magna aliqua. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officidese runt mollit excepteur sint occaecat cupidatat non proident occaecat cupidatat non proident, sunt in culpa qui officidese runt proident  mollit ...</p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 col-sxs-12">
                                <img class="article-ico center-block img-responsive img-rounded" src="resourses/img/article_img1.jpg">
                                <div class="like-group">
                                    <div class="info-placeholder">
                                        <div class="like">
                                            <span>45</span>
                                        </div>
                                    </div>
                                    <div class="info-placeholder">
                                        <div class="comment">
                                            <span>13</span>
                                        </div>
                                        <span class="comment-text">9 hours ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="article-content">
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8 col-sxs-12">
                                <h1>Excepteur sint occaecat cupidatat non proident</h1>
                                <h6 class="author-time">Username. 9 hours ago</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtem por incididunt ut labore et dolore magna aliqua. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officidese runt mollit excepteur sint occaecat cupidatat non proident occaecat cupidatat non proident, sunt in culpa qui officidese runt proident  mollit ...</p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 col-sxs-12">
                                <img class="article-ico center-block img-responsive img-rounded" src="resourses/img/article_img1.jpg">
                                <div class="like-group">
                                    <div class="info-placeholder">
                                        <div class="like">
                                            <span>45</span>
                                        </div>
                                    </div>
                                    <div class="info-placeholder">
                                        <div class="comment">
                                            <span>13</span>
                                        </div>
                                        <span class="comment-text">9 hours ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="paginator">
                            <li><a href="#">Back</a></li>
                            <li class="selected"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="pag-space"><a href="#">...</a></li>
                            <li><a href="#">15</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>-->
                    </div>
                    <div class="tab-pane fade row" id="tracking">
                        <!--<div class="track-content">
                            <div class="col-md-3 flex-vertical">
                                <div class="col-40">
                                    <img src="resourses/img/ava1.jpg" class="img-rounded avatar center-block">
                                    <div class="info-placeholder">
                                        <div class="like">
                                            <span>3</span>
                                        </div>
                                        <span class="like-text">Like</span>
                                    </div>
                                </div>
                                <div class="col-60">
                                    <h2>Hispers</h2>
                                    <p>12 hours ago</p>
                                    <div class="info-placeholder">
                                        <div class="comment">
                                            <span>3</span>
                                        </div>
                                        <span class="comment-text">45 min ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 post-pre-text">
                                <div class="left-shadow hidden-sm hidden-xs"></div>
                                <table class="track-table">
                                    <thead>
                                        <tr>
                                            <th><p class="head-text ">Weight</p><p class="head-description hidden-xs">(kg)</p></th>
                                            <th><p class="visible-xs">B/p</p><p class="head-text hidden-xs">Blood pressure</p><p class="head-description hidden-xs">(systolic/diastolic)</p></th>
                                            <th><p class="visible-xs">Sugar</p><p class="head-text hidden-xs">Blood</p><p class="head-text hidden-xs">sugar</p></th>
                                            <th><p class="head-text ">load</p><p class="head-description hidden-xs">(miles walked/day)</p></th>
                                            <th><p class="visible-xs">Calories</p><p class="head-text hidden-xs">Food intake</p><p class="head-description hidden-xs">(calories conumerd/day)</p></th>
                                            <th><p class="visible-xs">Medication</p><p class="head-text hidden-xs">Take</p><p class="head-text hidden-xs">medication</p></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>85</td>
                                            <td>120/90</td>
                                            <td>0.5</td>
                                            <td>3.5</td>
                                            <td>1250</td>
                                            <td>Take medication</td>
                                        </tr>
                                        <tr>
                                            <td>95</td>
                                            <td>110/70</td>
                                            <td>0.65</td>
                                            <td>2.5</td>
                                            <td>1550</td>
                                            <td>Take medication</td>
                                        </tr>
                                        <tr>
                                            <td>75</td>
                                            <td>130/90</td>
                                            <td>0.65</td>
                                            <td>1.5</td>
                                            <td>1965</td>
                                            <td>Take medication</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="track-content">
                            <div class="col-md-3 flex-vertical">
                                <div class="col-40">
                                    <img src="resourses/img/ava1.jpg" class="img-rounded avatar center-block">
                                    <div class="info-placeholder">
                                        <div class="like">
                                            <span>3</span>
                                        </div>
                                        <span class="like-text">Like</span>
                                    </div>
                                </div>
                                <div class="col-60">
                                    <h2>Hispers</h2>
                                    <p>12 hours ago</p>
                                    <div class="info-placeholder">
                                        <div class="comment">
                                            <span>3</span>
                                        </div>
                                        <span class="comment-text">45 min ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 post-pre-text">
                                <div class="left-shadow hidden-sm hidden-xs"></div>
                                <table class="track-table">
                                    <thead>
                                    <tr>
                                        <th><p class="head-text ">Weight</p><p class="head-description hidden-xs">(kg)</p></th>
                                        <th><p class="visible-xs">Pressure</p><p class="head-text hidden-xs">Blood pressure</p><p class="head-description hidden-xs">(systolic/diastolic)</p></th>
                                        <th><p class="visible-xs">Sugar</p><p class="head-text hidden-xs">Blood</p><p class="head-text hidden-xs">sugar</p></th>
                                        <th><p class="head-text ">Activities</p><p class="head-description hidden-xs">(miles walked/day)</p></th>
                                        <th><p class="visible-xs">Calories</p><p class="head-text hidden-xs">Food intake</p><p class="head-description hidden-xs">(calories conumerd/day)</p></th>
                                        <th><p class="visible-xs">Medication</p><p class="head-text hidden-xs">Take</p><p class="head-text hidden-xs">medication</p></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>85</td>
                                        <td>120/90</td>
                                        <td>0.5</td>
                                        <td>3.5</td>
                                        <td>1250</td>
                                        <td>Take medication</td>
                                    </tr>
                                    <tr>
                                        <td>95</td>
                                        <td>110/70</td>
                                        <td>0.65</td>
                                        <td>2.5</td>
                                        <td>1550</td>
                                        <td>Take medication</td>
                                    </tr>
                                    <tr>
                                        <td>75</td>
                                        <td>130/90</td>
                                        <td>0.65</td>
                                        <td>1.5</td>
                                        <td>1965</td>
                                        <td>Take medication</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="track-content">
                            <div class="col-md-3 flex-vertical">
                                <div class="col-40">
                                    <img src="resourses/img/ava1.jpg" class="img-rounded avatar center-block">
                                    <div class="info-placeholder">
                                        <div class="like">
                                            <span>3</span>
                                        </div>
                                        <span class="like-text">Like</span>
                                    </div>
                                </div>
                                <div class="col-60">
                                    <h2>Hispers</h2>
                                    <p>12 hours ago</p>
                                    <div class="info-placeholder">
                                        <div class="comment">
                                            <span>3</span>
                                        </div>
                                        <span class="comment-text">45 min ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 post-pre-text">
                                <div class="left-shadow hidden-sm hidden-xs"></div>
                                <table class="track-table">
                                    <thead>
                                    <tr>
                                        <th><p class="head-text ">Weight</p><p class="head-description hidden-xs">(kg)</p></th>
                                        <th><p class="visible-xs">Pressure</p><p class="head-text hidden-xs">Blood pressure</p><p class="head-description hidden-xs">(systolic/diastolic)</p></th>
                                        <th><p class="visible-xs">Sugar</p><p class="head-text hidden-xs">Blood</p><p class="head-text hidden-xs">sugar</p></th>
                                        <th><p class="head-text ">Activities</p><p class="head-description hidden-xs">(miles walked/day)</p></th>
                                        <th><p class="visible-xs">Calories</p><p class="head-text hidden-xs">Food intake</p><p class="head-description hidden-xs">(calories conumerd/day)</p></th>
                                        <th><p class="visible-xs">Medication</p><p class="head-text hidden-xs">Take</p><p class="head-text hidden-xs">medication</p></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>85</td>
                                        <td>120/90</td>
                                        <td>0.5</td>
                                        <td>3.5</td>
                                        <td>1250</td>
                                        <td>Take medication</td>
                                    </tr>
                                    <tr>
                                        <td>95</td>
                                        <td>110/70</td>
                                        <td>0.65</td>
                                        <td>2.5</td>
                                        <td>1550</td>
                                        <td>Take medication</td>
                                    </tr>
                                    <tr>
                                        <td>75</td>
                                        <td>130/90</td>
                                        <td>0.65</td>
                                        <td>1.5</td>
                                        <td>1965</td>
                                        <td>Take medication</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="track-content">
                            <div class="col-md-3 flex-vertical">
                                <div class="col-40">
                                    <img src="resourses/img/ava1.jpg" class="img-rounded avatar center-block">
                                    <div class="info-placeholder">
                                        <div class="like">
                                            <span>3</span>
                                        </div>
                                        <span class="like-text">Like</span>
                                    </div>
                                </div>
                                <div class="col-60">
                                    <h2>Hispers</h2>
                                    <p>12 hours ago</p>
                                    <div class="info-placeholder">
                                        <div class="comment">
                                            <span>3</span>
                                        </div>
                                        <span class="comment-text">45 min ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 post-pre-text">
                                <div class="left-shadow hidden-sm hidden-xs"></div>
                                <table class="track-table">
                                    <thead>
                                    <tr>
                                        <th><p class="head-text ">Weight</p><p class="head-description hidden-xs">(kg)</p></th>
                                        <th><p class="visible-xs">Pressure</p><p class="head-text hidden-xs">Blood pressure</p><p class="head-description hidden-xs">(systolic/diastolic)</p></th>
                                        <th><p class="visible-xs">Sugar</p><p class="head-text hidden-xs">Blood</p><p class="head-text hidden-xs">sugar</p></th>
                                        <th><p class="head-text ">Activities</p><p class="head-description hidden-xs">(miles walked/day)</p></th>
                                        <th><p class="visible-xs">Calories</p><p class="head-text hidden-xs">Food intake</p><p class="head-description hidden-xs">(calories conumerd/day)</p></th>
                                        <th><p class="visible-xs">Medication</p><p class="head-text hidden-xs">Take</p><p class="head-text hidden-xs">medication</p></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>85</td>
                                        <td>120/90</td>
                                        <td>0.5</td>
                                        <td>3.5</td>
                                        <td>1250</td>
                                        <td>Take medication</td>
                                    </tr>
                                    <tr>
                                        <td>95</td>
                                        <td>110/70</td>
                                        <td>0.65</td>
                                        <td>2.5</td>
                                        <td>1550</td>
                                        <td>Take medication</td>
                                    </tr>
                                    <tr>
                                        <td>75</td>
                                        <td>130/90</td>
                                        <td>0.65</td>
                                        <td>1.5</td>
                                        <td>1965</td>
                                        <td>Take medication</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="track-content">
                            <div class="col-md-3 flex-vertical">
                                <div class="col-40">
                                    <img src="resourses/img/ava1.jpg" class="img-rounded avatar center-block">
                                    <div class="info-placeholder">
                                        <div class="like">
                                            <span>3</span>
                                        </div>
                                        <span class="like-text">Like</span>
                                    </div>
                                </div>
                                <div class="col-60">
                                    <h2>Hispers</h2>
                                    <p>12 hours ago</p>
                                    <div class="info-placeholder">
                                        <div class="comment">
                                            <span>3</span>
                                        </div>
                                        <span class="comment-text">45 min ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 post-pre-text">
                                <div class="left-shadow hidden-sm hidden-xs"></div>
                                <table class="track-table">
                                    <thead>
                                    <tr>
                                        <th><p class="head-text ">Weight</p><p class="head-description hidden-xs">(kg)</p></th>
                                        <th><p class="visible-xs">Pressure</p><p class="head-text hidden-xs">Blood pressure</p><p class="head-description hidden-xs">(systolic/diastolic)</p></th>
                                        <th><p class="visible-xs">Sugar</p><p class="head-text hidden-xs">Blood</p><p class="head-text hidden-xs">sugar</p></th>
                                        <th><p class="head-text ">Activities</p><p class="head-description hidden-xs">(miles walked/day)</p></th>
                                        <th><p class="visible-xs">Calories</p><p class="head-text hidden-xs">Food intake</p><p class="head-description hidden-xs">(calories conumerd/day)</p></th>
                                        <th><p class="visible-xs">Medication</p><p class="head-text hidden-xs">Take</p><p class="head-text hidden-xs">medication</p></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>85</td>
                                        <td>120/90</td>
                                        <td>0.5</td>
                                        <td>3.5</td>
                                        <td>1250</td>
                                        <td>Take medication</td>
                                    </tr>
                                    <tr>
                                        <td>95</td>
                                        <td>110/70</td>
                                        <td>0.65</td>
                                        <td>2.5</td>
                                        <td>1550</td>
                                        <td>Take medication</td>
                                    </tr>
                                    <tr>
                                        <td>75</td>
                                        <td>130/90</td>
                                        <td>0.65</td>
                                        <td>1.5</td>
                                        <td>1965</td>
                                        <td>Take medication</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <ul class="paginator">
                            <li><a href="#">Back</a></li>
                            <li class="selected"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="pag-space"><a href="#">...</a></li>
                            <li><a href="#">15</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>-->
                    </div>
                </div>
        </div>
    </div>
</div>