<?php
if ( !function_exists( 'edukul_comment_form' ) ) {
    function edukul_comment_form( $arg, $class = '' ) {
        global $post;
        if ( 'open' == $post->comment_status ) {
            ob_start();
            comment_form($arg);
            $form = ob_get_clean();
            ?>
            <div class="commentform">
                <?php
                echo str_replace('id="submit"','id="submit"', $form);
                ?>
            </div>
        <?php
        }
    }
}

function edukul_educator_get_courses( $course_type, $number = -1, $author = false, $ids = array() ) {
    switch ( $course_type ) {
        case 'most_recent' : 
           $args = array( 
                'posts_per_page' => $number,
                'orderby' => 'date', 
                'order' => 'DESC',
                'post_type' => EDR_PT_COURSE
            );
            break;

        case 'random' : 
            $args = array(
                'post_type' => EDR_PT_COURSE,
                'posts_per_page' => $number, 
                'orderby' => 'rand'
            );
            break;

        default : 
            $args = array(
                'post_type' => EDR_PT_COURSE,
                'posts_per_page' => $number, 
                'orderby' => 'rand'
            );
            break;
    }
    if ( $author ) {
        $args['author'] = $author;
    }
    if ( !empty( $ids ) ) {
        $args['post__in'] = $ids;
    }

    return new WP_Query( $args );
}

function edukul_educator_get_students_by_course( $course_id ) {
    $obj = Edr_Entries::get_instance();
    $entries = $obj->get_entries( array('course_id' => $course_id, 'entry_status' => 'inprogress') );
    return $entries;
}

function edukul_edr_format_price( $formatted, $currency, $price ) {
    return '<span class="price-wrapper">'. $formatted .'</span>';
}
add_filter( 'edr_format_price', 'edukul_edr_format_price', 10, 3 );

function edukul_set_course_views( $content ) {
    global $post;
    if ( $post->post_type != EDR_PT_COURSE ) {
        return $content;
    }
    $count_key = 'edr_views_count';
    $count = get_post_meta($post->ID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($post->ID, $count_key);
        add_post_meta($post->ID, $count_key, '0');
    } else {
        $count++;
        $value = sanitize_text_field($count);
        update_post_meta($post->ID, $count_key, $value);
    }
    return $content;
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
add_filter( 'the_content', 'edukul_set_course_views' );

function edukul_get_course_views() {
    global $post;
    return get_post_meta( $post->ID, 'edr_views_count', true );
}

function edukul_educator_search_filter( $query ) {
    if ( $query->is_search && !is_admin() ) {
        if ( isset($query->query_vars) && isset($query->query_vars['post_type']) 
            && $query->query_vars['post_type'] == EDR_PT_COURSE ) {
            
            if (isset($_GET['_difficulty']) && $_GET['_difficulty']) {
                $meta_query[] = array(
                    'key' => '_edr_difficulty',
                    'value' => $_GET['_difficulty']
                );
                $query->set('meta_query', $meta_query);
            }
            if (isset($_GET['_lecturer']) && $_GET['_lecturer']) {
                $query->set('author', $_GET['_lecturer']);
            }

            if (isset($_GET['_category']) && $_GET['_category']) {
                $query->set('tax_query', array(
                    array(
                        'taxonomy' => 'edr_course_category',
                        'field'    => 'id',
                        'terms'    => $_GET['_category'],
                    ),
                ));
            }
        }
    }
    return $query;
}
add_filter('pre_get_posts', 'edukul_educator_search_filter');

function edukul_educator_display_lessons( $course_id ) {
    $obj_courses = Edr_Courses::get_instance();
    $syllabus = $obj_courses->get_syllabus( $course_id );

    if ( ! empty( $syllabus ) ) {
        Edr_View::the_template( 'lesson-syllabus', array(
            'syllabus' => $syllabus,
            'lessons'  => $obj_courses->get_syllabus_lessons( $syllabus ),
        ) );
    } else {
        Edr_View::the_template( 'lesson-lessons', array(
            'lessons' => $obj_courses->get_course_lessons( $course_id ),
        ) );
    }
}

function edukul_educator_templates( $template ) {
    $post_type = get_post_type();
    $custom_post_types = array( EDR_PT_COURSE => 'course', EDR_PT_LESSON => 'lesson', EDR_PT_MEMBERSHIP => 'membership' );

    if ( !empty( $custom_post_types[$post_type] ) ) {
        $post_type = $custom_post_types[$post_type];
        if ( is_archive() ) {
            return locate_template( 'archive-'.$post_type.'.php' );
        }

        if ( is_single() ) {
            return locate_template( 'single-'.$post_type.'.php' );
        }
    }

    return $template;
}
add_filter( 'template_include', 'edukul_educator_templates' );

function edukul_add_comments_support_for_course() {
    add_post_type_support( EDR_PT_COURSE, 'comments' );
}
add_action( 'init', 'edukul_add_comments_support_for_course', 1 );

function edukul_room_comments_template_loader($template) {
    if ( get_post_type() !== EDR_PT_COURSE ) {
        return $template;
    }
    return get_template_directory() . '/educator/single/reviews.php';
}
add_filter( 'comments_template', 'edukul_room_comments_template_loader', 1000 );

function edukul_room_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    set_query_var( 'comment', $comment );
    set_query_var( 'args', $args );
    set_query_var( 'depth', $depth );
    get_template_part( 'educator/single/review' );
}

function edukul_add_custom_comment_field( $comment_id, $comment_approved, $commentdata ) {
    $post_id = $commentdata['comment_post_ID'];
    $post = get_post($post_id);
    if ( $post->post_type == EDR_PT_COURSE ) {
        add_comment_meta( $comment_id, '_edukul_rating', $_POST['rating'] );
    }
}
add_action( 'comment_post', 'edukul_add_custom_comment_field', 10, 3 );

function edukul_get_total_reviews( $post_id ) {
    $comments = get_comments( array('post_id' => $post_id, 'status' => 'approve') );
    if (empty($comments)) {
        return 0;
    }
    return count($comments);
}

function edukul_get_total_rating( $post_id ) {
    $comments = get_comments( array('post_id' => $post_id, 'status' => 'approve') );
    if (empty($comments)) {
        return 0;
    }
    $total_review = 0;
    foreach ($comments as $comment) {
        $rating = intval( get_comment_meta( $comment->comment_ID, '_edukul_rating', true ) );
        if ($rating) {
            $total_review += (int)$rating;
        }
    }
    return $total_review/count($comments);
}

function edukul_print_review( $rate ) {
    ?>
        <div class="review-stars-rated list-rating">
            <div class="rating-print-wrapper">
                <ul class="review-stars">
                    <li><span class="core-icon-star2"></span></li>
                    <li><span class="core-icon-star2"></span></li>
                    <li><span class="core-icon-star2"></span></li>
                    <li><span class="core-icon-star2"></span></li>
                    <li><span class="core-icon-star2"></span></li>
                </ul>
                
                <ul class="review-stars filled"  style="<?php echo esc_attr( 'width: ' . ( $rate * 20 ) . '%' ) ?>" >
                    <li><span class="core-icon-star3"></span></li>
                    <li><span class="core-icon-star3"></span></li>
                    <li><span class="core-icon-star3"></span></li>
                    <li><span class="core-icon-star3"></span></li>
                    <li><span class="core-icon-star3"></span></li>
                </ul>
            </div>
        </div>
    <?php
}

function edukul_print_single_review( $rate ) {
    ?>
        <div class="review-stars-rated list-rating">
            <div class="rating-print-wrapper">
                <ul class="review-stars">
                    <li><span class="core-icon-star2"></span></li>
                    <li><span class="core-icon-star2"></span></li>
                    <li><span class="core-icon-star2"></span></li>
                    <li><span class="core-icon-star2"></span></li>
                    <li><span class="core-icon-star2"></span></li>
                </ul>
                
                <ul class="review-stars filled"  style="<?php echo esc_attr( 'width: ' . ( $rate * 20 ) . '%' ) ?>" >
                    <li><span class="core-icon-star3"></span></li>
                    <li><span class="core-icon-star3"></span></li>
                    <li><span class="core-icon-star3"></span></li>
                    <li><span class="core-icon-star3"></span></li>
                    <li><span class="core-icon-star3"></span></li>
                </ul>
            </div>
        </div>
    <?php
}

function edukul_get_detail_ratings( $post_id ) {
    global $wpdb;
    $comment_ratings = $wpdb->get_results( $wpdb->prepare(
        "
            SELECT cm2.meta_value AS rating, COUNT(*) AS quantity FROM $wpdb->posts AS p
            INNER JOIN $wpdb->comments AS c ON p.ID = c.comment_post_ID
            INNER JOIN $wpdb->commentmeta AS cm2 ON cm2.comment_id = c.comment_ID AND cm2.meta_key=%s
            WHERE p.ID=%d AND c.comment_approved=%d
            GROUP BY cm2.meta_value",
            '_edukul_rating',
            $post_id,
            1
        ), OBJECT_K
    );
    return $comment_ratings;
}