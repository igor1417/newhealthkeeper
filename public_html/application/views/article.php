<!-- ***************** TABS ********************* -->
<div class="col-lg-10 col-md-10 col-sm-9 right-col">
    <ul id="three-tabs" class="nav nav-tabs">
        <li class=""><a href="tab_community">Community</a></li>
        <li class="active"><a href="tab_articles">Articles</a></li>
        <li class=""><a href="tab_tracking">Tracking</a></li>
    </ul>
    <div id="three-tabsContent" class="tab-content">


        <!-- ***************** ARTICLE ********************* -->
        <!--<div class="tab-pane fade active in row" id="tab_articles">-->


            <!-- ***************** READ ARTICLE ***************** -->
            <div class="tab-pane fade active in row" id="read_article">

                <?php echo $this->breadcrumbs->show(); ?>

                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <h1 class="big-title"><?php echo $post['title_post']?></h1>
                        <h5>Username, 9 hours ago</h5>
                        <p>
                           <?php echo $post['text_post']?>
                        </p>
                    </div>
                    <div class="col-lg-12 marg3">
                        <img class="art-img marg2" src="img/article_img2.jpg" />
                        <img class="art-img" src="img/article_img3.jpg" />
                    </div>

                    <div class="col-lg-12 marg3">
                        <div class="row c-blue-line">
                            <div class="col-lg-6">
                                <div class="comment-title">Replies</div>
                                <div class="comment marg4">
                                    <span>63</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="like-title">Hugs</div>
                                <div class="like marg4 fr">
                                    <span>3</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 marg3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <img src="img/ava2.jpg" class="img-rounded fl marg2" />
                                        <h2 class="title-avatar2">Yukonwhisp</h2>
                                        <p class="p-avatar2">34 hours ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="like-title">Hugs</div>
                                <div class="like marg4 fr">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="row c-blue-line">
                            <div class="col-lg-12">
                                Lorem ipsum dolor sit amet, consectetur Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officidese runt mollit anim id est laborum. Excepteur sint occaecat...
                                Lorem ipsum dolor sit amet, consectetur Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officidese runt mollit anim id est laborum. Excepteur sint occaecat...
                            </div>
                        </div>
                        <div class="row marg1 ">
                            <div class="col-lg-1">
                                <img src="img/ava2.jpg" class="img-rounded fl marg2" />
                            </div>
                            <div class="col-lg-9">
                                <div class="row">
                                    <input class="inp-text" type="text" placeholder="Type reply" />
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <a class="btn-send" href="#">SEND</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>




        <!--</div>-->

    </div>
</div>
