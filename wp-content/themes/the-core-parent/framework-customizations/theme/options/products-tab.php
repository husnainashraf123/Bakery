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
$the_core_typography          = array(
	'h1' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => 'regular',
		'family'         => 'Montserrat',
		'style'          => '',
		'weight'         => '',
		'size'           => '55',
		'line-height'    => '65',
		'letter-spacing' => '-2',
	),
	'h2' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => '700',
		'family'         => 'Montserrat',
		'style'          => '',
		'weight'         => '',
		'size'           => '40',
		'line-height'    => '56',
		'letter-spacing' => '-2',
	),
	'h3' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => '700',
		'family'         => 'Montserrat',
		'style'          => '',
		'weight'         => '',
		'size'           => '32',
		'line-height'    => '38',
		'letter-spacing' => '-2',
	),
	'h4' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => '700',
		'family'         => 'Montserrat',
		'style'          => '',
		'weight'         => '',
		'size'           => '26',
		'line-height'    => '32',
		'letter-spacing' => '-2',
	),
	'h5' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => '700',
		'family'         => 'Montserrat',
		'style'          => '',
		'weight'         => '',
		'size'           => '19',
		'line-height'    => '28',
		'letter-spacing' => '-1',
	),
	'h6' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => '700',
		'family'         => 'Montserrat',
		'style'          => '',
		'weight'         => '',
		'size'           => '14',
		'line-height'    => '26',
		'letter-spacing' => '-1',
	),
	'buttons' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => 'regular',
		'family'         => 'Montserrat',
		'style'          => '',
		'weight'         => '',
		'size'           => '12',
		'line-height'    => '30',
		'letter-spacing' => '0',
	),
	'subtitles' => array(
		'google_font'    => true,
		'subset'         => 'latin',
		'variation'      => '300',
		'family'         => 'Merriweather',
		'style'          => '',
		'weight'         => '',
		'size'           => '22',
		'line-height'    => '39',
		'letter-spacing' => '0.5',
	),
);
$the_core_admin_url           = admin_url();
$the_core_template_directory  = get_template_directory_uri();
if (FW_WP_Option::get('fw_theme_settings_options:' . fw()->theme->manifest->get_id())) {
	// there are some settings in db
	$the_core_general_settings    = fw_get_db_settings_option();
} else {
	// no settings in db
	// the form was never saved or the Reset button was pressed
	$the_core_general_settings    = fw_get_db_settings_option('null', array('color_settings' => $the_core_colors, 'typography_settings' => $the_core_typography ));
}
$the_core_color_settings      = isset( $the_core_general_settings['color_settings'] ) ? $the_core_general_settings['color_settings'] : $the_core_colors;
$the_core_typography_settings = isset( $the_core_general_settings['typography_settings'] ) ? $the_core_general_settings['typography_settings'] : $the_core_typography;

$options = array(
	'products' => array(
		'title'   => __( 'Products', 'the-core' ),
		'type'    => 'tab',
		'options' => array(
			'header-products-box' => array(
				'title'   => __( 'Single Products Header', 'the-core' ),
				'type'    => 'box',
				'options' => array(
					'general_products_header' => array(
						'type'          => 'multi',
						'label'         => false,
						'attr'          => array(
							'class' => 'fw-option-type-multi-show-borders',
						),
						'inner-options' => array(
							'posts_header_height'          => array(
								'label'   => __( 'Header Height', 'the-core' ),
								'desc'    => __( "Select the header height in pixels (Ex: 300)", "the-core" ),
								'type'    => 'radio-text',
								'value'   => 'fw-section-height-md',
								'choices' => array(
									'auto'                 => __( 'auto', 'the-core' ),
									'fw-section-height-sm' => __( 'small', 'the-core' ),
									'fw-section-height-md' => __( 'medium', 'the-core' ),
									'fw-section-height-lg' => __( 'large', 'the-core' ),
								),
								'custom'  => 'custom_width',
							),
							'posts_header_image'           => array(
								'label' => __( 'Header Image', 'the-core' ),
								'desc'  => __( 'Upload a header image', 'the-core' ),
								'help'  => __( "This default header image will be used for all your products.", "the-core" ),
								'type'  => 'upload'
							),
							'posts_header_overlay_options' => array(
								'type'    => 'multi-picker',
								'label'   => false,
								'desc'    => false,
								'picker'  => array(
									'posts_header_overlay' => array(
										'type'         => 'switch',
										'label'        => __( 'Overlay Color', 'the-core' ),
										'desc'         => __( 'Enable image overlay color?', 'the-core' ),
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
									'no'  => array(),
									'yes' => array(
										'posts_header_overlay_color'         => array(
											'label'   => __( '', 'the-core' ),
											'desc'    => __( 'Select the image overlay color', 'the-core' ),
											'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
											'value'   => '',
											'choices' => $the_core_color_settings,
											'type'    => 'color-palette'
										),
										'posts_header_overlay_opacity_image' => array(
											'type'       => 'slider',
											'value'      => 80,
											'properties' => array(
												'min' => 0,
												'max' => 100,
												'sep' => 1,
											),
											'label'      => __( '', 'the-core' ),
											'desc'       => __( 'Select the overlay color opacity in %', 'the-core' ),
										)
									),
								),
							),
							'header_image_overlap' => array(
								'label'   => __( 'Header Image Overlap', 'the-core' ),
								'desc'    => __( 'Select the header image overlap value in pixels (Ex: 100)', 'the-core' ),
								'help'    => __( 'The content that follows will overlap the header with the specified pixel amount.', 'the-core' ),
								'type'    => 'radio-text',
								'choices' => array(
									''                      => __( 'none', 'the-core' ),
									'fw-content-overlay-sm' => __( 'small', 'the-core' ),
									'fw-content-overlay-md' => __( 'medium', 'the-core' ),
									'fw-content-overlay-lg' => __( 'large', 'the-core' ),
								),
								'custom'  => 'custom_width',
								'value'   => ''
							),
							'posts_header_title'           => array(
								'type'    => 'multi-picker',
								'label'   => false,
								'desc'    => false,
								'picker'  => array(
									'posts_title' => array(
										'label'   => __( 'Title', 'the-core' ),
										'desc'    => __( 'Select what title will be displayed in the product posts header', 'the-core' ),
										'help'    => __( 'This title appears only on the product detail page and will be displayed if you have a header image set (in the product or here)', 'the-core' ),
										'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
										'type'    => 'radio',
										'value'   => 'category_title',
										'choices' => array(
											'post_title'     => __( 'Post Title', 'the-core' ),
											'category_title' => __( 'Category Title', 'the-core' ),
											'custom_title'   => __( 'Custom Title', 'the-core' ),
										),
									),
								),
								'choices' => array(
									'post_title' => array(
										'header_title_typography' => array(
											'attr'          => array( 'class' => 'fw-advanced-button' ),
											'type'          => 'popup',
											'label'         => '',
											'desc'          => __( 'Change the style / typography of the title', 'the-core' ),
											'button'        => __( 'Styling', 'the-core' ),
											'size'          => 'small',
											'popup-options' => array(
												'title' => array(
													'label' => __( 'Title', 'the-core' ),
													'type'  => 'tf-typography',
													'value' => array(
														'google_font'    => $the_core_typography_settings['h1']['google_font'],
														'subset'         => $the_core_typography_settings['h1']['subset'],
														'variation'      => $the_core_typography_settings['h1']['variation'],
														'family'         => $the_core_typography_settings['h1']['family'],
														'style'          => $the_core_typography_settings['h1']['style'],
														'weight'         => $the_core_typography_settings['h1']['weight'],
														'size'           => $the_core_typography_settings['h1']['size'],
														'line-height'    => $the_core_typography_settings['h1']['line-height'],
														'letter-spacing' => $the_core_typography_settings['h1']['letter-spacing'],
														'color-palette'  => '',
													)
												),
											),
										),
									),
									'category_title' => array(
										'header_title_typography' => array(
											'attr'          => array( 'class' => 'fw-advanced-button' ),
											'type'          => 'popup',
											'label'         => '',
											'desc'          => __( 'Change the style / typography of the title', 'the-core' ),
											'button'        => __( 'Styling', 'the-core' ),
											'size'          => 'small',
											'popup-options' => array(
												'title' => array(
													'label' => __( 'Title', 'the-core' ),
													'type'  => 'tf-typography',
													'value' => array(
														'google_font'    => $the_core_typography_settings['h1']['google_font'],
														'subset'         => $the_core_typography_settings['h1']['subset'],
														'variation'      => $the_core_typography_settings['h1']['variation'],
														'family'         => $the_core_typography_settings['h1']['family'],
														'style'          => $the_core_typography_settings['h1']['style'],
														'weight'         => $the_core_typography_settings['h1']['weight'],
														'size'           => $the_core_typography_settings['h1']['size'],
														'line-height'    => $the_core_typography_settings['h1']['line-height'],
														'letter-spacing' => $the_core_typography_settings['h1']['letter-spacing'],
														'color-palette'  => '',
													)
												),
											),
										),
										'header_subtitle_typography' => array(
											'attr'          => array( 'class' => 'fw-advanced-button' ),
											'type'          => 'popup',
											'label'         => __( 'Description', 'the-core' ),
											'desc'          => __( 'Change the style / typography of the description', 'the-core' ),
											'button'        => __( 'Styling', 'the-core' ),
											'size'          => 'small',
											'popup-options' => array(
												'subtitle' => array(
													'label' => __( 'Description', 'the-core' ),
													'type'  => 'tf-typography',
													'value' => array(
														'google_font'    => $the_core_typography_settings['subtitles']['google_font'],
														'subset'         => $the_core_typography_settings['subtitles']['subset'],
														'variation'      => $the_core_typography_settings['subtitles']['variation'],
														'family'         => $the_core_typography_settings['subtitles']['family'],
														'style'          => $the_core_typography_settings['subtitles']['style'],
														'weight'         => $the_core_typography_settings['subtitles']['weight'],
														'size'           => $the_core_typography_settings['subtitles']['size'],
														'line-height'    => $the_core_typography_settings['subtitles']['line-height'],
														'letter-spacing' => $the_core_typography_settings['subtitles']['letter-spacing'],
														'color-palette'  => '',
													)
												),
											),
										),
									),
									'custom_title'   => array(
										'header_title_typography' => array(
											'attr'          => array(
												'data-advanced-for' => 'products_header_title_advanced_styling',
												'class'             => 'fw-advanced-button'
											),
											'type'          => 'popup',
											'label'         => __( 'Custom Style', 'the-core' ),
											'button'        => __( 'Styling', 'the-core' ),
											'size'          => 'small',
											'popup-options' => array(
												'title' => array(
													'label' => __( 'Title', 'the-core' ),
													'type'  => 'tf-typography',
													'value' => array(
														'google_font'    => $the_core_typography_settings['h1']['google_font'],
														'subset'         => $the_core_typography_settings['h1']['subset'],
														'variation'      => $the_core_typography_settings['h1']['variation'],
														'family'         => $the_core_typography_settings['h1']['family'],
														'style'          => $the_core_typography_settings['h1']['style'],
														'weight'         => $the_core_typography_settings['h1']['weight'],
														'size'           => $the_core_typography_settings['h1']['size'],
														'line-height'    => $the_core_typography_settings['h1']['line-height'],
														'letter-spacing' => $the_core_typography_settings['h1']['letter-spacing'],
														'color-palette'  => '',
													)
												),
											),
										),
										'custom_title_text'            => array(
											'attr'  => array( 'class' => 'products_header_title_advanced_styling' ),
											'label' => __( 'Custom Title', 'the-core' ),
											'desc'  => __( 'Enter a custom title', 'the-core' ),
											'help'  => __( 'This title appears on the post detail pages only and will be displayed in all the headers. Choose something general that will fit all the posts. (Ex: Blog)', 'the-core' ),
											'type'  => 'text',
										),
										'header_subtitle_typography' => array(
											'attr'          => array(
												'data-advanced-for' => 'products_header_subtitle_advanced_styling',
												'class'             => 'fw-advanced-button'
											),
											'type'          => 'popup',
											'label'         => __( 'Custom Style', 'the-core' ),
											'button'        => __( 'Styling', 'the-core' ),
											'size'          => 'small',
											'popup-options' => array(
												'subtitle' => array(
													'label' => __( 'Description', 'the-core' ),
													'type'  => 'tf-typography',
													'value' => array(
														'google_font'    => $the_core_typography_settings['subtitles']['google_font'],
														'subset'         => $the_core_typography_settings['subtitles']['subset'],
														'variation'      => $the_core_typography_settings['subtitles']['variation'],
														'family'         => $the_core_typography_settings['subtitles']['family'],
														'style'          => $the_core_typography_settings['subtitles']['style'],
														'weight'         => $the_core_typography_settings['subtitles']['weight'],
														'size'           => $the_core_typography_settings['subtitles']['size'],
														'line-height'    => $the_core_typography_settings['subtitles']['line-height'],
														'letter-spacing' => $the_core_typography_settings['subtitles']['letter-spacing'],
														'color-palette'  => '',
													)
												),
											),
										),
										'custom_subtitle_text'         => array(
											'attr'  => array( 'class' => 'products_header_subtitle_advanced_styling' ),
											'label' => __( 'Custom Description', 'the-core' ),
											'desc'  => __( 'Enter a custom description', 'the-core' ),
											'help'  => __( 'The description is displayed as a subtitle', 'the-core' ),
											'type'  => 'text',
										),
									),
								),
							),
							'posts_header_content_position' => array(
								'label'   => __( 'Content Position', 'the-core' ),
								'desc'    => __( "Adjust the content vertical position in pixels (Ex: -20 or 20)", "the-core" ),
								'help'    => __( "Let's you fine tune the header content position on the vertical axis. Input a negative value if you want your content to go up or a positive value if you want your content to go down.", "the-core" ),
								'type'    => 'short-text',
								'value'   => '',
							),
						)
					)
				)
			),
		)
	),
);