<span class="category-tag"><?php 
    $postDate =  get_the_time("Y-m-d") ;
    $todaysDate = date( 'Y-m-d' );
    
    $ydate =  date("F j, Y", strtotime("yesterday"));
    $date = get_the_date();
    

    if($postDate === $todaysDate) {
        echo human_time_diff(get_the_time('U'), current_time('timestamp') ) . ' ago';
    } elseif( $date == $ydate) {
        echo 'Posted Yesterday';
    } else {
        echo $date;
    }
?>
</span>