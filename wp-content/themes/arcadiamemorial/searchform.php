<div class="bg-show-search"><span class="icon-close">&times;</span></div>
  <form class="search-form" role="search" method="get" action="<?php echo home_url( '/' ) ?>" >
    <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Enter Keyword"/>
    <button type="submit" class="btn-search"><span class="icon icon-search"></span></button>
  </form>