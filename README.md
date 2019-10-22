# Application de produits

## PHP 7.3.10 avec Composer

### Installation / Configuration

```bash
# En développement
composer dump-autoload
# En production
composer dump-autoload -o
```

> L'option -o avec 'dump-autoload' génère un classmap des différentes classes créées dans notre application.

> On aura donc une correspondance classe <-> fichier enregistrée directement dans un tableau PHP pour une meilleure performance au niveau du chargement de la classe (utile en production donc)