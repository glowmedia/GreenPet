<?php

namespace Composer;

use Composer\Semver\VersionParser;






class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => 'dev-master',
    'version' => 'dev-master',
    'aliases' => 
    array (
    ),
    'reference' => 'b29bc194b4efbb6e18534f1d332ac713c30a5184',
    'name' => 'sccl/nhs-supplychain',
  ),
  'versions' => 
  array (
    'dompdf/dompdf' => 
    array (
      'pretty_version' => 'v0.8.1',
      'version' => '0.8.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '9ea852c4bdc74fac5def165e6cd52353f7ca3b3f',
    ),
    'guzzlehttp/guzzle' => 
    array (
      'pretty_version' => '6.3.0',
      'version' => '6.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f4db5a78a5ea468d4831de7f0bf9d9415e348699',
    ),
    'guzzlehttp/promises' => 
    array (
      'pretty_version' => '1.4.0',
      'version' => '1.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '60d379c243457e073cff02bc323a2a86cb355631',
    ),
    'guzzlehttp/psr7' => 
    array (
      'pretty_version' => '1.7.0',
      'version' => '1.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '53330f47520498c0ae1f61f7e2c90f55690c06a3',
    ),
    'nesbot/carbon' => 
    array (
      'pretty_version' => '1.22.1',
      'version' => '1.22.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '7cdf42c0b1cc763ab7e4c33c47a24e27c66bfccc',
    ),
    'phenx/php-font-lib' => 
    array (
      'pretty_version' => '0.5.2',
      'version' => '0.5.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ca6ad461f032145fff5971b5985e5af9e7fa88d8',
    ),
    'phenx/php-svg-lib' => 
    array (
      'pretty_version' => 'v0.3.3',
      'version' => '0.3.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '5fa61b65e612ce1ae15f69b3d223cb14ecc60e32',
    ),
    'psr/http-message' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f6561bf28d520154e4b0ec72be95418abe6d9363',
    ),
    'psr/http-message-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'ralouphie/getallheaders' => 
    array (
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '120b605dfeb996808c31b6477290a714d356e822',
    ),
    'sabberworm/php-css-parser' => 
    array (
      'pretty_version' => '8.3.1',
      'version' => '8.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd217848e1396ef962fb1997cf3e2421acba7f796',
    ),
    'sccl/nhs-supplychain' => 
    array (
      'pretty_version' => 'dev-master',
      'version' => 'dev-master',
      'aliases' => 
      array (
      ),
      'reference' => 'b29bc194b4efbb6e18534f1d332ac713c30a5184',
    ),
    'symfony/dotenv' => 
    array (
      'pretty_version' => 'v3.3.9',
      'version' => '3.3.9.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ac86b6e484ae9224be290f3a0686858ba18d49d5',
    ),
    'symfony/polyfill-mbstring' => 
    array (
      'pretty_version' => 'v1.20.0',
      'version' => '1.20.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '39d483bdf39be819deabf04ec872eb0b2410b531',
    ),
    'symfony/translation' => 
    array (
      'pretty_version' => 'v3.4.46',
      'version' => '3.4.46.0',
      'aliases' => 
      array (
      ),
      'reference' => 'be83ee6c065cb32becdb306ba61160d598b1ce88',
    ),
    'symfony/var-dumper' => 
    array (
      'pretty_version' => 'v3.3.9',
      'version' => '3.3.9.0',
      'aliases' => 
      array (
      ),
      'reference' => '89fcb5a73e0ede2be2512234c4e40457bb22b35f',
    ),
  ),
);







public static function getInstalledPackages()
{
return array_keys(self::$installed['versions']);
}









public static function isInstalled($packageName)
{
return isset(self::$installed['versions'][$packageName]);
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

$ranges = array();
if (isset(self::$installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = self::$installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}





public static function getVersion($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['version'])) {
return null;
}

return self::$installed['versions'][$packageName]['version'];
}





public static function getPrettyVersion($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return self::$installed['versions'][$packageName]['pretty_version'];
}





public static function getReference($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['reference'])) {
return null;
}

return self::$installed['versions'][$packageName]['reference'];
}





public static function getRootPackage()
{
return self::$installed['root'];
}







public static function getRawData()
{
return self::$installed;
}



















public static function reload($data)
{
self::$installed = $data;
}
}
