#!/bin/bash
latex "$1.tex"
dvips "$1.dvi"
ps2pdf "$1.ps"
# open "$1.pdf"
gs -q -dNOCACHE -dNOPAUSE -dBATCH -dSAFER -sDEVICE=eps2write -o "$1.eps" "$1.pdf"
convert -density 600 "$1.pdf" "$1.png"
rm "$1.ps"
rm "$1.dvi"
rm "$1.aux"
rm "$1.log"
mv "$1.pdf" "$2.pdf"
mv "$1.png" "$2.png"
mv "$1.eps" "$2.eps"