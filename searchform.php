<form action="<?php echo home_url( '/' ); ?>" method="get" class="form-inline">
    <fieldset>
		<div class="input-group">
			<input type="text" name="s" id="search" placeholder="<?php _e("pesquisa_","hjndi"); ?>" value="<?php the_search_query(); ?>" class="form-control">
			<!--span class="input-group-btn"-->
				<button type="submit" class="btn btn-default" alt="<?php _e('pesquisa_','hjndi'); ?>"><i class="fas fa-search"></i></button>
			<!--/span-->
			</input>
		</div>
    </fieldset>
</form>