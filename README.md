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
1. 参考  
<a href="http://www.atmarkit.co.jp/ait/articles/1103/31/news106.html" target="_blank">PECLのXDebugでデバッグを簡単に(前編)</a>  
<a href="http://www.atmarkit.co.jp/ait/articles/1105/25/news125.html" target="_blank">PECLのXDebugでデバッグを簡単に(後編)</a>  


## HTML\_Template_Flexyのインストール

1. sudo pear install HTML\_Template_Flexy

## Apacheのドキュメントルートの設定変更

1.  sudo vi /etc/apache2/sites-available/000-default.conf
1. 以下のように変更  
\#DocumentRoot /var/www/html (旧)  
DocumentRoot /home/yamauchi/www (新)  
(「yamauchi」の部分は各自のログインユーザ)
1. 以下の追加(```</VirtualHost>```より前に追加)  
```
<Directory /home/yamauchi/www/>
	Options Indexes FollowSymLinks
	AllowOverride FileInfo
	Require all granted
</Directory>
```

