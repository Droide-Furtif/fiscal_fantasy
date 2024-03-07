<?php
function convertCurrencyCodeToSymbol($currencyCode) {
    // Tableau de correspondance entre les codes et les symboles de devises
    $currencySymbols = [
        1 => '€',
        2 => '$',
        3 => '£',
    ];

    // Vérifier si le code de la devise existe dans le tableau
    if (array_key_exists($currencyCode, $currencySymbols)) {
        return $currencySymbols[$currencyCode];
    } else {
        return '?'; // Retourner une valeur par défaut ou gérer l'erreur
    }
}

function convertTypeCodeToString($typeCode) {
  // Tableau de correspondance entre les codes et les symboles de devises
  $typeStrings = [
      1 => 'Compte Épargne',
      2 => 'Compte Courant',
      3 => 'Actions',
  ];

  // Vérifier si le code de la devise existe dans le tableau
  if (array_key_exists($typeCode, $typeStrings)) {
      return $typeStrings[$typeCode];
  } else {
      return '?'; // Retourner une valeur par défaut ou gérer l'erreur
  }
}
?>