<?php
require __DIR__.'/../vendor/symfony/src/Symfony/Component/ClassLoader/ApcUniversalClassLoader.php';
use Symfony\Component\ClassLoader\ApcUniversalClassLoader;
use Doctrine\Common\Annotations\AnnotationRegistry;

$loader = new ApcUniversalClassLoader('sf2.apc.');
$loader->registerNamespaces(array(
    'Symfony' => array(__DIR__ . '/../vendor/symfony/src', __DIR__ . '/../vendor/bundles'),
    'Sensio' => __DIR__ . '/../vendor/bundles',
    'JMS' => __DIR__ . '/../vendor/bundles',
    'Doctrine\\Common' => __DIR__ . '/../vendor/doctrine-common/lib',
    'Doctrine\\DBAL' => __DIR__ . '/../vendor/doctrine-dbal/lib',
    'Doctrine' => __DIR__ . '/../vendor/doctrine/lib',
    'Monolog' => __DIR__ . '/../vendor/monolog/src',
    'Assetic' => __DIR__ . '/../vendor/assetic/src',
    'Metadata' => __DIR__ . '/../vendor/metadata/src',
    'CG' => __DIR__ . '/../vendor/cg-library/src',
    'Snc' => __DIR__ . '/../vendor/bundles',
    'Predis' => __DIR__ . '/../vendor/predis/lib',
    'FOS' => __DIR__ . '/../vendor/bundles',
    'FOQ' => __DIR__ . '/../vendor/',
    'Knp' => __DIR__.'/../vendor/bundles',
    'Zend' => __DIR__.'/../vendor',
    'Estrisa' => __DIR__.'/../vendor',
    'Cybernox' => __DIR__.'/../vendor/bundles',
));
$loader->registerPrefixes(array(
    'Twig_Extensions_' => __DIR__ . '/../vendor/twig-extensions/lib',
    'Twig_' => __DIR__ . '/../vendor/twig/lib',
    'Elastica' => __DIR__ . '/../vendor/elastica/lib',
));



// intl
if (!function_exists('intl_get_error_code')) {
    require_once __DIR__ . '/../vendor/symfony/src/Symfony/Component/Locale/Resources/stubs/functions.php';

    $loader->registerPrefixFallbacks(array(__DIR__ . '/../vendor/symfony/src/Symfony/Component/Locale/Resources/stubs'));
}

$loader->registerNamespaceFallbacks(array(
    __DIR__ . '/../src',
));
$loader->register();

AnnotationRegistry::registerLoader(function($class) use ($loader) {
                    $loader->loadClass($class);
                    return class_exists($class, false);
                });
AnnotationRegistry::registerFile(__DIR__ . '/../vendor/doctrine/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');

// Swiftmailer needs a special autoloader to allow
// the lazy loading of the init file (which is expensive)
require_once __DIR__ . '/../vendor/swiftmailer/lib/classes/Swift.php';
Swift::registerAutoload(__DIR__ . '/../vendor/swiftmailer/lib/swift_init.php');

