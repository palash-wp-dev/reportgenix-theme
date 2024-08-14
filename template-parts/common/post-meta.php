<?php
$xgenious = Xgenious();
$post_meta = Xgenious_Group_Fields_Value::post_meta('blog_post');


?>


<div class="blogItem__tag mt-4">
    <?php if ($post_meta['posted_by']):?>
        <span class="blogItem__tag__single"><?php $xgenious->posted_by();?></span>
    <?php endif;?>
    
	<?php if ($post_meta['posted_cat']):?>
        <span class="blogItem__tag__single"><?php the_category(', ');?></span>
	<?php endif;?>
    
</div>

<?php if ($post_meta['posted_on']):?>
	<div class="blogItem__contents__date mt-2"><?php $xgenious->posted_on();?></div>
<?php endif;?>





<!-- <ul class="single-blog-contents-list list-style-none">
    <?php if ($post_meta['posted_on']):?>
	<li class="single-blog-contents-list-item"><span class="single-blog-contents-list-item-span"><?php $xgenious->posted_on();?></span</li>
    <?php endif;?>
    <?php if ($post_meta['posted_by']):?>
	<li class="single-blog-contents-list-item"><span class="single-blog-contents-list-item-span"><?php $xgenious->posted_by();?></span</li>
    <?php endif;?>
	<?php if ($post_meta['posted_cat']):?>
        <li class="single-blog-contents-list-item">
            <div class="cats"> <?php the_category(', ');?></div>
        </li>
	<?php endif;?>

</ul> -->

