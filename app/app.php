<?php

$appdir = dirname(__DIR__);

$ds = DIRECTORY_SEPARATOR;

$core = $appdir . $ds . "vendor/AJ/core" ;

$lib = $core . $ds . "lib";

$helper = $core . $ds . "helper";

$entitypath = array( $appdir . $ds . "src/model" );


$config = yaml_parse_file($appdir . $ds . 'app/config/config.yml');
$config['templating']['view_path'] = $appdir . $ds . $config['templating']['view_path'] ;
$config['templating']['public'] = $appdir . $ds . $config['templating']['public'] ;





require_once $appdir ."/vendor/autoload.php";


use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

// Twig
$load = new Twig_Loader_Filesystem($config['templating']['view_path']);
$template = new Twig_Environment($load);


// Doctrine ORM
//echo $config['framwork']["dev"];

$classLoader = new \Doctrine\Common\ClassLoader('Doctrine');
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Entity', $entitypath[0]);
$classLoader->register();

$ormconfig = new \Doctrine\ORM\Configuration();
$ormconfig->setProxyDir($entitypath[0]);
$ormconfig->setProxyNamespace('Proxies');
$ormconfig->setAutoGenerateProxyClasses(true);

$reader = new AnnotationReader();
$driverImpl = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($reader, $entitypath);
$ormconfig->setMetadataDriverImpl($driverImpl);

$conf = Setup::createAnnotationMetadataConfiguration($entitypath, true);
$em = EntityManager::create($config['database'], $ormconfig);





