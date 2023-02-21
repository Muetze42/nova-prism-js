<?php

$themes = [
    'default'        => 'prismjs/themes/prism',
    'coy'            => 'prismjs/themes/prism-coy',
    'dark'           => 'prismjs/themes/prism-dark',
    'funky'          => 'prismjs/themes/prism-funky',
    'okaidia'        => 'prismjs/themes/prism-okaidia',
    'solarizedlight' => 'prismjs/themes/prism-solarizedlight',
    'twilight'       => 'prismjs/themes/prism-twilight',

    'a11y-dark'                       => 'prism-themes/themes/prism-a11y-dark',
    'atom-dark'                       => 'prism-themes/themes/prism-atom-dark',
    'base16-ateliersulphurpool-light' => 'prism-themes/themes/prism-base16-ateliersulphurpool.light',
    'cb'                              => 'prism-themes/themes/prism-cb',
    'coldark-cold'                    => 'prism-themes/themes/prism-coldark-cold',
    'coldark-dark'                    => 'prism-themes/themes/prism-coldark-dark',
    'coy-without-shadows'             => 'prism-themes/themes/prism-coy-without-shadows',
    'darcula'                         => 'prism-themes/themes/prism-darcula',
    'dracula'                         => 'prism-themes/themes/prism-dracula',
    'duotone-dark'                    => 'prism-themes/themes/prism-duotone-dark',
    'duotone-earth'                   => 'prism-themes/themes/prism-duotone-earth',
    'duotone-forest'                  => 'prism-themes/themes/prism-duotone-forest',
    'duotone-light'                   => 'prism-themes/themes/prism-duotone-light',
    'duotone-sea'                     => 'prism-themes/themes/prism-duotone-sea',
    'duotone-space'                   => 'prism-themes/themes/prism-duotone-space',
    'ghcolors'                        => 'prism-themes/themes/prism-ghcolors',
    'gruvbox-dark'                    => 'prism-themes/themes/prism-gruvbox-dark',
    'gruvbox-light'                   => 'prism-themes/themes/prism-gruvbox-light',
    'holi-theme'                      => 'prism-themes/themes/prism-holi-theme',
    'hopscotch'                       => 'prism-themes/themes/prism-hopscotch',
    'lucario'                         => 'prism-themes/themes/prism-lucario',
    'material-dark'                   => 'prism-themes/themes/prism-material-dark',
    'material-light'                  => 'prism-themes/themes/prism-material-light',
    'material-oceanic'                => 'prism-themes/themes/prism-material-oceanic',
    'night-owl'                       => 'prism-themes/themes/prism-night-owl',
    'nord'                            => 'prism-themes/themes/prism-nord',
    'one-dark'                        => 'prism-themes/themes/prism-one-dark',
    'one-light'                       => 'prism-themes/themes/prism-one-light',
    'pojoaque'                        => 'prism-themes/themes/prism-pojoaque',
    'shades-of-purple'                => 'prism-themes/themes/prism-shades-of-purple',
    'solarized-dark-atom'             => 'prism-themes/themes/prism-solarized-dark-atom',
    'synthwave84'                     => 'prism-themes/themes/prism-synthwave84',
    'vs'                              => 'prism-themes/themes/prism-vs',
    'vsc-dark-plus'                   => 'prism-themes/themes/prism-vsc-dark-plus',
    'xonokai'                         => 'prism-themes/themes/prism-xonokai',
    'z-touch'                         => 'prism-themes/themes/prism-z-touch',
];

$output = '';

foreach ($themes as $theme => $file) {
    $output .= 'html:not(.dark) .prism-field .theme-'.$theme.",\n";
    $output .= 'html.dark .prism-field .dark-theme-'.$theme." {\n";
    $output .= '    @import "'.$file.'";'."\n}\n";
}

file_put_contents(__DIR__.'/resources/scss/_prism-themes.scss', $output);
