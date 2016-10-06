#!/bin/bash
function vamos(){
	# Busca Canbios, arma comandos para ftp
	find . -type f -cnewer sync.ctrl ! -name '*.*~' -a ! -name rsync_lis -a ! -name sync.ctrl | awk '{print "put -z " substr($0,3) " " substr($0,3);}' > rsync_lis

	# Si hay cambios se sincroniza
	if [ -s rsync_lis ] ; then
		echo Inicio sincronizando ... $(date)
		# Sincroniza CZTE
		# Producción
		# ncftp  -u agalaz@202 -p Asdfgh954321 iplan-nt6.toservers.com < rsync_lis
		# echo ESTADO SALIDA NCFTP $?
		
		# Desarrollo
		# rsync --partial -azu -e ssh --delete .  php.server:/var/www/html/czte/
		# ssh php.server chown -R apache:root /var/www/html/czte
		# ( echo 'cd /var/www/html/czte' ; cat rsync_lis ) | sed -e 's/^put -z/put/g' | sftp php.server
		# echo ESTADO SALIDA SFTP $?
		# rsync -azu -e ssh --delete . hal9000:czte/
		# ssh hal9000 chmod -R 755 /home/andres/czte
		rsync -Pazvu --delete -e ssh . debian6a:/var/www/czte/
		ssh debian6a chmod -R 755 /var/www/czte

		touch sync.ctrl
		echo Fin sincronizando ... $(date)
	fi
	rm rsync_lis
}

nCount=0
while [ 1 ] ; do
	vamos
	nCount=$( expr $nCount + 1 )
	if [ $nCount -eq 10 ] ; then
		echo "                        ... $(date)"
		nCount=0
	fi
	sleep 2 
done
