# Projet-BibliothequePHP
Projet Tutoré bibliothèque PHP


```php
<?php

use Metadata\MetadataFactory;
use Metadata\Driver\DriverChain;

$driver = new DriverChain(array(
    /** Annotation, YAML, XML, PHP, ... drivers */
));
$factory = new MetadataFactory($driver);
$metadata = $factory->getMetadataForClass('MyNamespace\MyObject');
```  
