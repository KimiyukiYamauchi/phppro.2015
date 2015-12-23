# phppro.2015

本リポジトリは夜間の授業で使用する「プロになるためのPHPプログラミング入門」に関する  
追加情報等の情報共有に使用する

## Xdebugのインストール

1. リポジトリを最新にする  
$ sudo aptitude update
1. インストールモジュールを最新にする  
$ sudo aptitude upgrade
1. 開発環境のインストール  
$ sudo aptitude install php5-dev
1. Xdebugのインストール  
$ sudo pecl install xdebug
1. Xdebugの有効化
	1. sudo vi /etc/php5/apache2/php.ini
	1. 以下を追加  
	zend_extension=/usr/lib/php5/20131226/xdebug.so  
	xdebug.remote_enable=on
1. Apacheの再起動  
$ sudo service apache2 restart
