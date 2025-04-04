<?php
$define = [
    'MODULE_SHIPPING_JPPARCELEMS_TEXT_TITLE' =>        'Courrier express international',
    'MODULE_SHIPPING_JPPARCELEMS_TEXT_DESCRIPTION' =>  'Réglages du module Courrier express international',
    'MODULE_SHIPPING_JPPARCELEMS_TEXT_WAY_NORMAL' =>   'EMS (4-10 jours)',
//bof constant configuration titles and descriptions for jpParcelems Shipping
    'CFGTITLE_MODULE_SHIPPING_JPPARCELEMS_STATUS' => 'Activer la méthode d\'expédition EMS',
    'CFGDESC_MODULE_SHIPPING_JPPARCELEMS_STATUS' => 'Souhaitez-vous proposer une expédition au tarif EMS ?',
    'CFGTITLE_MODULE_SHIPPING_JPPARCELEMS_HANDLING' => 'Frais de traitement',
    'CFGDESC_MODULE_SHIPPING_JPPARCELEMS_HANDLING' => 'Frais de traitement pour ce mode d\'expédition.',
    'CFGTITLE_MODULE_SHIPPING_JPPARCELAIR_MULTIBOX' => 'Activer le multiboxing (paquets multiples) pour cette méthode',
    'CFGDESC_MODULE_SHIPPING_JPPARCELAIR_MULTIBOX' => 'Souhaitez-vous ajouter de nouvelles parcelles lorsque la limite est atteinte et sur quelle base ?<br>Les options sont :<br>None - Pas de paquets multiples<br>Weight - Nouveaux paquets basés sur la limite de poids',
    'CFGTITLE_MODULE_SHIPPING_JPPARCELEMS_MAX_WEIGHT' => 'Poids d\'expédition maximal',
    'CFGDESC_MODULE_SHIPPING_JPPARCELEMS_MAX_WEIGHT' => 'Poids maximum pouvant être expédié avec cette méthode.',
    'CFGTITLE_MODULE_SHIPPING_JPPARCELEMS_FREE_SHIPPING' => 'Paramètres de livraison gratuite',
    'CFGDESC_MODULE_SHIPPING_JPPARCELEMS_FREE_SHIPPING' => 'Souhaitez-vous activer le paramètre de livraison gratuite ? Sélectionnez « Faux » pour donner la priorité aux autres modules [Frais de livraison]-[Options gratuites]...',
    'CFGTITLE_MODULE_SHIPPING_JPPARCELEMS_OVER' => 'Commande minimum pour une livraison gratuite',
    'CFGDESC_MODULE_SHIPPING_JPPARCELEMS_OVER' => 'Si vous achetez plus que la quantité fixée, la livraison sera gratuite.',
//    'CFGTITLE_MODULE_SHIPPING_JPPARCELEMS_TAX_CLASS' => 'Type de taxe',
//    'CFGDESC_MODULE_SHIPPING_JPPARCELEMS_TAX_CLASS' => 'Veuillez sélectionner le type de taxe qui s\'applique à vos frais d\'expédition.',
//    'CFGTITLE_MODULE_SHIPPING_JPPARCELEMS_TAX_BASIS' => 'Base de la taxe',
//    'CFGDESC_MODULE_SHIPPING_JPPARCELEMS_TAX_BASIS' => 'Sur quelle base la taxe d\'expédition est-elle calculée ? Les options sont :<br>Shipping - En fonction de l\'adresse de livraison du client<br>Billing - Basée sur l\'adresse de facturation du client<br>Store - Basé sur l\'adresse du magasin si la zone de facturation/d\'expédition est identique à la zone du magasin',
    'CFGTITLE_MODULE_SHIPPING_JPPARCELEMS_ZONE' => 'Zone d\'expédition',
    'CFGDESC_MODULE_SHIPPING_JPPARCELEMS_ZONE' => 'Si une zone est sélectionnée, activez uniquement ce mode d\'expédition pour cette zone.',
    'CFGTITLE_MODULE_SHIPPING_JPPARCELEMS_SORT_ORDER' => 'Ordre de tri d\'affichage',
    'CFGDESC_MODULE_SHIPPING_JPPARCELEMS_SORT_ORDER' => 'Ordre de tri d\'affichage. Le numéro le plus bas est affiché en premier.',
//eof constant configuration titles and descriptions for jpParcelems Shipping
];
return $define;