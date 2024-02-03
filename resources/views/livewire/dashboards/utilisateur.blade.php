<style>
    /* Vos styles personnalisés vont ici */
    /*
Name: 			theme-blog.css
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version:	8.1.0
*/
/* Posts */
.blog-posts:not(.blog-posts-no-margins) article {
	border-bottom: 1px solid rgba(0, 0, 0, 0.06);
	margin-bottom: 50px;
	padding-bottom: 20px;
}

.blog-posts:not(.blog-posts-no-margins) .pagination {
	margin: -10px 0 20px;
}

.blog-posts.blog-posts-no-margins .pagination {
	margin-top: 28.8px;
	margin-top: 1.8rem;
}

/* Post */
article.post h2 a {
	text-decoration: none;
}

article.post .post-meta {
	font-size: 0.9em;
	margin-bottom: 7px;
}

article.post .post-meta > span {
	display: inline-block;
	padding-right: 8px;
}

article.post .post-meta i {
	margin-right: 3px;
}

article.post .post-date {
	float: left;
	margin-right: 10px;
	text-align: center;
}

article.post .post-date .month {
	display: block;
	background: #CCC;
	border-radius: 0 0 2px 2px;
	color: #FFF;
	font-size: 0.8em;
	line-height: 1.8;
	padding: 1px 10px;
	text-transform: uppercase;
}

article.post .post-date .day {
	background: #f7f7f7;
	border-radius: 2px 2px 0 0;
	color: #CCC;
	display: block;
	font-size: 18px;
	font-weight: 900;
	padding: 10px;
}

article.post .post-image .owl-carousel {
	width: 100.1%;
}

article .post-video {
	transition: all 0.2s ease-in-out;
	padding: 0;
	background-color: #FFF;
	border: 1px solid rgba(0, 0, 0, 0.06);
	border-radius: 8px;
	display: block;
	height: auto;
	position: relative;
	margin: 0 0 30px 0;
	padding-bottom: 61%;
}

article .post-video iframe {
	bottom: 0;
	height: auto;
	left: 0;
	margin: 0;
	min-height: 100%;
	min-width: 100%;
	padding: 4px;
	position: absolute;
	right: 0;
	top: 0;
	width: auto;
}

article .post-audio {
	transition: all 0.2s ease-in-out;
	padding: 0;
	background-color: #FFF;
	border: 1px solid rgba(0, 0, 0, 0.06);
	border-radius: 8px;
	display: block;
	height: auto;
	position: relative;
	margin: 0 0 30px 0;
	padding-bottom: 35%;
	min-height: 160px;
}

article .post-audio iframe {
	bottom: 0;
	height: auto;
	left: 0;
	margin: 0;
	min-height: 100%;
	min-width: 100%;
	padding: 4px;
	position: absolute;
	right: 0;
	top: 0;
	width: auto;
}

article.post-medium .post-image .owl-carousel {
	width: 100.2%;
}

article.post-large {
	margin-left: 60px;
}

article.post-large h2 {
	margin-bottom: 5px;
}

article.post-large .post-image, article.post-large .post-date {
	margin-left: -60px;
}

article.post-large .post-image {
	margin-bottom: 25px;
}

article.post-large .post-image.single {
	margin-bottom: 30px;
}

article.post-large .post-video {
	margin-left: -60px;
}

article.post-large .post-audio {
	margin-left: -60px;
}

/* Single Post */
.single-post article {
	border-bottom: 0;
	margin-bottom: 0;
}

article.blog-single-post .post-meta {
	margin-bottom: 20px;
}

/* Post Block */
.post-block h3 {
	font-size: 1.8em;
	font-weight: 200;
	margin: 0 0 20px;
	text-transform: none;
}

.post-block h3 i {
	margin-right: 7px;
}

/* Post Author */
.post-author img {
	max-height: 80px;
	max-width: 80px;
}

.post-author p {
	font-size: 0.9em;
	line-height: 22px;
	margin: 0;
	padding: 0;
}

.post-author p .name {
	font-size: 1.1em;
}

.post-author .img-thumbnail {
	display: inline-block;
	float: left;
	margin-right: 20px;
}

/* Post Comments */
ul.comments {
	list-style: none;
	margin: 0;
	padding: 0;
}

ul.comments li {
	clear: both;
	padding: 10px 0 0 70px;
}

ul.comments li img.avatar {
	height: 48px;
	width: 48px;
}

ul.comments li ul.reply {
	margin: 0;
}

ul.comments li a {
	text-decoration: none;
}

ul.comments li .img-thumbnail {
	margin-left: -70px;
	position: absolute;
}

ul.comments li .comment {
	margin-bottom: 10px;
}

ul.comments .comment-arrow {
	border-bottom: 12px solid transparent;
	border-right: 12px solid #f7f7f7;
	border-top: 12px solid transparent;
	height: 0;
	left: -12px;
	position: absolute;
	top: 12px;
	width: 0;
}

ul.comments .comment-block {
	background: #f7f7f7;
	border-radius: 5px;
	padding: 20px 20px 30px;
	position: relative;
}

ul.comments .comment-block p {
	font-size: 0.9em;
	line-height: 21px;
	margin: 0;
	padding: 0;
}

ul.comments .comment-block .comment-by {
	display: block;
	font-size: 1em;
	line-height: 21px;
	margin: 0;
	padding: 0 0 5px 0;
}

ul.comments .comment-block .date {
	color: #999;
	font-size: 0.9em;
}

/* Leave a Comment */
.post-leave-comment h3 {
	margin: 0 0 40px;
}

/* Recent Posts */
.recent-posts h4 {
	margin-bottom: 7px;
}

.recent-posts article.recent-post h4 {
	margin: 0 0 3px 0;
}

.recent-posts article.recent-post h4 a {
	display: block;
}

.recent-posts .date {
	margin-right: 10px;
	text-align: center;
}

.recent-posts .date .month {
	background: #CCC;
	color: #FFF;
	font-size: 0.9em;
	padding: 3px 10px;
	position: relative;
	top: -2px;
}

.recent-posts .date .day {
	background: #F7F7F7;
	color: #CCC;
	display: block;
	font-size: 18px;
	font-weight: 500;
	font-weight: bold;
	padding: 8px;
}

section.section .recent-posts .date .day {
	background: #FFF;
}

/* Simple Post List */
ul.simple-post-list {
	list-style: none;
	margin: 0;
	padding: 0;
}

ul.simple-post-list li {
	border-bottom: 1px dotted #E2E2E2;
	padding: 15px 0;
}

ul.simple-post-list li::after {
	clear: both;
	content: "";
	display: block;
}

ul.simple-post-list li:last-child {
	border-bottom: 0;
}

ul.simple-post-list .post-image {
	float: left;
	margin-right: 12px;
}

ul.simple-post-list .post-meta {
	color: #888;
	font-size: 0.8em;
}

ul.simple-post-list .post-info {
	line-height: 20px;
}

/* Responsive */
@media (max-width: 575px) {
	ul.comments li {
		border-left: 8px solid rgba(0, 0, 0, 0.06);
		clear: both;
		padding: 0 0 0 10px;
	}

	ul.comments li .img-thumbnail {
		display: none;
	}

	ul.comments .comment-arrow {
		display: none;
	}
}

</style>

<div class="row pb-1">

    <div class="col-lg-7 mb-4 pb-2">
        <a href="#">
            <article
                class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
                <div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
                    <img src="img/blog/default/blog-46.jpg" class="img-fluid"
                        alt="How To Take Better Concert Pictures in 30 Seconds">
                    <div class="thumb-info-title bg-transparent p-4">
                        <div class="thumb-info-type bg-color-dark px-2 mb-1">Photography</div>
                        <div class="thumb-info-inner mt-1">
                            <h2 class="font-weight-bold text-color-light line-height-2 text-5 mb-0">How To Take Better
                                Concert Pictures in 30 Seconds</h2>
                        </div>
                        <div class="thumb-info-show-more-content">
                            <p class="mb-0 text-1 line-height-9 mb-1 mt-2 text-light opacity-5">Euismod atras vulputate
                                iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra,
                                per inceptos himenaeos.</p>
                        </div>
                    </div>
                </div>
            </article>
        </a>
    </div>

    <div class="col-lg-5">

        <article class="thumb-info thumb-info-side-image thumb-info-no-zoom bg-transparent border-radius-0 pb-4 mb-2">
            <div class="row align-items-center pb-1">
                <div class="col-sm-5">
                    <a href="blog-post.html">
                        <img src="img/blog/default/blog-55.jpg" class="img-fluid border-radius-0"
                            alt="Simple Ways to Have a Pretty Face">
                    </a>
                </div>
                <div class="col-sm-7 pl-sm-1">
                    <div class="thumb-info-caption-text">
                        <div
                            class="thumb-info-type text-light text-uppercase d-inline-block bg-color-dark px-2 m-0 mb-1 float-none">
                            <a href="blog-post.html" class="text-decoration-none text-color-light">Photography</a>
                        </div>
                        <h2 class="d-block line-height-2 text-4 text-dark font-weight-bold mt-1 mb-0">
                            <a href="blog-post.html"
                                class="text-decoration-none text-color-dark text-color-hover-primary">Simple Ways to
                                Have a Pretty Face</a>
                        </h2>
                    </div>
                </div>
            </div>
        </article>

        <article class="thumb-info thumb-info-side-image thumb-info-no-zoom bg-transparent border-radius-0 pb-4 mb-2">
            <div class="row align-items-center pb-1">
                <div class="col-sm-5">
                    <a href="blog-post.html">
                        <img src="img/blog/default/blog-56.jpg" class="img-fluid border-radius-0"
                            alt="Ranking the greatest players in basketball">
                    </a>
                </div>
                <div class="col-sm-7 pl-sm-1">
                    <div class="thumb-info-caption-text">
                        <div
                            class="thumb-info-type text-light text-uppercase d-inline-block bg-color-dark px-2 m-0 mb-1 float-none">
                            <a href="blog-post.html" class="text-decoration-none text-color-light">Sports</a>
                        </div>
                        <h2 class="d-block line-height-2 text-4 text-dark font-weight-bold mt-1 mb-0">
                            <a href="blog-post.html"
                                class="text-decoration-none text-color-dark text-color-hover-primary">Ranking the
                                greatest players in basketball</a>
                        </h2>
                    </div>
                </div>
            </div>
        </article>

        <article class="thumb-info thumb-info-side-image thumb-info-no-zoom bg-transparent border-radius-0 pb-4 mb-2">
            <div class="row align-items-center pb-1">
                <div class="col-sm-5">
                    <a href="blog-post.html">
                        <img src="img/blog/default/blog-57.jpg" class="img-fluid border-radius-0"
                            alt="4 Ways to Look Cool in Glasses">
                    </a>
                </div>
                <div class="col-sm-7 pl-sm-1">
                    <div class="thumb-info-caption-text">
                        <div
                            class="thumb-info-type text-light text-uppercase d-inline-block bg-color-dark px-2 m-0 mb-1 float-none">
                            <a href="blog-post.html" class="text-decoration-none text-color-light">Lifestyle</a>
                        </div>
                        <h2 class="d-block line-height-2 text-4 text-dark font-weight-bold mt-1 mb-0">
                            <a href="blog-post.html"
                                class="text-decoration-none text-color-dark text-color-hover-primary">4 Ways to Look
                                Cool in Glasses</a>
                        </h2>
                    </div>
                </div>
            </div>
        </article>

    </div>
</div>
