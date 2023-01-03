<?php

function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

function makeIdPublic() {
  $idPublic = bin2hex(random_bytes(16));

  return $idPublic;
}

function creationDateLittleEndian($creation_date) {
  $phpdate = strtotime( $creation_date );
  $creation_date = date( 'd/m/Y', $phpdate );

  return $creation_date;
}