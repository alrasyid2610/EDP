<?php

if (!function_exists('getDataComputerOperation')) {
  function getDataComputerOperation()
  {
    return [
      'One User',
      'Many User'
    ];
  }
}

if (!function_exists('getDataProcessor')) {
  function getDataProcessor()
  {
    return [
      'Intel &reg; Core&trade; i5-6500 Processor',
      'Intel &reg; Core&trade; i5-4590 Processor',
      'Intel &reg; Core&trade; i5-3470 Processor',
      'Intel &reg; Core&trade; i3-8100 Processor',
      'Intel &reg; Core&trade; i3-7100 Processor',
      'Intel &reg; Core&trade; i3-7100T Processor',
      'Intel &reg; Core&trade; i3-6100 Processor',
      'Intel &reg; Core&trade; i3-6100T Processor',
      'Intel &reg; Core&trade; i3-4160 Processor',
      'Intel &reg; Core&trade; i3-4100M Processor',
      'Intel &reg; Core&trade; i3-3240 Processor',
      'Intel &reg; Core&trade;2 Duo Processor E7500',
      'Intel &reg; Pentium &reg; Processor E5700',
      'Intel &reg; Pentium &reg; Processor E5500',
      'Intel &reg; Pentium &reg; Processor E5400',
      'Intel &reg; Pentium &reg; Processor E5300',
      'Intel &reg; Pentium &reg; Processor E5200',
      'Intel &reg; Pentium &reg; Processor E2200',
      'Intel &reg; Pentium &reg; Processor E2180',
      'Intel &reg; Pentium &reg; Processor G2030',
      'Intel &reg; Pentium &reg; Processor G2020',
      'Intel &reg; Pentium &reg; Processor G2010',
      'Intel &reg; Pentium &reg; Processor G630',
      'Intel &reg; Pentium &reg; 4 Processor',
      'Intel &reg; Xeon &reg; Processor 3040',
    ];
  }
}

if (!function_exists('loopSelectData')) {
  function loopSelectData($data, $val, $type = '', $col = '')
  {
    foreach ($data as $item) {
      if (isset($GLOBALS['a'])) {
        if ($item == htmlentities($GLOBALS['a']->$val)) {
          echo "<option value='$item' selected>$item</option>";
        } else {
          echo "<option value='$item'>$item</option>";
        }
      } else {
        if ($item == $val) {
          echo "<option value='$item' selected>$item</option>";
        } else {
          echo "<option value='$item'>$item</option>";
        }
      }
    }
  }
}

if (!function_exists('getDataScreenPlugs ')) {
  function getDataScreenPlugs()
  {
    return [
      'VGA',
      'HDMI',
      'DISPLAY PORT'
    ];
  }
}

if (!function_exists('getDataBrandPc ')) {
  function getDataBrandPc()
  {
    return [
      'HP',
      'DELL',
      'ASUS',
      'RAKITAN'
    ];
  }
}

if (!function_exists('getDataOs ')) {
  function getDataOs()
  {
    return [
      'Windows 7 Pro',
      'Windows 10 Pro'
    ];
  }
}

if (!function_exists('getDataDestination ')) {
  function getDataDestination()
  {
    return [
      'DNPI Pulogadung',
      'DNPI Krawang'
    ];
  }
}

if (!function_exists('getDataSupplier ')) {
  function getDataSupplier()
  {
    return [
      'CV. JODA JAYA ELECTRIC',
      'PT. PLATINDO KARYA PRIMA',
      'PT. WAHANA DATARINDO SEMPURANA',
      'PT. MICROREKSA INFONET',
    ];
  }
}

function getDataEnumYN()
{
  return [
    'YES',
    'NO'
  ];
}


function getDataMicrosoftOffice()
{
  return [
    'Microsoft Office 2013',
    'Microsoft Office 2010',
    'Microsoft Office 2007'
  ];
}


function getDataLocation()
{
  return [
    'PULOGADUNG',
    'KRAWANG'
  ];
}


function getDataBrandMonitor()
{
  return [
    'LG',
    'SAMSUNG',
    'DELL',
    'HP'
  ];
}
