<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>

  <script>
    <?php
      $user_info = get_userdata( get_current_user_id() );
      if (get_the_author() !== null) {
        echo "var author = '$user_info->user_nicename';\n";
      }
      if (get_the_category()  !== null) {
        echo "    ";
        echo "var category = [";
        $categories = json_decode(json_encode(get_the_category()), true);
        $i = 0;
        foreach ($categories as $item) {
          if ($i > 0) { echo ","; };
          echo "'".$item['slug']."'";
          $i++;
        }
        echo "];\n";
      }
      if (get_the_tags()  !== null) {
        echo "    ";
        echo 'var tags = [';
        $terms = json_decode(json_encode(get_the_tags()), true);
        $i = 0;
        foreach ($terms as $item) {
          if ($i > 0) { echo ","; };
          echo "'".$item['slug']."'";
          $i++;
        }
        echo "];\n";
      }
    ?>
  </script>
</head>
