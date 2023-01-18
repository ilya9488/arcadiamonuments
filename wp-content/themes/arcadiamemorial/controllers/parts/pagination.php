<?php
class CustomPagination{
  function paginate_pages($items, $per_page){
     if ($items){
         $count = count($items);
     }else{
         $count = 0;
     }

    $pages = round($count/$per_page);

    return $pages > 1 ? $pages : 0;
  }

  function paginate_items($items, $per_page){
    $paginated_items = [];

    $page = 1;
    $count = 0;
    if ($items){
        foreach ($items as $item){
            ++$count;

            $paginated_items[$page][] = $item;

            if($count == $per_page){
                ++$page;
                $count = 0;
            }
        }
        return $paginated_items;
    }
    else{
        return false;
    }




  }
}


