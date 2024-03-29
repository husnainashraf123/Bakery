<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$the_core_colors             = array(
	'color_1' => '#d12a5c',
	'color_2' => '#49ca9f',
	'color_3' => '#1f1f1f',
	'color_4' => '#808080',
	'color_5' => '#ebebeb'
);
$the_core_color_settings     = fw_get_db_settings_option( 'color_settings', $the_core_colors );
$the_core_admin_url          = admin_url();
$the_core_template_directory = get_template_directory_uri();
$options            = array(
	'img_settings'    => array(
		'type'    => 'group',
		'options' => array(
			'upload_img' => array(
				'label' => __( 'Image', 'the-core' ),
				'desc'  => __( 'Upload image', 'the-core' ),
				'type'  => 'upload',
			),
			'rounded'    => array(
				'type'         => 'switch',
				'value'        => '',
				'label'        => '',
				'desc'         => __( 'Make the image round?', 'the-core' ),
				'left-choice'  => array(
					'value' => '',
					'label' => __( 'No', 'the-core' ),
				),
				'right-choice' => array(
					'value' => 'fw-block-image-circle',
					'label' => __( 'Yes', 'the-core' ),
				)
			),
			'frame'      => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => '',
						'label'        => __( '', 'the-core' ),
						'desc'         => __( 'Add a border to your image?', 'the-core' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => __( 'No', 'the-core' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => __( 'Yes', 'the-core' ),
						)
					),
				),
				'choices' => array(
					'yes' => array(
						'border_size'  => array(
							'label' => __( '', 'the-core' ),
							'desc'  => __( 'Border size in pixels', 'the-core' ),
							'type'  => 'short-text',
							'value' => '1',
						),
						'border_color' => array(
							'label'   => __( '', 'the-core' ),
							'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
							'desc'    => __( 'Select border color', 'the-core' ),
							'value'   => '',
							'choices' => $the_core_color_settings,
							'type'    => 'color-palette'
						),
					)
				)
			),
		)
	),
	'ratio'           => array(
		'type'    => 'short-select',
		'label'   => __( 'Image Format', 'the-core' ),
		'value'   => '',
		'choices' => array(
			array( // optgroup
				'attr'    => array( 'label' => __( 'Original', 'the-core' ) ),
				'choices' => array(
					'' => __( 'Original Ratio', 'the-core' ),
				),
			),
			array( // optgroup
				'attr'    => array( 'label' => __( 'Landscape', 'the-core' ) ),
				'choices' => array(
					'fw-ratio-16-9' => __( '16-9', 'the-core' ),
					'fw-ratio-4-3'  => __( '4-3', 'the-core' ),
					'fw-ratio-2-1'  => __( '2-1', 'the-core' ),
				),
			),
			array( // optgroup
				'attr'    => array( 'label' => __( 'Portret', 'the-core' ) ),
				'choices' => array(
					'fw-ratio-9-16' => __( '9-16', 'the-core' ),
					'fw-ratio-3-4'  => __( '3-4', 'the-core' ),
					'fw-ratio-1-2'  => __( '1-2', 'the-core' ),
				),
			),
			array( // optgroup
				'attr'    => array( 'label' => __( 'Square', 'the-core' ) ),
				'choices' => array(
					'fw-ratio-1' => __( '1-1', 'the-core' ),
				),
			),
		),
		'desc'    => __( 'Choose the image format', 'the-core' )
	),
	'image_size'      => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'select_size' => array(
				'label'   => __( 'Size', 'the-core' ),
				'desc'    => __( 'Select the image size', 'the-core' ),
				'help'    => __( "<strong>Container size</strong> - the image will take the width of the container. Ex: in a 1/3 column the image will ocuppy the column's full width.", "the-core" ),
				'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
				'type'    => 'radio',
				'value'   => 'auto',
				'choices' => array(
					'auto'   => __( 'Container size', 'the-core' ),
					'custom' => __( 'Custom', 'the-core' )
				),
			),
		),
		'choices' => array(
			'custom' => array(
				'width'    => array(
					'label' => '',
					'desc'  => __( 'Image width in pixels', 'the-core' ),
					'type'  => 'short-text',
					'value' => '250',
				),
				'position' => array(
					'label'   => '',
					'desc'    => __( 'Select image position', 'the-core' ),
					'type'    => 'image-picker',
					'value'   => 'fw-block-image-center',
					'choices' => array(
						'fw-block-image-left'   => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/left-position.jpg',
								'title'  => __( 'Left', 'the-core' )
							),
						),
						'fw-block-image-center' => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/center-position.jpg',
								'title'  => __( 'Center', 'the-core' )
							),
						),
						'fw-block-image-right'  => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/right-position.jpg',
								'title'  => __( 'Right', 'the-core' )
							),
						),
					),
				),
			),
		)
	),
	'open_img'        => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'icon-box-img' => array(
				'label'   => __( 'On Click', 'the-core' ),
				'desc'    => __( 'What happens when you click the image?', 'the-core' ),
				'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
				'type'    => 'radio',
				'value'   => 'nothing',
				'choices' => array(
					'nothing' => __( 'Nothing happens', 'the-core' ),
					'popup'   => __( 'Open in pop-up', 'the-core' ),
					'link'    => __( 'Open custom Link', 'the-core' )
				),
			),
		),
		'choices' => array(
			'popup' => array(
				'image_popup' => array(
					'type'    => 'multi-picker',
					'label'   => false,
					'desc'    => false,
					'picker'  => array(
						'icon-box-img' => array(
							'label'   => '',
							'desc'    => '',
							'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
							'type'    => 'radio',
							'value'   => 'img',
							'choices' => array(
								'img'                 => __( 'Original image', 'the-core' ),
								'fw-block-image-icon' => __( 'Video', 'the-core' )
							),
						),
					),
					'choices' => array(
						'fw-block-image-icon' => array(
							'upload_video' => array(
								'label' => '',
								'desc'  => __( 'Enter Youtube or Vimeo video URL', 'the-core' ),
								'type'  => 'text',
							),
						),
					)
				),
                'display_overlay' => array(
                    'type'         => 'switch',
                    'value'        => 'yes',
                    'label'        => '',
                    'desc'         => __( 'Display hover animation?', 'the-core' ),
                    'left-choice'  => array(
                        'value' => 'no',
                        'label' => __( 'No', 'the-core' ),
                    ),
                    'right-choice' => array(
                        'value' => 'yes',
                        'label' => __( 'Yes', 'the-core' ),
                    )
                ),
			),
			'link'  => array(
				'custom_link' => array(
					'label' => '',
					'desc'  => __( 'Enter your custom URL link', 'the-core' ),
					'type'  => 'text'
				),
				'open'        => array(
					'type'         => 'switch',
					'value'        => 'no',
					'label'        => '',
					'desc'         => __( 'Open link in new window', 'the-core' ),
					'left-choice'  => array(
						'value' => 'no',
						'label' => __( 'No', 'the-core' ),
					),
					'right-choice' => array(
						'value' => 'yes',
						'label' => __( 'Yes', 'the-core' ),
					)
				),
                'display_overlay' => array(
                    'type'         => 'switch',
                    'value'        => 'yes',
                    'label'        => '',
                    'desc'         => __( 'Display hover animation?', 'the-core' ),
                    'left-choice'  => array(
                        'value' => 'no',
                        'label' => __( 'No', 'the-core' ),
                    ),
                    'right-choice' => array(
                        'value' => 'yes',
                        'label' => __( 'Yes', 'the-core' ),
                    )
                ),
			),
		)
	),
	'animation_group' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'selected' => array(
				'type'         => 'switch',
				'label'        => __( 'Animation', 'the-core' ),
				'help'         => __( 'Enables you to create an animation entrance or exit for this shortcode. Demo previews for the animations can be found <a target="_blank" href="http://daneden.github.io/animate.css/">here</a>.', 'the-core' ),
				'value'        => 'no',
				'right-choice' => array(
					'value' => 'yes',
					'label' => __( 'Yes', 'the-core' ),
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => __( 'No', 'the-core' ),
				),
			),
		),
		'choices' => array(
			'yes' => array(
				'animation' => array(
					'label' => __( 'Type & Delay', 'the-core' ),
					'desc'  => __( 'The type and delay in milliseconds (previews on <a target="_blank" href="http://daneden.github.io/animate.css/">http://daneden.github.io/animate.css/</a>)', 'the-core' ),
					'type'  => 'tf-animation',
					'value' => array(
						'animation' => 'fadeInUp',
						'delay'     => '200'
					)
				),
			),
		),
	),
	'responsive'         => array(
		'attr'          => array( 'class' => 'fw-advanced-button' ),
		'type'          => 'popup',
		'label'         => __( 'Responsive Behavior', 'the-core' ),
		'button'        => __( 'Settings', 'the-core' ),
		'size'          => 'small',
		'popup-options' => array(
            'desktop_display'     => array(
                'type'    => 'multi-picker',
                'label'   => false,
                'desc'    => false,
                'picker'  => array(
                    'selected' => array(
                        'type'         => 'switch',
                        'value'        => 'yes',
                        'label'        => __( 'Desktop', 'the-core' ),
                        'desc'         => __( 'Display this shortcode on desktop?', 'the-core' ),
                        'help'         => __( 'Applies to devices with the resolution higher then 1200px (desktops and laptops)', 'the-core' ),
                        'left-choice'  => array(
                            'value' => 'no',
                            'label' => __( 'No', 'the-core' ),
                        ),
                        'right-choice' => array(
                            'value' => 'yes',
                            'label' => __( 'Yes', 'the-core' ),
                        )
                    ),
                ),
            ),
            'tablet_landscape_display'     => array(
                'type'    => 'multi-picker',
                'label'   => false,
                'desc'    => false,
                'picker'  => array(
                    'selected' => array(
                        'type'         => 'switch',
                        'value'        => 'yes',
                        'label'        => __( 'Tablet Landscape', 'the-core' ),
                        'desc'         => __( 'Display this shortcode on tablet landscape?', 'the-core' ),
                        'help'         => __( 'Applies to devices with the resolution between 992px - 1199px (tablet landscape)', 'the-core' ),
                        'left-choice'  => array(
                            'value' => 'no',
                            'label' => __( 'No', 'the-core' ),
                        ),
                        'right-choice' => array(
                            'value' => 'yes',
                            'label' => __( 'Yes', 'the-core' ),
                        )
                    ),
                ),
            ),
            'tablet_display'     => array(
                'type'    => 'multi-picker',
                'label'   => false,
                'desc'    => false,
                'picker'  => array(
                    'selected' => array(
                        'type'         => 'switch',
                        'value'        => 'yes',
                        'label'        => __( 'Tablet Portrait', 'the-core' ),
                        'desc'         => __( 'Display this shortcode on tablet portrait?', 'the-core' ),
                        'help'         => __( 'Applies to devices with the resolution between 768px - 991px (tablet portrait)', 'the-core' ),
                        'left-choice'  => array(
                            'value' => 'no',
                            'label' => __( 'No', 'the-core' ),
                        ),
                        'right-choice' => array(
                            'value' => 'yes',
                            'label' => __( 'Yes', 'the-core' ),
                        )
                    ),
                ),
                'choices' => array(),
            ),
            'smartphone_display' => array(
                'type'    => 'multi-picker',
                'label'   => false,
                'desc'    => false,
                'picker'  => array(
                    'selected' => array(
                        'type'         => 'switch',
                        'value'        => 'yes',
                        'label'        => __( 'Smartphone', 'the-core' ),
                        'desc'         => __( 'Display this shortcode on smartphone?', 'the-core' ),
                        'help'         => __( 'Applies to devices with the resolution up to 767px (smartphones both portrait and landscape as well as some low-resolution tablets)', 'the-core' ),
                        'left-choice'  => array(
                            'value' => 'no',
                            'label' => __( 'No', 'the-core' ),
                        ),
                        'right-choice' => array(
                            'value' => 'yes',
                            'label' => __( 'Yes', 'the-core' ),
                        )
                    ),
                ),
                'choices' => array(),
            ),
		),
	),
	'class'           => array(
		'attr'  => array( 'class' => 'border-bottom-none' ),
		'label' => __( 'Custom Class', 'the-core' ),
		'desc'  => __( 'Enter custom CSS class', 'the-core' ),
		'type'  => 'text',
		'help'  => __( 'You can use this class to further style this shortcode by adding your custom CSS in the <strong>style.css</strong> file. This file is located on your server in the <strong>child-theme</strong> folder.', 'the-core' ),
		'value' => '',
	),

);