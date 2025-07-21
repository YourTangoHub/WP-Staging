<?php
require __DIR__ . '/vendor/autoload.php';

use ScssPhp\ScssPhp\Compiler;

// Define input/output SCSS file mappings
$filesToCompile = [
    'header.scss'  => 'header.css',
    'footer.scss'  => 'footer.css',
    'common.scss'    => 'common.css',
    'home.scss' => 'home.css',
    'article.scss' => 'article.css',
    'listing.scss' => 'listing.css',
];

// Base directories
$scssDir = __DIR__ . '/wp-content/themes/twentytwentyfive-child/assets/scss/';
$cssDir  = __DIR__ . '/wp-content/themes/twentytwentyfive-child/assets/css/';

// Compiler instance
$compiler = new Compiler();

foreach ($filesToCompile as $scssFile => $cssFile) {
    $inputPath = $scssDir . $scssFile;
    $outputPath = $cssDir . $cssFile;

    if (!file_exists($inputPath)) {
        echo "❌ File not found: $inputPath\n";
        continue;
    }

    $scssContent = file_get_contents($inputPath);

    try {
        $compiledCss = $compiler->compileString($scssContent)->getCss();
        file_put_contents($outputPath, $compiledCss);
        echo "✅ Compiled: $scssFile → $cssFile\n";
    } catch (Exception $e) {
        echo "❌ Error compiling $scssFile: " . $e->getMessage() . "\n";
    }
}
