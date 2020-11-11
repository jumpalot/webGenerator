#!/bin/bash
mkfile(){
	for dir in "$@"; do
		echo | cat > $dir
	done
}
mkdir -p users/$1/{css/{user,admin},img/{avatars,buttons,products,pets},js/{validations,effects},tpl,php}
cd users/$1
echo $1 | cat > index.php
mkfile css/{user/estilo,admin/estilo}.css
mkfile js/{validations/{login,register},effects/panels}.js
mkfile tpl/{main,login,register,panel,profile,crud}.tpl
mkfile php/{create,read,update,delete,dbconect}.php