<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="col-mb-12 col-4 kit-hidden-tb" id="secondary" role="complementary">
    <?php if (!empty($this->options->sidebarBlock)): ?>
    <!-- 获取今日必应壁纸 -->
    <?php $bing = bing(); ?>
    <section class="widget">
        <div class="info-header" style="background-image:url('<?php _e($this->options->siteUrl() . date('Ymd') . '.jpg'); ?>');">
            <span class="info-header-img">
                <a href="<?php $this->options->adminUrl(); ?>" data-no-instant target="_blank">
                    <img src="<?php $this->options->themeUrl('img/my120.jpg'); ?>">
                </a>
            </span>
        </div>
        <div class="description">
            <?php $this->options->description() ?>
        </div>
        <div class="follow-me">
            <a href="https://github.com/helloxz" target="_blank" rel = "nofollow">Github</a>
            <a href="https://www.xiaoz.me/" target="_blank">Blog</a>
            <a href="https://weibo.com/337003006" target="_blank" rel = "nofollow">Weibo</a>
        </div>
    </section>
    <section class="widget">
        <div class = "gg1">
	        <a href="https://e.aiguobit.com/?from=xiaoz" target="_blank" rel="nofollow noopener"><img src="https://cdn.xiaoz.me/wp-content/uploads/2019/04/medish.png"></a>
        </div>
    </section>
    <?php if (isset($this->options->plugins['activated']['Views'])): ?>
    <section class="widget">
        <h3 class="widget-title">
            <?php _e('热门文章'); ?>
        </h3>
        <ul class="widget-list">
            <?php Views_Plugin::theMostViewed(); ?>
        </ul>
    </section>
    <?php endif; ?>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <section class="widget">
        <h3 class="widget-title">
            <?php _e('最新文章'); ?>
        </h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Recent')
                ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
        </ul>
    </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <section class="widget">
        <h3 class="widget-title">
            <?php _e('最近回复'); ?>
        </h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
            <?php while ($comments->next()): ?>
            <li><a href="<?php $comments->permalink(); ?>">
                    <?php $comments->author(false); ?>:
                    <?php $comments->excerpt(35, '...'); ?></a></li>
            <?php endwhile; ?>
        </ul>
    </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="widget">
        <h3 class="widget-title">
            <?php _e('分类'); ?>
        </h3>
        <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
    </section>
    <?php endif; ?>

	<section class="widget">
		<h3 class="widget-title">友情链接</h3>
        <ul class="widget-list">
            <li><a href="https://www.xiaoz.me/" title="wordpress教程" target="_blank">WordPress教程</a></li>
            <li><a href="http://www.dayue8.com/" title="答曰" target="_blank">答 曰</a></li>
            <li><a href="http://www.vpsjz.com/" title="答曰" target="_blank">VPSJZ.COM-VPS建站</a></li>
            <li><a href="http://www.52zd.com/" title="CJ联盟操作" target="_blank">CJ联盟操作</a></li>
            <li><a href="http://blog.javazygx.cn/" title="java资源共享博客" target="_blank">java资源共享博客</a></li>
            <li><a href="http://www.033.info/" title="DigitalOcean vps" target="_blank">DigitalOcean vps</a></li>
            <li><a href="https://qblog.org/" title="阿Q博客" target="_blank">阿Q博客</a></li>
            <li><a href="https://www.tracymc.cn/" title="Tracymc" target="_blank">Tracymc</a></li>
            <li><a href="https://www.chenweiliang.com/" title="营销" target="_blank">营销</a></li>
        </ul>
	</section>
	
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
    <section class="widget">
        <h3 class="widget-title">
            <?php _e('归档'); ?>
        </h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y年m月')
                ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
        </ul>
    </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
    <section class="widget">
        <h3 class="widget-title">
            <?php _e('其它'); ?>
        </h3>
        <ul class="widget-list" data-no-instant>
            <?php if ($this->user->hasLogin()): ?>
            <li class="last"><a href="<?php $this->options->adminUrl(); ?>">
                    <?php _e('进入后台'); ?> (
                    <?php $this->user->screenName(); ?>)</a></li>
            <li><a href="<?php $this->options->logoutUrl(); ?>">
                    <?php _e('退出'); ?></a></li>
            <?php else: ?>
            <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>">
                    <?php _e('登录'); ?></a></li>
            <?php endif; ?>
            <li><a href="<?php $this->options->feedUrl(); ?>">
                    <?php _e('文章 RSS'); ?></a></li>
            <li><a href="<?php $this->options->commentsFeedUrl(); ?>">
                    <?php _e('评论 RSS'); ?></a></li>
        </ul>
    </section>
    <?php endif; ?>

</div><!-- end #sidebar --> 