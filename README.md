# Projet-BibliothequePHP
[![](https://tokei.rs/b1/github/Powarox2159/Projet-BibliothequePHP?category=code)](https://github.com/Powarox2159/Projet-BibliothequePHP)

## Liens utiles

https://packagist.org/packages/robindev/metadata

https://dev-21606393.users.info.unicaen.fr/M1/ProjetLibPhp/TestApp/index.php


## Installation de la librairie :

require : "php": ">=5.3.0"


Cmd : composer require robindev/metadata

Si cela ne télécharge pas la dernière version :
- aller dans composer.json
- puis modifier le numéro de verison que vous souhaiter obtenir

Dernière version : 1.3.0

```json
{
    "require": {
        "robindev/metadata": "^1.3.0"
    }
}
```

- enfin taper : composer update -W dans le terminal













Une fonction pour extraire les métadonnées d'un fichier

```php
<?php
    /**
     * Extrait les métadonnées d'un fichier
     *
     * @param String $file : localisation du fichier dossier/file.extension
     * @return Array $metaData : contient les métadonnées du fichier d'entré
    */
    public function getMeta($file){
        $data = shell_exec("exiftool -json ".$file);
        $metaData = json_decode($data, true);
        return $metaData[0];
    }
```  

Appel de la fonction :

```php
<?php
    $tabMeta = $this->lib->getMeta($location);
```


Suite ...

```php
<?php

```
