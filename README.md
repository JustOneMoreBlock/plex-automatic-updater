# Requirements
- PHP Installed
- Root Access

# Install
Place `plex.php` in /opt/plex-automatic-updater/
Change $distro to your Distro. If FreeBSD this will not work, however, you could make it work.

Create a new file called plex in /sbin/plex
```
service plexmediaserver stop
php /opt/plex-automatic-updater/plex.php
service plexmediaserver start
```

chmod +x /sbin/plex

# CronJob (Every Day at Midnight)
```
0 0 * * * /sbin/plex >/dev/null 2>&1
```

Notes:
I've modied my plex.php to do the following:
```
foreach ($releases as $release) {
    if ($release->label == $label) {
        echo "Downloading: $release->url\r\n";
        shell_exec("yum -y install $release->url");
    }
}
```
