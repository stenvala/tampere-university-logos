## Guide

### Single items

Logo
```
php script-single.php logo
cd ../temp; ../src/compile-logo.sh logo logo; open logo.pdf; cd ../src
```

Slogan
```
php script-single.php slogan
cd ../temp; ../src/compile-slogan.sh slogan slogan; open slogan.pdf; cd ../src
```

Face
```
php script-single.php face
cd ../temp; ../src/compile-logo.sh face face; open face.pdf; cd ../src
```

### Batch

Logos
```
php script-logo-tex.php
php script-logo-images.php
```

Slogans
```
php script-slogan-tex.php
php script-slogan-images.php
```

Faces
```
php script-face-tex.php
php script-face-images.php
```