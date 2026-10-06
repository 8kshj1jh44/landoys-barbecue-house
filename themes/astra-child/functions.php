<?php
/**
 * Astra Child Theme functions and definitions
 */

add_action( 'wp_enqueue_scripts', 'astra_child_enqueue_styles' );
function astra_child_enqueue_styles() {
    wp_enqueue_style( 
        'astra-child-theme-css', 
        get_stylesheet_directory_uri() . '/style.css', 
        array( 'astra-theme-css' ), 
        wp_get_theme()->get( 'Version' )
    );
}

// Add custom hooks, filters, and shortcodes below:

/**
 * Landoy's Barbecue Menu Shortcode
 * Usage: [bbq_menu]
 */
function landoys_render_menu_shortcode() {
    $menu_sections = [
        'Pork' => [
            ['name' => 'Premium Pork Barbecue', 'price' => '₱16.00', 'badge' => 'Bestseller'],
            ['name' => 'Pork Belly Liempo', 'price' => '₱150.00'],
            ['name' => 'Pork Chorizo', 'price' => '₱40.00'],
            ['name' => 'Pork Halang-halang', 'price' => '₱60.00', 'badge' => 'Spicy'],
            ['name' => 'Pork Sisig', 'price' => '₱60.00'],
        ],
        'Chicken' => [
            ['name' => 'Chicken Isaw', 'price' => '₱10.00', 'badge' => 'Crowd Fav'],
            ['name' => 'Chicken Pecho', 'price' => '₱120.00'],
            ['name' => 'Chicken Paa', 'price' => '₱110.00'],
            ['name' => 'Chicken Liver', 'price' => '₱25.00'],
            ['name' => 'Chicken Neck', 'price' => '₱20.00'],
        ],
        'Beverages' => [
            ['name' => 'Coke / Royal / Sprite (Mismo)', 'price' => '₱25.00'],
            ['name' => '8 oz. Coke / Royal / Sprite', 'price' => '₱20.00'],
            ['name' => '1L Coke / Royal / Sprite', 'price' => '₱60.00'],
            ['name' => '1.5L Coke', 'price' => '₱95.00'],
            ['name' => 'Mountain Dew', 'price' => '₱25.00'],
            ['name' => 'Health Tea', 'price' => '₱15.00'],
            ['name' => '500mL Mineral Water', 'price' => '₱20.00'],
            ['name' => '1L Mineral Water', 'price' => '₱30.00'],
        ],
        'Sides & Extras' => [
            ['name' => 'Virginia Hotdog', 'price' => '₱20.00'],
            ['name' => 'Hungarian Sausage', 'price' => '₱75.00'],
            ['name' => 'Poso (Hanging Rice)', 'price' => '₱5.00'],
            ['name' => 'Rice (per cup)', 'price' => '₱15.00'],
        ],
    ];

    $contact_number = '0999 209 5092';
    $contact_link   = 'tel:09992095092';

    ob_start();
    ?>
    <div class="landoys-menu-wrapper">
        <header class="landoys-menu-header">
            <span class="landoys-subheading">Fresh Off The Grill</span>
            <h2 class="landoys-title">LANDOY'S BARBECUE</h2>
            <div class="landoys-divider"><span>🔥</span></div>
        </header>

        <div class="landoys-grid">
            <?php foreach ($menu_sections as $category => $items): ?>
                <div class="landoys-card">
                    <div class="landoys-card-header">
                        <h3><?php echo esc_html($category); ?></h3>
                    </div>
                    <ul class="landoys-list">
                        <?php foreach ($items as $item): ?>
                            <li class="landoys-item">
                                <div class="landoys-item-left">
                                    <span class="landoys-bullet">•</span>
                                    <span class="landoys-name"><?php echo esc_html($item['name']); ?></span>
                                    <?php if (!empty($item['badge'])): ?>
                                        <span class="landoys-badge"><?php echo esc_html($item['badge']); ?></span>
                                    <?php endif; ?>
                                </div>
                                <span class="landoys-price"><?php echo esc_html($item['price']); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="landoys-contact-bar">
            <span>FOR ORDERS & INQUIRIES:</span>
            <a href="<?php echo esc_attr($contact_link); ?>" class="landoys-contact-btn">
                📞 <?php echo esc_html($contact_number); ?>
            </a>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('bbq_menu', 'landoys_render_menu_shortcode');