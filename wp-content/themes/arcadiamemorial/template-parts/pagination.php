<?php if($paginate_pages){ ?>
  <nav class="pagination-links">
    <ul>
    <?php for($k = 1; $k <= $paginate_pages; ++$k){ ?>
        <?php if($k == $current_page){ ?>
          <li class="curent-item" ><a href="#"><?= $k; ?></a></li>
        <?php }else{ ?>
          <li><a href="<?php get_permalink(); ?>?current-page=<?= $k; ?>"><?= $k; ?></a></li>
        <?php } ?>
<!--      <li><a href="#" style="pointer-events: none;">...</a></li>-->
    <?php } ?>
    </ul>
  </nav>
<?php } ?>