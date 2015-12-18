<?php
/**
 *
 * SVGs used in the theme based on user choice
 *
 * @package Roda
 */


/* Header and about me section */
if ( ! function_exists( 'roda_header_svg' ) ) :
function roda_header_svg() { 
	
    $svg_type = get_theme_mod( 'svg_type' );
    if ( $svg_type != '' ) {
        switch ( $svg_type ) {
            case 'straight': ?>
		    <svg viewBox="0 0 1300 40" version="1.1">
				<g transform="translate(0,-1012.3622)" >
			        <path d="m 0,1012.3622 130,40 130,-40" />
			        <path d="m 260,1012.3622 130,40 130,-40" />
			        <path d="m 520,1012.3622 130,40 130,-40" />
			        <path d="m 780,1012.3622 130,40 130,-40" />
			        <path d="m 1040,1012.3622 130,40 130,-40" />
				</g>
		    </svg>
			<?php
            break;
            case 'rounded': ?>
            <svg viewBox="0 0 1300 40" version="1.1">
				<g transform="translate(0,-1012.3622)">
					<path d="m 0,0 c 0,0 84.661765,40 130,40 45.33824,0 84.66176,-20 130,-20 45.33824,0 86.27337,23.19442 130,20 45.21773,-3.303352 84.66176,-20 130,-20 45.33824,0 86.27337,23.19442 130,20 45.21773,-3.303352 84.66176,-20 130,-20 45.33824,0 86.27337,23.19442 130,20 45.21773,-3.303352 86.15685,-20 130,-20 43.8432,0 86.2734,23.19442 130,20 45.2177,-3.303352 130,-40 130,-40" transform="translate(0,1012.3622)" />
				</g>
  			</svg>
  			<?php
            break;           
        }
    } else {
    ?>
		<svg viewBox="0 0 1300 40" version="1.1">
			<g transform="translate(0,-1012.3622)" >
				<path d="m 0,1012.3622 130,40 130,-40" />
				<path d="m 260,1012.3622 130,40 130,-40" />
				<path d="m 520,1012.3622 130,40 130,-40" />
				<path d="m 780,1012.3622 130,40 130,-40" />
				<path d="m 1040,1012.3622 130,40 130,-40" />
			</g>
		</svg>
	<?php	      	
    }	
}
endif;

/* Post separator */
if ( ! function_exists( 'roda_post_svg' ) ) :
function roda_post_svg() { 
    $svg_type = get_theme_mod( 'svg_type' );
    if ( $svg_type != '' ) {
        switch ( $svg_type ) {
            case 'straight': ?>
			<svg viewBox="0 0 1300 40" version="1.1">
				<g transform="translate(0,-1012.3622)">
					<path d="m 0,1012.3622 130,40 130,-40" />
					<path d="m 260,1012.3622 130,40 130,-40" />
					<path d="m 520,1012.3622 130,40 130,-40" />
					<path d="m 780,1012.3622 130,40 130,-40" />
					<path d="m 1040.5,1012.3622 130,40 130,-40"/>
				</g>
			</svg>	
			<?php
            break;
            case 'rounded': ?>
			<svg viewBox="0 0 1300 40" version="1.1">            
				<g transform="translate(0,-1012.3622)" >
				<path d="m 0.49177423,1012.854 c 0,0 84.59771177,38.724 129.90164577,38.724 45.30394,0 84.59771,-19.362 129.90165,-19.362 45.30393,0 86.2081,22.4544 129.90164,19.362 45.18351,-3.198 84.5977,-19.362 129.90164,-19.362 45.30394,0 86.2081,22.4544 129.90165,19.362 45.18352,-3.198 84.59771,-19.362 129.90165,-19.362 45.30394,0 86.20809,22.4544 129.90164,19.362 45.18352,-3.198 86.09167,-19.362 129.90161,-19.362 43.8101,0 86.2082,22.4544 129.9017,19.362 45.1835,-3.198 129.9016,-38.724 129.9016,-38.724" />
				</g>
			</svg>
  			<?php
            break;
        }
    } else {
    ?>
		<svg viewBox="0 0 1300 40" version="1.1">
			<g transform="translate(0,-1012.3622)">
				<path d="m 0,1012.3622 130,40 130,-40" />
				<path d="m 260,1012.3622 130,40 130,-40" />
				<path d="m 520,1012.3622 130,40 130,-40" />
				<path d="m 780,1012.3622 130,40 130,-40" />
				<path d="m 1040.5,1012.3622 130,40 130,-40"/>
			</g>
		</svg>	
	<?php	      	
    }	
}
endif;

/* Paging and footer separator */
if ( ! function_exists( 'roda_footer_svg' ) ) :
function roda_footer_svg() { 
   $svg_type = get_theme_mod( 'svg_type' );
    if ( $svg_type != '' ) {
        switch ( $svg_type ) {
            case 'straight': ?>
			<svg viewBox="0 0 1300 40" version="1.1">
				<g transform="translate(0,-1012.3622)">
					<path d="M 0,40 130,0 260,40" transform="translate(0,1012.3622)"/>
					<path d="m 260,1052.3622 130,-40 130,40" />
				 	<path d="m 520,1052.3622 130,-40 130,40" />
					<path d="m 780,1052.3622 130,-40 130,40" />
					<path d="m 1040,1052.3622 130,-40 130,40" />
				</g>
			</svg>		
			<?php
            break;
            case 'rounded': ?>
			<svg viewBox="0 0 1300 40" version="1.1">
				<g transform="translate(0,-1012.3622)">
					<g transform="matrix(1,0,0,-1,0,2064.7244)">
						<path d="m 0,0 c 0,0 84.661765,40 130,40 45.33824,0 84.66176,-20 130,-20 45.33824,0 86.27337,23.19442 130,20 45.21773,-3.303352 84.66176,-20 130,-20 45.33824,0 86.27337,23.19442 130,20 45.21773,-3.303352 84.66176,-20 130,-20 45.33824,0 86.27337,23.19442 130,20 45.21773,-3.303352 86.15685,-20 130,-20 43.8432,0 86.2734,23.19442 130,20 45.2177,-3.303352 130,-40 130,-40" transform="translate(0,1012.3622)" />
					</g>
				</g>
			</svg>
  			<?php
            break;        
        }
    } else {
    ?>
		<svg viewBox="0 0 1300 40" version="1.1">
			<g transform="translate(0,-1012.3622)">
				<path d="M 0,40 130,0 260,40" transform="translate(0,1012.3622)"/>
				<path d="m 260,1052.3622 130,-40 130,40" />
			 	<path d="m 520,1052.3622 130,-40 130,40" />
				<path d="m 780,1052.3622 130,-40 130,40" />
				<path d="m 1040,1052.3622 130,-40 130,40" />
			</g>
		</svg>		
	<?php	      	
    }	
}
endif;