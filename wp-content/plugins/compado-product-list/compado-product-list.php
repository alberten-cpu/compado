<?php
/*
Plugin Name: Compado Product List
Description: Display a list of products from Compado API.
Version: 1.0.0
Author: Albert EB
*/

// Enqueue scripts and styles

function compado_enqueue_scripts() {
    wp_enqueue_style('compado-style', plugins_url('css/style.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'compado_enqueue_scripts');


// Fetch API Data
function custom_api_plugin_fetch_data() {
    $api_url = 'https://api.compado.com/v2_1/host/205/category/home/default'; // Replace with your API endpoint
    $response = wp_remote_get($api_url);

    // Handling error 
    if (is_wp_error($response)) {
        return false; 
    }

    $data = wp_remote_retrieve_body($response);
    return json_decode($data);
}

// Function for extracting the sentence which have unwanted special charecters
function extractSentence($sentence) {

    // Removing Unwanted charecters
    $cleanText = strip_tags(html_entity_decode($sentence));
    $sentence = preg_replace('/[^a-zA-Z\s]/', '', $cleanText);
    if (mb_strlen($sentence) <= 170) {
        return $sentence;
    }

    // Find the last space within the first 100 characters
    $lastSpace = mb_strrpos(mb_substr($sentence, 0, 100), ' ');

    // Extract the substring up to the last space
    $result = mb_substr($sentence, 0, $lastSpace);

    return $result;
}

// Display the cards
function custom_api_plugin_display_cards($partners) {
    if (!$partners) {
        return;
    }

    // Sort partners based on rating
    usort($partners->partners, function($a, $b) {
        return $a->rating - $b->rating;
    });

    // Display only the top 3 partners
    $topPartners = array_slice($partners->partners, 0, 3);

    foreach ($topPartners as $partner) {
        // display top 3 customers
        echo '<div class="card-container">';
        echo '<div class="card">';
        echo '<h2>' . esc_html($partner->partner_name) . '</h2>';
        echo '<p>Rating: ' . esc_html($partner->rating) . '</p>';
        echo '</div>';

    }

    // Base URL for the logo image 
    $imageUrl = "https://media.api-domain-compado.com/";
    
    // Display only the top 3 partners
    $allPartrners = $partners->partners;

    // Display the cards
    foreach ($allPartrners as $partner) {

        if($partner->flag == ""){

            $partner->flag = "Exciting Offers";
        }
        if($partner->introduction != ""){

            $partner->introduction = extractSentence($partner->introduction);            

        }else{

            $partner->introduction = "This is an introduction";
        }
       
        // Html content for the cards
       echo '
<div class="elementor-element elementor-element-678bd64 e-flex e-con-boxed e-con e-parent" data-id="678bd64" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
    <div class="e-con-inner">
   <div class="elementor-element elementor-element-01f8fe1 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="01f8fe1" data-element_type="widget" data-widget_type="divider.default">
   <div class="elementor-widget-container">
<style>/*! elementor - v3.19.0 - 07-02-2024 */
.elementor-widget-divider{--divider-border-style:none;--divider-border-width:1px;--divider-color:#0c0d0e;--divider-icon-size:20px;--divider-element-spacing:10px;--divider-pattern-height:24px;--divider-pattern-size:20px;--divider-pattern-url:none;--divider-pattern-repeat:repeat-x}.elementor-widget-divider .elementor-divider{display:flex}.elementor-widget-divider .elementor-divider__text{font-size:15px;line-height:1;max-width:95%}.elementor-widget-divider .elementor-divider__element{margin:0 var(--divider-element-spacing);flex-shrink:0}.elementor-widget-divider .elementor-icon{font-size:var(--divider-icon-size)}.elementor-widget-divider .elementor-divider-separator{display:flex;margin:0;direction:ltr}.elementor-widget-divider--view-line_icon .elementor-divider-separator,.elementor-widget-divider--view-line_text .elementor-divider-separator{align-items:center}.elementor-widget-divider--view-line_icon .elementor-divider-separator:after,.elementor-widget-divider--view-line_icon .elementor-divider-separator:before,.elementor-widget-divider--view-line_text .elementor-divider-separator:after,.elementor-widget-divider--view-line_text .elementor-divider-separator:before{display:block;content:"";border-block-end:0;flex-grow:1;border-block-start:var(--divider-border-width) var(--divider-border-style) var(--divider-color)}.elementor-widget-divider--element-align-left .elementor-divider .elementor-divider-separator>.elementor-divider__svg:first-of-type{flex-grow:0;flex-shrink:100}.elementor-widget-divider--element-align-left .elementor-divider-separator:before{content:none}.elementor-widget-divider--element-align-left .elementor-divider__element{margin-left:0}.elementor-widget-divider--element-align-right .elementor-divider .elementor-divider-separator>.elementor-divider__svg:last-of-type{flex-grow:0;flex-shrink:100}.elementor-widget-divider--element-align-right .elementor-divider-separator:after{content:none}.elementor-widget-divider--element-align-right .elementor-divider__element{margin-right:0}.elementor-widget-divider--element-align-start .elementor-divider .elementor-divider-separator>.elementor-divider__svg:first-of-type{flex-grow:0;flex-shrink:100}.elementor-widget-divider--element-align-start .elementor-divider-separator:before{content:none}.elementor-widget-divider--element-align-start .elementor-divider__element{margin-inline-start:0}.elementor-widget-divider--element-align-end .elementor-divider .elementor-divider-separator>.elementor-divider__svg:last-of-type{flex-grow:0;flex-shrink:100}.elementor-widget-divider--element-align-end .elementor-divider-separator:after{content:none}.elementor-widget-divider--element-align-end .elementor-divider__element{margin-inline-end:0}.elementor-widget-divider:not(.elementor-widget-divider--view-line_text):not(.elementor-widget-divider--view-line_icon) .elementor-divider-separator{border-block-start:var(--divider-border-width) var(--divider-border-style) var(--divider-color)}.elementor-widget-divider--separator-type-pattern{--divider-border-style:none}.elementor-widget-divider--separator-type-pattern.elementor-widget-divider--view-line .elementor-divider-separator,.elementor-widget-divider--separator-type-pattern:not(.elementor-widget-divider--view-line) .elementor-divider-separator:after,.elementor-widget-divider--separator-type-pattern:not(.elementor-widget-divider--view-line) .elementor-divider-separator:before,.elementor-widget-divider--separator-type-pattern:not([class*=elementor-widget-divider--view]) .elementor-divider-separator{width:100%;min-height:var(--divider-pattern-height);-webkit-mask-size:var(--divider-pattern-size) 100%;mask-size:var(--divider-pattern-size) 100%;-webkit-mask-repeat:var(--divider-pattern-repeat);mask-repeat:var(--divider-pattern-repeat);background-color:var(--divider-color);-webkit-mask-image:var(--divider-pattern-url);mask-image:var(--divider-pattern-url)}.elementor-widget-divider--no-spacing{--divider-pattern-size:auto}.elementor-widget-divider--bg-round{--divider-pattern-repeat:round}.rtl .elementor-widget-divider .elementor-divider__text{direction:rtl}.e-con-inner>.elementor-widget-divider,.e-con>.elementor-widget-divider{width:var(--container-widget-width,100%);--flex-grow:var(--container-widget-flex-grow)}</style>		<div class="elementor-divider">

</div>
   </div>
   </div>
       </div>
   </div>
<div class="elementor-element elementor-element-542f920 hh e-flex e-con-boxed e-con e-parent" data-id="542f920" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}" data-core-v316-plus="true">
       <div class="e-con-inner">
<div class="elementor-element elementor-element-d335108 e-con-full e-flex e-con e-child" data-id="d335108" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
<div class="elementor-element elementor-element-71737be e-con-full e-flex e-con e-child" data-id="71737be" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
   <div class="elementor-element elementor-element-6066818 elementor-widget elementor-widget-image" data-id="6066818" data-element_type="widget" data-widget_type="image.default">
   <div class="elementor-widget-container">
<style>/*! elementor - v3.19.0 - 07-02-2024 */
.elementor-widget-image{text-align:center}.elementor-widget-image a{display:inline-block}.elementor-widget-image a img[src$=".svg"]{width:48px}.elementor-widget-image img{vertical-align:middle;display:inline-block}</style><img decoding="async" width="150" height="150" src="'.esc_html($imageUrl.$partner->default_provider_logo).'" class="attachment-thumbnail size-thumbnail wp-image-378" alt="" srcset="'.esc_html($imageUrl.$partner->logo_image).'" 150w, "'.esc_html($imageUrl.$partner->logo_image).'" 300w, "'.esc_html($imageUrl.$partner->logo_image).'" 520w" sizes="(max-width: 150px) 100vw, 150px" />													</div>
   </div>
   <div class="elementor-element elementor-element-ba691d5 elementor-widget__width-initial elementor-absolute elementor-widget elementor-widget-button" data-id="ba691d5" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="button.default">
   <div class="elementor-widget-container">
       <div class="elementor-button-wrapper">
<a class="elementor-button elementor-button-link elementor-size-sm" href="https://www.top5-bestmealdelivery.com'. esc_html($partner->api_clickout) .'" target="_blank">
           <span class="elementor-button-content-wrapper">
           <span class="elementor-button-text"> '. esc_html($partner->marketing_properties->discount_button) .'</span>
</span>
       </a>
</div>
   </div>
   </div>
   <div class="elementor-element elementor-element-b45d78d elementor-absolute elementor-widget elementor-widget-text-editor" data-id="b45d78d" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="text-editor.default">
   <div class="elementor-widget-container">
<style>/*! elementor - v3.19.0 - 07-02-2024 */
.elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap{background-color:#69727d;color:#fff}.elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap{color:#69727d;border:3px solid;background-color:transparent}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap{margin-top:8px}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter{width:1em;height:1em}.elementor-widget-text-editor .elementor-drop-cap{float:left;text-align:center;line-height:1;font-size:50px}.elementor-widget-text-editor .elementor-drop-cap-letter{display:inline-block}</style>				<p>'. esc_html($partner->introduction) .'</p>						</div>
   </div>
   <div class="elementor-element elementor-element-37e0c47 elementor-absolute elementor-widget elementor-widget-heading" data-id="37e0c47" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="heading.default">
   <div class="elementor-widget-container">
<style>/*! elementor - v3.19.0 - 07-02-2024 */
.elementor-heading-title{padding:0;margin:0;line-height:1}.elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a{color:inherit;font-size:inherit;line-height:inherit}.elementor-widget-heading .elementor-heading-title.elementor-size-small{font-size:15px}.elementor-widget-heading .elementor-heading-title.elementor-size-medium{font-size:19px}.elementor-widget-heading .elementor-heading-title.elementor-size-large{font-size:29px}.elementor-widget-heading .elementor-heading-title.elementor-size-xl{font-size:39px}.elementor-widget-heading .elementor-heading-title.elementor-size-xxl{font-size:59px}</style><h5 class="elementor-heading-title elementor-size-default">'. esc_html($partner->partner_name) .'</h5>		</div>
   </div>
   </div>
   <div class="elementor-element elementor-element-0f0e551 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="0f0e551" data-element_type="widget" data-widget_type="divider.default">
   <div class="elementor-widget-container">
       <div class="elementor-divider">
<span class="elementor-divider-separator">
           </span>
</div>
   </div>
   </div>
   <div class="elementor-element elementor-element-7ae28e8 elementor-widget__width-initial elementor-absolute elementor-widget elementor-widget-button" data-id="7ae28e8" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="button.default">
   <div class="elementor-widget-container">
       <div class="elementor-button-wrapper">
<a class="elementor-button elementor-button-link elementor-size-sm" href="https://www.top5-bestmealdelivery.com'. esc_html($partner->api_clickout) .'" target="_blank">
           <span class="elementor-button-content-wrapper">
           <span class="elementor-button-text">visit site</span>
</span>
       </a>
</div>
   </div>
   </div>
   <div class="elementor-element elementor-element-6e00463 elementor-widget__width-initial elementor-absolute elementor-widget elementor-widget-heading" data-id="6e00463" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="heading.default">
   <div class="elementor-widget-container">
<h3 class="elementor-heading-title elementor-size-default">'. esc_html($partner->rating) .'</h3>		</div>
   </div>
<div class="elementor-element elementor-element-5317588 e-con-full small-col e-flex e-con e-child" data-id="5317588" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;position&quot;:&quot;absolute&quot;}">
   <div class="elementor-element elementor-element-c2f71ff elementor-widget elementor-widget-text-editor" data-id="c2f71ff" data-element_type="widget" data-widget_type="text-editor.default">
   <div class="elementor-widget-container">
               <p>'. esc_html($partner->flag) .'</p>						</div>
   </div>
   </div>
   </div>

       </div>
   </div>

				
    
    ';
        
    }

}

// Shortcode to display cards on a page
function custom_api_plugin_shortcode_cards($atts) {
    $atts = shortcode_atts(
        array(
            'type' => 'cards',
        ),
        $atts,
        'custom_api_plugin_cards'
    );

    $partners = custom_api_plugin_fetch_data();

    if ($atts['type'] === 'cards') {
        ob_start();
        custom_api_plugin_display_cards($partners);
        return ob_get_clean();
    }
}
add_shortcode('custom_api_plugin_cards', 'custom_api_plugin_shortcode_cards');
