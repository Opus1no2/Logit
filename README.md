Loggit
====================

This is a very simple class for logging data. 

Usage
-----

``` php

Loggit::info('Some information', __FILE__, __LINE__);
Loggit::debug('Debug information, __FILE__, __LINE__);
Loggit::warn('Warning information, __FILE__, __LINE__);
Loggit::error('Error information, __FILE__, __LINE__);
Loggit::fatal('Fatal information, __FILE__, __LINE__');

```

You can also define your own methods:

``` php

Loggit::apocalyptic(array(
  'data' => 'All is lost', 
  'f'    => __FILE__, 
  'l'    => __LINE__
));

Loggit::theGriefMustFlow(array(
  'data' => 'Time to close the doors', 
  'f'    => __FILE__, 
  'l'    => __LINE__
));

Loggit::fatality(array(
  'data' => 'Game over', 
  'f'    => __FILE__, 
  'l'    => __LINE__
))

```

Copyright
_________

Copyright (c) 2013 Travis Tillotson. See LICENSE for details.