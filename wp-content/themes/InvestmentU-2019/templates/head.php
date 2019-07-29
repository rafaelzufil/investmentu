<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- IU Stylesheet -->
  <link rel="stylesheet" href="assets/css/main.css" type="text/css">
  <link rel="stylesheet" href="https://use.typekit.net/svc8hdj.css">

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/957989842b.js"></script>

  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <style type="text/css">
   .search-form-wrapper {
    display: none;
    position: absolute;
    left: 0;
    right: 0;
    padding: 20px 15px;
    margin-top: 50px;
  }
  .search-form-wrapper.open {
      display: block;
  }
  </style>
  <script type="text/javascript">
    $( document ).ready(function() {
      $('[data-toggle=search-form]').click(function() {
          $('.navbar').toggleClass('mb-5');
          $('.search-form-wrapper').toggleClass('open');
          $('.search-form-wrapper .search').focus();
          $('html').toggleClass('search-form-open');
        });
        $('[data-toggle=search-form-close]').click(function() {
          $('.search-form-wrapper').removeClass('open');
          $('html').removeClass('search-form-open');
        });
      $('.search-form-wrapper .search').keypress(function( event ) {
        if($(this).val() == "Search") $(this).val("");
      });

      $('.search-close').click(function(event) {
        $('.search-form-wrapper').removeClass('open');
        $('html').removeClass('search-form-open');
      });
    });
  </script>

  <?php wp_head(); ?>

    <script>
    <?php
      $post_id = get_the_ID();
      $author_id = get_post_field( 'post_author', $post_id );
      $post_author = get_the_author_meta( 'display_name', $author_id );
      if (get_the_author() !== null) {
        echo "var author = '$post_author';\n";
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
