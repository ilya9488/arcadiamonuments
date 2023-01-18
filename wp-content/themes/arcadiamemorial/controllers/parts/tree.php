<?php
class MemorialTree
{
  function getBranch($branch){
    $rank_name = ucfirst(strtok($branch, '_'));

    if(!empty($memorial_id = get_field($branch)['memorial'])){
      $name  = get_field('first_name', $memorial_id) . ' ' . get_field('last_name', $memorial_id);
      $date  = get_field('date_1', $memorial_id) . ' - ' . get_field('date_2', $memorial_id);
      $photo = wp_get_attachment_image_src(get_field('photo', $memorial_id), 'thumbnail')[0];
      $link  = get_post_permalink($memorial_id);
    }else{
      $name  = get_field($branch)['name'];
      $date  = get_field($branch)['date_of_birth'] . ' - ' . get_field($branch)['date_of_death'];
      $photo = wp_get_attachment_image_src(get_field($branch)['photo'], 'thumbnail')[0];
      $link  = '#';
    }

    $date = $date == ' - ' ? '' : $date;
    $html = '';
    $html .=  '<div class="family-member">

              <a href="' . $link . '">';
    if ($photo){
   $html .= '           
                <div class="img-wrap">
                  <img class="family-member" src="' . $photo . '" alt="">
                </div>';
    }
   $html .= '<h4 class="name">' . $name . '</h4>
                <div class="rank">' . $rank_name . '</div>
                <div class="data">' . $date . '</div>
              </a>
            </div>';
    return $html;
  }
}