<?php
$define = [
    'MODULE_SHIPPING_YAMATO_TEXT_TITLE' => 'Yamato Express 1-4 jours',
    'MODULE_SHIPPING_YAMATO_TEXT_DESCRIPTION' => 'Réglages du module Yamato Express',
    'MODULE_SHIPPING_YAMATO_TEXT_WAY_NORMAL' => 'Standard (COD possible)',
    'MODULE_SHIPPING_YAMATO_TEXT_NOTAVAILABLE' => 'Ce service n\'est pas offert entre les régions sélectionnées.',
    'MODULE_SHIPPING_YAMATO_TEXT_OVERSIZE' => 'Le poids ou la taille dépasse les limites.',
    'MODULE_SHIPPING_YAMATO_TEXT_ILLEGAL_ZONE' => 'Préfecture spécifiée incorrecte.',
    'MODULE_SHIPPING_YAMATO_TEXT_OUT_OF_AREA' => 'Hors zone de livraison.',
    'MODULE_SHIPPING_YAMATO_TEXT_DIMENSION_MISSING' => 'Erreur! Dimension(s) de produit(s) manquante(s).',
//bof constant configuration titles and descriptions for Yamato Shipping
    'CFGTITLE_MODULE_SHIPPING_YAMATO_STATUS' => 'Activer la méthode d\'expédition Yamato',
    'CFGDESC_MODULE_SHIPPING_YAMATO_STATUS' => 'Souhaitez-vous proposer une livraison au tarif Yamato ?',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_HANDLING' => 'Frais de traitement',
    'CFGDESC_MODULE_SHIPPING_YAMATO_HANDLING' => 'Frais de traitement pour ce mode d\'expédition.',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_MAX_WEIGHT' => 'Poids d\'expédition maximal',
    'CFGDESC_MODULE_SHIPPING_YAMATO_MAX_WEIGHT' => 'Poids maximum pouvant être expédié avec cette méthode.',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_MAX_GIRTH' => '« Circonférence » intérieure maximale',
    'CFGDESC_MODULE_SHIPPING_YAMATO_MAX_GIRTH' => 'Valeur maximale de la somme des trois côtés du volume intérieur de l\'enveloppe.',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_FREE_SHIPPING' => 'Paramètres de livraison gratuite',
    'CFGDESC_MODULE_SHIPPING_YAMATO_FREE_SHIPPING' => 'Souhaitez-vous activer le paramètre de livraison gratuite ? Sélectionnez « Faux » pour donner la priorité aux autres modules [Frais de livraison]-[Options gratuites]...',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_OVER' => 'Commande minimum pour une livraison gratuite',
    'CFGDESC_MODULE_SHIPPING_YAMATO_OVER' => 'Si vous achetez plus que la quantité fixée, la livraison sera gratuite.',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_TAX_CLASS' => 'Type de taxe',
    'CFGDESC_MODULE_SHIPPING_YAMATO_TAX_CLASS' => 'Veuillez sélectionner le type de taxe qui s\'applique à vos frais d\'expédition.',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_TAX_BASIS' => 'Base de la taxe',
    'CFGDESC_MODULE_SHIPPING_YAMATO_TAX_BASIS' => 'Sur quelle base la taxe d\'expédition est-elle calculée ? Les options sont :<br>Shipping - En fonction de l\'adresse de livraison du client<br>Billing - Basée sur l\'adresse de facturation du client<br>Store - Basé sur l\'adresse du magasin si la zone de facturation/d\'expédition est identique à la zone du magasin',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_ZONE' => 'Zone d\'expédition',
    'CFGDESC_MODULE_SHIPPING_YAMATO_ZONE' => 'Si une zone est sélectionnée, activez uniquement ce mode d\'expédition pour cette zone.',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_SORT_ORDER' => 'Ordre de tri d\'affichage',
    'CFGDESC_MODULE_SHIPPING_YAMATO_SORT_ORDER' => 'Ordre de tri d\'affichage. Le numéro le plus bas est affiché en premier.',
//eof constant configuration titles and descriptions for Yamato Shipping
];
$GLOBALS['a_yamato_time']=array(
  array('id'=>'Sans préférence','text'=>'Sans préférence'),
  array('id'=>'Le matin','text'=>'Le matin'),
  array('id'=>'14h-16h','text'=>'14h-16h'),
  array('id'=>'16h-18h','text'=>'16h-18h'),
  array('id'=>'18h-20h','text'=>'18h-20h'),
  array('id'=>'19h-21h','text'=>'19h-21h'),
);
return $define;