<script>
$('#community').ready(function(){
    ajax_top_menu('tab_community', '#community');
});

function ajax_sidebar_menu(url){
    $.ajax({
        url: url,
        cache: false,
        success: function(html){
            $("#three-tabsContent").html(html);
        }
    });
}

function ajax_top_menu(url, dest){
    $.ajax({
        url: url,
        cache: false,
        success: function(html){
            $(dest).html(html);
        }
    });
}
</script>

<div class="container page-container">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-3 left-col pos-none">
            <ul class="side-bar hidden-xs">
                <li class="sb-item">
                    <a onclick="ajax_sidebar_menu('my_profile')" href="#my_profile">My profile</a>
                </li>
                <li class="sb-item">
                    <a onclick="ajax_sidebar_menu('my_diary')" href="#my_diary">My Diary</a>
                </li>
                <li class="sb-item">
                    <a onclick="ajax_sidebar_menu('meet_others')" href="#meet_others">Meet Others</a>
                </li>
                <li class="sb-item">
                    <a onclick="ajax_sidebar_menu('my_team')" href="#my_team">My Team</a>
                </li>
                <li class="sb-item">
                    <a onclick="ajax_sidebar_menu('my_doctors')" href="#my_doctors">My Doctors</a>
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
                <li class="active"><a onclick="ajax_top_menu('tab_community', '#community')" href="#community" data-toggle="tab">Community</a></li>
                <li class=""><a onclick="ajax_top_menu('tab_articles', '#articles')" href="#articles" data-toggle="tab">Articles</a></li>
                <li class=""><a onclick="ajax_top_menu('tab_tracking', '#tracking')" href="#tracking" data-toggle="tab">Tracking</a></li>
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
                </div>
                <div class="tab-pane fade row" id="articles">
                </div>
                <div class="tab-pane fade row" id="tracking">
                </div>
            </div>
        </div>
    </div>
</div>