<?php
/**
 * @return string
 */
function opalhomes_custom_css() {

    $css = <<<CSS
CSS;
    /**
     * Filters OpalHomes custom colors CSS.
     *
     * @since OpalHomes 1.0
     *
     * @param string $css Base theme colors CSS.
     */
    $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
    $css = str_replace(': ', ':', $css);
    $css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);
    return apply_filters( 'ezboozt_theme_customizer_css', $css );
}