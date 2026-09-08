<?php
/**
 * Title: Notícias do portal
 * Slug: pmc-caraguatatuba/news-section
 * Categories: pmc-caraguatatuba
 * Inserter: true
 */
?>
<!-- wp:group {"className":"pmc-section","layout":{"type":"constrained"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|layout-8x","bottom":"var:preset|spacing|layout-8x"}}}} -->
<div class="wp-block-group pmc-section">
    <!-- wp:heading {"level":2,"fontSize":"32"} -->
    <h2 class="wp-block-heading has-32-font-size">Notícias</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"textColor":"text-secondary","fontSize":"16"} -->
    <p class="has-text-secondary-color has-text-color has-16-font-size">Acompanhe as principais notícias da Prefeitura de Caraguatatuba.</p>
    <!-- /wp:paragraph -->

    <!-- wp:query {"query":{"perPage":4,"postType":"post","order":"desc","orderBy":"date"},"displayLayout":{"type":"flex","columns":3}} -->
    <div class="wp-block-query">
        <!-- wp:post-template -->
        <!-- wp:group {"className":"pmc-news-card","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|layout-3x"}}}} -->
        <div class="wp-block-group pmc-news-card">
            <!-- wp:post-featured-image {"isLink":true} /-->
            <!-- wp:post-terms {"term":"category","fontSize":"12"} /-->
            <!-- wp:post-title {"isLink":true,"fontSize":"20"} /-->
            <!-- wp:post-excerpt {"moreText":"Leia mais →","fontSize":"14"} /-->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->
