<?php

$standalone = dirname( __FILE__ ).'/../sharedaddy/sharing-sources.php';
$jetpack = dirname( __FILE__ ).'/../jetpack/modules/sharedaddy/sharing-sources.php';
if ( file_exists( $standalone ) ) {
	include_once $standalone;
	$sharedaddy_textdomain = 'sharedaddy';
}
elseif ( file_exists( $jetpack ) ) {
	include_once $jetpack;
	$sharedaddy_textdomain = 'jetpack';
}

if ( class_exists( 'Sharing_Advanced_Source' ) ) :

class Share_GPlus extends Sharing_Advanced_Source {
	/* List of configurationb for button */
	private $size = 'standard';
	private $language = 'en-US';
	private $count = 'on';
	
	public function __construct( $id, array $settings ) {
		parent::__construct( $id, $settings );
		
		if ( isset( $settings['size'] ) )
			$this->size = $settings['size'];
		
		if ( isset( $settings['language'] ) )
			$this->language = $settings['language'];
			
		if ( isset( $settings['count'] ) )
			$this->count = $settings['count'];
		
	}
	
	public function get_name(){
		return __( 'Google +1', 'jetpack-gplus-provider' );
	}
	
	public function has_custom_button_style() {
		return $this->smart;
	}
	
	public function display_header(){
		
	}
	
	public function get_display( $post ) {
		return '<g:plusone href="'.get_permalink().'" size="'.$this->size.'" '.( $this->count == on ? '' : 'count="false"').'></g:plusone>';
	}
	
	public function get_link( $url, $text, $title, $query = '' ) {
		/* Nothing to do here either.. */
		return;
	}
	
	public function process_request( $post, array $post_data ) {
		/* There is nothing to process here... 
		   You have suggestion ? leave me a comment here :
		    http://magnetik.org/en/tech/wordpress/english-google-plus-one-1-button-for-sharedaddy-jetpack/
		*/
	}
	
	public function update_options( array $data ) {
		$this->size = 'standard';
		$this->language = 'en-US';

		if ( isset( $data['size'] ) )
			$this->size = $data['size'];
			
		if ( isset( $data['language'] ) )
			$this->language = $data['language'];
			
		if ( isset( $data['count'] ) )
			$this->count = $data['count'];
	}
	
	public function get_options() {
		return array(
			'language'     => $this->language,
			'size'    => $this->size,
			'count' => $this->count,
		);
	}
	
	public function display_options() {
		global $sharedaddy_textdomain;
?>
	<div class="input">
		<label><?php _e( 'Size', 'jetpack-gplus-provider' ); ?></label>
		<select name="size">
			<option value="small"<?php if ( $this->button == 'small' ) echo ' selected="selected"'; ?>><?php _e( 'small', 'jetpack-gplus-provider' ); ?></option>
			<option value="standard"<?php if ( $this->button == 'standard' ) echo ' selected="selected"'; ?>><?php _e( 'standard', 'jetpack-gplus-provider' ); ?></option>
			<option value="medium"<?php if ( $this->button == 'medium' ) echo ' selected="selected"'; ?>><?php _e( 'medium', 'jetpack-gplus-provider' ); ?></option>
			<option value="tall"<?php if ( $this->button == 'tall' ) echo ' selected="selected"'; ?>><?php _e( 'tall', 'jetpack-gplus-provider' ); ?></option>
		</select>
	</div>
	<div class="input">
		<label><?php _e('Language', 'jetpack-gplus-provider'); ?></label>
		<select id="language" disabled="disabled">
			<option value="ar">Arabic - العربية</option>
			<option value="bg">Bulgarian - български</option>
			<option value="ca">Catalan - català</option>
			<option value="zh-CN">Chinese (Simplified) - 中文 &rlm;（簡体）</option>
			<option value="zh-TW">Chinese (Traditional) - 中文 &rlm;（繁體）</option>
			<option value="hr">Croatian - hrvatski</option>
			<option value="cs">Czech - čeština</option>
			<option value="da">Danish - dansk</option>
			<option value="nl">Dutch - Nederlands</option>
			<option selected="selected" value="en-US">English (US) - English &rlm;(US)</option>
			<option value="en-GB">English (UK) - English &rlm;(UK)</option>
			<option value="et">Estonian - eesti</option>
			<option value="fil">Filipino - Filipino</option>
			<option value="fi">Finnish - suomi</option>
			<option value="fr">French - français</option>
			<option value="de">German - Deutsch</option>
			<option value="el">Greek - Ελληνικά</option>
			<option value="iw">Hebrew - עברית</option>
			<option value="hi">Hindi - हिन्दी</option>
			<option value="hu">Hungarian - magyar</option>
			<option value="id">Indonesian - Bahasa Indonesia</option>
			<option value="it">Italian - italiano</option>
			<option value="ja">Japanese - 日本語</option>
			<option value="ko">Korean - 한국어</option>
			<option value="lv">Latvian - latviešu</option>
			<option value="lt">Lithuanian - lietuvių</option>
			<option value="ms">Malay - Bahasa Melayu</option>
			<option value="no">Norwegian - norsk</option>
			<option value="fa">Persian - فارسی</option>
			<option value="pl">Polish - polski</option>
			<option value="pt-BR">Portuguese (Brazil) - português &rlm;(Brasil)</option>
			<option value="pt-PT">Portuguese (Portugal) - Português &rlm;(Portugal)</option>
			<option value="ro">Romanian - română</option>
			<option value="ru">Russian - русский</option>
			<option value="sr">Serbian - српски</option>
			<option value="sv">Swedish - svenska</option>
			<option value="sk">Slovak - slovenský</option>
			<option value="sl">Slovenian - slovenščina</option>
			<option value="es">Spanish - español</option>
			<option value="es-419">Spanish (Latin America) - español &rlm;(Latinoamérica y el Caribe)</option>
			<option value="th">Thai - ไทย</option>
			<option value="tr">Turkish - Türkçe</option>
			<option value="uk">Ukrainian - українська</option>
			<option value="vi">Vietnamese - Tiếng Việt</option>
		</select>
	</div>
	<div class="input">
		<label><input name="count" type="checkbox"<?php if ( $this->count ) echo ' checked="checked"'; ?>/>
		<?php _e( 'Display count', 'jetpack-gplus-provider' ); ?></label>
	</div>
	<?php _e( 'Preview does not work at the moment, reload the whole page to preview !', 'jetpack-gplus-provider' ); ?>
<?php
	}
	
	public function display_preview() {
?>
	<?php echo $this->get_display(null); ?>
<?php
	}
}

endif;
