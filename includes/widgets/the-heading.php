<?php

/**
 * The Heading Demo Widget
 *
 * Elementor widget that inserts heading into the page
 *
 * @since 1.0.0
 */

class The_Heading extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 */
	public function get_name()
	{
		return 'elema-heading-widget';
	}

	/**
	 * Get widget title.
	 */
	public function get_title()
	{
		return esc_html__('The Heading', 'elema-addons');
	}

	/**
	 * Get widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-t-letter';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories()
	{
		return ['elema-addons-category'];
	}

	/**
	 * Register heading widget controls.
	 */
	protected function _register_controls()
	{
		// start of the Content tab section
		$this->start_controls_section(
			'content-section',
			[
				'label' => esc_html__('Content', 'elema-addons'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,

			]
		);

		// Heading Title
		$this->add_control(
			'heading_title',
			[
				'label' => esc_html__('Title', 'elema-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__('Enter Heading Title', 'elema-addons'),
				'default' => esc_html__('The title', 'elema-addons')
			]
		);

		// Heading Description
		$this->add_control(
			'heading_desc',
			[
				'label' => esc_html__( 'Description', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Default description', 'plugin-name' ),
				'placeholder' => esc_html__( 'Type your description here', 'plugin-name' ),
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// start of the Style tab section
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__('Heading Style', 'elema-addons'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'style_tabs'
		);

		// start everything related to Normal state here
		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__('Normal', 'elema-addons'),
			]
		);

		// Heading Title Options
		$this->add_control(
			'heading_title_options',
			[
				'label' => esc_html__('Title', 'elema-addons'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Heading Title Color
		$this->add_control(
			'heading_title_color',
			[
				'label' => esc_html__('Color', 'elema-addons'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#1D282E',
				'selectors' => [
					'{{WRAPPER}} .section-heading__title' => 'color: {{VALUE}}',
				],
			]
		);

		// Heading Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_title_typography',
				'label' => esc_html__('Typography', 'elema-addons'),
				'selector' => '{{WRAPPER}} .section-heading__content h5',
			]
		);

		// Heading Description Options
		$this->add_control(
			'heading_des_options',
			[
				'label' => esc_html__('Description', 'elema-addons'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Heading Description Color
		$this->add_control(
			'heading_des_color',
			[
				'label' => esc_html__('Color', 'elema-addons'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#1D282E',
				'selectors' => [
					'{{WRAPPER}} .section-heading__description' => 'color: {{VALUE}}',
				],
			]
		);

		// Heading Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_desc_typography',
				'label' => esc_html__('Typography', 'elema-addons'),
				'selector' => '{{WRAPPER}} .section-heading__content p',
			]
		);

		$this->end_controls_tab();
		// end everything related to Normal state here

		// start everything related to Hover state here
		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__('Hover', 'elema-addons'),
			]
		);

		// Heading Title Hover Color
		$this->add_control(
			'heading_title_hover',
			[
				'label' => esc_html__('Title Hover Color', 'elema-addons'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#1D282E',
				'selectors' => [
					'{{WRAPPER}} .section-heading__title:hover' => 'color: {{VALUE}}',
				],
				'separator' => 'after'
			]
		);

		// Heading Title Hover Color
		$this->add_control(
			'heading_desc_hover',
			[
				'label' => esc_html__('Description Hover Color', 'elema-addons'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#1D282E',
				'selectors' => [
					'{{WRAPPER}} .section-heading__description:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();
		// end everything related to Hover state here

		$this->end_controls_tabs();

		$this->end_controls_section();
		// end of the Style tab section

	}

	/**
	 * Render heading  widget output on the frontend.
	 */
	protected function render(){
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();
		$heading_title = $settings['heading_title'];
		$heading_desc = $settings['heading_desc'];

		$this->add_inline_editing_attributes('heading_title', 'basic');
		$this->add_render_attribute('heading_title', [
			'class' => 'section-heading__title'
		]);
		$this->add_inline_editing_attributes('heading_desc', 'basic');
		$this->add_render_attribute('heading_desc', [
			'class'	=> 'section-heading__description'
		])

		?>
		<div class="section-heading">
			<div class="section-heading__content">
				<h5 <?php echo $this->get_render_attribute_string('heading_title'); ?>><?php echo $heading_title; ?></h5>
				<p <?php echo $this->get_render_attribute_string('heading_desc') ?>><?php echo $heading_desc; ?></p>
			</div>
		</div>
		<?php
	}

	protected function content_template() {
		?>
		<#
		view.addInlineEditingAttributes( 'heading_title', 'basic' );
		view.addInlineEditingAttributes( 'heading_desc', 'basic' );
		#>
		<div class="section-heading">
			<div class="section-heading__content">
				<h5 {{{view.getRenderAttributeString('heading_title')}}}>{{{settings.heading_title}}}</h5>
				<p {{{view.getRenderAttributeString('heading_desc')}}}>{{{settings.heading_desc}}}</p>
			</div>
		</div>
		<?php
	}
}
