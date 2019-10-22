&nbsp;
<a href="<?php the_permalink();?>">
<div class="card links-white text-white mt-0" style="background: url('<?php the_post_thumbnail_url(); ?>') center center no-repeat;background-size: cover;height: 280px;">
  <div class="card-post align-bottom p-2">
    <h6 class="text-uppercase montserratbold p-0"><?php the_title(); ?></h6>
    <p class="card-text montserratregular line-height10 mb-2"><small><?php echo(substr(get_the_excerpt(),0,90)); ?></small></p>
  </div>
</div>
</a>